
function validateLogin() {

    let email = document.getElementById("loginEmail").value.trim();
    let password = document.getElementById("loginPassword").value.trim();

    /* Email Validation */
    let atpos = email.indexOf("@");
    let dotpos = email.lastIndexOf(".");

    if (email === "" || atpos < 1 || (dotpos - atpos < 2)) {
        alert("Please enter a valid email address.");
        document.getElementById("loginEmail").focus();
        return false;
    }

    /* Password Validation */
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    let hasUpper = false;
    let hasLower = false;
    let hasNumber = false;
    let hasSpecial = false;

    for (let i = 0; i < password.length; i++) {
        let ch = password[i];

        if (ch >= 'A' && ch <= 'Z') hasUpper = true;
        else if (ch >= 'a' && ch <= 'z') hasLower = true;
        else if (ch >= '0' && ch <= '9') hasNumber = true;
        else hasSpecial = true;
    }

    if (!hasUpper || !hasLower || !hasNumber || !hasSpecial) {
        alert("Password must contain:\n• One uppercase\n• One lowercase\n• One number\n• One special character");
        return false;
    }

    alert("Login Successful!");
    return true;
}


function validateRegister() {

    let name = document.getElementById("regName").value.trim();
    let email = document.getElementById("regEmail").value.trim();
    let password = document.getElementById("regPassword").value.trim();

    /* Name Validation */
    if (name.length < 3) {
        alert("Name must be at least 3 characters.");
        return false;
    }

    for (let i = 0; i < name.length; i++) {
        let ch = name[i];
        if (!((ch >= 'A' && ch <= 'Z') || (ch >= 'a' && ch <= 'z') || ch === ' ')) {
            alert("Name must contain only letters.");
            return false;
        }
    }

    /* Email Validation */
    let atpos = email.indexOf("@");
    let dotpos = email.lastIndexOf(".");

    if (email === "" || atpos < 1 || (dotpos - atpos < 2)) {
        alert("Please enter a valid email address.");
        return false;
    }

    /* Password Validation */
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    let hasUpper = false;
    let hasLower = false;
    let hasNumber = false;
    let hasSpecial = false;

    for (let i = 0; i < password.length; i++) {
        let ch = password[i];

        if (ch >= 'A' && ch <= 'Z') hasUpper = true;
        else if (ch >= 'a' && ch <= 'z') hasLower = true;
        else if (ch >= '0' && ch <= '9') hasNumber = true;
        else hasSpecial = true;
    }

    if (!hasUpper || !hasLower || !hasNumber || !hasSpecial) {
        alert("Password must contain:\n• One uppercase\n• One lowercase\n• One number\n• One special character");
        return false;
    }

    alert("Registration Successful!");
    return true;
}
