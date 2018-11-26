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

	$("#paid").keyup(function(){
		var total = Number($("#procedure_fee").val());
		var paid = Number($("#paid").val());
		var pb = Number($("#pb").val());
		if(pb <= 0 ){
			var cb = total - paid;
			$("#current_due").val(cb);
			if(cb < 0){
				alert("You Can not take extra amount than balance amount...");
				$("#current_due").val(0);
				$("#paid").val(0);
			}else{
				$("#current_due").val(cb);
			}
		}else{
			var cb = pb - paid;
			if(cb < 0){
				alert("You Can not take extra amount than balance amount...");
				$("#current_due").val(0);
				$("#paid").val(0);
			}else{
				$("#current_due").val(cb);
			}
		}
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
		
		$("#p_name").removeAttr("disabled");
    	$("#gender").removeAttr("disabled");
    	
    	$("#address").removeAttr("disabled");
    	$("#mobile").removeAttr("disabled");

    	$("#p_id").val("");
		$("#p_name").val("");
    	$("#gender").val("");
    	
    	$("#address").val("");
    	$("#mobile").val("");
    	$("#weight").val("");
    	$("#bp").val("");
    	$("#comon").val("");
    	$("#procedure_name").val("");
    	$("#procedure_fee").val("");
    	$("#previous_due").val("");
    	$("#current_due").val("");
    	$("#discount_rate").val("");
    	$("#discount_amount").val("");
    	$("#paid").val("");
    	$("#date").val("");
	}
}
 
// set_item : this function will be executed when we select an item
function set_item(item) {
	//alert("pu");
	// change input value
	$('#country_id').val(item);
	// hide proposition list
	$('#country_list_id').hide();
	var keyword = $('#country_id').val();
	//alert("neeraj");
	$.ajax({
		url: '<?php echo site_url("patient/retunToProcedure");?>',
		type: 'POST',
		data: {keyword:keyword},
		success:function(msg){	
			//alert("neeraj");		
			var d = jQuery.parseJSON(msg);
        	if((d.name.length > 2) || (d.gender.length > 0)){
        		//$("#stuId1").val(d.id);
        		$("#p_id").val(d.p_id);
            	$("#p_name").val(d.name);
            	$("#gender").val(d.gender);
            	
            	$("#address").val(d.address);
            	$("#mobile").val(d.mobile);
            	$("#weight").val(d.weight);
            	$("#bp").val(d.bp_level);
            	$("#comon").val(d.detail);            	
            	$("#procedure_name").val(d.procedure_name);
            	$("#procedure_fee").val(d.procedure_fee);
            	$("#previous_due").val(d.current_due);
            	$("#current_due").val("0");
            	$("#pf").val(d.procedure_fee);
            	$("#pb").val(d.current_due);
            	$("#paid").val("");
            	$("#date").val(d.date);

            	if((d.procedure_name.length > 1) || (d.procedure_fee.length > 1)){
            		$("#procedure_fee").keyup(function(){
            			$("#pf").val($("#procedure_fee").val());
                    });
					$("#p_name").attr("disabled", "disabled");
			    	$("#gender").attr("disabled", "disabled");
			    	
			    	$("#address").attr("disabled", "disabled");
			    	$("#mobile").attr("disabled", "disabled");
	            	$("#procedure_fee").attr("disabled", "disabled");
	            	$("#previous_due").attr("disabled", "disabled");
            	}
            	
        	}else{
        		$("#p_id").val("");
        		$("#p_name").val("");
            	$("#gender").val("");
            	
            	$("#address").val("");
            	$("#mobile").val("");
            	$("#weight").val("");
            	$("#bp").val("");
            	$("#comon").val("");
            	$("#procedure_name").val("");
            	$("#procedure_fee").val("");
            	$("#previous_due").val("");
            	$("#current_due").val("");
            	$("#discount_rate").val("");
            	$("#discount_amount").val("");
            	$("#paid").val("");
            	$("#date").val("");
        	}
		}
	});
	$.ajax({
		url: '<?php echo site_url("patient/procedureList");?>',
		type: 'POST',
		data: {keyword:keyword},
		success:function(msg){
			$("#pList").html(msg);
		}
	});
}

function getAge(birth) {
	 
    var today = new Date();
    var nowyear = today.getFullYear();
    var nowmonth = today.getMonth();
    var nowday = today.getDate();
 
    var birthyear = birth.getFullYear();
    var birthmonth = birth.getMonth();
    var birthday = birth.getDate();
 
    var age = nowyear - birthyear;
    var age_month = nowmonth - birthmonth;
    var age_day = nowday - birthday;
    
    if(age_month < 0 || (age_month == 0 && age_day <0)) {
            age = parseInt(age) -1;
        }
    
    $("#age").val(age + " Years, " + age_month + " Month, " + age_day + " Days");
}
</script>