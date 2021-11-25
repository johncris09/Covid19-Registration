
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('layout/meta') ?>
    <?php $this->view('layout/css-link') ?>
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css"
        href="https://demo.dashboardpack.com/adminty-html/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://demo.dashboardpack.com/adminty-html/files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://demo.dashboardpack.com/adminty-html/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://demo.dashboardpack.com/adminty-html/files/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css">
</head>

<body>
	

	<?php $this->view('layout/pre-loader') ?>


    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php $this->view('layout/navbar') ?> 
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
					<?php $this->view('layout/main-menu') ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4><?php echo $page_title; ?></h4> 
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- HTML5 Export Buttons table start -->
                                                <div class="card">
													<div class="card-header">
														<!-- <h5><?php echo $page_title; ?></h5> -->
														<div class="card-header-left">
															<a href="<?php echo base_url() ?>user/add" class="btn btn-primary">Add New User</a>
														
														</div>
														<div class="card-header-right">
															<ul class="list-unstyled card-option">
																<li><i class="feather icon-maximize full-card"></i></li>
																<li><i class="feather icon-minus minimize-card"></i>
																</li>
																<li><i class="feather icon-trash-2 close-card"></i></li>
															</ul>
														</div>
													</div>
                                                    <!-- <div class="card-header table-card-header"> 
														<div class="text-right">
															<a href="<?php echo base_url() ?>user/add" class="btn btn-primary">Add New User</a>
														</div>
                                                    </div> -->
                                                    <div class="card-block">
														<hr>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="user-table"  class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Username</th>
                                                                        <th>Role Type</th>
                                                                        <th>Action</th> 
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
																	<?php
																		foreach($user as $row){
																			echo '
																				<tr>
																					<td>'.ucwords($row['name']).'</td>
																					<td>'.$row['username'].'</td>
																					<td class="text-capitalize">'. $this->config->item('role_type')[$row['role_type']].'</td>
																					<td>
																						<div class="dropdown-primary dropdown open">
																							<button class="btn btn-primary btn-sm dropdown-toggle  btn-mat  waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings rotate-refresh"></i></button>
																							<div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="will-change: transform;">
																								<a class="dropdown-item waves-light waves-effect" href="'.base_url().'user/edit/'.$row['user_id'].'"> <i class="feather icon-edit-2"></i> Edit</a>
																								<a class="dropdown-item waves-light waves-effect" href="'.base_url().'user/change_password/1"> <i class="feather icon-edit"></i> Change Password</a>
																								<a data-user-id="'.$row['user_id'].'" class="dropdown-item waves-light waves-effect delete-user"  href="javascript:void(0)"> <i class="feather icon-trash-2"></i> Delete</a> 
																							</div>
																						</div>
																					 </td>
																				</tr>
																			';

																		}
																	
																	?> 
                                                                </tbody> 
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
	<?php $this->view('layout/js-link') ?>
	<?php $this->view('layout/datatable') ?>
	<!-- <script src="<?php echo base_url(); ?>assets/js/user.js"></script> -->

	<script>
		"use strict";  
		$(document).ready(function() { 
			$('#user-table').DataTable();
			

			// delete user
			$('.delete-user').on('click', function(e){
				e.preventDefault();

				var user_id = $(this).data('userId') 

				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.isConfirmed) {

						$.ajax({
							url       : BASE_URL + 'user/delete/' + user_id,
							method    : 'POST', 
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
										if(result){
										  location.reload() 
										}
									})
								}  
							},
							error: function (xhr, status, error) {
								// error here...   
								console.info(xhr.responseText);
							}
						}); 
						
					}
				}) 

			})
		});  

	</script>

</body>

</html>
