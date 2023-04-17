
function BlockPost($id) {

    if (confirm("Do you want to archive this Post?")) {
        $.ajax({
            'url': 'http://localhost/Financial_app/public/ArchivePost',
            'type': 'POST',
            'data': { 'id': $id },
            success: function (result) {
                $result = JSON.parse(result);
                console.log('result',$result)
                console.log('status',$result[0].status)
                if ($result[0].status == true) {
                    alert("Post Archived Successfully");
                    // window.location.reload();
                }
                else {
                    alert("Sorry! Something Went Wrong, please try again later");
                    // window.location.reload();
                }
            }
        });
    }
}

function UnBlockPost($id) {

    if (confirm("Do you want to Unarchive this Post?")) {
        $.ajax({
            'url': 'http://localhost/Financial_app/public/UnArchivePost',
            'type': 'POST',
            'data': { 'id': $id },
            success: function (result) {
                $result = JSON.parse(result);
                console.log('result',$result)
                console.log('status',$result[0].status)
                if ($result[0].status == true) {
                    alert("Post Unarchived Successfully");
                    window.location.reload();
                }
                else {
                    alert("Sorry! Something Went Wrong, please try again later");
                    window.location.reload();
                }
            }
        });
    }
}