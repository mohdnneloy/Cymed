// Initial load function
function getPrescriptions(){
    $.ajax({
        method: "get",
        data: {},
        success: function (data){
            $('#main').html(data);
        },
        url:"patient_prescriptions_fetch.php"
    });
}

function details(prid){
    $.ajax({
        method: "post",
        data: {prid : prid},
        success: function (data){
            $('#main').html(data);
        },
        url:"patient_prescriptions_fetch.php"
    });
}

function goBack(){
    getPrescriptions();
}

$(document).ready(function(){

    // Onready document display the available prescriptions
    getPrescriptions();
 
});




