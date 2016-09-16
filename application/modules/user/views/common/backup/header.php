<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>Hajj Agent Dashboard </title>
			<!-- Font CSS (Via CDN) -->
			<link rel="stylesheet" href="<?php echo base_url().'assets/lib/bootstrap-3.3.4-dist/css/bootstrap.min.css'; ?>">
			 <link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			 <link rel="stylesheet prefetch" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
			 <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">
			 
			<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600'>
			<!-- Theme CSS -->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/skin/default_skin/css/theme.css'; ?>">
			<!-- Admin Forms CSS -->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/admin-tools/admin-forms/css/admin-forms.css';?>">
			<link href="<?php echo base_url().'public/css/custommain.css'; ?>" rel="stylesheet">
			<link href="<?php echo base_url().'public/css/datepicker.css'; ?>" rel="stylesheet">
			
		</head>
		<body class="dashboard-page sb-l-o sb-r-c">
			<div id="main">
				<!-- Start: Header -->
				<header class="navbar navbar-fixed-top bg-light">
					<div class="navbar-branding"> 
						<a class="navbar-brand" href="<?php echo base_url().'agent/agent_info'; ?>"> <img src="<?php echo base_url().'public/images/logo.png'; ?>"> </a> 
						<span id="toggle_sidemenu_l" class="glyphicon glyphicon-align-justify">	</span> 
					</div>
    				<ul class="nav navbar-nav navbar-right">
    					<!--li class="dropdown"> 
    						<a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
    						<button type="button" class="btn btn-default btn-sm primary">My Account</button>
    						<button type="button" class="btn btn-default btn-sm default">Logout</button>
    					</a> </li-->
    					<li class="dropdown" style="padding-top: 8px;"> <a href="<?php echo base_url().'agent/agent_info'; ?>" class="dropdown-toggle fw600 p15" data-toggle="dropdown">Welcome <?php
                        $agent_name=$this->session->userdata('agent_name');
                        if($agent_name !='')
						{
							
							echo $agent_name;
						}
						else 
						{
						   echo $this->session->userdata('all_agent_info')->agent_name;
						}
						 ?>
						</a></li>
						<?php $agent_photo=$this->session->userdata('all_agent_info')->agent_profile_photo;
                             $photo=$this->session->userdata('agent_photo');						?>
						<?php 
						if($photo !='' )
						{ ?>
							<li class="dropdown"> <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> 
							 <input type="image" style="width:40px;height:40px; " src="<?php echo base_url();?>/uploads/agent/<?php echo $photo;  ?>"; ></img> </a>
						</li>
						<?php	
						} else if($agent_photo !='' ) { ?>
    					<li class="dropdown"> <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> 
							 <input type="image" style="width:40px;height:40px; border-radius: 50%; margin-top: -4px;" src="<?php echo base_url();?>/uploads/agent/<?php echo $agent_photo;  ?>"; ></img> </a>
						</li>
						<?php  } else { ?>
						<li class="dropdown"> <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> 
							<img src="http://www.icalt.org/2016/wp-content/uploads/2015/09/No_available_image.gif" alt="" class="img50_50"> </a>
						</li>
						<?php } ?>
						<li class="dropdown">
							<div class="btn-group" style="margin-top: 10px;">
								<button type="button" class="btn btn-success"  style=" border-radius:6px 0px 0px 6px;">My Account</button>
								<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=" border-radius:0px 6px 6px 0px;">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu top-drop">
									<li><a href="<?php echo base_url().'agent/profile_edit'; ?>">Update Profile</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="<?php echo base_url().'agent/changepassword'; ?>">Change Password</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="<?php echo base_url().'agent/agent_logout'; ?>">Signout</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</header>