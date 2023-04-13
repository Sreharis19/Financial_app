$("#ToNextStep").click(function () {
    console.log("called");
    // var options = document.getElementById('choices-multiple-remove-button"').selectedOptions;
    // var values = Array.from(options).map(({ value }) => value);

    // var user = values[0];
    // var postId = document.getElementById('post').value;

    $("#ToNextStep").attr("disabled", true);

    // window.location.href = `http://localhost/Financial_app/public/Client_ChatView?pid=${postId}&user=${user}`;
});


function chat() {
    console.log("called");


    var options = document.getElementById('choices-multiple-remove-button').selectedOptions;

    var values = Array.from(options).map(({ value }) => value);

    var user = values[0];
    var postId = document.getElementById('post').value;

    $("#ToNextStep2").attr("disabled", true);
    
    window.location.href = `http://localhost/Financial_app/public/Client_ChatView?pid=${postId}&user=${user}`;


}

