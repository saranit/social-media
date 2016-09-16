 
<section class="contain loginCntr" style="padding-top:50px; padding-bottom:50px; background:#" > 
	<h3 class="text-center"><font color="red"><h5 class="text-center"><strong><?php echo $this->session->flashdata('user_fail'); ?></strong></h5> </font>
<font color="green"><h5 class="text-center"><strong><?php echo $this->session->flashdata('user_sc'); ?></strong></h5> </font></h3> 
<div class="row" style="padding-top:50px; padding-bottom:50px; background:#e5e5e5">
<div class="col-md-4"> 

</div>
<div class="col-md-4"> 

	<form class="form-horizontal" style="text-align:left;"  method="post" >	  
	   <div class="form-group">
	    <label  class="col-sm-3 control-label text-left" style="text-align:left;">Email *</label>
	    <div class="col-sm-9">
	      <input type="email" name="email" id="email"  class="form-control"     placeholder="Email" required>
		  <span class="error" id="fname_error"></span>
	    </div>
	  </div>
	   
	  <div class="form-group">
	    <div class="col-sm-offset-4"> 
	     
		 <button type="submit" name="forget" id="forget" value="Save" class="btn btn-success" />Submit</button>
	    </div>
	</div>
</form>

</div>
</div>

</section>