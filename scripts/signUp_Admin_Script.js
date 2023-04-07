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
