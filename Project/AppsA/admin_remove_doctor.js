// Doctor Removal Validation
function validate(){

    // Doctor ID Checks
    let did = document.querySelector("input[name=did]").value;
    did = did.toString();

    if(did.match(/^([0-9]{12})/) == null || did.match(/[^0-9]/) != null || !did.startsWith('2')){
        alert("Doctor ID should consist of 12 digits starting with 2!");
        return false;
    }

}
