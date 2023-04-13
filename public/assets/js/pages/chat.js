const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");

// Icons made by Freepik from www.flaticon.com
var PERSON_IMG = document.getElementById('user_image').value;
var path = 'http://localhost/Financial_app/'+PERSON_IMG;
// const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
const PERSON_NAME = "Me";

msgerForm.addEventListener("submit", event => {
    event.preventDefault();

    const msgText = msgerInput.value;
    if (!msgText) return;

    appendMessage(PERSON_NAME, path, "right", msgText);
    msgerInput.value = "";

});

function appendMessage(name, img, side, text) {
    //   Simple solution for small apps
    const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${formatDate(new Date())}</div>
        </div>

        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

    msgerChat.insertAdjacentHTML("beforeend", msgHTML);
    msgerChat.scrollTop += 500;

    var rmid = document.getElementById('rmid').value;
    var clientid = document.getElementById('clientid').value;
    var postid = document.getElementById('postid').value;

    $.ajax({
        'url': 'http://localhost/Financial_app/public/Save_ChatMessage',
        'type': 'POST',
        'data': { 'postid': postid, 'clientid': clientid, 'rmid': rmid, message: text },
        success: function (result) {
            $result = JSON.parse(result);
        }
    });
}

// Utils
function get(selector, root = document) {
    return root.querySelector(selector);
}

function formatDate(date) {
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();

    return `${h.slice(-2)}:${m.slice(-2)}`;
}

function countdownClock(minutes, seconds) {
    // Set the date we're counting down to
    var countDownDate = new Date().getTime() + (minutes * 60 + seconds) * 1000;

    // Update the count down every 1 second
    var x = setInterval(function () {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for minutes and seconds
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Realoding";
            window.location.reload();
        }
    }, 1000);
}

countdownClock(5, 10);

