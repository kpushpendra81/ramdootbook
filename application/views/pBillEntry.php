<form action="<?php echo base_url();?>billC/interBillInfo.jsp"  method ="post" role="form" class="form-horizontal" id="form">
	<div class="row">
		<div class="col-sm-12">
			<!-- start: FORM WIZARD PANEL -->
			<div class="panel panel-white">
				<div class="panel-heading">
					<h4 class="panel-title">Bill  <span class="text-bold">Information</span></h4>
				</div>
				<div class="panel-body">
					<div id="wizard" class="swMain">
					<div>
						<?php 
							if($this->uri->segment(3) == 'success'){
								$msg = $this->uri->segment(3); 
						?>
							<div class="alert alert-success" role="alert">
                                 Well done! You successfully insert purchase bill detail.
                            </div>
						<?php }
							if($this->uri->segment(3) == 'fail'){
						?>
							<div class="alert alert-danger" role="alert">
		                    	<strong>Somthing Going wrong please contact to developer.... Sorry for inconvenience caused...</strong>
		                   	</div>
						<?php }?>
						</div>
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Company Name or Dealer Name <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="companyName" name="companyName" required="required" />
								</div>	
							</div>
						
						</div>
						
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Company Address Or Dealer Address <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="daddress" name="daddress"  >
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Bill Date  <span class="symbol required">(yyyy-mm-dd)</span>
								</label>
								<div class="col-sm-7">
									<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control" name="billDate"  required="required"/>
								</div>
							</div>
								
						
						</div>
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Dealer Mobile 1  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="mobile1" name="mobile1" >
								</div>
								
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Dealer Mobile 2  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="mobile2" name="mobile2"  >
								</div>
								
							</div>
						</div>
							
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Bill Number  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="billNumber" name="billNumber" required="required" />
								</div>
							</div>
						
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
								GST NO. <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="number" name="gst" required="required" />
								</div>
							</div>
							</div>
							<div class="form-group">
						
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
								State code: <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="code" name="stcode" required="required" />
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
								EMail ID  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="email" name="emailid" required="required" />
								</div>
							</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
								Total Product Quantity  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="product_quantity" name="product_quantity" required="required" />
								</div>
							</div>
							
						</div>	
						<div class="form-group" id ="printT"><div class="form-group">
							<div class="col-sm-10 ">
					<script>
						$("#product_quantity").keyup(function(){
					var w = $("#product_quantity").val();
					$.post("<?php echo site_url("home/printTable") ?>",{w : w}, function(data){
						$("#printT").html(data);
						});
						});
					</script>
					 </div>
					</div>
					</div>	
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Enter CGST (%) <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="vatper" name="vatper"  >
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Enter SGST/UTGST(%)  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="satper" name="satper"   >
								</div>
								
							</div>
						</div>	
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Round off <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="roff" name="roff"   >
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Freight  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="freight" name="freight"   >
								</div>
								
							</div>
						</div>	
						<div class="form-group">
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Discount  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="discount" name="discount"  >
								</div>
							</div>
						<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Total Bill Amount  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="total_prize" name="total_prize"  required="required" >
								</div>
							</div>
						</div>
					
						<div class="form-group">
							
							
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Paid Amount  <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="amount_paid" name="amount_paid"  required="required" >
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									 Pay Mode <span class="symbol required"></span>
								</label>
								<div class="col-sm-7">
									<select class="form-control" id="payMode" name="payMode"  required="required">
										<option value="cash">Cash</option>
										<option value="OBC">Chaque</option>
									</select>
								</div>
							</div>
							
						</div>	
						<div class="form-group">
							
							
							
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Balance 
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="balance"  name="balance" >
								</div>
							</div>
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Dealer Or Company Email 
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="demail" name="demail" />
								</div>
							</div>
						</div>
							
						<div class="form-group">
						
							
							<div class="col-sm-5">
								<label class="col-sm-5 control-label">
									Discription 
								</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="discroption" name="discroption" />
								</div>
							</div>
							
						</div>
							
						
						<div class="form-group">
							<div class="col-sm-2 col-sm-offset-8">
						<button type="submit" class="btn btn-success">
							Save Bill Details
						</button>
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
</form>
			