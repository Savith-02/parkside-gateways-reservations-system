// let reservations = [];

// const selectedSite = document.getElementById("select-options");
console.log("printed now");
showLoadingScreen();
fetch("./../includes/view_reservations.inc.php", {
  method: "GET",
  headers: {
    "Content-Type": "application/x-www-form-urlencoded",
  },
  // body: formData,
})
  .then((response) => response.json())
  .then((data) => {
    array = data;
    console.log(data);
    const reservationContainer = document.getElementById(
      "reservationContainer"
    );

    if (data.length > 0) {
        document.getElementById("content").style.height = "auto";

      const title = document.createElement("h2");
      title.innerHTML = "- Reservations -";
      reservationContainer.appendChild(title);

      data.forEach((reservation) => {
        const reservationDiv = document.createElement("div");
        reservationDiv.classList.add("block");

        const siteNameSpan = document.createElement("span");
        siteNameSpan.innerHTML = `<strong>Site Name:</strong> ${reservation.site_name}`;
        reservationDiv.appendChild(siteNameSpan);

        const parkSpan = document.createElement("span");
        parkSpan.innerHTML = `<strong>Park:</strong> ${reservation.park}`;
        reservationDiv.appendChild(parkSpan);

        const checkInDateSpan = document.createElement("span");
        checkInDateSpan.innerHTML = `<strong>Check-in Date:</strong> ${reservation.check_in_date}`;
        reservationDiv.appendChild(checkInDateSpan);

        const checkOutDateSpan = document.createElement("span");
        checkOutDateSpan.innerHTML = `<strong>Check-out Date:</strong> ${reservation.check_out_date}`;
        reservationDiv.appendChild(checkOutDateSpan);

        reservationContainer.appendChild(reservationDiv);
      });
    } else {
      const alertDiv = document.createElement("div");
      alertDiv.classList.add(
        "alert",
        "alert-warning",
        "alert-dismissible",
        "fade",
        "show"
      );
      alertDiv.setAttribute("id", "FormAlert");
      alertDiv.setAttribute("role", "alert");
      alertDiv.innerHTML = `
                No reservations made!
                <button type="button" class="btn-close" data-bs-dismiss="alert" id="alertButton" aria-label="Close"></button>
            `;
      reservationContainer.appendChild(alertDiv);
    }
  })
  .catch((error) => {
    console.error("Error:", error); // Handle errors here
  })
  .finally(() => {
    hideLoadingScreen();
  });
