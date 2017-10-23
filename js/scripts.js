// function for showing password or hiding it for the registration page
function showPass() {
    var temp = $('#password').prop('type');

    // if the type is password, then make it text to make the password visible
    if(temp == 'password')
        $('#password').attr('type', 'text');
    // otherwise set the type to password, to make the password hidden
    else if(temp == 'text')
        $('#password').attr('type', 'password');
}

$(document).ready(function() {
    // when the user clicks the registration button
    // there are 3 error codes that are returned
    // 0 = successful user creation
    // 1 = username already taken, user exists
    // 2 = something wrong with adding user to database
    $('.register-btn').click(function(e) {
        e.preventDefault();
        
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            type: 'GET',
            url: 'scripts/create_account.php',
            data: {username:username, password:password},
            success: function(result) {
                if(result == 0)
                    $('.register-alerts').html('<div class="alert alert-success" role="alert"> Successfully Registered </div>');
                else if(result == 1)
                    $('.register-alerts').html('<div class="alert alert-danger" role="alert"> User account already exists </div>');
                else
                    $('.register-alerts').html('<div class="alert alert-danger" role="alert"> Something went wrong creating a user </div>');
            }
        });
    });
});