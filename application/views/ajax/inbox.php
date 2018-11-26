						<div class="panel-body mailbox-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="1" class="hidden-xs">
                                            <span><input type="checkbox" class="check-mail-all"></span>
                                        </th>
                                        <th colspan="5">
                                        	<div class="row">
                                        		<div class="col-md-5">
                                        			<span class="center" id="ms"></span>
                                        		</div>
                                        		<div class="col-md-7 text-right">
                                        			<span class="text-muted m-r-sm">
		                                            	<?php $num = $value->num_rows();?>
		                                            	Showing <?php if($num > 20){ echo 20; }else{ echo $num; }?> of <?php echo $num;?> 
		                                            </span>
		                                            <a class="btn btn-default m-r-sm" data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
		                                            <div class="btn-group m-r-sm mail-hidden-options">
		                                                <a class="btn btn-default" data-toggle="tooltip" id="del" data-placement="top" title="Delete">
		                                                	<i class="fa fa-trash"></i>
		                                                </a>
		                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Report Spam">
		                                                	<i class="fa fa-exclamation-circle"></i>
		                                                </a>
		                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Mark as Important">
		                                                	<i class="fa fa-star"></i>
		                                                </a>
		                                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Mark as Read">
		                                                	<i class="fa fa-pencil"></i>
		                                                </a>
		                                            </div>
		                                            <?php if($num > 20): ?>
		                                            <div class="btn-group">
		                                                <a class="btn btn-default"><i class="fa fa-angle-left"></i></a>
		                                                <a class="btn btn-default"><i class="fa fa-angle-right"></i></a>
		                                            </div>
		                                            <?php endif; ?>
                                        		</div>
                                        	</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($value->result() as $row):?>
                                    <tr class="<?php if($row->open == "n"){ echo "unread";}else{ echo "read";}?>" title="<?php echo $row->id;?>">
                                        <td class="hidden-xs" title="<?php echo $row->id;?>">
                                            <span><input type="checkbox" name="rowsId" value="<?php echo $row->id;?>" class="checkbox-mail"></span>
                                        </td>
                                        <td class="hidden-xs" title="<?php echo $row->id;?>">
                                            <i class="fa fa-star icon-state-warning"></i>
                                        </td>
                                        <td class="hidden-xs" title="<?php echo $row->id;?>">
                                            <?php echo $row->subject;?>
                                        </td>
                                        <td title="<?php echo $row->id;?>">
                                            <?php 
                                            	echo str_replace("<h2>"," ",implode(' ', array_slice(explode(' ', $row->message), 0, 10)));
                                            ?>
                                        </td>
                                        <td>
                                        </td>
                                        <td title="<?php echo $row->id;?>">
                                            <?php echo date("d M",strtotime($row->send_date));?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            </div>
                            
        <script src='<?php echo base_url();?>js/msgDetailJs.jsp' type='application/javascript'></script>