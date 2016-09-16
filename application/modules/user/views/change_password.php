 
<section class="contain loginCntr" style="padding-top:50px; padding-bottom:50px; background:#" > 
	<h3 class="text-center"><font color="green"><h5 class="text-center"><strong><?php echo $this->session->flashdata('password_sc'); ?></strong></h5> </font>
	<font color="red"><h5 class="text-center"><strong><?php echo $this->session->flashdata('password_fl'); ?></strong></h5> </font>
	</h3> 
<div class="row" style="padding-top:50px; padding-bottom:50px; background:#e5e5e5">
<div class="col-md-4">  
 
</div>
<div class="col-md-4"> 

	<form class="form-horizontal" style="text-align:left;"  method="post" >	  
	   <div class="form-group">
	    <label  class="col-sm-4 control-label text-left" style="text-align:left;">Old Password *</label>
	    <div class="col-sm-8">
	      <input type="password" class="form-control" name="oldpassword"  id="oldpassword"  placeholder="Old Password " >
		   <span class="error" id="oldpassword_error"><?php echo $this->session->flashdata('user_fail'); ?></span>
		  
	    </div>
	  </div>
	   <div class="form-group">
	    <label  class="col-sm-4 control-label text-left" style="text-align:left;">New Password *</label>
	    <div class="col-sm-8">
	      <input type="password" class="form-control" name="password"  id="password"  placeholder="New Password " >
		   <!--span class="error" id="password_error"></span-->
		  
	    </div>
	  </div>
	   <div class="form-group">
	    <label  class="col-sm-4 control-label text-left" style="text-align:left;">Confirm Password *</label>
	    <div class="col-sm-8">
	      <input type="password" class="form-control" name="conpassword"  id="conpassword"  placeholder=" Confirm Password " >
		   <span class="error" id="conpassword_error"></span>
	    </div>
	  </div>
	   
	  <div class="form-group">
	    <div class="col-sm-offset-4"> 
	     
		 <button type="submit" name="change_password" id="change_password" value="Save" class="btn btn-success" />Submit</button>
		 <!--div type="submit" class="btn btn-primary">Cancel</div-->
		  
		 </div>
		 </div>
	</form>
</div>
</div>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$("#change_password").click(function(){
	
	var  oldpassword = $("#oldpassword").val();
	var  password = $("#password").val();
	var conpassword = $("#conpassword").val();
	
	var x=0;
	if(oldpassword == '')
	{
		var x=1;
		$("#oldpassword_error").text("Old Password is Required.");
		//return false;
	}
	if(oldpassword.length <=5)
	{
		var x=1;
		$("#oldpassword_error").text("Old Password length should be at least 6 characters.");
		//return false;
		
	}
	else
	{
		$("#oldpassword_error").text("");
	}
	if(password == '')
	{
		var x=1;
		$("#password_error").text("Password is Required.");
		//return false;
	}
	if(password.length <=5)
	{
		var x=1;
		$("#password_error").text("New Password length should be at least 6 characters.");
		//return false;
		
	}
	else
	{
		$("#password_error").text("");
	}
	
	if(conpassword == '')
	{
		var x=1;
		$("#conpassword_error").text("Confirm password is Required.");
		//return false;
	}
	if(conpassword.length <=5)
	{
		var x=1;
		$("#conpassword_error").text("Confirm Password length should be at least 6 characters.");
		//return false;
		
	}
	else
	{
		$("#conpassword_error").text("");
	}
	
	if(password != conpassword )
	{
		var x=1;
		$("#conpassword_error").text("Confirm password not match.");
		//return false;
	}
	else if(conpassword !='')
	{
		$("#conpassword_error").text("");
	}
	if(x >= 1)
	{
		return false;
	}
});
</script>
