function send_AJAX()
{
    let userID = document.getElementById('userid').value;
    let email = document.getElementById('email').value;

    let data = {'email':email, 'userid':userID};
    let credentials = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controllers/change_Email_Check.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('send&userData='+credentials);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            if(this.responseText == "Email Sent")
            {
                window.location.replace("email_Sent.php");
            }
            else
            {
                showMessage(this.responseText);
            }
        }
    }
}

function showMessage(message) 
{
    document.getElementById("message-text").innerHTML = message;
    let messageBox = document.getElementById("message-box");
    messageBox.classList.add("show");
}