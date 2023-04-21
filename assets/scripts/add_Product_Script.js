function previewImages(event) 
{
  const input = event.target;
  const previewContainer = document.getElementById('preview-container');
  previewContainer.innerHTML = '';

  if (input.files) 
  {
    const numFiles = Math.min(input.files.length, 5); // Limit to 5 files
    
    for (let i = 0; i < numFiles; i++) 
    {
      if (input.files.length > 5) 
      {
        alert("Limit is 5");
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
}