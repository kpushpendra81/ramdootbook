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

				
				$( "#companyName" ).autocomplete({
					
			    	source: '<?php echo site_url("ajaxSale/getEnterbilldata/?");?>',
			    	close: function(){
						var name = $("#companyName").val();
						$.post("<?php echo site_url("ajaxSale/enterCompanyName") ?>",{name : name}, function(data){
							var d = jQuery.parseJSON(data);
							$("#msg").html(d.msg);
							$("#daddress").val(d.dealer_address);
							$("#demail").val(d.dealer_email);
							$("#mobile1").val(d.dealar_mobile1);
							$("#mobile2").val(d.dealar_mobile1);
							$("#tin").val(d.tin_no);
						
						
						});
					}
			    });
				
				
			
				
				
				$('input#amount_paid').keyup(function(){
					var total_prize = Number($('#total_prize').val());
					var amount_paid = Number($('#amount_paid').val());
					var bal = total_prize - amount_paid;
					
					$("#balance").val(bal);
				});	


				
				
				$("#bill_no").keyup(function(){
					var bill_no = $("#bill_no").val();	
					$.post("<?php echo site_url("enterStockController/checkBillNumber") ?>", {bill_no : bill_no}, function(data){		
						$("#checkbill").html(data);
					});

				});
				
				
				
				});

			
		</script>