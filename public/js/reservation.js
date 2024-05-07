let selectedDivId = null;
proceed = 0;
const parkSelects = document.querySelectorAll(".parkSelect");
sessionStorage.removeItem("leave");

if (sessionStorage.getItem("reservationContr")) {
  var retrievedObject = JSON.parse(sessionStorage.getItem("reservationContr"));
  selectDiv(retrievedObject.divId);
  console.log(retrievedObject);
}
// if (idSet) {
//   // console.log(idFromServer);
//   selectDiv(idFromServer);
// }

function selectDiv(divId) {
  const div = document.getElementById(divId);

  // If the clicked div is already selected, deselect it
  if (divId === selectedDivId) {
    div.classList.remove("selected");
    selectedDivId = null;
  } else {
    // Deselect the previously selected div, if any
    if (selectedDivId !== null) {
      const previousDiv = document.getElementById(selectedDivId);
      previousDiv.classList.remove("selected");
    }

    // Select the clicked div
    div.classList.add("selected");
    selectedDivId = divId;
  }
}

function nextPage(path) {
  if (sessionStorage.getItem("news") != "recieved") {
    sessionStorage.setItem("news", "recieved");
    displayPopup("Login to make a reservation");
    return;
  }
  if (selectedDivId !== null) {
    showLoadingScreen();

    const div = document.getElementById(selectedDivId);
    const radioButton = div.querySelector('input[type="radio"]');
    const value = radioButton.value;

    // const formData = new URLSearchParams();
    // formData.append("option", "page1");
    // formData.append("park", value);
    // formData.append("divId", div.id);
    // console.log("ch 1");

    if (!sessionStorage.getItem("reservationContr")) {
      reservationContr = {
        // option: "page1",
        park: value,
        divId: div.id,
      };
      sessionStorage.setItem(
        "reservationContr",
        JSON.stringify(reservationContr)
      );
    } else {
      let reservationContr = JSON.parse(
        sessionStorage.getItem("reservationContr")
      );
      // reservationContr.option = "page1";
      reservationContr.park = value;
      reservationContr.divId = div.id;
      sessionStorage.setItem(
        "reservationContr",
        JSON.stringify(reservationContr)
      );
    }
    sessionStorage.removeItem("leave");
    sessionStorage.setItem("phase", "two");
    proceed = 1;
    window.location.href = baseUrl + path;
    hideLoadingScreen();
  } else {
    displayPopup("Select a destination");
    parkSelects.forEach(function (parkSelect) {
      parkSelect.style.pointerEvents = "none";
    });
  }
}
window.addEventListener("beforeunload", function (event) {
  // if (proceed !== 1) {
  //   event.preventDefault();
  // }
  if (sessionStorage.getItem("leave")) {
    event.preventDefault();
  }
});
window.addEventListener("unload", function (event) {
  // console.log("in reservation 1 out");

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
  //   sessionStorage.removeItem("reservationContr");
  //   sessionStorage.removeItem("phase");

  // window.location.href = baseUrl + path;

  // const formData = new URLSearchParams();
  // formData.append("option", "leave");

  // fetch(baseUrl + "/includes/reservation.inc.php", {
  //   method: "POST",
  //   headers: {
  //     "Content-Type": "application/x-www-form-urlencoded",
  //   },
  //   body: formData,
  // });
  //}
});
// fetch("./../includes/reservation.inc.php", {
//   method: "POST",
//   headers: {
//     "Content-Type": "application/x-www-form-urlencoded",
//   },
//   body: formData,
// })
//   .then((response) => response.json())
//   .then((data) => {
// console.log(data);
// if (data.success) {
// }
//   else {
//   }
// })
// .catch((error) => {
//   console.error("Error:", error);
// })
// .finally(() => {
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
// window.addEventListener("unload", function (event) {
//   if (proceed !== 1) {
//     const formData = new URLSearchParams();
//     formData.append("option", "leave");

//     fetch(baseUrl + "/includes/reservation.inc.php", {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/x-www-form-urlencoded",
//       },
//       body: formData,
//     });
//   }
// });
