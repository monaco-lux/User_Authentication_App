$(document).ready(function() {
  $("#passReq").click(function(event){
    var recoveryPhrase = $("#recoveryPhrase").val();
    var userName = $("#userName").val();
    $("#stage").load('wordpressNotionAPI.php', {"recoveryPhrase":recoveryPhrase, "userName":userName} );
          });
});
