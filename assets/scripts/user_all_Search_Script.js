function search() 
{
    let input = document.getElementById("searchresult"); 
    let filter = input.value.toUpperCase();
    let table = document.getElementById("user_all_table"); 
    let tr = table.getElementsByTagName("tr");

    for (var i = 0; i < tr.length; i++) 
    {
        let td_UserName = tr[i].getElementsByTagName("td")[3];
        let td_UserEmail = tr[i].getElementsByTagName("td")[4];
        let td_UserMobile = tr[i].getElementsByTagName("td")[5];
        let td_Businessname = tr[i].getElementsByTagName("td")[6];
        if (td_UserName || td_UserEmail || td_UserMobile || td_Businessname) 
        {
            let txtValue_userName = td_UserName.textContent || td_UserName.innerText;
            let txtValue_userEmail = td_UserEmail.textContent || td_UserEmail.innerText;
            let txtValue_userMobile = td_UserMobile.textContent || td_UserMobile.innerText;
            let txtValue_Businessname = td_Businessname.textContent || td_Businessname.innerText;
            if (txtValue_userName.toUpperCase().indexOf(filter) > -1 || txtValue_userEmail.toUpperCase().indexOf(filter) > -1 
                || txtValue_userMobile.toUpperCase().indexOf(filter) > -1 || txtValue_Businessname.toUpperCase().indexOf(filter) > -1) 
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