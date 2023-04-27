function togglePassword() 
{
    let passwordInput = document.getElementById("password");
    let label = document.getElementById("show-password");

    if (passwordInput.type === "password") 
    {
        passwordInput.type = "text";
        label.innerHTML = "Hide"
    } 
    else 
    {
        passwordInput.type = "password";
        label.innerHTML = "Show"
    }
}

function signup_AJAX()
{
    let userEmail = document.getElementById('email').value;
    let userPassword = document.getElementById('password').value;

    let checkbox_Status = document.getElementById('keep_me_signed_in');

    if(checkbox_Status.checked)
    {
        var keep_Me_Signed_In = document.getElementById('keep_me_signed_in').value = "on";
    }
    else
    {
        var keep_Me_Signed_In = document.getElementById('keep_me_signed_in').value = "off";
    }

    let data = {'email':userEmail, 'password':userPassword, 'keep_me_signed_in':keep_Me_Signed_In};
    let credentials = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controllers/signIn_Check.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('submit&userData='+credentials);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            if (this.responseText == "Admin Signed In") 
            {
                window.location.replace("../views/homePage_Admin.php");
            }
            else if(this.responseText == "Customer Signed In")
            {
                window.location.replace("../views/homePage_Customer.php");
            }
            else if(this.responseText == "Merchant Signed In")
            {
                window.location.replace("../views/homePage_Merchant.php");
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