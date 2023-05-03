function wish_AJAX()
{
    let merchantID = document.getElementById('merchantid').value;
    let userID = document.getElementById('userid').value;
    let productID = document.getElementById('productid').value;

    let data = {'merchantid':merchantID, 'userid':userID, 'productid':productID};
    let credentials = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controllers/wish_list_Check.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('wish&wishData='+credentials);
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