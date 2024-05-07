const reservationButton = document.getElementById("buttonReservation");
reservationButton.addEventListener("click", function () {
  sessionStorage.setItem("phase", "one");
  window.location.href = baseUrl + "Views/Reservation.php";
});

const viewReservationsButton = document.getElementById(
  "buttonViewReservations"
);
viewReservationsButton.addEventListener("click", function () {
  window.location.href = baseUrl + "Views/ViewReservations.php";
});

const viewSitesButton = document.getElementById("buttonViewSites");
viewSitesButton.addEventListener("click", function () {
  window.location.href = baseUrl + "Views/Pending.php";
});
