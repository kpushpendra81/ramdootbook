<?php if($this->session->userdata("login_type") == "admin"){?>
		<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
            <div class="slimscroll">
            	<?php
            		$chatId = 1;
					$this->db->where("is_login",true);
					$a = $this->db->get("chat");
					foreach($a->result() as $row){
						if($row->clinic_id != $this->session->userdata("clinic_id")){
							$this->db->where("clinic_id",$row->clinic_id);
							$val = $this->db->get("general_settings")->row();
				?>
							<a href="javascript:void(0);" class="showRight2" id="chatClick<?php echo $chatId;?>">
								<input type="hidden" id="chat<?php echo $chatId;?>" value="<?php echo $row->chat_id;?>" />
								<input type="hidden" id="name<?php echo $chatId;?>" value="<?php echo $val->head_name;?>" />
								<input type="hidden" id="image<?php echo $chatId;?>" value="<?php echo $val->image;?>" />
								<img src="<?php echo base_url();?>assets/images/docImg/<?php echo $val->image;?>" alt="<?php echo $val->head_name; ?>">
								<span>
									<?php echo $val->head_name;?>
									<small><?php echo $val->cilnic_name;?></small>
								</span>
							</a>
				<?php
						$chatId++;
						}
					}
				?>
				<script src="<?php echo base_url()?>assets/plugins/jquery/jquery-2.1.3.min.js"></script>
				<script>
					<?php for($i = 1;$i< $chatId; $i++){ ?>
					
						$('#chatClick<?php echo $i;?>').click(function(){
							var id = jQuery("#chat<?php echo $i;?>").val();
							var name = jQuery("#name<?php echo $i;?>").val();
							var image = jQuery("#image<?php echo $i;?>").val();
							var img = '<img src="<?php echo base_url();?>assets/images/docImg/'+image+'" alt="">';
							var chatUrl = '<IFRAME SRC="https://appr.tc/r/'+id+'" style="border: 0px;" width="100%" height="600"></iframe>';
							$("#chatName").html(name);
							$("#chatImage").html(img);
							$("#chatValue").val(chatUrl);
						});
					<?php }?>
					$("#closeRight").click(function(){
						//alert();
						$("#chatBody").html("");
					});
				</script>
             </div>
		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3>
            	<input type="hidden" id="chatValue">
            	<span class="pull-left" id="chatName"><!-- Sandra Smith  --></span>
            	<span class="glyphicon glyphicon-facetime-video" id="goForChat" data-toggle="modal" data-target=".bs-example-modal-lg12"></span>
            	<span class="pull-left" id="vChatId"><!-- Vedio Chat Link  --></span> 
            	<a href="javascript:void(0);" class="pull-right" id="closeRight2">
            		<i class="fa fa-angle-right"></i>
            	</a>
            </h3>
            <div class="slimscroll chat">
                <div class="chat-item chat-item-left">
                    <div class="chat-image" id="chatImage">
                        <!-- Image will be set by jQuery -->
                    </div>
                    <div class="chat-message">
                        Hi There!
                    </div>
                </div>
            </div>
            <div class="chat-write">
                <form class="form-horizontal" action="javascript:void(0);">
                    <input type="text" class="form-control" placeholder="Say something">
                </form>
            </div>
		</nav>
		
<!-- --------------------------------------------------------------------   -->
                                            <div class="modal fade bs-example-modal-lg12" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" id="close123" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myLargeModalLabel">Video Window</h4>
                                                        </div>
                                                        <div class="modal-body" id='chatBody'>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<script>
$('#goForChat').click(function(){
	var chatValue = $("#chatValue").val();
	//alert("abc");
	$("#chatBody").html(chatValue);
});
$("#close123").click(function(){
	$("#chatBody").html("");
	//alert();
});
$("#closeRight2").click(function(){
	//alert();
	$("#chatBody").html("");
});
</script>
<?php } // End Main If?>