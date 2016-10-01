<?php

if( isset($pageName) &&  $pageName == "stock_transfer_form"){	

 ?>
	<div id="stock_transfer_<?php echo $divSize+1;?>" style="border-bottom:1px solid #ccc; margin-bottom:10px;">
		<div class="row">

			<div class="form-group col-lg-2">

				<div class="controls">

					<select data-rel="chosen" class="form-control" id="product_id<?php echo $divSize+1;?>" name="product_id[]" onChange="getInitialStock(this.value,'<?php echo $divSize+1;?>');">

					<option value="">Select Product</option>

					<?php foreach($product_master as $Product_master){
						$office_id = $this->session->userdata('office_id');
$table_name='product_current_stock_'.$office_id;
$product_current_stock=$this->base_model->get_record_by_id($table_name,array('product_id'=>$Product_master->product_id));
$initialStock = isset($product_current_stock->product_current_stock) ? $product_current_stock->product_current_stock : '0';
						if($initialStock > '0'){
						?>

						<option value="<?php echo $Product_master->product_id;?>"><?php echo $Product_master->product_name;?> (<?php echo $Product_master->product_short_code;?>)</option>

					<?php } } ?>

					</select>

				</div>

			</div>

			<div class="form-group col-lg-2">
				<input type="text" class="form-control" value="" id="current_stock<?php echo $divSize+1;?>" readonly="readonly" />
			</div>
			<div class="form-group col-lg-2">

				<input type="text" class="form-control" readonly id="stock_transfer_product_quantity<?php echo $divSize+1;?>" name="stock_transfer_product_quantity[]" />
				<!--
				<input type="text" class="form-control" id="stock_transfer_product_quantity<?php //echo $divSize+1;?>" name="stock_transfer_product_quantity[]" onblur="getQUANTITYStockcHECKS(this.value,'<?php //echo $divSize+1;?>');" onkeypress="return isNumberKey(event);"/>
-->
			</div>

			<div class="form-group col-lg-1" id="stock_serial_list<?php echo $divSize+1;?>">

				<!-- <select data-rel="chosen" class="form-control" id="stock_transfer_product_serial_number<?php //echo $divSize+1;?>" name="stock_transfer_product_serial_number[]">
				</select> -->
				<div role="tab" id="heading<?php echo $divSize+1;?>">
					<button class="btn btn-success" type="button" role="button" data-toggle="collapse" href="#collapse<?php echo $divSize+1;?>" aria-expanded="true" aria-controls="collapseOne">
					+(SrNo)
					</button>
				</div>

			</div>

			<div class="form-group col-lg-1">

				<input type="text" class="form-control" readonly="" id="stock_transfer_product_weight<?php echo $divSize+1;?>" name="stock_transfer_product_weight[]" />

			</div>
			<div class="form-group col-lg-1">

				<input type="text" class="form-control" id="stock_transfer_product_total<?php echo $divSize+1;?>" name="stock_transfer_product_total[]"  readonly=""/>

			</div>

<!--
			<div class="form-group col-lg-1">

				<input type="text" class="form-control" id="stock_product_net_initial<?php //echo $divSize+1;?>" disabled />

			</div>
-->

			<div class="form-group col-lg-2">

				<input type="text" class="form-control" id="stock_transfer_product_remarks<?php echo $divSize+1;?>" name="stock_transfer_product_remarks[]" />

			</div>

			<div class="form-group col-lg-1" onclick="removeNewProductStockTransfer('<?php echo $divSize+1;?>')">

				<a href="#" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

			</div>

		</div>
		<div class="row">
			<div id="collapse<?php echo $divSize+1;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $divSize+1;?>">
				<div class="panel-body col-lg-12">
					<div class="row">
						<div class="form-group col-lg-4">
							<label class="control-label">Starting Serial No.</label>
						</div>
						<div class="form-group col-lg-4">
							<label class="control-label">End Serial No.</label>
						</div>
					</div>
					<div class="range<?php echo $divSize+1;?>">
						<div class="row range-list<?php echo $divSize+1;?>-0" id="range-list<?php echo $divSize+1;?>-0">
							<div class="form-group col-lg-4">
								<input type="text"  class="form-control"  name="starting_serial_number<?php echo $divSize+1;?>-0" id="starting_serial_number<?php echo $divSize+1;?>-0" />
							</div>
							<div class="form-group col-lg-4">
								<input type="text" class="form-control" name="limit<?php echo $divSize+1;?>-0" id="limit<?php echo $divSize+1;?>-0" onblur="makeSerialNumbers('<?php echo $divSize+1;?>','0');" />
							</div>
						</div>
					</div>
					<!--
					<div class="row">
						<div class="form-group col-lg-4 col-lg-push-8">
							<a href="javascript:void(0);" onclick="addNewRangeList('<?php echo $divSize+1;?>');" title="Add New"><i class="glyphicon glyphicon-plus"></i>Add New</a>
						</div>
					</div> -->
					<hr/>
					<!--
					<div class="add_serial_range_list_div hide">
		
					</div>
					-->
					<div class="rangeSerialNumber<?php echo $divSize+1;?>">
						<div class="add_serial_number_in_div<?php echo $divSize+1;?>-0 hide row">

						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>


<?php }

if(isset($pageName) && $pageName == "raw_material_receipt_form"){

?>



        <div class="row" id="raw_material_receipt_<?php echo $divSize;?>">

			<div class="form-group col-lg-2">

				<div class="controls">

					<select name="raw_material_id" id="raw_material_id" data-rel="chosen" class="form-control">

						<option>Text 1</option>

						<option>Text 2</option>

						<option>Text 3</option>

					</select>

				</div>

			</div>

			<div class="form-group col-lg-2">

				<input type="text" class="form-control" value=""/>

			</div>

			<div class="form-group col-lg-1" style="padding-right:5px !important;">

				<input type="text" class="form-control" name="serial_number1[]" value='1213345' />

			</div>

			<div class="form-group col-lg-1" style="padding-left:5px !important;">

				<input type="text" class="form-control" name="serial_number1[]" value='1213345' />

			</div>

			<div class="form-group col-lg-2">

				<input type="text" class="form-control" value=""  name="weight[]" />

			</div>

			<div class="form-group col-lg-1">

				<input type="text" class="form-control" name="net_stock[]" />

			</div>

			<div class="form-group col-lg-2">

				<input type="text" class="form-control" name="remarks[]" />

			</div>

			<div class="form-group col-lg-1" onclick="removeNewRawMaterialReceipt('<?php echo $divSize;?>')">

				<a href="javascript:void(0);" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

			</div>

	   </div>

<?php } 

if(isset($pageName) && $pageName == "sales_invoice_form"){

?>



							<div class="row" id="sales_invoice-<?php echo $divSize+1;?>">

								<div class="form-group col-lg-2">

									<div class="controls" id="product_div_id_<?php echo $divSize+1;?>">

										<select id="product_id-<?php echo $divSize+1;?>" name="product_id[]" data-rel="chosen" class="form-control" onchange="getPrice(this.id,'<?php echo $divSize+1; ?>');unselectproduct(this.id,'<?php echo $divSize+1;?>');" >

										<option value="">Select Product</option>

										<?php 
										
										$already_products=explode(",",$already_products);
										foreach($product_master as $product){

											if(in_array($product->product_id,$todaysProducts)){
												$office_id = $this->session->userdata('office_id');
$table_name='product_current_stock_'.$office_id;
$product_current_stock=$this->base_model->get_record_by_id($table_name,array('product_id'=>$product->product_id));
$initialStock = isset($product_current_stock->product_current_stock) ? $product_current_stock->product_current_stock : '0';
						if($initialStock > '0'){
						?>

										?>

											<option value="<?php echo $product->product_id; ?>" <?php if(in_array($product->product_id,$already_products)) { echo "disabled"; } ;?>><?php echo $product->product_name; ?></option>

										<?php }
											}
											} ?>

										</select>

									</div>

								</div>

								<div class="form-group col-lg-1">

									<input type="text" class="form-control" value="" id="qty-<?php echo $divSize+1;?>" name="quantity[]"  onblur="getNetAmount(this.id,'<?php echo $divSize+1; ?>','');" onkeypress="return isNumberKey(event);" />

									<input type="hidden" class="form-control" value="" id="qty_current_stock-<?php echo $divSize+1; ?>" />

								</div>

								<div class="form-group col-lg-1" >

									<input type="text" class="form-control" id="weight-<?php echo $divSize+1;?>" name="weight[]" readonly="" />

								</div>
								<div class="form-group col-lg-1">

									<input type="text" class="form-control" id="total_weight-<?php echo $divSize+1;?>" name="total_weight[]" readonly="" />

								</div>
								<div class="form-group col-lg-2">

									<input type="text" class="form-control" value="" id="price_rate-<?php echo $divSize+1;?>" name="rate_per_quantity[]" readonly />

								</div>

								<div class="form-group col-lg-1">

									<input type="text" class="form-control" name="discount_percent[]" id="discount_percent-<?php echo $divSize+1; ?>"  onblur="getNetAmount(this.id,'<?php echo $divSize+1;?>','dis');" readonly="" />

								</div>

								<div class="form-group col-lg-1">

									<input type="text" class="form-control" name="tax[]" id="tax-<?php echo $divSize+1;?>" readonly />

								</div>

								<div class="form-group col-lg-2 my-serial-number-class" id="serial_number_div<?php echo $divSize+1;?>">

									<input type="text" class="form-control" name="serial_number[]" id="sr_no-<?php echo $divSize;?>"/>

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" name="net_amount[]" id="net_amount-<?php echo $divSize+1;?>"  readonly />

								</div>

								<div class="form-group col-lg-1" style=" width: 5% !important;"  onclick="removeNewRawSalesInvoice('<?php echo $divSize+1;?>')">

									<a href="#" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

								</div>

							</div>

<?php }

if(isset($pageName) && $pageName == "raw_material_stock_receipt_form"){

?>

      <div class="row" id="raw_material_stock_receipt_<?php echo $divSize;?>">

			<div class="form-group col-lg-2">

				<div class="controls">

					<select name="product_id" id="product_id" data-rel="chosen" class="form-control">

						<option>Text 1</option>

						<option>Text 2</option>

						<option>Text 3</option>

					</select>

				</div>

			</div>

			<div class="form-group col-lg-1">

				<input type="text" class="form-control" value=""  name="quantity_ordered[]" disabled />

			</div>

			<div class="form-group col-lg-1">

				<input type="text" class="form-control" value=""  name="weight[]" disabled />

			</div>

			<div class="form-group col-lg-2">

				<input type="text" class="form-control" value=""  name="qty_received[]"/>

			</div>

			<div class="form-group col-lg-2">

				<input type="text" class="form-control" name="serial_number[]"/>

			</div>

			<div class="form-group col-lg-1">

				<input type="text" class="form-control" name="net_stock[]" disabled />

			</div>

			<div class="form-group col-lg-2">

				<input type="text" class="form-control" name="remarks[]" />

			</div>

			<div class="form-group col-lg-1" onclick="removeNewRawMaterialStockReceipt('<?php echo $divSize;?>')">

				<a href="javascript:void(0);" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

			</div>

		</div>

							               



<?php } 

if(isset($pageName) && $pageName == "sales_return_invoice_form"){

?>



							<div class="row" id="sales_return_invoice_<?php echo $divSize;?>">

								<div class="form-group col-lg-3">

									<div class="controls">

										<select id="product_id" data-rel="chosen" style="width:80% !important;" >

											<option>Product 1</option>

											<option>Product 2</option>

											<option>Product 3</option>

										</select>

									</div>

								</div>

								<div class="form-group col-lg-3">

									<input type="text" class="form-control" name="serial_number[]" />

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" value="₹24000" name="rate_per_quantity[]" disabled />

								</div>

								<div class="form-group col-lg-1">

									<div class="controls">

										<select id="tax_id" data-rel="chosen" style="width:90% !important;" >

											<option>12</option>

											<option>7</option>

											<option>12</option>

										</select>

									</div>

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" name="net_amount[]" disabled />

								</div>

								<div class="form-group col-lg-1" onclick="removeNewRawSalesReturnInvoice('<?php echo $divSize;?>')">

									<a href="#" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

								</div>

							</div>

<?php

 }

 if(isset($pageName) && $pageName == "raw_material_work_order_form"){

?>

                             <div class="row" id="raw_m_work_order_<?php echo $divSize;?>">

								<div class="form-group col-lg-2">

									<div class="controls">

										<select name="raw_m_id" id="raw_m_id" data-rel="chosen" class="form-control">

											<option>Text 1</option>

											<option>Text 2</option>

											<option>Text 3</option>

										</select>

									</div>

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" value=""  name="current_stock[]" />

								</div>

								<div class="form-group col-lg-1">

									<input type="text" class="form-control" value=""  name="lot_issued[]" />

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" name="serial_number_issued[]" />

								</div>

								<div class="form-group col-lg-1">

									<input type="text" class="form-control" name="net_stock[]" disabled />

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" name="remarks[]" />

								</div>

								<div class="form-group col-lg-1" onclick="removeNewRawMaterialWorkOrder('<?php echo $divSize;?>')">

									<a href="javascript:void(0);" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

								</div>

							</div>

 <?php }

 if(isset($pageName) && $pageName == "raw_material_work_order_details_form"){

?>

							<script>

							$('#expected_date_of_delivery_'+<?php echo $divSize;?>).datepicker({

									minDate:0

							});

							</script>

                            <div class="row" id="raw_m_work_order_details_<?php echo $divSize;?>">

								<div class="form-group col-lg-2">

									<div class="controls">

										<select name="product_id" id="product_id" data-rel="chosen" class="form-control">

											<option>Text 1</option>

											<option>Text 2</option>

											<option>Text 3</option>

										</select>

									</div>

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" value=""  name=">quantity_ordered[]" />

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" value=""  name="weight[]" />

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" id="expected_date_of_delivery_<?php echo $divSize;?>" name="expected_date_of_delivery[]" />

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" name="orders_remarks[]" />

								</div>

								<div class="form-group col-lg-1" onclick="removeNewRawMaterialWorkOrderDetails('<?php echo $divSize;?>')">

									<a href="javascript:void(0);" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

								</div>

							</div>

 <?php } 

 if(isset($pageName) && $pageName == "product_stock_receipt_form"){

?>

    <div  id="product_stock_receipt_<?php echo $divSize+1;?>">
      <div class="row">

			<div class="form-group col-lg-2">

				<div class="controls">

					<select data-rel="chosen" class="form-control" id="product_id<?php echo $divSize+1;?>" name="product_id[]" onChange="getInitialStock(this.value,'<?php echo $divSize+1;?>');">

					<option value="">Select Product</option>

					<?php foreach($product_master as $Product_master){?>

						<option value="<?php echo $Product_master->product_id;?>"><?php echo $Product_master->product_name;?> (<?php echo $Product_master->product_short_code;?>)</option>

					<?php } ?>

					</select>

				</div>

			</div>
			<div class="form-group col-lg-1">
				<input type="text" class="form-control" value="" id="current_stock<?php echo $divSize+1; ?>" readonly="readonly" />
			</div>

			<div class="form-group col-lg-1">

				<input type="text" class="form-control" name="stock_product_quantity[]" id="stock_product_quantity<?php echo $divSize+1;?>" onkeypress="return isNumberKey(event);" onblur="setQuantity('<?php echo $divSize+1; ?>');" />

				</div>

				<div class="form-group col-lg-1">

					<input type="text" class="form-control" name="stock_product_qty_received[]" id="stock_product_qty_received<?php echo $divSize+1;?>" readonly />
				<!--	<input type="text" class="form-control" name="stock_product_qty_received[]" id="stock_product_qty_received<?php //echo $divSize+1;?>" onblur="getInitialStockReceivedCalculated(this.value,'<?php //echo $divSize+1;?>','');" onkeypress="return isNumberKey(event);"/> -->

				</div>
				<div class="form-group col-lg-2">
					<div role="tab" id="heading<?php echo $divSize+1;?>">
						<button type="button" class="btn btn-success" role="button" data-toggle="collapse" href="#collapse<?php echo $divSize+1;?>" aria-expanded="true" onclick="setLastSelectedValue('<?php echo $divSize+1;?>');" aria-controls="collapseOne" >
						 Add Serial Number
						</button>
					</div>
				</div>
				<div class="form-group col-lg-1">

					<input type="text" class="form-control" name="stock_product_weight[]" id="stock_product_weight<?php echo $divSize+1;?>" readonly="" />

				</div>
				

				<div class="form-group col-lg-1">

					<input type="text" class="form-control" name="stock_product_total_weight[]" id="stock_product_total_weight<?php echo $divSize+1;?>" readonly="" />

				</div>

				<!--

				<div class="form-group col-lg-2">

					<input type="text" class="form-control disabled" name="stock_product_serial_number[]" id="stock_product_serial_number<?php //echo $divSize+1;?>" />

				</div>


				<div class="form-group col-lg-1">

					<input type="text" class="form-control" name="stock_product_net[]" id="stock_product_net<?php //echo $divSize+1;?>" readonly />

					<input type="hidden" class="form-control" id="stock_product_net_initial<?php //echo $divSize+1;?>" readonly />

				</div>
-->
				<div class="form-group col-lg-2">

				<input type="text" class="form-control" name="stock_product_remarks[]" id="stock_product_remarks<?php echo $divSize+1;?>" />

				<input type="hidden" id="serial_number<?php echo $divSize+1;?>" name="pop_up_serial_number[]" value=""/>
				<input type="hidden" id="div_number" name="div_number[]" value="<?php echo $divSize+1;?>" />

			</div>

			<div class="form-group col-lg-1" onclick="removeProductStockReceipt('<?php echo $divSize+1;?>')">

				<a href="javascript:void(0);" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

			</div>

		</div>
	<div class="row">
		<div id="collapse<?php echo $divSize+1;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $divSize+1;?>">
			<div class="panel-body col-lg-12">
				<div class="row my-manual-automatic">
					<div class="form-group col-lg-2">
						<label class="control-label pull-right">Starting Serial No.</label>
					</div>
					<div class="form-group col-lg-3">
						<input type="text" class="form-control starting_serial_number" name="starting_serial_no<?php echo $divSize+1;?>" id="starting_serial_no<?php echo $divSize+1;?>" onchange="addNewSerialNumberWithDiv(this.value,'<?php echo $divSize+1;?>');"  />
					</div>
					<div class="form-group col-lg-1">
						<label class="control-label">Quantity</label>
					</div>
					<div class="form-group col-lg-1">
						<input type="text" class="form-control" name="initial_stock_quantity" id="initial_stock_quantity_popup<?php echo $divSize+1;?>" onchange="addNewSerialNumberWithDiv($('#starting_serial_no<?php echo $divSize+1;?>').val(),'<?php echo $divSize+1;?>');" onkeypress="return isNumberKey(event);" />
					</div>
					<div class="form-group col-lg-1" style="padding-left:5px !important; padding-right:5px !important;">
						<label class="control-label">Generate By</label>
					</div>
					<div class="form-group col-lg-1">
						<label class="radio-inline">
							<input name="radion1" id="manual" onclick="addNewSerialNumberWithDiv($('#starting_serial_no<?php echo $divSize+1;?>').val(),'<?php echo $divSize+1;?>');" value="Manual" type="radio" checked /> Manual
						</label>
					</div>
					<div class="form-group col-lg-1">
						<label class="radio-inline">
							<input name="radion1" id="automatic" onclick="addNewSerialNumberWithDiv($('#starting_serial_no<?php echo $divSize+1;?>').val(),'<?php echo $divSize+1;?>');" value="Automatic" type="radio"/> Auto-Generated
						</label>
					</div>
				</div>
				<hr/>
				<!--
				<div class="add_serial_range_list_div hide">

				</div>
				-->
				<div class="rangeSerialNumber<?php echo $divSize+1;?>">
					<div class="add_serial_number_in_div<?php echo $divSize+1;?>-0 hide row">
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>						               




<?php }
if(isset($pageName) && $pageName == "sales_invoice_payment_mode_form"){
$already_products=explode(",",$already_products);
?>

<div class="row form-group col-lg-12" style="padding:0;" id="sales_invoice_payment_mode-<?php echo $divSize+1;?>">
								<div class="form-group col-lg-2" style="padding:0">
									
									<label class="control-label">Payment Mode</label>
									<div id="payment_div_id_<?php echo $divSize+1;?>">
										<select id="payment_mode-<?php echo $divSize+1;?>" name="payment_mode[]" data-rel="chosen" class="form-control" onchange="getcheckcard(this.id,'<?php echo $divSize+1;?>');unselectpayment_mode(this.id,'<?php echo $divSize+1;?>')" >
										<option value="">Select</option>
										<option value="cash" <?php if(in_array('cash',$already_products)) { echo "disabled"; } ;?>>Cash</option>
										<option value="credit card">Credit Card</option>
										<option value="debit card">Debit Card</option>
										<option value="cheque">Cheque</option>
										<option value="neft">NEFT</option>
										</select>
									</div>
									</div>
								
								<div class="form-group col-lg-2"  style="">
									<label class="control-label">Amount (Rs.)</label>
									<input type="text" style="" class="form-control" name="payment_mode_amount[]" id="payment_mode_amount_<?php echo $divSize+1;?>" onchange="getTotal_received();" />
								</div>
								<div class="form-group col-lg-3" id="div_card_data_<?php echo $divSize+1;?>" style="display:none;">
									<label class="control-label" id="lable_card_<?php echo $divSize+1;?>">Card No.</label>
									<input type="text" class="form-control" name="card_check_number[]" id="card_check_number_<?php echo $divSize+1;?>" />
								</div>
								<div class="form-group col-lg-3" id="div_card_name_<?php echo $divSize+1;?>" style="display:none;">
									<label class="control-label" id="lable_card_name<?php echo $divSize+1;?>">Name on Card</label>
									<input type="text" class="form-control" name="card_check_name[]" id="card_check_name_<?php echo $divSize+1;?>" />
								</div>
								
								 <div class="form-group col-lg-2" id="div_issuing_bank_<?php echo $divSize+1;?>" style="display:none;">
									<label class="control-label" style="width:73px;" id="lable_issuing_bank_<?php echo $divSize+1;?>">Issu. Bank </label>
									<input type="text" class="form-control" name="card_issuing_bank[]" id="card_issuing_bank_<?php echo $divSize+1;?>"  />
								</div>
								
								<div class="form-group col-lg-3" id="div_cheque_relese_<?php echo $divSize+1;?>" style="display:none;">
									<label class="control-label" id="lable_cheque_relese_<?php echo $divSize+1;?>">Cheq. Realization (Y/N)</label>
									<select id="cheque_relese_<?php echo $divSize+1;?>" name="cheque_relese[]"  class="form-control"  >
										<option value="select">-Select-</option>
										<option value="0">No</option>
										<option value="1">Yes</option>
										</select>
										
								</div>
								<div class="form-group col-lg-2" style=" width: 5% !important;"  onclick="removeNewRawPaymentModeSalesInvoice('<?php echo $divSize+1;?>')">
<label class="control-label" >&nbsp;</label>
									<a href="javascript:void(0);" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

								</div>
							</div>
<?php }


if(isset($pageName) && $pageName == "sales_invoice_change_products"){
$already_products=explode(",",$already_products);
?>
|||<?php echo $divSize;?>|||<select id="product_id-<?php echo $divSize;?>" name="product_id[]" data-rel="chosen" class="form-control" onchange="getPrice(this.id,'<?php echo $divSize; ?>');unselectproduct(this.id,'<?php echo $divSize;?>');" >

										<option value="">Select Product</option>

										<?php foreach($product_master as $product){

											if(in_array($product->product_id,$todaysProducts)){

										?>

											<option value="<?php echo $product->product_id; ?>" <?php if($select_product==$product->product_id) { echo "selected"; } else { if(in_array($product->product_id,$already_products)) { echo "disabled"; } }?>> <?php echo $product->product_name; ?></option>

										<?php }

											} ?>

										</select>
<?php
}
if(isset($pageName) && $pageName == "sales_invoice_change_payment_type"){
$already_products=explode(",",$already_products);
?>
|||<?php echo $divSize;?>|||<select id="payment_mode-<?php echo $divSize;?>" name="payment_mode[]" data-rel="chosen" class="form-control" onchange="getcheckcard(this.id,'<?php echo $divSize;?>');unselectpayment_mode(this.id,'<?php echo $divSize;?>');" >
										<option value="">Select</option>
										<option value="cash" <?php if($select_product=='cash') { echo "selected"; } else { if(in_array('cash',$already_products)) { echo "disabled"; } }?>>Cash</option>
										<option value="credit card" <?php if($select_product=='credit card') { echo "selected"; }?>>Credit Card</option>
										<option value="debit card" <?php if($select_product=='debit card') { echo "selected"; }?>>Debit Card</option>
										<option value="cheque" <?php if($select_product=='cheque') { echo "selected"; }?>>Cheque</option>
										<option value="neft" <?php if($select_product=='neft') { echo "selected"; }?>>NEFT</option>
										</select>
										<?php
}
?>
<?php 

if(isset($pageName) && $pageName == "back_date_sales_invoice_products"){ ?>
	<div class="controls" id="product_div_id_0">
										<select id="product_id-0" name="product_id[]" data-rel="chosen" class="form-control" onchange="getPrice(this.id,'0');unselectproduct(this.id,'0')" >
										
										<option value="">Select Product</option>
										<?php foreach($product_master as $product){
											//echo $product->product_id;die;
											if(in_array($product->product_id,$todaysProducts)){
										?>
											<option value="<?php echo $product->product_id; ?>" ><?php echo $product->product_name; ?></option>
										<?php }
											} ?>
										</select>
									</div>

<?php }?>


<?php 

if(isset($pageName) && $pageName == "office_role"){ ?>
	<div id="location_div_id_role_<?php echo $divSize1; ?>" class="controls" id="product_div_id_0">
	<label class="control-label">Role</label>
										<select data-rel="chosen" id="role_id-<?php echo $divSize1; ?>" name="role_permission_id[]"  class="form-control"  >
										
										<option value="">Select Role</option>
										<?php  foreach($all_role as $value){
											//echo $product->product_id;die;
							
											
										?>
											<option value="<?php echo $value->role_permission_id; ?>" ><?php echo $value->role_name; ?></option>
										<?php 
											} ?>
										</select>
									</div>

<?php }
?>
<?php 

if(isset($pageName) && $pageName == "region_data")
{ ?>
	<label class="control-label" for="selectError2">Region</label>
									<div id="region_div_<?php echo $divSize;?>">
										<select name="region_id[]" id="region_id_<?php echo $divSize;?>" class="form-control" >
										<option value="" >All Region</option>
										<?php  foreach($all_regional as $value)
										{
											?>
											<option value="<?php echo $value->regional_store_id; ?>" ><?php echo $value->regional_store_name; ?></option>
											<?php
										}
										?>
										</select>
									</div>
	
								
<?php }
?>
<?php
if(isset($pageName) && $pageName == "back_date_sales_invoice_productsdiv"){

?>



							<div class="row" id="sales_invoice-<?php echo $divSize+1;?>">

								<div class="form-group col-lg-2">

									<div class="controls" id="product_div_id_<?php echo $divSize+1;?>">

										<select id="product_id-<?php echo $divSize+1;?>" name="product_id[]" data-rel="chosen" class="form-control" onchange="getPrice(this.id,'<?php echo $divSize+1; ?>');unselectproduct(this.id,'<?php echo $divSize+1;?>');" >

										<option value="">Select Product</option>

										<?php 
										
										$already_products=explode(",",$already_products);
										foreach($product_master as $product){

											if(in_array($product->product_id,$todaysProducts)){

										?>

											<option value="<?php echo $product->product_id; ?>" <?php if(in_array($product->product_id,$already_products)) { echo "disabled"; } ;?>><?php echo $product->product_name; ?></option>

										<?php }

											} ?>

										</select>

									</div>

								</div>

								<div class="form-group col-lg-1">

									<input type="text" class="form-control" value="" id="qty-<?php echo $divSize+1;?>" name="quantity[]"  onblur="getNetAmount(this.id,'<?php echo $divSize+1; ?>','');" onkeypress="return isNumberKey(event);" />

									<input type="hidden" class="form-control" value="" id="qty_current_stock-<?php echo $divSize+1; ?>" />

								</div>

								<div class="form-group col-lg-1" >

									<input type="text" class="form-control" id="weight-<?php echo $divSize+1;?>" name="weight[]" readonly="" />

								</div>
								<div class="form-group col-lg-1">

									<input type="text" class="form-control" id="total_weight-<?php echo $divSize+1;?>" name="total_weight[]" readonly="" />

								</div>
								<div class="form-group col-lg-2">

									<input type="text" class="form-control" value="" id="price_rate-<?php echo $divSize+1;?>" name="rate_per_quantity[]" readonly />

								</div>

								<div class="form-group col-lg-1">

									<input type="text" class="form-control" name="discount_percent[]" id="discount_percent-<?php echo $divSize+1; ?>"  onblur="getNetAmount(this.id,'<?php echo $divSize+1;?>','dis');" readonly="" />

								</div>

								<div class="form-group col-lg-1">

									<input type="text" class="form-control" name="tax[]" id="tax-<?php echo $divSize+1;?>" readonly />

								</div>

								<div class="form-group col-lg-2" id="serial_number_div<?php echo $divSize+1;?>">

									<input type="text" class="form-control" name="serial_number[]" id="sr_no-<?php echo $divSize;?>"/>

								</div>

								<div class="form-group col-lg-2">

									<input type="text" class="form-control" name="net_amount[]" id="net_amount-<?php echo $divSize+1;?>"  readonly />

								</div>

								<div class="form-group col-lg-1" style=" width: 5% !important;"  onclick="removeNewRawSalesInvoice('<?php echo $divSize+1;?>')">

									<a href="#" class="btn btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

								</div>

							</div>

<?php } ?>
<!-- application script for mmtc demo -->

<?php
if(isset($pageName) && $pageName != "sales_invoice_change_products" && $pageName != "sales_invoice_change_payment_type"){
?>
<script type="text/javascript">

	function removeNewProductStockTransfer(div_id)

	{

		/* $('#stock_transfer_'+div_id+',#product_id'+div_id+',#stock_transfer_product_serial_number'+div_id+',#stock_transfer_product_weight'+div_id+',#stock_transfer_product_quantity'+div_id+',#stock_transfer_product_remarks'+div_id).addClass('hide disabled'); */

	//	$('#stock_transfer_'+div_id).remove();
		$('#stock_transfer_'+div_id).html('').removeAttr('style');

	}

	function removeNewRawMaterialReceipt(div_id)

	{

		$('#raw_material_receipt_'+div_id).addClass('hide disabled');

	}

	function removeNewRawSalesInvoice(div_id)

	{

		$('#sales_invoice-'+div_id).addClass('hide disabled');
		$('#product_id-'+div_id).val('');
		
		updateSelectedProductHidden();
		unselectproduct('product_id-'+div_id,div_id);
		$('#sales_invoice-'+div_id+' input').addClass('hide disabled');

		$('#sales_invoice-'+div_id+' input').val('');
		$('#sales_invoice-'+div_id).html('');
		myTotalValue(); 
		getTotal_received();

	}

	function removeNewRawMaterialStockReceipt(div_id)

	{

		$('#raw_material_stock_receipt_'+div_id).addClass('hide disabled');

	}

	function removeNewRawSalesReturnInvoice(div_id)

	{

		$('#sales_return_invoice_'+div_id).addClass('hide disabled');

	}

	function removeNewRawMaterialWorkOrder(div_id){

		

		$('#raw_m_work_order_'+div_id).addClass('hide disabled');

		

	}

	function removeNewRawMaterialWorkOrderDetails(div_id){

		

		$('#raw_m_work_order_details_'+div_id).addClass('hide disabled');

		

	}

	

	function removeProductStockReceipt(div_id){
		$('#product_stock_receipt_'+div_id).html('');//addClass('hide disabled');

	}
function removeNewRawPaymentModeSalesInvoice(div_id)

	{

		$('#sales_invoice_payment_mode-'+div_id).addClass('hide disabled');

		$('#sales_invoice_payment_mode-'+div_id+' input').addClass('hide disabled');

		$('#sales_invoice_payment_mode-'+div_id+' input').val('');
		$('#sales_invoice_payment_mode-'+div_id).html('');
		
		
		getTotal_received();
		//getcheckcard('payment_mode-'+div_id,div_id);
		unselectpayment_mode_remove();
	}
</script>
<?php
}
?>
