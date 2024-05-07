const home = document.getElementById("home");
home.addEventListener("click", function () {
  sessionStorage.setItem("leave", "true");
  window.location.href = baseUrl + "Views/HomepageViewLogged.php";
});
const calander = document.getElementById("calander");
calander.addEventListener("click", function () {
  sessionStorage.setItem("leave", "true");
  window.location.href = baseUrl + "Views/ViewReservations.php";
});
const sites = document.getElementById("sites");
sites.addEventListener("click", function () {
  sessionStorage.setItem("leave", "true");
  window.location.href = baseUrl + "Views/Pending.php";
});
const notification = document.getElementById("notification");
notification.addEventListener("click", function () {
  sessionStorage.setItem("leave", "true");
  window.location.href = baseUrl + "Views/Pending.php";
});
const settings = document.getElementById("settings");
settings.addEventListener("click", function () {
  sessionStorage.setItem("leave", "true");
  window.location.href = baseUrl + "Views/Pending.php";
});
