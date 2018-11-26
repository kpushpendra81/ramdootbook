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
					<div class="panel-body">
						<div><?php 
								if($this->uri->segment(3) == 'success'){
									$msg = $this->uri->segment(3); 
							?>
								<div class="alert alert-success" role="alert">
	                                 Well done! You successfully  Customer detail.
	                            </div>
							<?php }?>
							</div>
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Customer Name  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="hidden" id="p_id" name="p_id" value="" />
										<input type="text" class="form-control" id="p_name" name="p_name" placeholder="Customer Name" required="required" />
									</div>	
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Gender  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<select class="form-control m-b-sm" id="gender" name="gender" required="required">
											<option value="">-Select Gender-</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="company">Company</option>
										</select>
									</div>
								</div>
							</div>
							
								
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
									Address  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="address" name="address" placeholder="Address" required="required" />
									</div>
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Mobile Number <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number"  />
									</div>
								</div>
							</div>	
								
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Phone Number  <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="weight" name="weight" placeholder="Enter Phone Number"  >
									</div>
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Tin number <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="bp" name="bp" placeholder="Enter tin number" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										GST NO. <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="weight" name="gst" placeholder="Enter GST Number"  >
									</div>
								</div>
								</div>
							
							<!-- 
							<div>
								<div class="col-sm-12">
									<label class="col-sm-2 control-label">
										Basic Treatement <span class="symbol required"></span>
									</label>
									<div class="col-sm-10">
										<textarea class="summernote" id="basic" name="basic"></textarea>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-10">
									<label class="col-sm-2 control-label">
										Customer Disease Detail <span class="symbol required"></span>
									</label>
									<div class="col-sm-10">
										<textarea class="form-control summernote" id="pd" name="pd" placeholder="Customer Disease Detail" required="required" >
										</textarea>
									</div>
								</div>
							</div>
							 -->
					</div>
					<div class="form-group">
						<div class="form-group">
								<div class="col-sm-6" align="right">
									<button type="submit" name="saveO" value="saveO" class="btn btn-success">
										Save Only
									</button>
								</div>
								
							</div>
					</div>
				</div>
			</div>
		<div>
	  </div>
		<!-- end: FORM WIZARD PANEL -->
	</div>				
	</form>
</div>
				