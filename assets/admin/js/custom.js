$(document).ready(function() {
	$('.sidebar-menu').tree();
});

function showMessage(message,alert,location=''){
    if(location==''){
        $("#message #inner-message").addClass('alert-'+alert);
        $("#message #inner-message").html(message);
        $("#message").fadeIn('slow', function() {
            setTimeout(function(){
                $("#message").fadeOut('slow', function() {
                    $("#message #inner-message").html('');
                    $("#message #inner-message").attr('class','alert fade in');
                });
            },2500);
        });
    }
    else{
        $(location+' .inner-message').addClass('alert alert-'+alert);
        $(location+' .inner-message').html(message);
    }
}