$("#send").click(function () {
    var options = document.getElementById('choices-multiple-remove-button').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);

    var product = document.getElementById('pro').value;
    $("#send").attr("disabled", true);
    $.ajax({
        'url': 'http://localhost/Financial_app/public/Rm_SendPost',
        'type': 'POST',
        'data': { 'product_id': product, 'users': values },
        success: function (result) {
            $result = JSON.parse(result);
            if ($result[0].status == true) {
                alert("Post Forwarded to Clients");
                window.location.reload();
            }
            else {
                alert("Sorry! Something Went Wrong, please try again later");
            }
        }
    });
});