// On clicking any cancel button
function cancelAppointment(apid){
            
    $.ajax({
        method: "post",
        data: {apid : apid},
        success: function (data){
            console.log(data);
            getAppointments();
        },
        url:"patient_appointments_fetch.php"
    });
}

// Initial load function
function getAppointments(){
    $.ajax({
        method: "get",
        data: {},
        success: function (data){
            $('#appointments').html(data);
        },
        url:"patient_appointments_fetch.php"
    });
}


$(document).ready(function(){

    // Onready document display the available appointments
    getAppointments();
 
});

function clickButton(apid){
    
    console.log(apid);
    cancelAppointment(apid);

}


