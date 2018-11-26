<?php 
	$this->db->where("closing_date",date("Y-m-d"));
	$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
	$val = $this->db->get("opening_closing_balance")->row();
	
	$dabit = $this->db->query("SELECT SUM(paid_amount) as totalD FROM day_book WHERE dabit_cradit = 'dabit' AND pay_date = '".date("Y-m-d")."' AND clinic_id = '".$this->session->userdata("clinic_id")."'")->row();
	$cradit = $this->db->query("SELECT SUM(paid_amount) as totalC FROM day_book WHERE dabit_cradit = 'cradit' AND pay_date = '".date("Y-m-d")."' AND clinic_id = '".$this->session->userdata("clinic_id")."'")->row();
	
	//$this->db->where("clinic_id",$this->session->userdata("clinic_id"));
	//$this->db->where("t_date",date("y-m-d"));
	//$num = $this->db->get("treatement")->num_rows();
?>
                <div id="main-wrapper" class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php  ?></p>
                                        <span class="info-box-title">Total Todays Customer Visits</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-users"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo $cradit->totalC;?></p>
                                        <span class="info-box-title">Todays Total Earning</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p><span class="counter"><?php echo $dabit->totalD;?></span></p>
                                        <span class="info-box-title">Todays Total Expence</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo $val->closing_balance;?></p>
                                        <span class="info-box-title">Closing Balance</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="info-box-progress">
                                        <div class="progress progress-xs progress-squared bs-n">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                    <div class="row">
                    	<div class="col-lg-5 col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Weather</h4>
                                    <div class="panel-control">
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="weather-widget">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="weather-top">
                                                    <div class="weather-current pull-left">
                                                        <i class="wi wi-day-cloudy weather-icon"></i>
                                                        <p><span><?php echo rand(25,35)?><sup>&deg;C</sup></span></p>
                                                    </div>
                                                    <h2 class="weather-day pull-right">Kanpur, UP<br><small><b><?php echo date("d, M, Y");?></b></small></h2>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-unstyled weather-info">
                                                    <li>Wind <span class="pull-right"><b>ESE 16 mph</b></span></li>
                                                    <li>Humidity <span class="pull-right"><b>64%</b></span></li>
                                                    <li>Pressure <span class="pull-right"><b>30.15 in</b></span></li>
                                                    <li>UV Index <span class="pull-right"><b>6</b></span></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-unstyled weather-info">
                                                    <li>Cloud Cover <span class="pull-right"><b>60%</b></span></li>
                                                    <li>Ceiling <span class="pull-right"><b>17800 ft</b></span></li>
                                                    <li>Dew Point <span class="pull-right"><b>70&deg; F</b></span></li>
                                                    <li>Visibility <span class="pull-right"><b>10 mi</b></span></li>
                                                </ul>
                                            </div>
                                            <?php $dt = date("Y-m-d"); ?>
                                            <div class="col-md-12">
                                                <ul class="list-unstyled weather-days row">
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+1 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+2 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+3 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+4 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+5 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                    <li class="col-xs-4 col-sm-2">
                                                    	<span><?php echo date("d,M",strtotime($dt."+6 day"));?></span>
                                                    	<i class="wi wi-day-cloudy"></i>
                                                    	<span><?php echo rand(25,35)?><sup>&deg;C</sup></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Inbox</h4>
                                    <div class="panel-control">
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="inbox-widget slimscroll">
                                    	<?php 
                                    		$this->db->where("reciever_id",$this->session->userdata("username"));
                                    		$mail = $this->db->get("message");
                                    		$i = 1;
                                    		foreach($mail->result() as $row):
                                    			if($i <= 10):
                                    			$this->db->where("username",$row->sender_id);
                                    			$val = $this->db->get("general_settings")->row();
                                    	?>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="<?php echo base_url();?>assets/images/docImg/<?php echo $val->logo;?>" class="img-circle" alt=""></div>
                                                <p class="inbox-item-author"><?php echo $val->head_name;?></p>
                                                <p class="inbox-item-text">
                                                	<?php 
		                                            	echo str_replace("<h2>"," ",implode(' ', array_slice(explode(' ', $row->message), 0, 10)));
		                                            ?>
                                                </p>
                                                <p class="inbox-item-date"><?php echo date("d M",strtotime($row->send_date));?></p>
                                            </div>
                                        </a>
                                        	<?php 
                                        		endif;	
                                        	endforeach;
                                        	?>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="row">
                        <div class="col-lg-9 col-md-12">
                            <div class="panel panel-white">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="visitors-chart">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Visitors</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div id="flotchart1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="stats-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Browser Stats</h4>
                                            </div>
                                            <div class="panel-body">
                                                <ul class="list-unstyled">
                                                    <li>Google Chrome<div class="text-success pull-right">32%<i class="fa fa-level-up"></i></div></li>
                                                    <li>Firefox<div class="text-success pull-right">25%<i class="fa fa-level-up"></i></div></li>
                                                    <li>Internet Explorer<div class="text-success pull-right">16%<i class="fa fa-level-up"></i></div></li>
                                                    <li>Safari<div class="text-danger pull-right">13%<i class="fa fa-level-down"></i></div></li>
                                                    <li>Opera<div class="text-danger pull-right">7%<i class="fa fa-level-down"></i></div></li>
                                                    <li>Mobile &amp; tablet<div class="text-success pull-right">4%<i class="fa fa-level-up"></i></div></li>
                                                    <li>Others<div class="text-success pull-right">3%<i class="fa fa-level-up"></i></div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-white" style="height: 100%;">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Server Load</h4>
                                    <div class="panel-control">
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Expand/Collapse" class="panel-collapse"><i class="icon-arrow-down"></i></a>
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="server-load">
                                        <div class="server-stat">
                                            <span>Total Usage</span>
                                            <p>67GB</p>
                                        </div>
                                        <div class="server-stat">
                                            <span>Total Space</span>
                                            <p>320GB</p>
                                        </div>
                                        <div class="server-stat">
                                            <span>CPU</span>
                                            <p>57%</p>
                                        </div>
                                    </div>
                                    <div id="flotchart2"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <div class="container">
                        <p class="no-s">2015 &copy; Pain Clinic Varanasi.</p>
                    </div>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
	

