                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                            	<div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Paid By</th>
                                                <th>Recieved By</th>
                                                <th>Reason</th>
                                                <th>Dabit/Dradit</th>
                                                <th>Paid Amount</th>
                                                <th>Closing Balance</th>
                                                <th>Pay Date</th>
                                                <th>Pay Mode</th>
                                                <th>Invoice No</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i = 1; foreach($table->result() as $row):?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row->paid_by; ?></td>
                                                <td><?php echo $row->paid_to; ?></td>
                                                <td><?php echo $row->reason; ?></td>
                                                <td><?php echo $row->dabit_cradit; ?></td>
                                                <td><?php echo $row->paid_amount; ?></td>
                                                <td><?php echo $row->closing_balance; ?></td>
                                                <td><?php echo date("d-M-Y", strtotime($row->pay_date)); ?></td>
                                                <td><?php echo $row->pay_mode; ?></td>
                                                <td><?php echo $row->invoice_no; ?></td>
                                            </tr>
                                            <?php $i++; endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->