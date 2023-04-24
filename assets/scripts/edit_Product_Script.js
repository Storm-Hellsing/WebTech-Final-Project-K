function editProduct_AJAX()
{
    let productID = document.getElementById('productid').value;
    let merchantID = document.getElementById('merchantid').value;
    let productType = document.getElementById('producttype').value;
    let productName = document.getElementById('produtname').value;
    let productPrice = document.getElementById('price').value;
    let productQuantity = document.getElementById('quantity').value;
    let productDescription = document.getElementById('description').value;

    let data = {

                'productid':productID,
                'merchantid':merchantID,
                'producttype':productType,
                'produtname':productName,
                'price':productPrice,
                'quantity':productQuantity,
                'description':productDescription

                };

    let credentials = JSON.stringify(data);

    let xhhtp = new XMLHttpRequest();

    xhhtp.open('POST', '../controllers/edit_Product_Check.php', true);
    xhhtp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhhtp.send('edit&productData='+credentials);
    xhhtp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            if(this.responseText == "Product Details has been updated.")
            {
                hideMainBody();
                showMessage(this.responseText);

                setTimeout(function()
                {
                    window.location.replace("../views/inventory.php");
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

function hideMainBody()
{
    let mainBox = document.getElementById("main-box");
    mainBox.style.display = "none";
}