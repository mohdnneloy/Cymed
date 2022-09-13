$(document).ready(function(){

	function load_data(dname){

		$.ajax({
			
			method: "post",
			data: {dname:dname},
			success: function (data){
                $('#result').html(data);
			},
			url:"Doctors/fetch.php"
		});
	}

	function load_all(){

		$.ajax({
			method: "get",
			data: {},
			success: function (data){
                $('#result').html(data);
			},
			url:"Doctors/fetch.php"
		});
	}
	
	// Initial Load of doctors
	load_all();


	$('#dname').keyup(function(){
        var dname = $(this).val();
		load_data(dname);
	});

});