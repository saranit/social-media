<!DOCTYPE html> 
<html> 
<head>
<title>Registration</title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="plugin/bootstrap-3.3.6-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="custom/style.css" />  
</head>
<body>
 <font color="green"><h4 class="text-center"><strong><?php echo $this->session->flashdata('keywords'); ?></strong></h4> </font>
<section class="contain" style="padding-top:50px; padding-bottom:50px; background:#e5e5e5">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
 
	<form class="form-horizontal" style="text-align:left;" method="post">	  
	   <div class="form-group">
	    <label for="inputEmail3" class="col-sm-3 control-label text-left" style="text-align:left;">Keyword 1 
		<span class="error" style>*</span></label>
	    <div class="col-sm-9">
	      <input type="text" name="Keyword_1[]" id="Keyword_1" class="form-control"   placeholder="Keyword 1" >
		  <span class="error" id="Keyword_1_error"></span>
	    </div>
	  </div>
	   <div class="form-group">
	    <label for="inputEmail3" class="col-sm-3 control-label text-left" style="text-align:left;">Keyword 2
		<span class="error" style>*</span></label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control" name="Keyword_1[]"  id="Keyword_2"  placeholder="Keyword 2" >
		  <span class="error" id="Keyword_2_error"></span>
	    </div>
	  </div>
	   <div class="form-group">
	    <label for="inputEmail3" class="col-sm-3 control-label text-left" style="text-align:left;">Keyword 3
		<span class="error" style>*</span></label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control" name="Keyword_1[]" id="Keyword_3"  placeholder="Keyword 3" >
		  <span class="error" id="Keyword_3_error"></span>
		  
	    </div>
	  </div>
       <div class="form-group">
	    <label for="inputEmail3" class="col-sm-3 control-label text-left" style="text-align:left;">Keyword 4
		<span class="error" style>*</span></label>
	    <div class="col-sm-9">
	      <input type="text" class="form-control"  name="Keyword_1[]" id="Keyword_4"  placeholder="Keyword 4" >
		  <span class="error" id="Keyword_4_error"></span>
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
	
	
	 var  Keyword_1 = $("#Keyword_1").val().trim();
	 var  Keyword_2 = $("#Keyword_2").val().trim();
	 var  Keyword_3 = $("#Keyword_3").val().trim();
	 var  Keyword_4 = $("#Keyword_4").val().trim();
	 
	 
	 var alpha_numaric =  /^[a-zA-Z\s]+$/;          
	 var numarics =  /^[0-9]+$/;          
	 var  email_check = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;  
	 var x=0;
	if(Keyword_1 == '')
	{
		var x=1;
		$("#Keyword_1_error").text("Keyword 1 is Required.");
	    //return false;
	}
	else
	{
		
		$("#Keyword_1_error").text("");
	}
	
	if(Keyword_2 == '')
	{
		var x=1;
		$("#Keyword_2_error").text("Keyword 2 is Required.");
	    //return false;
	}
	else
	{
		
		$("#Keyword_2_error").text("");
	}
	if(Keyword_3 == '')
	{
		var x=1;
		$("#Keyword_3_error").text("Keyword 3 is Required.");
	    //return false;
	}
	else
	{
		
		$("#Keyword_3_error").text("");
	}
    if(Keyword_4 == '')
	{
		var x=1;
		$("#Keyword_4_error").text("Keyword 4 is Required.");
	    //return false;
	}
	else
	{
		
		$("#Keyword_4_error").text("");
	}
   
  
  if(x >= 1)
  {
	  return false;
  }
});
</script>

