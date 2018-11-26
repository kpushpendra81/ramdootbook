							<?php 
								$this->db->where("reciever_id",$this->session->userdata("username"));
								$this->db->where("open",'n');
								$msg = $this->db->get("message");
							?>
							<ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success pull-right"><?php echo $msg->num_rows(); ?></span></a>
                                    <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                        <li><p class="drop-title">You have <?php echo $msg->num_rows(); ?> new messages !</p></li>
                                        <li class="dropdown-menu-list slimscroll messages">
                                            <ul class="list-unstyled">
                                            	<?php 
                                            		foreach($msg->result() as $row):
                                            		$this->db->where("username",$row->sender_id);
                                            		$sender = $this->db->get("general_settings")->row();
                                            	?>
                                                <li>
                                                    <a href="<?php echo base_url()?>apanel/message">
                                                        <div class="msg-img">
                                                        	<div class="online on">
                                                        </div>
                                                        <img class="img-circle" src="<?php echo base_url();?>assets/images/docImg/<?php echo $sender->logo;?>" alt=""></div>
                                                        <p class="msg-name"><?php echo $sender->head_name;?></p>
                                                        <p class="msg-text">
                                                        	<?php 
				                                            	echo str_replace("<h2>"," ",implode(' ', array_slice(explode(' ', $row->message), 0, 4)));
				                                            ?>
                                                        </p>
                                                        <p class="msg-time">
                                                        	<?php 
	                                                        	$a = new DateTime($row->send_time);
	                                                        	$b = new DateTime();
	                                                        	$interval = $a->diff($b);
	                                                        	
	                                                        	echo $interval->format("%H:%i:%s");
                                                        	?>
                                                        </p>
                                                    </a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <li class="drop-all"><a href="<?php echo base_url()?>apanel/message" class="text-center">All Messages</a></li>
                                    </ul>
                                </li>
                                <!-- 
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-success pull-right">3</span></a>
                                    <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                        <li><p class="drop-title">You have 3 pending tasks !</p></li>
                                        <li class="dropdown-menu-list slimscroll tasks">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">1min ago</span>
                                                        <p class="task-details">New user registered.</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-danger"><i class="icon-energy"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">24min ago</span>
                                                        <p class="task-details">Database error.</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-info"><i class="icon-heart"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">1h ago</span>
                                                        <p class="task-details">Reached 24k likes</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
                                    </ul>
                                </li>
                                 -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><?php echo $this->session->userdata("head_name");?><i class="fa fa-angle-down"></i></span>
                                        <img class="img-circle avatar" src="<?php echo base_url();?>assets/images/docImg/<?php echo $this->session->userdata("photo");?>" width="40" height="40" alt="">
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="<?php echo base_url();?>apanel/profile"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="<?php echo base_url();?>apanel/changePass"><i class="fa fa-key"></i>Change Password</a></li>
                                        <li role="presentation"><a href="<?php echo base_url();?>apanel/message"><i class="fa fa-envelope"></i>Inbox<span class="badge badge-success pull-right">4</span></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a href="<?php echo base_url();?>login/lockPage"><i class="fa fa-lock"></i>Lock screen</a></li>
                                        <li role="presentation"><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                                <?php if($this->session->userdata("login_type") == "admin"){?>
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic" id="showRight">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </li>
                                <?php }?>
                            </ul><!-- Nav -->