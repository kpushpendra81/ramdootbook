 		<script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/pace-master/pace.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/classie/classie.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/waves/waves.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/summernote-master/summernote.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="<?php echo base_url()?>assets/js/modern.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/pages/form-elements.js"></script>
        
<script>
jQuery(document).ready(function() {
	$("#dob").change(function(){
		var birth = $("#dob").val();
		getAge(new Date(birth));
	});
	
	$("#comon").change(function(){
		var id=$("#comon").val();
		$.post("<?php echo site_url("patient/basic");?>", {id : id}, function(data){
			$("#basic").code(data);
		});
	});	
});

function autocomplet() {
	var min_length = 1; // min caracters to display the autocomplete
	var keyword = $('#country_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: '<?php echo site_url("patient/searchPatient");?>',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id').show();
				$('#country_list_id').html(data);
			}
		});
	} else {
		$('#country_list_id').hide();
		
		$("#customer_name").removeAttr("disabled");
    	$("#customer_number").removeAttr("disabled");
    	$("#box_id").removeAttr("disabled");
    	$("#address1").removeAttr("disabled");
    	$("#address2").removeAttr("disabled");
    	$("#city").removeAttr("disabled");
    	$("#state").removeAttr("disabled");
    	$("#pin_code").removeAttr("disabled");
    	$("#area").removeAttr("disabled");
    	$("#mobile1").removeAttr("disabled");
    	$("#mobile2").removeAttr("disabled");
    	$("#status").removeAttr("disabled");
    	$("#amount_paid").removeAttr("disabled");
    	$("#balance").removeAttr("disabled");
    	$("#total").removeAttr("disabled");

    	$("#customer_name").val("");
		$("#customer_number").val("");
    	$("#box_id").val("");
    	$("#address1").val("");
    	$("#address2").val("");
    	$("#city").val("");
    	$("#state").val("");
    	$("#pin_code").val("");
    	$("#area").val("");
    	$("#mobile1").val("");
    	$("#mobile2").val("");
    	$("#status").val("");
    	$("#amount_paid").val("");
    	$("#balance").val("");
    	$("#total").val("");
	}
}
 
// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#country_id').val(item);
	// hide proposition list
	$('#country_list_id').hide();
	var keyword = $('#country_id').val();
	//alert("neeraj");
	$.ajax({
		url: '<?php echo site_url("patient/retunToPatient");?>',
		type: 'POST',
		data: {keyword:keyword},
		success:function(data){
			var d = jQuery.parseJSON(data);
			
        	if((d.name.length == 10) || (d.gender.length > 0)){
        		//$("#stuId1").val(d.id);
        		$("#customer_name").val(d.customer_name);
            	$("#customer_name_name").val(d.customer_name);
            	//document.getElementById('gender').value() = d.gender;
            	$("#box_id").val(d.box_id);
            	
            	
            	$("#address1").val(d.address1);
            	$("#address2").val(d.address2);
            	$("#mobile1").val(d.mobile1);
            	


				
        	}else{
        		$("#customer_name").val("");
        		$("#customer_number").val("");
            	$("#box_id").val("");
            	$("#address1").val("");
            	$("#address2").val("");
            	$("#city").val("");
            	$("#state").val("");
            	$("#pin_code").val("");
            	$("#area").val("");
            	$("#mobile1").val("");
            	$("#mobile2").val("");
            	$("#status").val("");
            	$("#amount_paid").val("");
            	$("#balance").val("");
            	$("#total").val("");
        	}
		}
	});
}


</script>