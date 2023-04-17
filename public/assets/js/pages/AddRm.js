$("#createRm").click(function () {

    console.log("reached");
    var email = $("#email").val();
    var pass = $("#pwd").val();
    var type = "";

    var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var password_regex1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var ContactNumber = $("#ContactNumber").val();
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
    if (password.trim() === '') {
        alert("password is required");
        return false;
    } else if (password.length < 4) {
        alert("password should be having minimum of four digits");
        return false;
    }
    else if (password_regex1.test(password) == false) {
        alert("password should be having alteast 1 upper, lower, number and a special character");
        return false;
    }
    else {
        $("#admin_login_btn").attr("disabled", true);
        $.ajax({
            'url': 'http://localhost/Financial_app/public/CreateAccountForRm',
            'type': 'POST',
            'data': { 'email': email, 'password': password, 'first_name': first_name, 'last_name': last_name, 'ContactNumber': ContactNumber, 'product': values, 'country': country },
            success: function (result) {

                $result = JSON.parse(result);
                $result = $result[0];
                console.log($result);
                if ($result == true) {
                    setTimeout(function () {
                        window.location.href = "http://localhost/Financial_app/public/Ma_Rm_List";
                    }, 20);

                }
            }
        });
    }
});

function passValue($id) {
    document.getElementById('user_id').value = $id;
    document.getElementById('user_id1').value = $id;
}

function BlockUnblock() {

    var type = document.getElementById("type").value;

    var itemId = '';
    var mode = '';
    if (type == 'block') {
        user_id = document.getElementById("user_id1").value;
        mode = '0';

    } else {
        user_id = document.getElementById("user_id").value;
        mode = 1;
        console.log("reached", mode)

    }
    console.log("itemid", itemId)

    $.ajax({
        'url': 'http://localhost/Financial_app/public/Rm_BlockUnblock',
        'type': 'POST',
        'data': { 'id': user_id, type: mode },
        success: function (result) {
            $result = JSON.parse(result);
            console.log($result);
            if ($result[0] == true) {
                alert("Account updated Successfully");
                window.location.reload();
            }
            else {
                alert("Sorry! Something Went Wrong, please try again later");
                window.location.reload();
            }
        }
    });
}

$("#updateRm").click(function () {

    console.log("reached");
    var email = $("#email").val();

    var id = $("#id").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var ContactNumber = $("#ContactNumber").val();

    var options = document.getElementById('choices-multiple-remove-button').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);


    var options1 = document.getElementById('choices-multiple-remove-button1').selectedOptions;
    var values1 = Array.from(options1).map(({ value }) => value);

    var country = values1[0];
        $("#admin_login_btn").attr("disabled", true);
        $.ajax({
            'url': 'http://localhost/Financial_app/public/UpdateAccount',
            'type': 'POST',
            'data': { 'id': id, 'email': email, 'first_name': first_name, 'last_name': last_name, 'ContactNumber': ContactNumber, 'product': values, 'country': country },
            success: function (result) {

                $result = JSON.parse(result);
                $result = $result[0];
                console.log($result);
                if ($result == true) {
                    setTimeout(function () {
                        window.location.href = "http://localhost/Financial_app/public/Ma_Rm_List";
                    }, 20);

                }
            }
        });
});