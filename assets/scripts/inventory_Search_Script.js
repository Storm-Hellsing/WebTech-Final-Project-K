function search() 
{
    let input = document.getElementById("searchresult"); 
    let filter = input.value.toUpperCase();
    let table = document.getElementById("user_all_table"); 
    let tr = table.getElementsByTagName("tr");

    for (var i = 0; i < tr.length; i++) 
    {
        let td_ProductType = tr[i].getElementsByTagName("td")[2];
        let td_ProductName = tr[i].getElementsByTagName("td")[3];
        let td_ProductDescription = tr[i].getElementsByTagName("td")[6];
        let td_addedDate = tr[i].getElementsByTagName("td")[7];
        if (td_ProductType || td_ProductName || td_ProductDescription || td_addedDate) 
        {
            let txtValue_ProductType = td_ProductType.textContent || td_ProductType.innerText;
            let txtValue_ProductName = td_ProductName.textContent || td_ProductName.innerText;
            let txtValue_ProductDescription = td_ProductDescription.textContent || td_ProductDescription.innerText;
            let txtValue_addedDate = td_addedDate.textContent || td_addedDate.innerText;
            if (txtValue_ProductType.toUpperCase().indexOf(filter) > -1 || txtValue_ProductName.toUpperCase().indexOf(filter) > -1 
                || txtValue_ProductDescription.toUpperCase().indexOf(filter) > -1 || txtValue_addedDate.toUpperCase().indexOf(filter) > -1) 
            {
            tr[i].style.display = "";
            }
            else 
            {
            tr[i].style.display = "none";
            }
        }
    }
}