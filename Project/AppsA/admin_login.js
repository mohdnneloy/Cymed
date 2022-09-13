
// Admin Login Form Validation
function validate(){

    // Admin ID Checks
    let aid = document.querySelector("input[name=admin_id]").value;
    aid = aid.toString();
    
    if(aid.match(/[^0-9]/)){
        alert("Admin ID should have numbers only!");
        return false;
    }

    if(aid.length!=7){
        alert("Admin ID should of 7 digits!");
        return false;
    }
    
    // Admin Password Check
    let apass = document.querySelector("input[name=password]").value;
    apass = apass.toString();

    if(apass.length<7 || apass.length>15){
        alert("Password length should be 7-15 of characters!");
        return false;
    }

    if(apass.match(/[^a-zA-Z0-9]/g) != null){
        alert("Password cannot have any special characters!");
        return false;
    }

}
