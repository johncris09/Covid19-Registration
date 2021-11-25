"use strict";

 
$(document).ready(function() { 
	$('#user-form').on('submit', function (e) {
		e.preventDefault(); 
		$.ajax({
			url       : BASE_URL + 'user/insert',
			method    : 'POST',
			data      : $(this).serialize(),
			dataType  : "json", 
			success: function (data) {
				console.info(data);
				if(data.response){ 

					Swal.fire({
						title           : data.message, 
						icon: 'success', 
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'OK'
					}).then((result) => {
						//   location.reload() 
						if(result){
							$('#user-form').trigger("reset");
							$('input[name="name"]').focus();
						}
					})


				}else{
					Swal.fire({
						title           : data.message,
						icon            : "error", 
					})
				}  
			},
			error: function (xhr, status, error) {
				// error here...   
				console.info(xhr.responseText);
			}
		});

	});
});  
