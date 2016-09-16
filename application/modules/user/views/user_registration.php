<!DOCTYPE html> 
<html> 
<head>
<title>Registration</title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="plugin/bootstrap-3.3.6-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="custom/style.css" />  
</head>
<body>
 <font color="red"><h4 class="text-center"><strong><?php echo $this->session->flashdata('user_fail'); ?></strong></h4> </font>
<section class="contain" style="padding-top:50px; padding-bottom:50px; background:#e5e5e5">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
 
	<form class="form-horizontal" style="text-align:left;" method="post">	  
	   <div class="form-group">
	    <label for="inputEmail3" class="col-sm-3 control-label text-left" style="text-align:left;">First name 
		<span class="error" style>*</span></label>
	    <div class="col-sm-9">
	      <input type="text" name="fname" id="fname" class="form-control"   placeholder="First name" >
		  <span class="error" id="fname_error"></span>
	    </div>
	  </div>
	   <div class="form-group">
	    <label for="inputEmail3" class="col-sm-3 control-label text-left" style="text-align:left;">Last name</label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control" name="lname"  id="lname"  placeholder="Last name" >
	    </div>
	  </div>
	   <div class="form-group">
	    <label for="inputEmail3" class="col-sm-3 control-label text-left" style="text-align:left;">Email *</label>
	    <div class="col-sm-9">
	      <input type="email" class="form-control" name="email" id="email"  placeholder="Email" >
		  <span class="error" id="email_error"></span>
		  
	    </div>
	  </div>
       <div class="form-group">
	    <label for="inputEmail3" class="col-sm-3 control-label text-left" style="text-align:left;">Phone Number *</label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control"  name="phone" id="phone"  placeholder="Phone Number" >
		  <span class="error" id="phone_error"></span>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-3 control-label" style="text-align:left;"> Gender *</label>
	    <div class="col-sm-9">
	      <label class="radio-inline">
				  <input type="radio" name="gender" id="inlineRadio2" value="Male"> Male
				</label>
				<label class="radio-inline">
				  <input type="radio" name="gender" id="inlineRadio3" value="Female"> Female
				</label>
				
				
				<span class="error" id="gender_error"></span>
	  </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-3 control-label"  style="text-align:left;">Password *</label>
	    <div class="col-sm-9">
	      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
		   <span class="error" id="password_error"></span>
		  
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-3"> 
	     
		 <button type="submit" name="sub_reg" id="sub_reg" value="Save" class="btn btn-success" />Save</button>
		 <!--div type="submit" class="btn btn-primary">Cancel</div-->
		 <div  class="btn btn-sm red-btn" >  <a class="btn btn-danger"  href="<?php echo base_url(); ?>user">Cancel</a></div>
		 </div>
		 </div>
		 
	</form>
</div>
</div>

</section>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$("#sub_reg").click(function(){
	
	
	 var  fname = $("#fname").val().trim();
	 var  email = $("#email").val().trim();
	 var  phone = $("#phone").val().trim();
	 var  password = $("#password").val().trim();
	 
	 var alpha_numaric =  /^[a-zA-Z\s]+$/;          
	 var numarics =  /^[0-9]+$/;          
	 var  email_check = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;  
	 
	if(fname == '')
	{
		var x=1;
		$("#fname_error").text("First name is Required.");
	    //$("#fname").focus();
	    //return false;
	}
	if(fname.length <= 2)
	{
		var x=1;
		$("#fname_error").text("First name should be 3 characters.");
	    //$("#fname").focus();
	    //return false;
	}
	if(!fname.match(alpha_numaric))
	{
		$("#fname_error").text("First name should be alphabets only.");
	    //$("#fname").focus();
	    //return false;
		
	}
	else
	{
		$("#fname_error").text("");
	}
	if(email =='')
   {
	   var x=1;
	   $("#email_error").text(" Email is required.");
	  // $("#hajiemail").focus();
	   //return false;
	   
   }
   if(!email.match(email_check))
   {
	 var x=1;
	 $("#email_error").text("Please enter valid Email.");
	  //$("#hajiemail").focus();
	  //return false; 
	   
   }
   else
   {
	  $("#email_error").text(""); 
   }
    if(phone =='')
   {
	  var x=1;
	  $("#phone_error").text("Phone number is required.");
	  //$("#hajiphonenumber").focus();
	  //return false; 
   }
   if(!phone.match(numarics))
   {
	  var x=1;
	  $("#phone_error").text("Phone number should be Numbers only.");
	  //$("#hajiphonenumber").focus();
	  //return false;  
   }
   if(phone.length <=9)
   {
	  var x=1;
	  $("#phone_error").text("Phone number should be at least 10 numbers.");
	  //$("#hajiphonenumber").focus();
	 //return false;    
   }
   else
   {
	  $("#phone_error").text(""); 
   }
   if($("input[name='gender']:checked").val())
   {
		//return true;
		
		$("#gender_error").text("");
   }
	else if($("input[name='gender']").val().length > 0)
	{
		var x=1;
		$("#gender_error").text("Gender Field is required.");
		//return false;
	}
   if(password =='')  
   {
	   var x=1;
	   $("#password_error").text("Password is required."); 
	  // $("#subagentpassword").focus();
	   //return false; 
	   
   }
  if(password.length <=5)
  {
	   var x=1;
	   $("#password_error").text("Password should be at least 6 characters.");
	  // $("#subagentpassword").focus();
	   //return false;   
	  
  }
  else
  {
	  $("#password_error").text("");
  }
  if(x >= 1)
  {
	  return false;
  }
});
</script>
<script>
$("#email").keyup(function(){
	var email_check1 = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
   
	
var new_email =$("#email").val().trim();	
var new_user_id =0;	
	
	$.post("<?php echo base_url() ?>user/email_check_ajax",{'email':new_email,'user_id':new_user_id}, function(res){
		
	  //alert(res);
      //$("#hajicity").html(res);
       if(new_email =='')
	   {
		 $("#email_error").text("Email is required.");
	     $("#hajiemail").focus();
	     return false;
		   
	   }
       if(!new_email.match(email_check1))
	   {
		  $("#email_error").text("Please enter valid email.");
		  $("#hajiemail").focus();
		  return false; 
		   
	   }	   
	  if(res == 10)
	  {
		 $("#email_error").text("There is an existing account associated with " +new_email );
	     $("#hajiemail").focus();
		// $("#sub_reg").hide();
	     return false;
		
	    
	  }
	  else
	  {
		$("#email_error").text(""); 
       // $("#sub_reg").show();		
	  }
      
	});
	
	
});
</script>
<script>
$("#phone").keyup(function(){
	//var email_check1 = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
   
var numarics1 =  /^[0-9]+$/;  
var new_phone =$("#phone").val().trim();	
var new_user_id =0;	
	
	$.post("<?php echo base_url() ?>user/phone_check_ajax",{'phone':new_phone,'user_id':new_user_id}, function(res){
		
	  //alert(res);
      //$("#hajicity").html(res);
       if(new_phone =='')
	   {
		 $("#phone_error").text("Phone number is required.");
	     $("#phone").focus();
	     return false;
		   
	   }
       if(!new_phone.match(numarics1))
	   {
		  $("#phone_error").text("Please enter valid Phone number.");
		  $("#phone").focus();
		  return false; 
		   
	   }	   
	  if(res == 30)
	  {
		 $("#phone_error").text("There is an existing account associated with " +new_phone );
	     $("#phone").focus();
		 //$("#sub_reg").hide();
	     return false;
		
	    
	  }
	  else
	  {
		$("#phone_error").text(""); 
        //$("#sub_reg").show();		
	  }
      
	});
	
	
});
</script>