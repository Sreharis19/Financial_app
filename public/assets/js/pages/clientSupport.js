$("#send_support").click(function () {
    var message = document.getElementById('message').value;
    $("#send_support").attr("disabled", true);
    $.ajax({
        'url': 'http://localhost/Financial_app/public/Rm_SendSupport',
        'type': 'POST',
        'data': { 'message': message },
        success: function (result) {
            $result = JSON.parse(result);
            console.log($result);
            if ($result[0].status == true) {
                alert("Ticket Raised Successfully");
                window.location.reload();
            }
            else {
                alert("Sorry! Something Went Wrong, please try again later");
            }
        }
    });
});

function deleteTicket($id) {

    if (confirm("Do you want to delete this Ticket?")) {
        $.ajax({
            'url': 'http://localhost/Financial_app/public/Delete_Query',
            'type': 'POST',
            'data': { 'id': $id },
            success: function (result) {
                $result = JSON.parse(result);
                if ($result[0].status == true) {
                    alert("Ticket Deleted Successfully");
                    window.location.reload();
                }
                else {
                    alert("Sorry! Something Went Wrong, please try again later");
                }
            }
        });
    }
}