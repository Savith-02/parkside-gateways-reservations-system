let proceed = 0;

function submitForm() {
  const signupUsername = document.getElementById("signup-username");
  const signupPassword = document.getElementById("signup-password");
  const signupEmail = document.getElementById("signup-email");

  const formData = new URLSearchParams();
  formData.append("username", signupUsername.value);
  formData.append("password", signupPassword.value);
  formData.append("email", signupEmail.value);

  showLoadingScreen();
  fetch("./../includes/signup.inc.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      // console.log(data);
      proceed = 1;
      if (data.success) {
        console.log("success");
        window.location.href = "/Views/Login.php";
      } else {
        hideLoadingScreen();
        displayPopup(data);
        if (data.username_taken) {
          document.getElementById("signup-username").value = "";
          document.getElementById("signup-password").value = "";
          document.getElementById("signup-email").value = "";
        } else if (data.email_used) {
          document.getElementById("signup-email").value = "";
        }
      }
    })
    .catch((error) => {
      hideLoadingScreen();
      console.error("Error:", error);
    });
}
window.addEventListener("unload", function (event) {
  sessionStorage.removeItem("toSignup");
  if (proceed !== 1 && this.sessionStorage.getItem("toLog") == null) {
    this.sessionStorage.removeItem("phase");
    const formData = new URLSearchParams();
    formData.append("option", "leave");

    fetch(baseUrl + "/includes/reservation.inc.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: formData,
    });
  }
});
