function togglePassword() 
{
    let passwordInput = document.getElementById("password");
    let retypepasswordInput = document.getElementById("retypepassword");
    let currentpasswordInput = document.getElementById("currentpassword");

    if (passwordInput.type === "password" && retypepasswordInput.type === "password") 
    {
        passwordInput.type = "text";
        retypepasswordInput.type = "text";
        currentpasswordInput.type = "text";
    } 
    else 
    {
        passwordInput.type = "password";
        retypepasswordInput.type = "password";
        currentpasswordInput.type = "password";
    }
}
