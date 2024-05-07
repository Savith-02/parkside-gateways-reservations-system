let proceed = 0;

let parkElement = document.getElementById("park");
let siteElement = document.getElementById("site");
let checkInElement = document.getElementById("checkIn");
let checkOutElement = document.getElementById("checkOut");
let reservationContr = JSON.parse(sessionStorage.getItem("reservationContr"));

parkElement.innerHTML = "Park: " + reservationContr.park;
siteElement.innerHTML = "Site: " + reservationContr.site;
checkInElement.innerHTML = "Check-in: " + reservationContr.checkIn;
checkOutElement.innerHTML = "Check-out: " + reservationContr.checkOut;

function submit(path) {
  proceed = 1;
  sessionStorage.removeItem("leave");
  showLoadingScreen();
  const formData = new URLSearchParams();
  formData.append("option", "bookingForm");
  formData.append(
    "reservationContr",
    sessionStorage.getItem("reservationContr")
  );
  fetch("./../includes/reservation.inc.php", {
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
        proceed = 1;
        sessionStorage.removeItem("phase");
        sessionStorage.removeItem("reservationContr");
        window.location.href = baseUrl + path;
      }
    })
    .catch((error) => {
      hideLoadingScreen();
      displayPopup(error);
      console.error("Error:", error);
    });
}

function cancel(path) {
  proceed = 1;
  sessionStorage.removeItem("leave");
  sessionStorage.removeItem("phase");
  sessionStorage.removeItem("reservationContr");
  window.location.href = baseUrl + path;
}
function previousPage(path) {
  proceed = 1;
  sessionStorage.removeItem("leave");
  sessionStorage.setItem("phase", "two");
  window.location.href = baseUrl + path;
}

window.addEventListener("beforeunload", function (event) {
  if (
    proceed !== 1 &&
    sessionStorage.getItem("toLog") == null &&
    sessionStorage.getItem("toSignup") == null
  ) {
    event.preventDefault();
  }
  sessionStorage.removeItem("leave");
});
window.addEventListener("unload", function (event) {
  if (sessionStorage.getItem("leave")) {
    sessionStorage.removeItem("reservationContr");
    sessionStorage.removeItem("phase");
    sessionStorage.removeItem("leave");
  }
  // if (
  //   proceed !== 1 &&
  //   sessionStorage.getItem("toLog") == null &&
  //   sessionStorage.getItem("toSignup") == null
  // ) {
  //   sessionStorage.removeItem("phase");
  //   sessionStorage.removeItem("reservationContr");
  // }
});

// const formData = new URLSearchParams();
// formData.append("option", "leave");
// this.sessionStorage.removeItem("phase");

// fetch(baseUrl + "/includes/reservation.inc.php", {
//   method: "POST",
//   headers: {
//     "Content-Type": "application/x-www-form-urlencoded",
//   },
//   body: formData,
// });
