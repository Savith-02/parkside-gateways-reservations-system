let array = [];
let bungalows = [];
let campsites = [];

const selectedSite = document.getElementById("select-options");
const checkOutDate = document.getElementById("check-out-date");
const checkInDate = document.getElementById("check-in-date");

var reservationContr = JSON.parse(sessionStorage.getItem("reservationContr"));
if (reservationContr.checkIn != null) {
  checkInDate.value = reservationContr.checkIn;
  checkOutDate.value = reservationContr.checkOut;
  selectedSite.value = reservationContr.site;
}

showLoadingScreen();
const formData = new URLSearchParams();
formData.append("option", "getSites");
formData.append("park", reservationContr.park);

fetch("./../includes/reservation.inc.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/x-www-form-urlencoded",
  },
  body: formData,
})
  .then((response) => response.json())
  .then((data) => {
    array = data;
    console.log(data);
    data.forEach((site) => {
      const optionElement = document.createElement("option");
      optionElement.value = site.site_name; // Assuming 'id' is the site ID
      optionElement.textContent =
        site.site_name + " (" + site.type + "-" + site.site_number + ")";
      selectedSite.appendChild(optionElement);
    });
    array.forEach((site) => {
      if (site.type === "Bungalow") {
        bungalows.push(site);
      } else {
        campsites.push(site);
      }
    });
  })
  .catch((error) => {
    console.error("Error:", error);
  })
  .finally(() => {
    hideLoadingScreen();
  });

const bungalowCheckbox = document.querySelector(
  'input[name="accommodation"][value="bungalow"]'
);
const campsiteCheckbox = document.querySelector(
  'input[name="accommodation"][value="campsite"]'
);
function filterData() {
  selectedSite.innerHTML = "";
  if (bungalowCheckbox.checked && campsiteCheckbox.checked) {
    array.forEach((site) => {
      const optionElement = document.createElement("option");
      optionElement.value = site.site_name;
      optionElement.textContent =
        site.site_name + " (" + site.type + "-" + site.site_number + ")";
      selectedSite.appendChild(optionElement);
    });
  } else if (campsiteCheckbox.checked) {
    campsites.forEach((site) => {
      const optionElement = document.createElement("option");
      optionElement.value = site.site_name;
      optionElement.textContent =
        site.site_name + " (" + site.type + "-" + site.site_number + ")";
      selectedSite.appendChild(optionElement);
    });
  } else if (bungalowCheckbox.checked) {
    bungalows.forEach((site) => {
      const optionElement = document.createElement("option");
      optionElement.value = site.site_name;
      optionElement.textContent =
        site.site_name + " (" + site.type + "-" + site.site_number + ")";
      selectedSite.appendChild(optionElement);
    });
  } else {
  }
}
function previousPage(path) {
  proceed = 1;
  sessionStorage.removeItem("leave");
  sessionStorage.setItem("phase", "one");
  window.location.href = baseUrl + path;
}

let proceed = 0;

window.addEventListener("beforeunload", function (event) {
  if (proceed !== 1) {
    event.preventDefault();
  }
});
window.addEventListener("unload", function (event) {
  // console.log("in reservation 2 out");
  if (sessionStorage.getItem("leave")) {
    sessionStorage.removeItem("reservationContr");
    sessionStorage.removeItem("phase");
    sessionStorage.removeItem("leave");
  }
  sessionStorage.removeItem("leave");

  // else if (
  //   proceed !== 1 &&
  //   !sessionStorage.getItem("toLog") &&
  //   !sessionStorage.getItem("toSignup")
  // ) {
  //   sessionStorage.removeItem("phase");
  //   sessionStorage.removeItem("reservationContr");
  //   window.location.href = baseUrl + path;
  //   // console.log("in reservation 2 leave");
  // }
});
function nextPage(path) {
  if (selectedSite.value && checkInDate.value && checkOutDate.value) {
    showLoadingScreen();

    if (sessionStorage.getItem("reservationContr")) {
      var reservationContr = JSON.parse(
        sessionStorage.getItem("reservationContr")
      );
      reservationContr.checkIn = checkInDate.value;
      reservationContr.checkOut = checkOutDate.value;
      reservationContr.site = selectedSite.value;
      sessionStorage.setItem(
        "reservationContr",
        JSON.stringify(reservationContr)
      );
    }
    sessionStorage.setItem("phase", "three");
    proceed = 1;
    window.location.href = baseUrl + path;
    hideLoadingScreen();
  } else {
    displayPopup("Fill in all fields!");
  }
}
// const formData = new URLSearchParams();
// formData.append("option", "page2");
// formData.append("site_name", selectedSite.value);
// formData.append("check-in-date", checkInDate.value);
// formData.append("check-out-date", checkOutDate.value);
// fetch("./../includes/reservation.inc.php", {
//   method: "POST",
//   headers: {
//     "Content-Type": "application/x-www-form-urlencoded",
//   },
//   body: formData,
// })
//   .then((response) => response.json())
//   .then((data) => {
//     console.log(data);
//     if (data.success) {
//       sessionStorage.setItem("phase", "three");
//       proceed = 1;
//       window.location.href = baseUrl + path;
//     }
//   })
// } else {
//   console.log("Data imcomplete");
//   displayPopup({ error: "Data incomplete" });
// }
// .catch((error) => {
//   hideLoadingScreen();
//   displayPopup(error);
//   console.error("Error:", error);
// });
// document.addEventListener("visibilitychange", function () {
//   if (document.visibilityState === "visible") {
//     // console.log("Page is now visible");
//   } else {
//     // Page is now hidden
//     // console.log("Page is now hidden");
//     if (proceed !== 1) {
//       const formData = new URLSearchParams();
//       formData.append("option", "leave");

//       fetch(baseUrl + "/includes/reservation.inc.php", {
//         method: "POST",
//         headers: {
//           "Content-Type": "application/x-www-form-urlencoded",
//         },
//         body: formData,
//       });
//     }
//   }
// });
