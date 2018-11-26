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
		
		$("#p_name").removeAttr("disabled");
    	$("#gender").removeAttr("disabled");
    	$("#dob").removeAttr("disabled");
    	$("#age").removeAttr("disabled");
    	$("#address").removeAttr("disabled");
    	$("#mobile").removeAttr("disabled");

    	$("#p_id").val("");
		$("#p_name").val("");
    	$("#gender").val("");
    	$("#dob").val("");
    	$("#age").val("");
    	$("#address").val("");
    	$("#mobile").val("");
    	$("#weight").val("");
    	$("#bp").val("");
    	$("#comon").val("");
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
        		$("#p_id").val(d.p_id);
            	$("#p_name").val(d.name);
            	//document.getElementById('gender').value() = d.gender;
            	$("#gender").val(d.gender);
            	
            	
            	$("#address").val(d.address);
            	$("#mobile").val(d.mobile);
            	$("#weight").val(d.weight);
            	$("#bp").val(d.bp_level);
            	$("#comon").val(d.detail);


				$("#p_name").attr("disabled", "disabled");
		    	$("#gender").attr("disabled", "disabled");
		    	
		    	$("#address").attr("disabled", "disabled");
		    	$("#mobile").attr("disabled", "disabled");
        	}else{
        		$("#p_id").val("");
        		$("#p_name").val("");
            	$("#gender").val("");
            	$("#dob").val("");
            	$("#age").val("");
            	$("#address").val("");
            	$("#mobile").val("");
            	$("#weight").val("");
            	$("#bp").val("");
            	$("#comon").val("");
        	}
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