			<div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner">
                    <ul class="menu accordion-menu">
                        <li class="nav-heading"><span>Navigation</span></li>
                        <li class="active"><a href="<?php echo base_url();?>apanel/"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li class="droplink">
                        	<a href="#">
                        		<span class="icon icon-users"></span>
                        		<p>&nbsp;&nbsp;&nbsp;Customer</p>
                        		<span class="arrow"></span>
                        	</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>patient/searchNewPatient.jsp">Search/New Customer</a></li>
                                <li><a href="<?php echo base_url();?>patient/patientHistory.jsp">Customer Record</a></li>
                               
                            </ul>
                        </li>
                        <?php if($this->session->userdata("login_type") == "admin"){ ?>
                       
                   
                      
                        <li <?php if($this->uri->segment(2) == 'bill'){?>class="active droplink"<?php } else echo "class='droplink'";?>>
                        	<a href="#">
                        		<span class="fa fa-file-text-o"></span>
                        		<p>&nbsp;&nbsp;&nbsp;Bill</p><span class="arrow"></span>
                        	</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>home/pBillEntry.jsp">Purchase Bill Entry</a></li>
                                <li class="droplink"><a href="#"><p>Bill History</p><span class="arrow"></span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url();?>home/pBillHistory.jsp">Purchase Bill History</a></li>
                                        <li><a href="<?php echo base_url();?>home/sBillHistory.jsp">Sale Bill History</a></li>
                                        <li><a href="<?php echo base_url();?>home/tBillHistory.jsp">Tax Bill History</a></li>
                                        <li><a href="<?php echo base_url();?>home/rBillHistory.jsp">Return Bill History</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                          <li class="droplink"><a href="#"><span class="menu-icon icon-grid"></span><p>Sale</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>home/saleProduct.jsp">Sale Product(Sale Invoice)</a></li>
                                <li><a href="<?php echo base_url();?>home/saleProduct1.jsp">Sale Product (TEX Invoice)</a></li>
                          
                                <li><a href="<?php echo base_url();?>home/returnProduct.jsp">Return Product</a></li>
                                <li><a href="<?php echo base_url();?>home/editBill.jsp">Edit Bill</a></li>
                             
                            </ul>
                        </li>
                       <li <?php if($this->uri->segment(2) == 'bill'){?>class="active droplink"<?php } else echo "class='droplink'";?>>
                        	<a href="<?php echo base_url();?>apanel/studentRegister.jsp">
                        		<span class="fa fa-cubes"></span>
                        		<p>&nbsp;&nbsp;&nbsp;Product</p>
                        	</a>
                        	<ul class="sub-menu">
                               
                                <li><a href="<?php echo base_url();?>home/productDetail.jsp">Product Detail</a></li>
                              
                                 <li><a href="<?php echo base_url();?>home/replace.jsp">Product Replacement </a></li>
                                  <li><a href="<?php echo base_url();?>home/replacelist.jsp">Product Replacement Detail</a></li>
                            </ul>
                        </li>
                        <!--  
                        <li class="droplink"><a href="#"><span class="menu-icon icon-user"></span><p>Services</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>apanel/newDisease.jsp">New Services</a></li>
                                <li><a href="<?php echo base_url();?>apanel/diseaseList.jsp">Services List</a></li>
                            </ul>
                        </li>
                        -->
                        <li class="droplink"><a href="#"><span class="menu-icon icon-notebook"></span><p>DayBook</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>dayBook/dailyExpence.jsp">Daily Expence</a></li>
                                <li><a href="<?php echo base_url();?>dayBook/dbook.jsp">DayBook Detail</a></li>
                                <li><a href="<?php echo base_url();?>dayBook/rSaleList.jsp">Refrance Sale List</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li class="droplink"><a href="#"><span class="menu-icon icon-globe"></span><p>Logout</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url();?>web/query.jsp">Query/Contact List</a></li>
                                <li><a href="<?php echo base_url();?>login/logout.jsp">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->