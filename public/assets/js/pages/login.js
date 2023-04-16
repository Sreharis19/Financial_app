$("#admin_login_btn").click(function () {

    var email = $("#email").val();
    var pass = $("#pwd").val();
    const password = document.getElementById('pwd');
    var type = $("input[type='radio'][name='btnradio']:checked").val();

    var password_regex1 = /([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])+([!,%,&,@,#,$,^,*,?,_,~])/;
    var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (type == null || type == '') {
        alert("Please Select A User Type");
        return false;
    }

    if (email_regex.test(email) == false) {
        $('#error').text('Please Enter Correct Email');
        return false;
    }

    // Validate the password
    if (pass.trim() === '') {
        $('#error').text('password is required');
        return false;

    } else if (pass.length < 4) {
        $('#error').text('password should be having minimum of four digits');
        return false;
    }
    else if (password_regex1.test(password) == false) {
        $('#error').text('password should be having alteast 1 upper, lower, numvber and a special character');
        return false;
    }
    else {
        $("#loading").css("display", "block");
        $('#error').text('');

        $("#admin_login_btn").attr("disabled", true);
        $.ajax({
            'url': 'http://localhost/Financial_app/public/signInProcess',
            'type': 'POST',
            'data': { 'email': email, 'password': pass, 'type': type },
            success: function (result) {
                $("#loading").css("display", "none");
                $result = JSON.parse(result);
                $result = $result[0];
                console.log($result);
                if ($result.id) {

                    if ($result.user_type == 1) {
                        setTimeout(function () {
                            window.location.href = "http://localhost/Financial_app/public/Admin_dashboard";
                        }, 20);

                    } else if ($result.user_type == 2) {
                        setTimeout(function () {
                            window.location.href = "http://localhost/Financial_app/public/Rm_dashboard";
                        }, 20);

                    } else if ($result.user_type == 3) {
                        setTimeout(function () {
                            window.location.href = "http://localhost/Financial_app/public/Cw_dashboard";
                        }, 20);

                    } else if ($result.user_type == 4) {
                        setTimeout(function () {
                            window.location.href = "http://localhost/Financial_app/public/Client_dashboard";
                        }, 20);
                    }
                }
                else {
                    alert($result.message);
                    $('#admin_login_btn').prop('disabled', false);
                }
            }
        });
    }
});