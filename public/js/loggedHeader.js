let baseUrl = "/";
document.getElementById("logout-button").addEventListener("click", function () {
  var url = baseUrl + "includes/logout.inc.php";
  console.log("Logout button clicked");
  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((response) => {
      if (response.ok) {
        console.log("Logout success");
        sessionStorage.clear();
        window.location.href = baseUrl + "index.php";
      }
    })
    .catch((error) => {
      console.error("There was a problem with your fetch operation:", error);
    });
});
