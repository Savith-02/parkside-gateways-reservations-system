let baseUrl = "/";
const loginButton = document.getElementById("login-button");
loginButton.addEventListener("click", function () {
  sessionStorage.setItem("toLog", "true");
  sessionStorage.removeItem("leave");

  window.location.href = baseUrl + "Views/Login.php";
});

const signupButton = document.getElementById("signup-button");
signupButton.addEventListener("click", function () {
  sessionStorage.setItem("toSignup", "true");
  sessionStorage.removeItem("leave");
  window.location.href = baseUrl + "Views/Signup.php";
});
