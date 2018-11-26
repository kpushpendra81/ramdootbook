<div class="container">
	<div class="row">
			<div class="col-sm-12">
				<!-- start: FORM WIZARD PANEL -->
				<div class="panel panel-white">
					<div class="panel-heading">
						<h4 class="panel-title">Search  <span class="text-bold">Customer</span></h4>
					</div>
					<div class="panel-body">
						<div id="wizard" class="swMain">
							<div class="form-group">
								<div class="col-sm-10">
									<label class="col-sm-2 control-label">
										Customer Name/ID  <span class="symbol required"></span>
									</label>
									<div class="col-sm-10">
	                                    <input type="text" class="form-control"  id="country_id" onkeyup="autocomplet()" placeholder="Customer Name/ID" required="required" />
	                                    <ul style="list-style: none; padding:0px;" id="country_list_id"></ul>
	                                </div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div>
	  </div>
		<!-- end: FORM WIZARD PANEL -->
	</div>
	<form action="<?php echo base_url();?>patient/newCustomer"  method ="post" role="form" class="form-horizontal" id="form">
		<div class="row">
			<div class="col-sm-12">
				<!-- start: FORM WIZARD PANEL -->
				<div class="panel panel-white">
					<div class="panel-heading">
						<h4 class="panel-title">Customer  <span class="text-bold">Information</span></h4>
					</div>
					<div class="panel-body" id="list">
						<!-- Here Customer history list will showing -->
					</div>
				</div>
			</div>
		<div>
	  </div>
		<!-- end: FORM WIZARD PANEL -->
	</div>				
	</form>
</div>
				
