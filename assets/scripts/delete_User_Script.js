function delete_User_AJAX()
{
    let userID = document.getElementById('userid').value;

    let data = {'userid':userID};
    let credentials = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controllers/delete_User_Check.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('delete&userData='+credentials);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            showMessage(this.responseText);
            hideMainBody();

            setTimeout(function()
            {
                window.location.replace("../views/user_all_List.php");
            }, 1000);
        }
    }
}

function showMessage(message) 
{
    document.getElementById("message-text").innerHTML = message;
    let messageBox = document.getElementById("message-box");
    messageBox.classList.add("show");
}

function hideMainBody()
{
    let mainBox = document.getElementById("main-box");
    mainBox.style.display = "none";

    let table = document.getElementById("table");
    table.style.display = "none";

    let deletebutton = document.getElementById("delete-button");
    deletebutton.style.display = "none";
}