function displayPopup(errors) {
  document.getElementById("errorPopup").style.display = "flex";

  let errorMessageHTML = "";
  // Assuming `errors` is already a JavaScript object
  if (typeof errors === "string") {
    console.log(errors);
    errorMessageHTML += '<p class="form-error">' + errors + "</p>";
  } else {
    for (let key in errors) {
      if (errors.hasOwnProperty(key)) {
        // Generate HTML for each error message
        errorMessageHTML += '<p class="form-error">' + errors[key] + "</p>";
      }
    }
  }
  // Set the innerHTML of the errorMessage element to the concatenated HTML string
  document.getElementById("errorMessage").innerHTML = errorMessageHTML;
}

function closePopup() {
  document.getElementById("errorPopup").style.display = "none";
}
