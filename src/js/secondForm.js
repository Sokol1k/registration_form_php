if (localStorage.getItem(secondForm)) {
  axios
    .post("./ControllerParticipants/UserCount")
    .then(function(response) {
      document.getElementsByClassName("userCount")[0].innerText =
        response.data.count;
      document.getElementsByClassName("userCount")[1].innerText =
        response.data.count;
    })
    .catch(function(error) {
      console.log(error);
    });
}

var userId;

$("#secondForm form").on("submit", function() {
  event.preventDefault();
  var form = document.querySelector("#secondForm form");
  var isValid = formValidator(form);
  if (isValid) {
    var data = new FormData();
    data.append("company", document.getElementById("inputCompany").value);
    data.append("position", document.getElementById("inputPosition").value);
    data.append("about_me", document.getElementById("inputAboutMe").value);
    data.append("photo", document.getElementById("inputPhoto").files[0]);
    data.append("id", localStorage.getItem(userId));

    var settings = {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    };

    axios
      .post("./ControllerParticipants/Overwrite", data, settings)
      .then(function(response) {
        console.log(response);
        $("#secondForm").hide();
        $("#shareForm").show();
        localStorage.clear();
      })
      .catch(function(error) {
        console.log(error);
      });
  }
});
