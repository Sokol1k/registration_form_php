var secondForm;
var userId;

$("#secondForm").hide();
$("#shareForm").hide();

if (localStorage.getItem(secondForm)) {
  $("#firstForm").hide();
  $("#secondForm").show();
}

$("#firstForm form").on("submit", function() {
  event.preventDefault();
  var form = document.querySelector("#firstForm form");
  var isValid = formValidator(form);
  if (isValid) {
    var data = $("#firstForm form").serialize();
    axios
      .post("./ControllerParticipants/Register", data)
      .then(function(response) {
        localStorage.setItem(secondForm, true);
        localStorage.setItem(userId, response.data.id);
        document.getElementsByClassName("userCount")[0].innerText =
          response.data.count;
        document.getElementsByClassName("userCount")[1].innerText =
          response.data.count;
        $("#firstForm").hide();
        $("#secondForm").show();
      })
      .catch(function(error) {
        console.log(error);
      });
  }
});
