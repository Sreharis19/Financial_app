$("#Tostep_2").click(function () {
    var options = document.getElementById('choices-multiple-remove-button').selectedOptions;
    var values = Array.from(options).map(({ value }) => value);

    var postId = values[0];
    var user = document.getElementById('user').value;

    $("#Tostep_2").attr("disabled", true);

    window.location.href = `http://localhost/Financial_app/public/Rm_DirectChat?pid=${postId}&user=${user}`;
});