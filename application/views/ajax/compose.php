								<div class="panel-body mailbox-content">
                                    <div class="compose-body">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="to" class="col-sm-2 control-label">To</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="to" placeholder="Enter the Login ID of Reciever..">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="to" class="col-sm-2 control-label">Subject</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="subject" placeholder="Subject title of you Mail..">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject" class="col-sm-2 control-label">Message</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="message">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="compose-message">
                                        <div class="summernote"></div>
                                    </div>
                                    <div class="compose-options">
                                        <div class="pull-right">
                                            <button class="btn btn-success" id="send">
                                            	<i class="fa fa-send m-r-xs"></i>Send</button>
                                        </div>
                                    </div>
                                </div>
                                <script>
									$("#message").summernote({
										height : 300
									});
									$("#send").click(function(){
										var message = $("#message").code();
										var sub = $("#subject").val();
										var to = $("#to").val();
										//alert(message + "/"+ sub +"/"+ to);
										$.ajax({
											url: "<?php echo site_url("ajaxMsg/sendMsg") ?>",
											beforeSend: function(){
												Command: toastr["warning"]("Your Message is sending.....")

												toastr.options = {
												  "closeButton": false,
												  "debug": false,
												  "newestOnTop": false,
												  "progressBar": false,
												  "positionClass": "toast-top-center",
												  "preventDuplicates": false,
												  "onclick": null,
												  "showDuration": "300",
												  "hideDuration": "1000",
												  "timeOut": "5000",
												  "extendedTimeOut": "1000",
												  "showEasing": "swing",
												  "hideEasing": "linear",
												  "showMethod": "fadeIn",
												  "hideMethod": "fadeOut"
												}
											},
											data: {message:message,sub:sub,to:to},
											type: 'POST',
											success: function(msg){
												if(msg == "true"){
													Command: toastr["success"]("Your message send successfuly....")

													toastr.options = {
													  "closeButton": true,
													  "debug": false,
													  "newestOnTop": false,
													  "progressBar": true,
													  "positionClass": "toast-top-center",
													  "preventDuplicates": false,
													  "onclick": null,
													  "showDuration": "300",
													  "hideDuration": "1000",
													  "timeOut": "5000",
													  "extendedTimeOut": "1000",
													  "showEasing": "swing",
													  "hideEasing": "linear",
													  "showMethod": "fadeIn",
													  "hideMethod": "fadeOut"
													}
													$("#message").code() = "";
													$("#subject").val() = "";
													$("#to").val() = "";
												}else if(msg == "noId"){
													Command: toastr["error"]("The ID you are given is not avilable...")

													toastr.options = {
													  "closeButton": true,
													  "debug": false,
													  "newestOnTop": false,
													  "progressBar": false,
													  "positionClass": "toast-top-center",
													  "preventDuplicates": false,
													  "onclick": null,
													  "showDuration": "300",
													  "hideDuration": "1000",
													  "timeOut": "5000",
													  "extendedTimeOut": "1000",
													  "showEasing": "swing",
													  "hideEasing": "linear",
													  "showMethod": "fadeIn",
													  "hideMethod": "fadeOut"
													}
												}else{
													Command: toastr["error"]("Somthing Going Wrong Please Contact to developer...")

													toastr.options = {
													  "closeButton": true,
													  "debug": false,
													  "newestOnTop": false,
													  "progressBar": false,
													  "positionClass": "toast-top-center",
													  "preventDuplicates": false,
													  "onclick": null,
													  "showDuration": "300",
													  "hideDuration": "1000",
													  "timeOut": "5000",
													  "extendedTimeOut": "1000",
													  "showEasing": "swing",
													  "hideEasing": "linear",
													  "showMethod": "fadeIn",
													  "hideMethod": "fadeOut"
													}
												}
											}
										});
									});
                                </script>