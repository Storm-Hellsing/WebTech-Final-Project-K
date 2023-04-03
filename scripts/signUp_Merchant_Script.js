function togglePassword() 
{
    var passwordInput = document.getElementById("password");
    var retypepasswordInput = document.getElementById("retypepassword");

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
