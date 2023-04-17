function PassSupportValue($id, $comment) {
    console.log("$id", $id);
    console.log("$comment", $comment);

    document.getElementById('postid').value = $id;
    document.getElementById('message').value = $comment;
}


$("#send_supportForMa").click(function () {

    const reply =document.getElementById('reply').value;
    var id = $("#postid").val();
  
    console.log("reply", reply);
    console.log("postid", id);
        $.ajax({
            'url': 'http://localhost/Financial_app/public/Support_reply',
            'type': 'POST',
            'data': { 'id': id, 'reply': reply },
            success: function (result) {

                $result = JSON.parse(result);
                $result = $result[0];
                console.log($result);
                if ($result.status == true) {
                    alert($result.message);
                    location.reload();
                }
            }
        });
});