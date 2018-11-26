<div id="main-wrapper" class="container" style="width:100%; font-size:12px;">
	<form action="<?php echo base_url();?>invoiceController/editBillDetail"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
	<div class="row">
		<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
			<div class="panel panel-white">
				<div class="panel-body"  >
					<div class="row space20">
						<div class="col-sm-12">
							<label class="col-sm-4 control-label">
								<strong>Bill Number</strong><span class="symbol required"></span>
							</label>
							<div class="col-sm-4">
								<input class="form-control" value="<?php echo $this->uri->segment(4);?>" placeholder="Please Enter Bill Number" type="text" name="billNo"/>
							</div>
							<div class="col-sm-4">
								<input class="btn btn-success" value="Get Bill" type="submit" />
							</div>
						</div>
					</div>	
					<div class="row space20">
						<div class="col-sm-12">
							<?php if($this->uri->segment(3) == "false"):?>
								<font color="red">This Bill Number is not Correct. Please enter correct bill Number....</font>
							<?php endif;?>
						</div>
					</div>			
				</div>
			</div>
		</div>
	</div>
	</form>
</div>