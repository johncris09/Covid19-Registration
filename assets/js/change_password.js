"use strict";

 
$(document).ready(function() { 
	$('#update-user-form').on('submit', function (e) {
		e.preventDefault();  
		var user_id = $('input[name="user_id"]').val() 

		$.ajax({
			url       : BASE_URL + "user/update_password/" + user_id,
			method    : 'POST',
			data      : $(this).serialize(),
			dataType  : "json", 
			success: function (data) {
				console.info(data);
				if(!data.response){ 
					Swal.fire({
						title : data.message, 
						icon: 'error',  
					})
				}else{ 
					Swal.fire({
						title : data.message, 
						icon: 'success', 
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'OK'
					}).then((result) => {
						//   location.reload() 
						if(result){
							$('#update-user-form').trigger("reset");
							$('input[name="password"]').focus();
						}
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
