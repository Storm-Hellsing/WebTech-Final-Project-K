function verifyOTP_AJAX()
{
    let user_Email = document.getElementById('email').value;
    let receivedOTP = document.getElementById('receivedotp').value;
    let otp = document.getElementById('otp').value;

    let data = {
                'receivedotp':receivedOTP,
                'otp':otp,
                'email':user_Email
                };
    let credentials = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controllers/otp_Channel_Check.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('resetpassword&otpData='+credentials);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            if(this.responseText == "Verified")
            {
                window.location.replace("reset_Password.php");
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