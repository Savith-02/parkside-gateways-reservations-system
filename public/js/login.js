let proceed = 0;
function submitForm() {
  const loginUsername = document.getElementById("login-username");
  const loginPassword = document.getElementById("login-password");

  const formData = new URLSearchParams();

  formData.append("username", loginUsername.value);
  formData.append("password", loginPassword.value);

  showLoadingScreen();
  fetch("./../includes/login.inc.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      if (data.success) {
        // console.log("success");
        proceed = 1;
        sessionStorage.setItem("news", "recieved");
        if (sessionStorage.getItem("phase") == "two") {
          window.location.href = "/Views/Reservation_2.php";
        } else if (sessionStorage.getItem("phase") == "three") {
          window.location.href = "/Views/BookingForm.php";
        } else if (sessionStorage.getItem("phase") == "one") {
          window.location.href = "/Views/Reservation.php";
        } else {
          window.location.href = "/Views/HomepageViewLogged.php";
        }
      } else {
        hideLoadingScreen();
        displayPopup(data);
        if (data.username_invalid) {
          document.getElementById("login-username").value = "";
          document.getElementById("login-password").value = "";
        } else if (data.password_incorrect) {
          document.getElementById("login-password").value = "";
        }
      }
    })
    .catch((error) => {
      hideLoadingScreen();
      console.error("Error:", error);
    });
}

window.addEventListener("unload", function (event) {
  sessionStorage.removeItem("toLog");
  if (proceed !== 1 && this.sessionStorage.getItem("toSignup") == null) {
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
