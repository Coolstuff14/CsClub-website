function showmod() {
  $('#deleteAccountModal').modal('show')
}
function delYes() {
  var element = document.getElementById("delID");
  element.form.submit();
}
window.onload=showmod;
