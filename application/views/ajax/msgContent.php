					
                                <div class="panel-body mailbox-content">
                                    <div class="message-header">
                                        <h3><span>Subject: </span> <?php echo $row->subject;?></h3>
                                        <p class="message-date"><?php echo date("d/m/Y",strtotime($row->send_date));?></p>
                                    </div>
                                    <div class="message-sender">
                                        <img src="<?php echo base_url();?>assets/images/docImg/<?php echo $sender->logo;?>" alt="">
                                        <p><?php echo $sender->head_name;?> <span>&lt;<?php echo $sender->username;?>&gt;</span></p>
                                    </div>
                                    <div class="message-content">
                                        <?php echo $row->message; ?>
                                    </div>
                                    <!-- 
                                    <div class="message-options pull-right">
                                        <a href="compose.html" class="btn btn-default"><i class="fa fa-reply m-r-xs"></i>Reply</a> 
                                        <a href="#" class="btn btn-default"><i class="fa fa-arrow-right m-r-xs"></i>Forward</a>
                                        <a href="#" class="btn btn-default"><i class="fa fa-exclamation-circle m-r-xs"></i>Spam</a> 
                                        <a href="#" class="btn btn-default"><i class="fa fa-trash m-r-xs"></i>Delete</a> 
                                    </div>
                                     -->
                                </div>