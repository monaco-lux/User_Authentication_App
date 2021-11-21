$(document).ready(function() {
  $("#driver").click(function(event){
    var name = $("#name").val();
    $("#stage").load('wordpressNotionAPI.php', {"name":name} );
          });
});
