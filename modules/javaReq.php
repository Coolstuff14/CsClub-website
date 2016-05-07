<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="/bootstrap/js/jquery.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>

<script src="summernote/summernote.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<!-- stuff for newsfeed-->
<script type="text/javascript">
$(function() {
  $('#summernote').summernote();
});
function savePost(){
  var markupStr = $('#summernote').summernote('code');
  console.log(markupStr);
  document.getElementById('postbody').value = markupStr;
  var element = document.getElementById("postbody");
  element.form.submit();
}
function destroyPost(){
  $('#summernote').summernote('destroy');
}

//Stuff for tasks
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("id");
    });
});

//Stuff for tasks
$(document).ready(function() {
    $('#tasksTable').DataTable();
} );
</script>
