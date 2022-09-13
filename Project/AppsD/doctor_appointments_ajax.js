// On clicking any cancel button
function writePrescription(apid, did, pid, symptoms, pos, tests, medicines){
            
    $.ajax({
        method: "post",
        data: {apid : apid,
               did : did,
               pid : pid,
               symptoms : symptoms,
               pos : pos,
               tests : tests,
               medicines : medicines},
        success: function (data){
            $('#main').html(data);
        },
        url:"doctor_prescribe.php"
    });
}

// Initial load function
function getAppointments(){
    $.ajax({
        method: "get",
        data: {},
        success: function (data){
            $('#main').html(data);
        },
        url:"doctor_appointments_fetch.php"
    });
}

function clickButton(apid){
    $.ajax({
        method: "post",
        data: {apid : apid},
        success: function (data){
            $('#main').html(data);
        },
        url:"doctor_prescribe.php"
    });
}

// Submit Prescriptton on completion
function submitPrescription(apid, did, pid){

    if (confirm("If you don't want to recheck the prescription press OK!") == true) {
        
        const symptoms = $('#symptoms').val();
        const pos = $('#pos').val();
        const tests = $('#tests').val();
        const medicines = $('#medicines').val();
        console.log(apid, did, pid);
        console.log(symptoms, pos, tests, medicines);

        writePrescription(apid, did, pid, symptoms, pos, tests, medicines);
    } 
    
    else {
        return false;
      }
}

function goBack(){
    getAppointments();
}

$(document).ready(function(){

    // Onready document display the available appointments
    getAppointments();
 
});




