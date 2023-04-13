$("#createClient").click(function () {

    var email = $("#email").val();
    var pass = $("#pwd").val();
    var type = "";

    var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var ContactNumber = $("#ContactNumber").val();
    var minimum = $("#minimum").val();
    var maximum = $("#maximum").val();
    var password = $("#password").val();

    var options = document.getElementById('choices-multiple-remove-button').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);


    var options1 = document.getElementById('choices-multiple-remove-button1').selectedOptions;
    var values1 = Array.from(options1).map(({ value }) => value);

    var country = values1[0];

    if (email_regex.test(email) == false) {
        alert("Please Enter Correct Email");
        return false;
    }
    // else if (pass.length < 4 || password_regex1.test(pass) == false || password_regex2.test(pass) == false || password_regex3.test(pass) == false) {
    //     alert("Please Enter Your Password");
    //     return false;
    // }
    else {
        $("#admin_login_btn").attr("disabled", true);
        $.ajax({
            'url': 'http://localhost/Financial_app/public/CreateAccount',
            'type': 'POST',
            'data': { 'email': email, 'password': password, 'first_name':first_name, 'last_name':last_name, 'ContactNumber':ContactNumber, 'minimum':minimum, 'maximum':maximum, 'product': values, 'country':country },
            success: function (result) {

                $result = JSON.parse(result);
                $result = $result[0];
                console.log($result);
                    if ($result == true) {
                        setTimeout(function () {
                            window.location.href = "http://localhost/Financial_app/public/Ma_Client_List";
                        }, 20);

                    } 
            }
        });
    }
});