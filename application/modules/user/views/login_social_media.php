 
<section class="contain loginCntr" style="padding-top:50px; padding-bottom:50px; background:#" > 
	<h3 class="text-center"><?php echo $this->session->flashdata('user_sc'); ?></h3> 
	<h3><font color="red"><h5 class="text-center"><strong><?php echo $this->session->flashdata('error_msg'); ?></strong></h5> </font> </h3>
<div class="row" style="padding-top:50px; padding-bottom:50px; background:#e5e5e5">
<div class="col-md-4"> 

</div>
<div class="col-md-4"> 
<?php $email = isset($_GET['e_string'])?$_GET['e_string']:'' ?>
	<form class="form-horizontal" style="text-align:left;"  method="post" >	  
	   <div class="form-group">
	    <label  class="col-sm-3 control-label text-left" style="text-align:left;">Email</label>
	    <div class="col-sm-9">
	      <input type="email" name="email" id="email"  class="form-control" value="<?php echo isset($email)?$email:'' ?>"    placeholder="Email" required>
		  <span class="error" id="fname_error"></span>
	    </div>
	  </div>
	   <div class="form-group">
	    <label  class="col-sm-3 control-label text-left" style="text-align:left;">Password</label>
	    <div class="col-sm-9">
	      <input type="password" class="form-control" name="password"  id="password"  placeholder=" Password "  required>
	    </div>
	  </div>
	    <div class="form-group">
	    <a href="<?=base_url()?>user/forget_password" class="col-sm-offset-8 text-right">Forget Password ..</a>
	     </div>
	  <div class="form-group">
	    <div class="col-sm-offset-4"> 
	     
		 <button type="submit" name="login" id="login" value="Save" class="btn btn-success" />Login</button>
		 <!--div type="submit" class="btn btn-primary">Cancel</div-->
		  
		 </div>
		 </div>
	</form>
</div>
</div>

</section>