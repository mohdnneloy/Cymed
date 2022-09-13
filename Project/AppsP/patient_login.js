
// Patient Login Form Validation
function validate(){

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
        alert("Password length should be 7-15 of characters!");
        return false;
    }

    if(ppass.match(/[^a-zA-Z0-9]/g) != null){
        alert("Password cannot have any special characters!");
        return false;
    }
    
}
