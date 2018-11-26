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
        
        <!--  List Table Js -->
        
        <script src="<?php echo base_url()?>assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <!--  List End -->
        
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="<?php echo base_url()?>assets/js/modern.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/pages/form-elements.js"></script>
        
<script>
	jQuery(document).ready(function() {
		$("#extQ").hide();
	
		$("#bill_no").keyup(function(){
			var bill_no = $("#bill_no").val();	
			$.post("<?php echo site_url("enterStockController/checkBillNumber") ?>", {bill_no : bill_no}, function(data){		
				$("#checkbill").html(data);
			});

		});
		
		$("#itemNo").keyup(function(){
			var itemNo = $("#itemNo").val();
			//alert(itemNo);
			$.post("<?php echo site_url("ajaxSale/checkStock") ?>",{itemNo : itemNo}, function(data){
				var d = jQuery.parseJSON(data);
				$("#msg").html(d.msg);
				if(d.itemName.length > 0){
					$("#itemName").val(d.itemName);
				}
				$("#itemCompanyName").val(d.company_name);
				$("#discription").val(d.discription);
				$("#packing").val(d.packing);
				$("#itemSize").val(d.size_power);
				$("#unitPrice").val(d.prize_perunit);
				$("#pRate").val(d.pRate);
				$("#batchNo").val(d.batch_no);
				$("#mfgDate").val(d.mf_date);
				$("#expDate").val(d.exp_date);
				$("#free").val(d.free);
				$("#itemQuantity").val(d.item_quantity);
				$("#extraQuantity").val(d.extraQuantity);
				$("#billNumber").val(d.reff_bill_num);
				if(d.item_quantity > 0){
					$("#extQ").show();
					$("#itemQuantity").setAttribute();
				}else{
					$("#extQ").hide();
				}
			});
			
		});

		<?php $i = 1; for($i = 1; $i<=30; $i++){ ?>

		
		<?php if($i != 1 && $i != 2 && $i != 3 && $i != 4){?>
			$("#row<?php echo $i;?>").hide();
		<?php }?>

		$('#add<?php echo $i; ?>').click(function(){
			$("#row<?php echo $i+1;?>").show();
			$("#add<?php echo $i;?>").hide();
			$("#del<?php echo $i;?>").hide();
		});

		<?php if($i != 4){?>
			$('#del<?php echo $i; ?>').click(function(){
				$("#row<?php echo $i;?>").hide();
				$("#add<?php echo $i-1;?>").show();
				$("#del<?php echo $i-1;?>").show();
				$('#item_name<?php echo $i; ?>').val("");
				$('#item_comp<?php echo $i; ?>').val("");
				$('#item_size<?php echo $i; ?>').val("");
				$('#item_price<?php echo $i; ?>').val("");
				$('#unit<?php echo $i; ?>').val("");
				$('#total_price<?php echo $i; ?>').val("");
				$('#sub_total<?php echo $i; ?>').val("");
				$('#discount<?php echo $i; ?>').val("");
				$('#item_quantity<?php echo $i; ?>').val("");
				$('#item_discount<?php echo $i; ?>').val("");
				$('select#item_no<?php echo $i; ?> option[value=""]').attr("selected",true);
			});
		<?php }?>

		$( "#item_name<?php echo $i; ?>" ).autocomplete({
	    	source: '<?php echo site_url("ajaxSale/getData/?");?>',
	    	close: function(){
				var name = $("#item_name<?php echo $i;?>").val();
				$.post("<?php echo site_url("ajaxSale/getItemData") ?>", {name : name}, function(data){		
					var d = jQuery.parseJSON(data);				
					 $('#item_no<?php echo $i; ?>').val(d.itemNo);
					 $('#avlQ<?php echo $i; ?>').val(d.avlQ);
					 $('#packing<?php echo $i; ?>').val(d.packing);
					 $('#batch<?php echo $i; ?>').val(d.batch_no);
					 $('#expDt<?php echo $i; ?>').val(d.exp_date);
					 $('#item_price<?php echo $i; ?>').val(d.prize_perunit);
				});
			}
	    });				
		
		$('input#item_quantity<?php echo $i; ?>').keyup(function(){
				var a = 0;
				var name = $('#item_price<?php echo $i; ?>').val();
				var name1 = $('#item_quantity<?php echo $i; ?>').val();
				var avlQ = $('#avlQ<?php echo $i; ?>').val();
				var total = name * name1;
				document.getElementById('total_price<?php echo $i; ?>').value=total;
				document.getElementById('sub_total<?php echo $i; ?>').value=total;
				if(name1 > avlQ){
					$('#item_quantity<?php echo $i; ?>').val('');
					document.getElementById('total_price<?php echo $i; ?>').value=0;
					document.getElementById('sub_total<?php echo $i; ?>').value=0;
				}
		});
		
		$('input#item_discount<?php echo $i; ?>').keyup(function(){
				var name = $('#total_price<?php echo $i; ?>').val();
				var name1 = $('#item_discount<?php echo $i; ?>').val();
				
				var dis = (name1 * name)/100;
				var total = name - dis;
				document.getElementById('total_price<?php echo $i; ?>').value=name;
				document.getElementById('sub_total<?php echo $i; ?>').value=total;
				document.getElementById('discount<?php echo $i; ?>').value=dis;
		});
		

		$( "#itemName<?php echo $i; ?>" ).autocomplete({
	    	source: '<?php echo site_url("ajaxSale/getEnterStockData/?");?>',
	    	close: function(){
				var name = $("#itemName<?php echo $i; ?>").val();
				$.post("<?php echo site_url("ajaxSale/checkStockByName1") ?>",{name : name}, function(data){
					var d = jQuery.parseJSON(data);
					$("#msg").html(d.msg);
					$("#itemNo<?php echo $i; ?>").val(d.itemNo);
					$("#itemCompanyName<?php echo $i; ?>").val(d.company_name);
					$("#unitPrice<?php echo $i; ?>").val(d.prize_perunit);
					$("#pRate<?php echo $i; ?>").val(d.pRate);
					$("#itemQuantity<?php echo $i; ?>").val(d.item_quantity);
					if(d.item_quantity > 0){
						$("#extQ<?php echo $i; ?>").show();
						$("#itemQuantity<?php echo $i; ?>").setAttribute();
					}else{
						$("#extQ<?php echo $i; ?>").hide();
					}
				});
			}
	    });

		$("#save<?php echo $i; ?>").click(function(){
			var bill_no = $('#bill_no').val();
			var itemNo = $('#itemNo<?php echo $i; ?>').val();
			var itemName = $('#itemName<?php echo $i; ?>').val();
			var itemCompanyName = $('#itemCompanyName<?php echo $i; ?>').val();
			var pRate = $('#pRate<?php echo $i; ?>').val();
			var unitPrice = $('#unitPrice<?php echo $i; ?>').val();
			var itemQuantity = $('#itemQuantity<?php echo $i; ?>').val();
			var extraQuantity = $('#extraQuantity<?php echo $i; ?>').val();
			$.post("<?php echo site_url("enterStockController/enterStock") ?>", {itemNo : itemNo,bill_no : bill_no,itemName : itemName,itemCompanyName : itemCompanyName, pRate : pRate,unitPrice : unitPrice,itemQuantity : itemQuantity, extraQuantity : extraQuantity}, function(data){		
				$("#save<?php echo $i; ?>").html(data);
			});


			});

	    
		<?php } ?>
		
		
	});
</script>