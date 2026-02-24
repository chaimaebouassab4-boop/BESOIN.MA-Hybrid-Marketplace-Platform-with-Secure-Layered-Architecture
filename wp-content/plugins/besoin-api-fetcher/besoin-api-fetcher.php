<?php

/**
 * Plugin Name: Besoin API Fetcher
 * Description: A modular API fetcher to get data from APIs and use it throughout the site.
 * Version: 1.0
 * Author: iApp Technologies LLP
 * Author URI: iapptechnologies.com
 */

// Ensure the file is only accessed via WordPress
defined('ABSPATH') or die('Direct script access disallowed.');

/**
 * Function to fetch data from an API.
 *
 * @param string $url The API endpoint.
 * @param array $args Optional arguments for the request.
 * @return array|false The response data or false on failure.
 */
function besoin_api_fetch_data()
{
    // Database connection settings - Update these with your actual details

    $db_host = PluginDB_HOST; //'192.168.1.10';
    $db_user = PluginDB_USER; //'devserver';
    $db_pass = PluginDB_PASSWORD; //'swh0euJHv3aWoxsC@';
    $db_name = Plugin_DB_NAME; //'besoin_back';

    try {
        $external_db = new wpdb($db_user, $db_pass, $db_name, $db_host);
        if ($external_db->last_error) {
            throw new Exception('Database connection error: ' . $external_db->last_error);
        }
        return $external_db;
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

// Laravel app link
function besonAppLink()
{
    return defined('BESOIN_ADMIN_APP_URL') ? BESOIN_ADMIN_APP_URL : 'https://besoin-admin.iapplabz.co.in';
}

// Image path
function besonImgPath()
{
    // return  BESOIN_ADMIN_UPLOAD_PATH; //'public/uploads/';
    return defined('BESOIN_ADMIN_UPLOAD_PATH') ? BESOIN_ADMIN_UPLOAD_PATH : 'uploads/';
}

// Default Image Path
function defaultImage()
{
    return 'image.png';
}

function getYearNumber($startDate)
{
    // Convert the start date string to a DateTime object
    $startDateObj = new DateTime($startDate);

    // Get the current date
    $currentDate = new DateTime();

    // Compare the current date to the anniversary of the start date in the current year
    $currentYearAnniversary = new DateTime($currentDate->format('Y') . '-' . $startDateObj->format('m-d'));

    // If today's date is before the anniversary this year, subtract 1 from the year difference
    if ($currentDate < $currentYearAnniversary) {
        $yearNumber = $currentDate->format('Y') - $startDateObj->format('Y') - 1;
    } else {
        $yearNumber = $currentDate->format('Y') - $startDateObj->format('Y');
    }

    return $yearNumber;
}

// Get Location data
function getLocations()
{
    try {
        $db = besoin_api_fetch_data();
        $table_name = 'locations';
        $locations = $db->get_results("SELECT * FROM $table_name WHERE status = 51");
        if (!$locations) {
            throw new Exception('No locations found');
        }
        return $locations;
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}


function besionSearchOld($type, $text, $location)
{
    try {
        $type = (int) $type;
        $features = '';
        $key = $text;
        $db = besoin_api_fetch_data();
        $features;
        $productsa;
        $featuresa;
        $products;
        if ($type == 1 || $type == 2) {

            $features = $db->get_results("SELECT * FROM `business` WHERE `status` = 51 Order By id DESC LIMIT 20");

            $getBusinessData = $db->get_results("SELECT * FROM business_meta WHERE value = $type order by id desc");

            if (count($getBusinessData)) {
                $whereIn = array();
                foreach ($getBusinessData as $value) {
                    if ($value->post_id) {
                        $whereIn[] = $value->post_id;
                    }
                }
                $whereIn = implode(',', $whereIn);
                $features = $db->get_results("SELECT * FROM business WHERE id IN ($whereIn) AND status = 51 LIMIT 20");
            }

            if ($key != '') {
                $features = $db->get_results("SELECT * FROM business WHERE name LIKE '%$key%' order by id desc LIMIT 20;");
            }

            $alldata = [];
            foreach ($features as $business) {
                $getBusinesskeywords = $db->get_results("SELECT * FROM business_meta WHERE `key`='tag' AND post_id = $business->id");

                $planmeta = $db->get_row("SELECT * FROM planmeta WHERE post_id = $business->id AND expiry >= '" . date('Y-m-d') . "'");

                if ($planmeta) {
                    $plan = 1;
                } else {
                    $plan = 0;
                };
                $data['working_hours'] = null;
                if (!empty($business->working_hours)) {
                    $working_hours = json_decode(stripslashes($business->working_hours));
                    if ($working_hours != NULL) {
                        $ar = $working_hours;
                        $data['working_hours'] = $ar;
                    }
                }

                $collection = [
                    'id' => $business->id,
                    'name' => $business->name,
                    'address' => $business->address,
                    'plan' => $plan,
                    'phone' => $business->phone,
                    'website' => $business->website,
                    'verified' => $business->verified,
                    'date_of_creation' => $business->date_of_creation,
                    'created_at' => $business->created_at,
                    'working_hours' => $data['working_hours'],
                    'about' => $business->about,
                    'keywords' => $getBusinesskeywords,
                    'products' => $db->get_row("SELECT * FROM product WHERE post_id = $business->id"),
                    // 'location' => $this->business->strLocation($business->id),
                    'logo' => $db->get_row("SELECT * FROM galleries WHERE post_id = $business->id AND `prefix` = 'logo';") ?
                        $db->get_row("SELECT * FROM galleries WHERE post_id = $business->id AND `prefix` = 'logo';") : 'image.png',
                    'image' => $db->get_row("SELECT * FROM galleries WHERE post_id = $business->id AND `prefix` = 'photo';")
                ];
                $alldata[] = $collection;
            }
            // $featuresa = $alldata;
            return $alldata;
        }
        if ($type == 1 || $type == 3) {
            $allproduct = array();
            $query = "SELECT * FROM product WHERE status = 51";
            if ($key != '') {
                $query = "SELECT * FROM product WHERE status = 51 AND title LIKE '%$key%' ORDER BY id DESC LIMIT 20;";
            }
            $products = $db->get_results($query);
            if (count($products) > 0) {
                foreach ($products as $product) {
                    $business_detail = $db->get_row("SELECT * FROM business WHERE id = $product->post_id");

                    $category_id = $db->get_row("SELECT * FROM product_meta WHERE product_id = $product->id AND `key` = 'category';");

                    $category = $db->get_row("SELECT * FROM categories_product WHERE id = $category_id->value");

                    $allproduct[] = [

                        'id' => $product->id,
                        'title' => $product->title,
                        'choose_price' => $product->choose_price,
                        'price' => $product->price,
                        'promo' => $product->promo,
                        'image' => $db->get_row("SELECT * FROM product_meta WHERE product_id = $product->id AND `key` = 'image';"),
                        'category_name' => $category->name,
                        'business_name' => $business_detail->name,

                        'logo' => $db->get_row("SELECT * FROM galleries WHERE post_id = $business_detail->id AND `prefix` = 'logo';") ?
                            $db->get_row("SELECT * FROM galleries WHERE post_id = $business_detail->id AND `prefix` = 'logo';") : 'image.png',
                    ];
                }
            }
            $productsa = $allproduct;
            return $allproduct;
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

function allDeals()
{
    try {
        $db = besoin_api_fetch_data();
        $query = "SELECT deal.name AS deal_name, deal.*, business.*, plan_meta.* FROM `deals` AS deal JOIN `business` AS business ON deal.business_id = business.id JOIN `plan_meta` AS plan_meta ON plan_meta.post_id = deal.business_id ORDER BY deal.deal_id DESC";
        $deals = $db->get_results($query);
        if (!$deals) {
            throw new Exception('No deal found');
        }
        return $deals;
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

function besionSearch($type, $key, $location)
{

    $db = besoin_api_fetch_data();  // Get the database connection

    // Initialize collection for the results
    $features = array();
    $featuresa = array();
    $allproduct = array();
    $products = array();

    // Check if type is 1 or 2 (Business related data)
    if ($type == 1 || $type == 2) {

        $features = $db->get_results("SELECT * FROM `business` WHERE `status` = 51 Order By id DESC LIMIT 20");

        $getBusinessData = $db->get_results("SELECT * FROM business_meta WHERE value = $type order by id desc");

        if (count($getBusinessData)) {
            $whereIn = array();
            foreach ($getBusinessData as $value) {
                if ($value->post_id) {
                    $whereIn[] = $value->post_id;
                }
            }
            $whereIn = implode(',', $whereIn);
            $features = $db->get_results("SELECT * FROM business WHERE id IN ($whereIn) AND status = 51 LIMIT 20");
        }

        if ($key != '') {
            $features = $db->get_results("SELECT * FROM business WHERE name LIKE '%$key%' order by id desc LIMIT 20;");
        }

        $alldata = [];
        foreach ($features as $business) {
            $getBusinesskeywords = $db->get_results("SELECT * FROM business_meta WHERE `key`='tag' AND post_id = $business->id");

            $planmeta = $db->get_row("SELECT * FROM planmeta WHERE post_id = $business->id AND expiry >= '" . date('Y-m-d') . "'");

            if ($planmeta) {
                $plan = 1;
            } else {
                $plan = 0;
            };
            $data['working_hours'] = null;
            if (!empty($business->working_hours)) {
                $working_hours = json_decode(stripslashes($business->working_hours));
                if ($working_hours != NULL) {
                    $ar = $working_hours;
                    $data['working_hours'] = $ar;
                }
            }

            $collection = [
                'id' => $business->id,
                'name' => $business->name,
                'address' => $business->address,
                'plan' => $plan,
                'phone' => $business->phone,
                'website' => $business->website,
                'verified' => $business->verified,
                'date_of_creation' => $business->date_of_creation,
                'created_at' => $business->created_at,
                'working_hours' => $data['working_hours'],
                'about' => $business->about,
                'keywords' => $getBusinesskeywords,
                'products' => $db->get_row("SELECT * FROM product WHERE post_id = $business->id"),
                // 'location' => $this->business->strLocation($business->id),
                'logo' => $db->get_row("SELECT * FROM galleries WHERE post_id = $business->id AND `prefix` = 'logo';") ?
                    $db->get_row("SELECT * FROM galleries WHERE post_id = $business->id AND `prefix` = 'logo';") : 'image.png',
                'image' => $db->get_row("SELECT * FROM galleries WHERE post_id = $business->id AND `prefix` = 'photo';")
            ];
            $alldata[] = $collection;
        }
        $featuresa = $alldata;
    }

    // Check if type is 1 or 3 for products
    if ($type == 1 || $type == 3) {
        // Prepare the base query for products
        $sql = "SELECT * FROM {$db->prefix}product WHERE status = 51";

        // If search key is provided, filter by title
        if ($key != '') {
            $sql .= " AND title LIKE %s";
        }

        // Prepare the query for products
        $sql = $db->prepare($sql, "%" . $key . "%");

        // Print the last SQL query (for debugging)

        // Execute the query for products
        $products = $db->get_results($sql);

        // Process each product
        if (!empty($products)) {
            foreach ($products as $product) {
                // Get business details
                $business_detail = $db->get_row($db->prepare("SELECT * FROM {$db->prefix}business WHERE id = %d", $product->post_id));

                // Get category for the product
                $category_id = $db->get_var($db->prepare("SELECT value FROM {$db->prefix}product_meta WHERE product_id = %d AND `key` = 'category'", $product->id));
                $category = $db->get_row($db->prepare("SELECT name FROM {$db->prefix}categories_product WHERE id = %d", $category_id));

                // Add the product data to the collection
                $allproduct[] = array(
                    'id' => $product->id,
                    'title' => $product->title,
                    'choose_price' => $product->choose_price,
                    'price' => $product->price,
                    'promo' => $product->promo,
                    'image' => $db->get_var($db->prepare("SELECT value FROM {$db->prefix}product_meta WHERE product_id = %d AND `key` = 'image'", $product->id)),
                    'category_name' => isset($category->name) ? $category->name : null,
                    'business_name' => $business_detail->name,
                    'logo' => $db->get_var($db->prepare("SELECT value FROM {$db->prefix}galleries WHERE post_id = %d AND prefix = 'logo'", $business_detail->id)) ?: 'image.png',
                );
            }
        }
    }

    // Return the results
    return [
        'products' => $products,
        'allproduct' => $allproduct,
        'features' => $features,
        'featuresa' => $featuresa
    ];
}


function productAndServices()
{
    $db = besoin_api_fetch_data();
    $sql = "SELECT * FROM {$db->prefix}product WHERE status = 51 order by id desc";
    $products = $db->get_results($sql);
    $allproduct = [];
    if (!empty($products)) {
        foreach ($products as $product) {
            // Get business details
            $business_detail = $db->get_row($db->prepare("SELECT * FROM {$db->prefix}business WHERE id = %d", $product->post_id));
            // Get category for the product
            $category_id = $db->get_var($db->prepare("SELECT value FROM {$db->prefix}product_meta WHERE product_id = %d AND `key` = 'category'", $product->id));
            $category = $db->get_row($db->prepare("SELECT name FROM {$db->prefix}categories_product WHERE id = %d", $category_id));
            // dd($category);

            // Add the product data to the collection
            $allproduct[] = array(
                'id' => $product->id,
                'title' => $product->title,
                'choose_price' => $product->choose_price,
                'price' => $product->price,
                'promo' => $product->promo,
                'image' => $db->get_var($db->prepare("SELECT value FROM {$db->prefix}product_meta WHERE product_id = %d AND `key` = 'image'", $product->id)),
                'category_name' => isset($category->name) ? $category->name : null,
                'business_name' => $business_detail->name,
                'logo' => $db->get_var($db->prepare("SELECT value FROM {$db->prefix}galleries WHERE post_id = %d AND prefix = 'logo'", $business_detail->id)) ?: 'image.png',
                'date_of_creation' => getYearNumber($business_detail->date_of_creation)
            );
        }
    }
    return $allproduct;
}


function parentCategories()
{
    $db = besoin_api_fetch_data();
    $query = "SELECT * FROM `categories` where parent_id=0 ORDER BY id DESC";
    $data = [];
    $categories = $db->get_results($query);
    if (!empty($categories)) {
        $data = $categories;
    }
    return $data;
}

function premiumSuppliers()
{
    $data = [];
    $query = "SELECT * FROM `plan_meta` where plan_id=3";

    $db = besoin_api_fetch_data();
    $planPost = $db->get_results($query);
    if (!empty($planPost)) {
        $ids = '';
        foreach ($planPost as $suppliers) {
            $ids .= $suppliers->post_id . ',';
        }
        $ids = rtrim($ids, ',');
        $sql = "SELECT 
             business.id, 
             business.name, 
             business.address, 
             business.about,
             galleries.value
          FROM business
          JOIN galleries ON galleries.post_id = business.id
          WHERE business.id IN ($ids)
            AND galleries.prefix = 'logo';";
        $data = $db->get_results($sql);
        return $data;
    }
    return $data;
}
