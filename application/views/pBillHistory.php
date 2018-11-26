					 <div class="portlet light ">
                                        
					<div class="portlet-body">
                                            <div class="table-toolbar">
                                                
                                                    <div class="col-md-6">
                                                        <div class="btn-group pull-right">
                                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-print"></i> Print </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                        	<tr>
                                            	<th>#</th>
                                               
                                                <th>Company OR Dealer Name</th>
                                                <th>Mobile</th>
                                                <th>Product Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Smount Paid</th>
                                                <th>Balance</th>
                                                <th>Pay Mode</th>
                                                <th>Date</th>
                                                <th>Bill Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        	$i = 1; foreach($pBillInfo as $row):
                                        ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                               
                                                <td><?php echo $row->product_company_name;?></td>
                                                <td><?php echo $row->dealar_mobile1;?></td>
                                                <td><?php echo $row->product_quantity;?></td>
                                                <td><?php echo $row->total_prize;?></td>
                                                <td><?php echo $row->amount_paid;?></td>
                                                <td><?php echo $row->balance?></td>
                                                <td><?php echo $row->pay_mode;?></td>
                                                <td><?php echo date("d-M-Y",strtotime($row->date1));?></td>
                                                <td><a href="<?php echo base_url();?>invoiceController/printPurchaseReciept/<?php echo $row->reff_bil_num;?>"><?php echo $row->reff_bil_num;?></a></td>
                                            </tr>
                                        <?php $i++; endforeach;?>
                                        </tbody>
                                       </table>  
                                    </div>
                                    </div>
                                    
                              