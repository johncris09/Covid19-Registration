
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->view('layout/meta') ?>
    <?php $this->view('layout/css-link') ?>
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
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item"  style="float: left;">
                                                            <a href="../index.html"> <i class="feather icon-home"></i> </a>
                                                        </li>
                                                        <li class="breadcrumb-item"  style="float: left;"><a href="#!">Widget</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5><?php echo $page_title; ?></h5> 
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                                <li><i class="feather icon-minus minimize-card"></i>
                                                                </li>
                                                                <li><i class="feather icon-trash-2 close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
													<form  id="update-user-form" method="post">
														<div class="card-block">
															<hr> 
															<input type="hidden" value="<?php echo $user['user_id'] ?>" name="user_id"  >
															
															<div class="form-group row">
																<label class="col-sm-4 col-form-label">New Password <span class="text-danger">*</span> </label>
																<div class="col-sm-8">
																	<input type="password"  name="password" class="form-control" placeholder="New Password" required autofocus>
																</div>
															</div> 
															<hr> 
														</div>
														<div class="card-footer">
															<div class="text-right">
																<a href="../" class="btn btn-danger">Back</a>
																<button type="submit" class="btn btn-primary">Update</button>
															</div>
														</div>
                                                    </form>  
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
	<script src="<?php echo base_url(); ?>assets/js/change_password.js"></script>

</body>

</html>
