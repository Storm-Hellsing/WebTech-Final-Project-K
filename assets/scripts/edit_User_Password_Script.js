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

function edit_AJAX()
{
    let userID = document.getElementById('userid').value;
    let userPassword = document.getElementById('password').value;
    let retypePassword = document.getElementById('retypepassword').value;

    let data = {'userid':userID, 'password':userPassword, 'retypepassword':retypePassword};
    let credentials = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controllers/edit_User_Password_Check.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('edit&userData='+credentials);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            if (this.responseText == "Password has been changed.") 
            {
                hideMainBody();
                showSuccessMessage(this.responseText);

                setTimeout(function()
                {
                    window.location.replace("../views/user_all_List.php");
                }, 1000);
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

function showSuccessMessage(message) 
{
    document.getElementById("success-text").innerHTML = message;
    let messageBox = document.getElementById("message-box-change-success");
    messageBox.classList.add("show");
}

function hideMainBody()
{
    let messageBox = document.getElementById("message-box");
    messageBox.style.display = "none";

    let mainBox = document.getElementById("main-box");
    mainBox.style.display = "none";

    let table = document.getElementById("editbutton");
    table.style.display = "none";

    let deletebutton = document.getElementById("button");
    deletebutton.style.display = "none";
}
