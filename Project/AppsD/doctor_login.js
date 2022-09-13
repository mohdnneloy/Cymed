
// Doctor Login Form Validation
function validate(){

    // Doctor Initial Checks
    let din = document.querySelector("input[name=doctor_initial]").value;
    din = din.toString();
    
    if(din.match(/[^a-zA-Z]/) != null){
        alert("Doctor initial should have capital letters only!");
        return false;
    }

    if(din.length<3 || din.length>4){
        alert("Doctor initial should be between 3 to 4 letters!");
        return false;
    }
    
    // Doctor Password Check
    let dpass = document.querySelector("input[name=password]").value;
    dpass = dpass.toString();

    if(dpass.length<7 || dpass.length>15){
        alert("Password length should be 7-15 of characters!");
        return false;
    }

    if(dpass.match(/[^a-zA-Z0-9]/g) != null){
        alert("Password cannot have any special characters!");
        return false;
    }

    
    
}
