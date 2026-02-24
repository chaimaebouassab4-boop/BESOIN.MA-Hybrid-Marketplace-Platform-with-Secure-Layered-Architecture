<?php

/**
 * Template Name: Search Page Template
 */

get_header();
?>

<div class="container">
    <h1 class="page-title">Search Results</h1>
    <?php
    if (function_exists('besoin_api_fetch_data')) {
        if (isset($_GET['type']) && isset($_GET['txtsrch']) && isset($_GET['location'])) {
            $type = $_GET['type'];
            $txtsrch = $_GET['txtsrch'];
            $location = $_GET['location'];

            $besionSearch = besionSearch($type, $txtsrch, $location);
            // dd($besionSearch);die;
            if ($type == 1 || $type == 2 && isset($besionSearch['features']) && isset($besionSearch['featuresa'])) {
                foreach ($besionSearch['featuresa'] as $key => $search) { 
                    ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php if (!empty($search['image'])) : ?>
                                  <img src="<?php echo esc_url(besonAppLink() . '/' . besonImgPath() . '/' . $search['image']); ?>" class="img-fluid" alt="Image">
                                <?php else : ?>
                                   <img src="<?php echo esc_url(besonAppLink() . '/' . besonImgPath() . '/' . $search['logo']); ?>" class="img-fluid" alt="Logo">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo esc_html($search['name']); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php   }
                // echo '<p>No search results found.</p>';
            }

            if ($type == 1 || $type == 3 && isset($besionSearch['allproduct']) ) {
                foreach ($besionSearch['allproduct'] as $key => $search) { 
                    ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php if (!empty($search['image'])) : ?>
                                  <img src="<?php echo esc_url(besonAppLink() . '/' . besonImgPath() . '/images/' . $search['image']); ?>" class="img-fluid" alt="Image">
                                <?php else : ?>
                                   <img src="<?php echo esc_url(besonAppLink() . '/' . besonImgPath() . '/' . $search['logo']); ?>" class="img-fluid" alt="Logo">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo esc_html($search['title']); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php   }
                // echo '<p>No search results found.</p>';
            }
        } else {
            echo '<p>No search results found.</p>';
        }
    } else {
        echo '<p>The required API fetching plugin is not activated.</p>';
    }
    ?>
</div>

<?php get_footer(); ?>