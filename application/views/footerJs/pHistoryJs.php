	<!-- Javascripts -->
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
        <script src="<?php echo base_url()?>assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url()?>assets/js/modern.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/pages/table-data.js"></script>

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
    	$("#list").html("");
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
		url: '<?php echo site_url("patient/patientHistoryList");?>',
		type: 'POST',
		data: {keyword:keyword},
		success:function(data){
        	$("#list").html(data);
		}
	});
}
</script>