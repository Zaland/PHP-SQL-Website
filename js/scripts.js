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
    // there are 3 error codes that can be returned
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
    
    // when the user clicks the login button
    // there are 3 error codes that can be returned
    // 0 = username and password match
    // 1 = no user exists in the database
    // 2 = username and password dont match
    $('.login-btn').click(function(e) {
        e.preventDefault();
        
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            type: 'GET',
            url: 'scripts/sign_in.php',
            data: {username:username, password:password},
            success: function(result) {
                if(result == 0)
                    window.location.href = 'index.php';
                else if(result == 1)
                    $('.login-alerts').html('<div class="alert alert-danger" role="alert"> No such user exists </div>');
                else
                    $('.login-alerts').html('<div class="alert alert-danger" role="alert"> Username and/or password dont match </div>');
            }
        });
    });
    
    // when the user types in parameters for the search and clicks the search button
    // there is 1 error code and the result that is sent
    // 1 = no data found in the search
    $('.search-btn').click(function(e) {
        e.preventDefault();
        
        var name = $('#name').val();
        var developer = $('#developer').val();
        var publisher = $('#publisher').val();
        
        $('.search-results').html('');
        
        // if no parameters entered, ask user to enter one
        if(name == '' && developer == '' && publisher == '')
            $('.search-alerts').html('<div class="alert alert-danger" role="alert"> Please enter at least one parameter for the search </div>');
        
        // if at least one paramter entered, begin the search
        else {
            $.ajax({
                type: 'GET',
                url: 'scripts/search_games.php',
                data: {name:name, developer:developer, publisher:publisher},
                success: function(result) {
                    if(result == 1)
                        $('.search-alerts').html('<div class="alert alert-danger" role="alert"> Nothing found, try different parameters </div>');
                    else
                        $('.search-results').html(result);
                }
            });
        }
    });
    
    // when the user clicks the add game button
    // there are 3 error codes that can be returned
    // 0 = successfully added game
    // 1 = something went wrong with adding the game
    // 2 = game already exists
    $('.addgame-btn').click(function(e) {
        e.preventDefault();
        
        var name = $('#name').val();
        var developer = $('#developer').val();
        var publisher = $('#publisher').val();
        var price = $('#price').val();

        $.ajax({
            type: 'GET',
            url: 'scripts/insert_games.php',
            data: {name:name, developer:developer, publisher:publisher, price:price},
            success: function(result) {
                console.log(result);
                if(result == 0)
                    $('.addgame-alerts').html('<div class="alert alert-success" role="alert"> Successfully added game </div>');
                else if(result == 1)
                    $('.addgame-alerts').html('<div class="alert alert-danger" role="alert"> Something went wrong adding a game into the database </div>');
                else
                    $('.addgame-alerts').html('<div class="alert alert-danger" role="alert"> Game already exists </div>');
            }
        });
    });
});