$("#inputBirthDate").datepicker({
  format: "dd/mm/yyyy",
  endDate: '+0d'  
});

$("#inputCountry").countrySelect({
  defaultCountry: "xx"
});

var input = document.querySelector("#inputPhone");
window.intlTelInput(input, {
  separateDialCode: true,
  initialCountry: "xx",
  utilsScript: "./js/utils.js"
});

$("#inputPhone").on('click', function() {
  if($('.iti__selected-flag .iti__xx').length) {
    $(this).blur();
  }
})