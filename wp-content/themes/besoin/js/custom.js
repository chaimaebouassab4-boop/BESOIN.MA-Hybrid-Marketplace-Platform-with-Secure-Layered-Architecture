document.addEventListener("DOMContentLoaded", function () {
  // const data = setPassSrchParams();
  let typeEle = document.querySelector(".srch_type");
  let locEle = document.querySelector(".srch_location");

  /**
   * Keywords Dropdown
   */
  const dropdownItems = document.querySelectorAll(".keywords-item");
  const dropdownButton = document.querySelector("#keywordsDropdown");

  dropdownItems.forEach((item) => {
    item.addEventListener("click", function (e) {
      e.preventDefault();

      dropdownButton.textContent = this.textContent;
      const dataValue = this.parentElement.dataset.value;
      typeEle.value = dataValue;
    });
  });

  /**
   * Location Dropdown
   */
  const locationDropdownItems = document.querySelectorAll(".location-item");
  const locationDropdownButton = document.querySelector("#locationDropdown");

  locationDropdownItems.forEach((item) => {
    item.addEventListener("click", function (e) {
      e.preventDefault();

      locationDropdownButton.textContent = this.textContent;
      const dataValue = this.parentElement.dataset.value;
      locEle.value = dataValue;
    });
  });

  /**
   * Submit Form
   */
  document.querySelector("#srch_button").addEventListener("click", function () {
    document.querySelector(".srch-form-submit").click();
  });
});

/**
 *  Check if search params are passed
 */
function setPassSrchParams() {
  const queryString = window.location.search;

  const params = new URLSearchParams(queryString);

  const txtsrch = params.get("txtsrch");
  const type = params.get("type");
  const location = params.get("location");

  return { txtsrch, type, location };
}
