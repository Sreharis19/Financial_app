// Function to validate name
function isValidName(name) {
    const regex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
    return regex.test(name);
}

// Function to validate email
function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Function to validate contact number
function isValidContact(contact) {
    const regex = /^[0-9]{11}$/;
    return regex.test(contact);
}

$("#tostep2").click(function () {
    // Get the input elements
    const firstName = document.getElementById('first_name');
    const lastName = document.getElementById('last_name');
    const email = document.getElementById('email');
    const contact = document.getElementById('contact');
    const password = document.getElementById('password');
    var password_regex1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Validate the first name
    if (firstName.value.trim() === '') {
        $('#error').text('First Name is required');
        return false;
    } else if (!isValidName(firstName.value)) {
        $('#error').text('First Name is invalid');
        return false;
    } else {
        $('#error').text('');
    }

    // Validate the last name
    if (lastName.value.trim() === '') {
        $('#error').text('Last Name is required');
        return false;
    } else if (!isValidName(lastName.value)) {
        showError(lastName, 'Last Name is invalid');
        return false;
    } else {
        $('#error').text('');
    }

    // Validate the email
    if (email.value.trim() === '') {
        $('#error').text('Email is required');
        return false;
    } else if (!isValidEmail(email.value)) {
        $('#error').text('Email is invalid');
        return false;
    } else {
        $('#error').text('');
    }

    // Validate the contact number
    if (contact.value.trim() === '') {
        $('#error').text('Contact Number is required');
        return false;
    } else if (!isValidContact(contact.value)) {
        $('#error').text('Contact Number is invalid');
        return false;
    } else {
        $('#error').text('');
    }

    //Validate the password
    if (password.value.trim() === '') {
        $('#error').text('password is required');
        return false;
    } else if (password.length < 4) {
        $('#error').text('password should be having minimum of four digits');
        return false;
    }
    else if (password_regex1.test(password) == false) {
        $('#error').text('password should be having alteast 1 upper, lower, number and a special character');
        return false;
    }
    else {
        $('#error').text('');
    }
    $("#step1").css("display", "none");
    $("#step2").css("display", "block");

});

$("#signup").click(function () {
    console.log("reached");
    const category = document.querySelector('[name="category"]').value;
    const region = document.querySelector('[name="country"]').value;
    const min = document.querySelector('#min').value;
    const max = document.querySelector('#max').value;
    const bio =document.getElementById('bio').value;

    const firstName = document.getElementById('first_name');
    const lastName = document.getElementById('last_name');
    const email = document.getElementById('email');
    const contact = document.getElementById('contact');
    const password = document.getElementById('password');

    // Validate the fields
    if (category === '') {
        $('#error1').text('Please select a product category');
        return false;
    } else {
        $('#error1').text('');
    }

    if (region === '') {
        $('#error1').text('Please select a country');
        return false;
    } else {
        $('#error1').text('');
    }

    if (min === '') {
        $('#error1').text('Please enter the minimum investing amount');
        return false;
    } else if (isNaN(min) || parseFloat(min) <= 0) {
        $('#error1').text('Please enter a valid minimum investing amount');
        return false;
    }
    else {
        $('#error1').text('');
    }

    if (max === '') {
        $('#error1').text('Please enter the maximum investing amount');
        return false;
    } else if (isNaN(max) || parseFloat(max) <= 0) {
        $('#error1').text('Please enter a valid maximum investing amount');
        return false;
    }
    else {
        $('#error1').text('');
    }
    $("#signup").attr("disabled", true);
    var image = document.getElementById('image');

    // create a new FormData object
    var formData = new FormData();

    var options = document.getElementById('choices-multiple-remove-button').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);

    // append the email, password, and type data to the FormData object
    formData.append('product', values);
    formData.append('country', region);
    formData.append('min', min);
    formData.append('max', max);
    formData.append('firstName', firstName.value);
    formData.append('lastName', lastName.value);
    formData.append('email', email.value);
    formData.append('contact', contact.value);
    formData.append('password', password.value);
    formData.append('bio', bio);
    // append the image data to the FormData object
    formData.append('image', image.files[0]);
    $.ajax({
        'url': 'http://localhost/Financial_app/public/signupProcess',
        'type': 'POST',
        'data': formData,
        'processData': false,
        'contentType': false,
        success: function (result) {
            $result = JSON.parse(result);
            $result = $result[0];
            console.log($result);
            if ($result.status) {
                if ($result.status == true) {
                   alert("Account Created Successfully");
                   setTimeout(function () {
                    window.location.href = "http://localhost/Financial_app/public/login";
                }, 10);
                } else if ($result.user_type == false) {
                    alert("Something went wrong, please try again later");
                }
            }
            else {
                alert($result.message);
                location.reload();
            }
        }
    });
});


