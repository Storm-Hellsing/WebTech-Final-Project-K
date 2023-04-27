function delete_Product_AJAX()
{
    let productID = document.getElementById('productid').value;
    let merhcantID = document.getElementById('merchantid').value;

    let data = {'productid':productID, 'merchantid':merhcantID};
    let credentials = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controllers/delete_Product_Check.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('delete&productData='+credentials);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            showMessage(this.responseText);
            hideMainBody();

            setTimeout(function()
            {
                 window.location.replace("../views/inventory.php");
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