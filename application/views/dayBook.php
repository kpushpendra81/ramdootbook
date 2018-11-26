			<?php $balance = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row()->closing_balance; ?>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>account/dayBookDetail" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Start Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="sdt" class="form-control date-picker" placeholder="Start Date" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">End Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="edt" class="form-control date-picker" placeholder="End Date" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Select Branch</label>
                                            <div class="col-sm-4">
                                                <select name="branchId" class="form-control" required="required">
													<option value="">-Select Branch-</option>
													<?php 
														$courses = $this->db->get("general_settings")->result();
														foreach($courses as $row):
													?>
														<option value="<?php echo $row->clinic_id;?>"><?php echo $row->cilnic_name;?> (<?php echo $row->clinic_id;?>)</option>
													<?php endforeach;?>
													<option value="all">All</option>
												</select>
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Dabit/Cradit</label>
                                            <div class="col-sm-4">
                                                <select  class="form-control" name="drCr" required="required">
			                                    	<option value="">-Select Dabit/Cradit-</option>
			                                    	<option value="all">Both</option>
			                                    	<option value="dabit">Dabit</option>
			                                    	<option value="cradit">Cradit</option>
			                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" id="btn1" class="btn btn-success">Get Detail</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
