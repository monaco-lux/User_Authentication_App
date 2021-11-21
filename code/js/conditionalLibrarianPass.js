$(document).ready(function() {
    $('#passCode').hide();
    $('#passCodeLabel').hide();
    $('#accountType').change(function() {
        if ($(this).val() == "librarian"){
            $('#passCode').show();
            $('#passCodeLabel').show();
        }
        else{
          $('#passCode').hide();
          $('#passCodeLabel').hide();
        }
    });
})
