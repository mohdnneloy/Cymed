// On page document ready

$(document).ready(function(){

	// Display the distinct specialist list
	function specialist(){
		$.ajax({
			
			method: "post",
			data: {},
			success: function (data){
                $('#specialist').html(data);
			},
			url:"patient_make_appointment_fetch.php"
		});
	}

	// Display doctor names based on the selected specialist
	function findname(specialist){
		
		$.ajax({
			
			method: "post",
			data: {specialist : specialist},
			success: function (data){
                $('#dname').html(data);
			},
			url:"patient_make_appointment_fetch.php"
		});
		
	}

	// Display doctor available days based on the selected specialist
	function findday(did, specialist){
		
		$.ajax({
			
			method: "post",
			data: {did : did, 
				   specialist : specialist},
			success: function (data){
                $('#day').html(data);
			},
			url:"patient_make_appointment_fetch.php"
		});
		
	}

	// Display Next 5 available days for the appointment based on the selected day
	function finddate(did, specialist, day){
		
		$.ajax({
			
			method: "post",
			data: {did : did, 
				   specialist : specialist,
				   day : day},
			success: function (data){
                $('#date').html(data);
			},
			url:"patient_make_appointment_fetch.php"
		});
		
	}

	// Display the available times
	function findtime(did, specialist, day, date){
	
		$.ajax({
			
			method: "post",
			data: {did : did, 
				   specialist : specialist,
				   day : day,
				   date : date},
			success: function (data){
                $('#time').html(data);
			},
			url:"patient_make_appointment_fetch.php"
		});
		
	}
	

	// Onload page check for distinct specialists
    specialist();

	// On change in specialist select option load the name select field
	$('#specialist').on('change', function(){
		
		$('#day').html("");
		$('#date').html("");
		$('#time').html("");

		const specialist = $('#dspecialist').val();

		if($('#dspecialist').val() == ""){
			$('#dname').html("");
			$('#day').html("");
			$('#date').html("");
			$('#time').html("");
		}

		else{
			
			findname(specialist);
		}
		
	});

	// On change in name select option load the day select field
	$('#dname').on('change', function(){

		$('#date').html("");
		$('#time').html("");

		const did = $('#ddid').val();
		const specialist = $('#dspecialist').val();
		console.log($('#ddid').val());
		console.log($('#dspecialist').val());
		
		if($('#ddid').val() == ""){
			$('#day').html("");
			$('#date').html("");
			$('#time').html("");
		}
		
		else{
			findday(did, specialist);
		}
		
		
	});

	// On change in the day field update the available dates for appointment
	$('#day').on('change', function(){
		
		$('#time').html("");

		const day = $('#dday').val();
		const did = $('#ddid').val();
		const specialist = $('#dspecialist').val();
		console.log($('#ddid').val());
		console.log($('#dspecialist').val());
		console.log($('#dday').val());

		if($('#dday').val() == ""){
			$('#date').html("");
			$('#time').html("");
		}

		else{
			finddate(did, specialist, day);
		}
		

		
	});

	// On change in the date field update the available times for appointment

	$('#date').on('change', function(){
		
		$('#time').html("");

		const day = $('#dday').val();
		const did = $('#ddid').val();
		const specialist = $('#dspecialist').val();
		const date = $('#ddate').val();
		console.log($('#ddid').val());
		console.log($('#dspecialist').val());
		console.log($('#dday').val());
		console.log($('#ddate').val());

		if($('#ddate').val() == ""){
			$('#time').html("");
		}

		else{
			findtime(did, specialist, day, date);
		}

	});

	

	

	

	


});

