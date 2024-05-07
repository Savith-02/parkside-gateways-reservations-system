function displayPopup(errorMessage) {
  document.getElementById("errorMessage").innerText = errorMessage;
  document.getElementById("errorPopup").style.display = "flex";
}

function closePopup() {
  document.getElementById("errorPopup").style.display = "none";

  parkSelects.forEach(function (parkSelect) {
    parkSelect.style.pointerEvents = "auto";
  });
}
