$("#admin_login_btn").click(function () {

    var email = $("#email").val();
    var pass = $("#pwd").val();
    var type = "";

    var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var password_regex1 = /([a-z].*[A-Z])|([A-Z].*[a-z])([0-9])+([!,%,&,@,#,$,^,*,?,_,~])/;
    var password_regex2 = /([0-9])/;
    var password_regex3 = /([!,%,&,@,#,$,^,*,?,_,~])/;

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
            'url': 'http://localhost/Financial_app/public/signInProcess',
            'type': 'POST',
            'data': { 'email': email, 'password': pass },
            success: function (result) {

                $result = JSON.parse(result);
                $result = $result[0];
                if ($result.id) {

                    if ($result.user_type == 1) {
                        setTimeout(function () {
                            window.location.href = "http://localhost/Financial_app/public/Admin_dashboard";
                        }, 50);

                    } else if ($result.user_type == 2) {
                        setTimeout(function () {
                            window.location.href = "http://localhost/Financial_app/public/Rm_dashboard";
                        }, 50);

                    } else if ($result.user_type == 3) {
                        setTimeout(function () {
                            window.location.href = "http://localhost/Financial_app/public/Cw_dashboard";
                        }, 50);

                    } else if ($result.user_type == 4) {
                        setTimeout(function () {
                            window.location.href = "http://localhost/Financial_app/public/Client_dashboard";
                        }, 50);

                    }
                }
                else {
                    alert("Sorry! No account associated with the provided credentials");
                }
            }
        });
    }
});