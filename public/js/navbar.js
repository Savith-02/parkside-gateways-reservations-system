const home = document.getElementById("home");
home.addEventListener("click", function () {
  sessionStorage.setItem("leave", "true");
  window.location.href = baseUrl + "index.php";
});
const sites = document.getElementById("sites");
sites.addEventListener("click", function () {
  sessionStorage.setItem("leave", "true");
  window.location.href = baseUrl + "Views/Pending.php";
});
const settings = document.getElementById("settings");
settings.addEventListener("click", function () {
  sessionStorage.setItem("leave", "true");
  window.location.href = baseUrl + "Views/Pending.php";
});
const calander = document.getElementById("calander");
calander.addEventListener("click", function () {
  sessionStorage.setItem("leave", "true");
  window.location.href = baseUrl + "Views/ViewReservations.php";
});
