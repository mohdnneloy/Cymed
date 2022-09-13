// Patient Login Form Validation
function validate(){

    // First Name Checks
    let pfname = document.querySelector("input[name=first_name]").value;
    pfname = pfname.toString();

    if(pfname.match(/^([a-zA-Z ]{2,30})$/) == null || pfname.match(/[^a-zA-Z ]/) != null){
        alert("First Name should be within 2-30 characters and cannot have numbers or special characters in it!");
        return false;
    }

    // Last Name Checks
    let plname = document.querySelector("input[name=last_name]").value;
    plname = plname.toString();

    if(plname.match(/^([a-zA-Z]{2,15})/) == null || plname.match(/[^a-zA-Z]/) != null){
        alert("Last Name should be within 2-15 characters and cannot have numbers or special characters in it!");
        return false;
    }

    // Date of Birth Checks
    let pdob = document.querySelector("input[name=date_of_birth]").value;
    pdob = pdob.toString();

    if(pdob == ""){
        alert("Please enter your date of birth!");
        return false;
    }

    // Contact Number Checks
    let pcontact = document.querySelector("input[name=contact]").value;
    pcontact = pcontact.toString();

    if(!pcontact.startsWith("01") || pcontact.match(/[0-9]{11}/ == null || pcontact.match(/[^0-9]/) != null)){
        alert("Contact number should be of 11 charaters starting with '01' and should have digits only!" );
        return false;
    }

    // Patient Email Checks
    let pemail = document.querySelector("input[name=email]").value;
    pemail = pemail.toString();
    
    if(pemail.match(/^([a-zA-Z0-9\._]+)@([a-z]+).([a-z]{2,10})$/) == null){
        alert("Email not recognized!");
        return false;
    }
    
    // Patient Password Check
    let ppass = document.querySelector("input[name=password]").value;
    ppass = ppass.toString();

    if(ppass.length<7 || ppass.length>15){
        alert("Password length should be of 7-15 characters!");
        return false;
    }

    if(ppass.match(/[^a-zA-Z0-9]/g) != null){
        alert("Password cannot have any special characters!");
        return false;
    }

    // Confirm Password Check

    let pcpass = document.querySelector("input[name=confirm_password]").value;
    pcpass = pcpass.toString();

    if(ppass != pcpass){
        alert("Password did not match! Please check the passwords again!");
        return false;
    }
    
}