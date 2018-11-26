<?php $balance = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row()->closing_balance; ?>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                <?php if($this->uri->segment(3) == "true"):?>
                                	<div class="alert alert-success" role="alert">
                                        Record Save succesfully. For more detail goto daybook detail.....
                                    </div>
                                <?php endif; ?>
                                    <form class="form-horizontal" action="<?php echo base_url()?>account/dailyExpense" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Paid Person Name</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="name" placeholder="Paid Person Name" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Paid Reason</label>
                                            <div class="col-sm-10">
                                            	<input class="form-control" type="text" name="reason" placeholder="Reason Paying amount" required="required">
                                            </div>
                                        </div>
                                        <?php if($balance > 0): ?>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Paid Amount</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="paid" id="paid" placeholder="Paid Amount" required="required">
                                            </div>
                                            <label class="col-sm-2 control-label">Balance Amount</label>
                                            <label class="col-sm-2 control-label" style="color:green;">
                                            	<i class="fa fa-inr"></i> 
                                            	<?php echo $balance; ?>
                                            </label>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                            	<input type="hidden" id="balance" name="balance" value="<?php echo $balance; ?>">
                                                <button type="submit" id="btn1" class="btn btn-success">Save Expense Detail</button>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="form-group">
                                            <label style="color:red;">
                                            	<b> There is not enough balance in account. Sorry....... :'( </b>
                                            </label>
                                        </div>
                                        <?php endif;?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->