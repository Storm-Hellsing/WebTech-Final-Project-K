function togglePassword() 
{
    let passwordInput = document.getElementById("password");
    let retypepasswordInput = document.getElementById("retypepassword");

    if (passwordInput.type === "password" && retypepasswordInput.type === "password") 
    {
        passwordInput.type = "text";
        retypepasswordInput.type = "text";
    } 
    else 
    {
        passwordInput.type = "password";
        retypepasswordInput.type = "password";
    }
}

function signup_AJAX()
{
    let userName = document.getElementById('username').value;
    let userEmail = document.getElementById('email').value;
    let userPassword = document.getElementById('password').value;
    let retypePassword = document.getElementById('retypepassword').value;
    let businessName = document.getElementById('businessname').value;
    let businessLink = document.getElementById('businesslink').value;

    let data = {'username':userName, 'email':userEmail, 'password':userPassword, 're_password':retypePassword, 'businessname':businessName, 'businesslink':businessLink};
    let credentials = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controllers/signUp_Merchant_Check.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('submit&userData='+credentials);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            if (this.responseText == "Account has been created.") 
            {
                window.location.href = "account_Created.php";
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