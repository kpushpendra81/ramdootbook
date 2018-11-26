<?php
class Home extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->isLogin();
	}
	
	function isLogin(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		if(!$is_login){
			//echo $is_login;
			redirect(base_url()."login/index");
		}
		elseif(!$is_lock){
			redirect(base_url()."login/lockPage");
		}
	}
	
	public function replace(){
		$data['ref'] = $this->db->get("ref")->result();
		$data['subPage'] = 'Product';
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Replace / Product";
		$data['pageTitle'] = "Product Replace";
		$data['mainContent'] = "replaceEntry";
		$data['headerCss'] = "headerCss/replaceEntryCss";
		$data['footerJs'] = "footerJs/replaceEntryJs";
		$data['val'] = $this->disease->getAll();
		$this->load->view("include/template",$data);
	}
	
	
	
	public function printtex(){
		$data['ref'] = $this->db->get("ref")->result();
		$data['subPage'] = 'Tex Invoice';
		$data['title'] = "print Tex invoice";
		$data['smallTitle'] = "Sale / Taxinvoice";
		$data['pageTitle'] = "Product Sale";
		$data['mainContent'] = "printtex";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	
	public function saleProduct(){
		$data['ref'] = $this->db->get("ref")->result();
		$data['subPage'] = 'Product';
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Sale / Product Sale";
		$data['pageTitle'] = "Product Sale";
		$data['mainContent'] = "saleProduct";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	public function saleProduct1(){
		$data['ref'] = $this->db->get("ref")->result();
		$data['subPage'] = 'Product';
		$data['title'] = "Product Sale";
		$data['smallTitle'] = "Sale / Product Sale";
		$data['pageTitle'] = "Product Sale";
		$data['mainContent'] = "saleProduct1";
		$data['headerCss'] = "headerCss/saleProduct1Css";
		$data['footerJs'] = "footerJs/saleProductJs";
		$this->load->view("include/template",$data);
	}
	
	public function returnProduct(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Return";
		$data['smallTitle'] = "Sale / Product Return";
		$data['pageTitle'] = "Product Return";
		$data['mainContent'] = "returnProduct";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/returnProductJs";
		$this->load->view("include/template",$data);
	}
	
	public function editBill(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Edit Bill";
		$data['smallTitle'] = "Sale / Edit Bill";
		$data['pageTitle'] = "Edit Bill";
		$data['mainContent'] = "editBill";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/editBillJs";
		$this->load->view("include/template",$data);
	}
	
	public function pBillEntry(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Purchase Bill Entry";
		$data['smallTitle'] = "Sale / Purchase Bill Entry";
		$data['pageTitle'] = "Purchase Bill Entry";
		$data['mainContent'] = "pBillEntry";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/pEntryJs";
		$this->load->view("include/template",$data);
	}
	function printTable(){
		$w = $this->input->post("w");
		?>
	<div class="col-sm-10 ">
		<table class='table-hover' border='1' width='100%' style='margin-left:100px'>
		<thead>
		<tr>
		<th style='width:50px; text-align:center;'>#</th>
		<th style='width:250px; text-align:center;'>Book Name</th>
		<th style='width:250px; text-align:center;'>Class Name</th>
		<th style='width:250px;	text-align:center;'>Subject</th>
		<th style='width:90px;	text-align:center;'>P.Rate/U</th>
		<th style='width:90px;	text-align:center;'>S. Rate/U</th>
		<th style='width:90px;	text-align:center;'>Old Quantity</th>
		<th style='width:90px;	text-align:center;'>Pur Quantity</th>
		<th style='width:90px;	text-align:center;'>CGST%</th>
		<th style='width:90px;	text-align:center;'>SGST%</th>
		<th style='width:90px;	text-align:center;'>Discount</th>
		<th style='width:90px;text-align:center;'>Amount</th>
		
		</tr>
		</thead>
		<tbody>
		
		<?php  $i=1;
		for($b=1;$b<$w+1;$b++){
		?>
	<tr id='row<?php echo $i;?>'>
				<td ><?php echo '&nbsp;&nbsp;&nbsp;  '.$i.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?></td>
						                    <td><input type='text' class='form-control' id='itemName<?php echo $i; ?>' name='itemName<?php echo $i; ?>'  width='100%'>
						                     
						                     <td>
						                     <select class="form-control m-b-sm" id="hsn_sac<?php echo $i; ?>" name="hsn_sac<?php echo $i; ?>" required="required">
											<option value="">-Select Class-</option>
											<?php $val = $this->db->get("bookclass")->result();
											foreach($val as $v):?>
											<option value="<?php echo $v->id;?>"><?php echo $v->class;?></option>
											<?php endforeach;?>
										
											</select>
											
						                   </td>
						                   
						                    <td>
						                    
						                     <select class="form-control m-b-sm" id="itemCompanyName<?php echo $i; ?>" name="itemCompanyName<?php echo $i; ?>" required="required">
						                     </select>
						                     </td>
						                    <script>
											$("#hsn_sac<?php echo $i; ?>").change(function(){
												var classid = $("#hsn_sac<?php echo $i; ?>").val();
											
												//alert(edate+","+section+","+classv+","+sdate)
												$.post("<?php echo site_url("index.php/apanel/getSubject") ?>",{classid : classid}, function(data){
												$("#itemCompanyName<?php echo $i; ?>").html(data);
													});
											});
						                     
						                     </script>  
						                    <td>
						                    
						                    
						                    <input type='text' class='form-control' id='pRate<?php echo $i; ?>' name='pRate<?php echo $i; ?>'  width='100%'></td>
						                    <td><input type='text' class='form-control' id='unitPrice<?php echo $i; ?>' name='unitPrice<?php echo $i; ?>'  width='100%'></td>
						                    <td><input type='text' class='form-control'  id='itemQuantity<?php echo $i; ?>' name='itemQuantity<?php echo $i; ?>'  width='100%'></td>
						                    <td><input type='text' class='form-control'  id='extraQuantity<?php echo $i; ?>' name='extraQuantity<?php echo $i; ?>'  width='100%'></td>
						                    <td><input type='text' class='form-control'  id ='vat<?php echo $i;?>' name ='vat<?php echo $i;?>' width='100%'/></td>
						                    <td><input type='text' class='form-control'  id ='sat<?php echo $i;?>' name ='sat<?php echo $i;?>' width='100%'/></td>
						                    <td><input type='text' class='form-control'  id ='dis<?php echo $i;?>' name ='dis<?php echo $i;?>' width='100%'/></td>
						                     <td><input type='text' class='form-control'  id ='amount<?php echo $i;?>' name ='amount<?php echo $i;?>' width='100%'/></td>
						                  
						                    </tr>
						               
						               <script>
						               $( "#itemName<?php echo $i; ?>" ).autocomplete({
									    	source: '<?php echo site_url("ajaxSale/getData/?");?>',
									    	close: function(){
												var name = $("#item_name<?php echo $i;?>").val();
												$.post("<?php echo site_url("ajaxSale/getItemData") ?>", {name : name}, function(data){		
													var d = jQuery.parseJSON(data);	
													
													 $('#itemCompanyName<?php echo $i; ?>').val(d.company_name);
													 $('#product_code<?php echo $i; ?>').val(d.product_code);
													 $('#hsn_sac<?php echo $i; ?>').val(d.hsn_sac);
												});
											}
									    });	
											$("#extraQuantity<?php echo $i;?>").keyup(function(){
											var st = $("#extraQuantity<?php echo $i;?>").val();
											var count=<?php echo $i;?>;
											
											var pr = $('#pRate<?php echo $i; ?>').val();
											var vatper = Number($('#vat<?php echo $i;?>').val());
											var satper = Number($('#sat<?php echo $i;?>').val());
											var dis = $('#dis<?php echo $i;?>').val();
											var totalamount= st*pr;
											var sat = (totalamount*satper)/100;
											var vat = (totalamount*vatper)/100;
											var distotal = (totalamount*dis)/100;
											var bal = totalamount + sat + vat- distotal;
											
											$("#amount<?php echo $i;?>").val(bal);
											var totaly=0;
											<?php for($g=1;$g<$w+1;$g++){?>
											
											totaly = totaly + Number($('#amount<?php echo $g;?>').val());
											<?php }?>
											$("#total_prize").val(totaly);
											});
											
											$('#vat<?php echo $i;?>').keyup(function(){
												var vatper = Number($('#vat<?php echo $i;?>').val());
												var satper = Number($('#sat<?php echo $i;?>').val());
												var st = $("#extraQuantity<?php echo $i;?>").val();
												var pr = $('#pRate<?php echo $i; ?>').val();
												var dis = $('#dis<?php echo $i;?>').val();
												var totalamount= st*pr;
												var sat = (totalamount*satper)/100;
												var vat = (totalamount*vatper)/100;
												var distotal = (totalamount*dis)/100;
												var bal = totalamount + sat + vat- distotal;
												
												$("#amount<?php echo $i;?>").val(bal);
												var totaly=0;
													<?php for($g=1;$g<$w+1;$g++){?>
												
												totaly = totaly + Number($('#amount<?php echo $g;?>').val());
												<?php }?>
												$("#total_prize").val(totaly);
											});	
											$('#sat<?php echo $i;?>').keyup(function(){
												var vatper = Number($('#vat<?php echo $i;?>').val());
												var satper = Number($('#sat<?php echo $i;?>').val());
												var st = $("#extraQuantity<?php echo $i;?>").val();
												var pr = $('#pRate<?php echo $i; ?>').val();
												var dis = $('#dis<?php echo $i;?>').val();
												var totalamount= st*pr;
												var sat = (totalamount*satper)/100;
												var vat = (totalamount*vatper)/100;
												var distotal = (totalamount*dis)/100;
											var bal = totalamount + sat + vat- distotal;
												$("#amount<?php echo $i;?>").val(bal);
												var totaly=0;
												<?php for($g=1;$g<$w+1;$g++){?>
												
												totaly = totaly + Number($('#amount<?php echo $g;?>').val());
												<?php }?>
												$("#total_prize").val(totaly);
											});	
											$('#dis<?php echo $i;?>').keyup(function(){
												var vatper = Number($('#vat<?php echo $i;?>').val());
												var satper = Number($('#sat<?php echo $i;?>').val());
												var st = $("#extraQuantity<?php echo $i;?>").val();
												var pr = $('#pRate<?php echo $i; ?>').val();
												var dis = $('#dis<?php echo $i;?>').val();
												var totalamount= st*pr;
												var sat = (totalamount*satper)/100;
												var vat = (totalamount*vatper)/100;
												var distotal = (totalamount*dis)/100;
											var bal = totalamount + sat + vat- distotal;
												$("#amount<?php echo $i;?>").val(bal);
												var totaly=0;
												<?php for($g=1;$g<$w+1;$g++){?>
												
												totaly = totaly + Number($('#amount<?php echo $g;?>').val());
												<?php }?>
												$("#total_prize").val(totaly);
												
											});	
											
											
										</script>     
							<?php 	$i++;
								
							}?>
							<script>
							$('#vatper').keyup(function(){
								
								var totaly=0;
								<?php for($g=1;$g<$w+1;$g++){?>
								
								totaly = totaly + Number($('#amount<?php echo $g;?>').val());
								<?php }?>
								
								var vatf = Number($('#vatper').val());
								var satf = Number($('#satper').val());
								var roff = Number($("#roff").val());
								var freight = Number($('#freight').val());
								var discount = Number($('#discount').val());
								var vat = (vatf*totaly)/100;
								var sat = (satf*totaly)/100;
								var bal1 = Number((totaly + sat + vat +roff + freight ) - discount);
								document.getElementById('total_prize').value = bal1;
								
								
							});	



							$('#satper').keyup(function(){
								var totaly=0;
								<?php for($g=1;$g<$w+1;$g++){?>
								
								totaly = totaly + Number($('#amount<?php echo $g;?>').val());
								<?php }?>
								
								var vatf = Number($('#vatper').val());
								var satf = Number($('#satper').val());
								var roff = Number($("#roff").val());
								var freight = Number($('#freight').val());
								var discount = Number($('#discount').val());
								var vat = (vatf*totaly)/100;
								var sat = (satf*totaly)/100;
								var bal1 = Number((totaly + sat +roff+ vat + freight ) - discount);
								
								document.getElementById('total_prize').value = bal1;
								
								
							});	
							$('#freight').keyup(function(){
								var totaly=0;
								<?php for($g=1;$g<$w+1;$g++){?>
								
								totaly = totaly + Number($('#amount<?php echo $g;?>').val());
								<?php }?>
								var vatf = Number($('#vatper').val());
								var satf = Number($('#satper').val());
								var roff = Number($("#roff").val());
								var freight = Number($('#freight').val());
								var discount = Number($('#discount').val());
								var vat = (vatf*totaly)/100;
								var sat = (satf*totaly)/100;
								var bal1 = Number((totaly + sat +roff+ vat + freight ) - discount);
							
								document.getElementById('total_prize').value = bal1;
								
								
							});	
							$('#discount').keyup(function(){
								var totaly=0;
								<?php for($g=1;$g<$w+1;$g++){?>
								
								totaly = totaly + Number($('#amount<?php echo $g;?>').val());
								<?php }?>
								var vatf = Number($('#vatper').val());
								var satf = Number($('#satper').val());
								var roff = Number($("#roff").val());
								var freight = Number($('#freight').val());
								var discount = Number($('#discount').val());
								var vat = (vatf*totaly)/100;
								var sat = (satf*totaly)/100;
								
								var bal1 = Number((totaly + sat +roff+ vat + freight ) - discount);
							
								document.getElementById('total_prize').value = bal1;
								
								
							});	
							$('#roff').keyup(function(){
								var totaly=0;
								<?php for($g=1;$g<$w+1;$g++){?>
								
								totaly = totaly + Number($('#amount<?php echo $g;?>').val());
								<?php }?>
								var vatf = Number($('#vatper').val());
								var satf = Number($('#satper').val());
								var roff = Number($("#roff").val());
								var freight = Number($('#freight').val());
								var discount = Number($('#discount').val());
								var vat = (vatf*totaly)/100;
								var sat = (satf*totaly)/100;
								var bal1 = Number((totaly + sat +roff+ vat + freight ) - discount);
							
								document.getElementById('total_prize').value = bal1;
								
								
							});	


							</script>
							  </tbody>
						    </table>
						 </div><?php 
	}
	
	function printSerial(){
		$c= $this->input->post("count");
		$rts = $this->input->post("st");
		?><table>
			<?php for($y=1;$y<$rts+1;$y++){?>
			<tr>
				<td> <input type="text" class='form-control' name ="serial<?php echo $c.$y;?>" width='100%'/></td>
			</tr>
			<?php }?>
		</table>	
	<?php }
	
	function pBillHistory(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Purchase Bill History";
		$data['smallTitle'] = "Sale / Purchase Bill History";
		$data['pageTitle'] = "Purchase Bill History";
		$data['mainContent'] = "pBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['pBillInfo'] = $this->bill_info->getAll();
		$this->load->view("include/template",$data);
	}
	
	function sBillHistory(){
		$data['subPage'] = 'Bill History';
		$data['title'] = "Sale Bill History";
		$data['smallTitle'] = "Sale / Sale Bill History";
		$data['pageTitle'] = "Sale Bill History";
		$data['mainContent'] = "sBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['sBillInfo'] = $this->sale_bill->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	function tBillHistory(){
		$data['subPage'] = 'Bill History';
		$data['title'] = "Sale Bill History";
		$data['smallTitle'] = "Sale / Sale Bill History";
		$data['pageTitle'] = "Sale Bill History";
		$data['mainContent'] = "tBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		
		$this->load->view("include/template",$data);
	}
	
	function rBillHistory(){
		$data['subPage'] = 'Bill';
		$data['title'] = "Return Bill History";
		$data['smallTitle'] = "Sale / Return Bill History";
		$data['pageTitle'] = "Return Bill History";
		$data['mainContent'] = "rBillHistory";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['rBillInfo'] = $this->return_bill->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	public function enterStock(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Entry";
		$data['smallTitle'] = "Product / Product Entry";
		$data['pageTitle'] = "Product Entry";
		$data['mainContent'] = "enterStock";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/enterStockJs";
		$data['proDetail'] = $this->enter_stock->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	function ref(){
		$this->db->where("id",$this->uri->segment(3));
		$ref = $this->db->get("ref");
		if($ref->num_rows() > 0){
			$data['isVal'] = true;
			$data['ref'] = $ref->row();
		}else{
			$data['isVal'] = false;
		}
		$data['subPage'] = 'Product';
		$data['title'] = "Refrance Entry";
		$data['smallTitle'] = "Product / Refrance Entry";
		$data['pageTitle'] = "Refrance Entry";
		$data['mainContent'] = "ref";
		$data['headerCss'] = "headerCss/saleProductCss";
		$data['footerJs'] = "footerJs/enterStockJs";
		$data['proDetail'] = $this->db->get("ref")->result();
		$this->load->view("include/template",$data);
	}
	
	function productDetail(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Detail";
		$data['smallTitle'] = "Sale / Product Detail";
		$data['pageTitle'] = "Product Detail";
		$data['mainContent'] = "productDetail";
		$data['headerCss'] = "headerCss/listCss";
		$data['footerJs'] = "footerJs/listJs";
		$data['proDetail'] = $this->enter_stock->getAll()->result();
		$this->load->view("include/template",$data);
	}
	
	function replacelist(){
		$data['subPage'] = 'Product';
		$data['title'] = "Product Detail";
		$data['smallTitle'] = "Sale / Product Detail";
		$data['pageTitle'] = "Product Detail";
		$data['mainContent'] = "replacelist";
		$data['headerCss'] = "headerCss/replacelistCss";
		$data['footerJs'] = "footerJs/replacelistJs";
		$list=$this->db->get("replace_list");
		$data['li']=$list->result();
		$data['proDetail'] = $this->enter_stock->getAll()->result();
		$this->load->view("include/template",$data);
	}
}