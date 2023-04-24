function previewImages(event) 
{
  const input = event.target;
  const previewContainer = document.getElementById('preview-container');
  previewContainer.innerHTML = '';

  if (input.files && input.files.length > 0) 
  {
    const numFiles = Math.min(input.files.length, 5); // Limit to 5 files
    
    for (let i = 0; i < numFiles; i++) 
    {
      if (input.files.length > 5) 
      {
        showMessage("Maximum 5 files can be selected.");
        input.value = '';
      }
      else
      {
        const file = input.files[i];
        const reader = new FileReader();

        reader.onload = function(e) 
        {
          const img = document.createElement('img');
          img.src = e.target.result;
          previewContainer.appendChild(img);
        }
        reader.readAsDataURL(file);
      }
    }
  }
  else
  {
    showMessage("At least 1 file must be selected.");
  }
}

function storeFile()
{
   // Get the input element for file selection
  let productID = document.getElementById('productid').value;
  let merchantID = document.getElementById('merchantid').value;
  let productName = document.getElementById('produtname').value;
  var input = document.getElementById("image");

  // Get all file objects
  var files = input.files;

  // Create a new FormData object
  var formData = new FormData();
  formData.append("productid", productID);
  formData.append("merchantid", merchantID);

  // Loop through each file and append it to the form data object
  for (var i = 0; i < files.length; i++) 
  {
    formData.append("images[]", files[i]);
  }

  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Set the URL for the request
  xhr.open("POST", "../controllers/store_File_Merchant_Check.php", true);
  xhr.send(formData);

}

function addProduct_AJAX()
{
    let productID = document.getElementById('productid').value;
    let productType = document.getElementById('producttype').value;
    let merchantID = document.getElementById('merchantid').value;
    let productName = document.getElementById('produtname').value;
    let productPrice = document.getElementById('price').value;
    let productQuantity = document.getElementById('quantity').value;
    let productDescription = document.getElementById('description').value;

    let imageData = document.getElementById('image').files;
    let imageNames = [];
  
    if (imageData && imageData.length > 0) 
    {
      const numFiles = Math.min(imageData.length, 5); // Limit to 5 files

      for (let i = 0; i < numFiles; i++) 
      {
        imageNames.push(imageData[i].name);
      }
    

    let data = {

                'productid':productID,
                'producttype':productType, 
                'merchantid':merchantID,
                'produtname':productName, 
                'price':productPrice, 
                'quantity':productQuantity, 
                'description':productDescription,
                'imagenames': imageNames
              };

    let credentials = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();

    xhttp.open('post', '../controllers/add_Product_Check.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('add&productData='+credentials);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
          
          if(this.responseText == "Product Details has been added to inventory.")
          {
            showMessage(this.responseText);
            document.getElementById('producttype').selectedIndex = 0;
            document.getElementById('merchantid').value = null;
            document.getElementById('produtname').value = null;
            document.getElementById('price').value = null;
            document.getElementById('quantity').value = null;
            document.getElementById('description').value = null;
            document.getElementById('image').value = null;
          }
          else
          {
            showMessage(this.responseText);
          }
          
        }
      }
    }
    else
    {
      showMessage("At least 1 file must be selected.");
    }
}


function showMessage(message) 
{
    document.getElementById("message-text").innerHTML = message;
    let messageBox = document.getElementById("message-box");
    messageBox.classList.add("show");
}