<style type="text/css">
	.ftr{ position: fixed; bottom: 0; text-align: center; background-color: #008100; width: 100%; }
	.ftr a{ color: #fff;  }

</style>
<footer class="ftr">
	<div class="row" style="margin-top:5px !important;">
		<div class="col-md-12 text-center">
			<p style="padding-top: 0px; color: #012000"> @ 2016 All rights reserved  <a href="">hajjmabroorsoft.com</a></p>
		</div>
	</div>
</footer>

<script src="<?php echo base_url().'public/script/jquery/jquery-1.11.1.min.js'; ?>"></script>
<script src="<?php echo base_url().'public/script/jquery/jquery_ui/jquery-ui.min.js'; ?>"></script>
<!-- Theme Javascript -->
<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
<script src="<?php echo base_url().'public/script/js/bootstrap-datepicker.js'; ?>"></script>
<script src="<?php echo base_url().'public/script/js/utility/utility.js'; ?>"></script>
<script src="<?php echo base_url().'public/script/js/demo/demo.js'; ?>"></script>
<script src="<?php echo base_url().'public/script/js/main.js'; ?>"></script>
<!-- Widget Javascript -->
<script src="<?php echo base_url().'public/script/js/demo/widgets.js'; ?>"></script>
<script src="<?php echo base_url().'public/script/js/validate.js'; ?>"></script>
<script src="<?php echo base_url().'public/script/js/script.js'; ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.datepicker').datepicker();
	});
</script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		
		"use strict";
		
		// Init Theme Core
		Core.init();
		
		// Init Demo JS
		Demo.init();

	    // Init Widget Demo JS
	    // demoHighCharts.init();

	    // Because we are using Admin Panels we use the OnFinish 
	    // callback to activate the demoWidgets. It's smoother if
	    // we let the panels be moved and organized before 
	    // filling them with content from various plugins

	    // Init plugins used on this page
	    // HighCharts, JvectorMap, Admin Panels

    	// Init Admin Panels on widgets inside the ".admin-panels" container
    	$('.admin-panels').adminpanel({
    		grid: '.admin-grid',
    		draggable: true,
    		preserveGrid: true,
    		mobile: false,
    		onFinish: function() {
    			$('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

		        // Init the rest of the plugins now that the panels
		        // have had a chance to be moved and organized.
		        // It's less taxing to organize empty panels
		        demoHighCharts.init();
		        runVectorMaps(); // function below
      		},
      		onSave: function() {
      			$(window).trigger('resize');
      		}
      	});

    	// Widget VectorMap
    	function runVectorMaps() {
    		
    		//Jvector Map Plugin
    		var runJvectorMap = function() {
    			// Data set
    			var mapData = [900, 700, 350, 500];
    			
    			// Init Jvector Map
    			$('#WidgetMap').vectorMap({
    				map: 'us_lcc_en',
    				//regionsSelectable: true,
    				backgroundColor: 'transparent',
    				series: {
    					markers: [{
    						attribute: 'r',
    						scale: [3, 7],
    						values: mapData
    					}]
    				},
    				regionStyle: {
    					initial: {
    						fill: '#E5E5E5'
    					},
    					hover: {
    						"fill-opacity": 0.3
    					}
    				},
    				markers: [{
    					latLng: [37.78, -122.41],
    					name: 'San Francisco,CA'
    				}, {
    					latLng: [36.73, -103.98],
    					name: 'Texas,TX'
    				}, {
    					latLng: [38.62, -90.19],
    					name: 'St. Louis,MO'
			        }, {
			        	latLng: [40.67, -73.94],
			            name: 'New York City,NY'
			        }],
			        
			        markerStyle: {
			        	initial: {
			        		fill: '#a288d5',
			        		stroke: '#b49ae0',
			        		"fill-opacity": 1,
			        		"stroke-width": 10,
			        		"stroke-opacity": 0.3,
			        		r: 3
			        	},
			        	hover: {
			        		stroke: 'black',
			        		"stroke-width": 2
			        	},
			        	selected: {
			        		fill: 'blue'
			            },
			            selectedHover: {}
			        },
			    });
			    
			    // Manual code to alter the Vector map plugin to 
			    // allow for individual coloring of countries
			    var states = ['US-CA', 'US-TX', 'US-MO','US-NY'];
			    var colors = [bgWarningLr, bgPrimaryLr, bgInfoLr, bgAlertLr];
			    var colors2 = [bgWarning, bgPrimary, bgInfo, bgAlert];
			    
			    $.each(states, function(i, e) {
			    	$("#WidgetMap path[data-code=" + e + "]").css({
			    		fill: colors[i]
			    	});
			    });
			    
			    $('#WidgetMap').find('.jvectormap-marker').each(function(i, e) {
			    	$(e).css({
			    		fill: colors2[i],
			    		stroke: colors2[i]
			    	});
			    });
			}
			
			if ($('#WidgetMap').length) {
				runJvectorMap();
			}
		}
	});

</script>
<script type="text/javascript">
	
	$("#hotelpack").val(1);
	$(".hpackage").click(function(){
		//alert("laxmi");
		var clickedId= $(this).attr("dataid");
		$("#hotelpack").val(clickedId);
	});
	
	$(".ihaji").click(function(){
		$("#usertype").val("ihaji");
	});
	
	$(".ghaji").click(function(){
		$("#usertype").val("ghaji");
	});
	
</script>
<!-- END: PAGE SCRIPTS -->
</body>
<!-- Mirrored from admindesigns.com/framework/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Apr 2015 06:54:53 GMT -->
</html>
