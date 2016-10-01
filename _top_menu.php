<?php
$user_id=$this->session->userdata('user_id');
			$role_permission_id=$this->session->userdata('role_permission_id');
			$office_id=$this->session->userdata('office_id');
			$user_role_data=$this->db->get_where('user_role_permission_master',array('user_id'=>$user_id,'role_permission_id'=>$role_permission_id,'office_id'=>$office_id))->row();
			
			$regionalStoreData_res = $this->db->select('*')->from('regional_store_master')->where(array('regional_store_id'=>$user_role_data->regional_store_id))->get()->row();
			 
			?><!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding:2px 15px 15px 15px !important;" href="<?php echo base_url();?>user/dashboard"> <img alt="MMTC Logo" style="height:70px !important; width:150px !important;" src="<?php echo base_url();?>files/img/index.png"/></a>
			<div class="btn-group">
				<?php
					$office_id = $this->session->userdata('office_id');
					if($this->session->userdata('office_id')){
					$office_data = $this->db->get_where('office_master',array('office_id'=>$office_id))->row();
					$store_name='';
					if(!empty($regionalStoreData_res))
					{
						$store_name="-".$regionalStoreData_res->regional_store_name;
					}
					$arr_header_ci_st=array();
					if(getCityName($office_data->city_id)!='')
					{
						$arr_header_ci_st[]=getCityName($office_data->city_id);
					}
					if(getStateName($office_data->state_id)!='')
					{
						$arr_header_ci_st[]=getStateName($office_data->state_id);
					}
					$str_header_ci_st='';
					if(count($arr_header_ci_st)>0)
					{
						$str_header_ci_st=implode(', ',$arr_header_ci_st);
						
					}
				?>
				<?php //getDistrictName($office_data->district_id)  ?>
               <h3 style="color:#fff;"><?php echo strtoupper($office_data->office_name.$store_name.'-'.$office_data->office_operation_type.', '.$str_header_ci_st); ?></h3>
					<?php } ?>
            </div>
            		
            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">
					<?php
                    $office_id=$this->session->userdata('office_id');
					echo ucfirst($this->session->userdata('user_username'));
					if(isset($office_id) && $office_id!=0){ ?>
					
					(<?php echo ucfirst($this->session->userdata('office_operation_type')); ?>)
					
					<?php }else{ ?>
					
					(<?php echo strtoupper('head office'); ?>)
					
					<?php } ?>
					</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                   <!--<li><a href="#">Profile</a></li>-->
                   <!-- <li class="divider"></li>-->
					<li><a href="<?php echo base_url();?>user/change_password">Change Password</a></li>
					<li class="divider"></li>
					<?php if($this->session->userdata('role_id') != '0'){ ?>
					<li><a href="<?php echo base_url();?>login/selectLocation">Change Location</a></li>
					<li class="divider"></li>
					<?php } ?>
                    <li><a href="<?php echo base_url();?>login/logout">Logout</a></li> 
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
            </div>
            <!-- theme selector ends -->
        </div>
    </div>
	<div class="nav-canvas collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-top:-15px !important; margin-bottom:5px !important;">
		<?php 
		if($this->session->userdata('role_id') != '0'){
			$user_page_access_array = $this->role_model->get_user_page_permission();
		}
			//print_r($this->session->all_userdata());
		?>
	<?php if($this->session->userdata('role_id') == '0'){ ?>
		<ul class="nav navbar-nav">
			<li class="active"> <a href="<?php echo base_url();?>user/dashboard"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a> </li>
			<!-- <li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-plus"></i><span> Access level of System</span> </a>
				<ul class="dropdown-menu">
					<li><a href="#">Super Administrator</a></li>
					<li><a href="#">Ware House Manager</a></li>
					<li><a href="#">H.O Users</a></li>
					<li><a href="#">Distributor Administrator</a></li>
					<li><a href="#">Distributor Manager</a></li>
					<li><a href="#">POS User</a></li>
					<li><a href="#">Maker and Authorizer</a></li>
				</ul>
			</li> -->
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-user"></i><span>User/Role Management</span></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url();?>user/role_master">Role Master</a></li>
					<li><a href="<?php echo base_url();?>user/user_master">User Master</a></li>
				</ul>
			</li>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-list-alt"></i><span> Master forms</span></a>
				<ul class="dropdown-menu">
					<!-- <li><a href="department_master.php">Department Master</a></li>
					<li><a href="<?php //echo base_url();?>masterForm/store_type_master">Store Type Master</a></li> -->
					<li role="presentation" class="dropdown-submenu">
						<a class="dropdown-toggle" data-toggle="dropdown-submenu" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="my-span"> Location Management ></span></a>
						<ul class="dropdown-menu">
						    <li><a href="<?php echo base_url('masterForm/zone_master');?>">Zone Master</a></li>
							<li><a href="<?php echo base_url('masterForm/state_master');?>">State Master</a></li>
							<li><a href="<?php echo base_url('masterForm/district_master');?>">District Master</a></li>
							<li><a href="<?php echo base_url('masterForm/city_master');?>">City/Town Master</a></li>
						</ul>
					</li>
					<li role="presentation" class="dropdown-submenu">
						<a class="dropdown-toggle" data-toggle="dropdown-submenu" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="my-span"> Office Location Management ></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('masterForm/head_office_master');?>">H.O. Master</a></li>
							<li><a href="<?php echo base_url('masterForm/regional_store_master');?>">Region Office Master</a></li>
							<li><a href="<?php echo base_url('masterForm/office_master');?>">Office Master</a></li>
							<!-- <li><a href="warehouse_master.php">Warehouse Master</a></li>
							
							<li><a href="pos_master.php">POS Master</a></li>-->
						</ul>
					</li>
					<!-- <li><a href="designation_master.php">Designation Master</a></li>
					<li><a href="raw_material_master.php">Raw Material Master</a></li> -->
					<!--<li><a href="#">Distributor Master</a></li>-->
					<li role="presentation" class="dropdown-submenu">
						<a class="dropdown-toggle" data-toggle="dropdown-submenu"  href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="my-span"> Product Management ></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url();?>masterForm/unit_master">Unit Of Measurement Master</a></li>
						    <li><a href="<?php echo base_url();?>product/metal_master">Metal Master</a></li>
							<li><a href="<?php echo base_url();?>product/product_category">Product Category Master</a></li>
							<li><a href="<?php echo base_url();?>product/product_sub_category">Product Sub-category Master</a></li>
							<li><a href="<?php echo base_url();?>product/product_type_master">Product Type Master</a></li>
							<li><a href="<?php echo base_url();?>product/product_master">Product Master</a></li>
						</ul>
					</li>
					<!--<li><a href="#">Commission Master</a></li>
					<li><a href="bank_master.php">Bank Master</a></li> -->
					<li><a href="<?php echo base_url();?>masterForm/vendor_type_master">Vendor Type Master</a></li>
					<li><a href="<?php echo base_url();?>masterForm/vendor_master">Vendor Master</a></li>
					<li><a href="<?php echo base_url();?>masterForm/price_master">Price Master</a></li>
					<li><a href="<?php echo base_url();?>masterForm/taxListing">Tax Master</a></li>
					<li><a href="<?php echo base_url();?>masterForm/back_date_listing">Back Date Invoice</a></li>
				</ul>
			</li>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-list"></i><span> Reports</span></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url();?>report/admin_allreport">Stock Ledger</a></li>
					<?php  //if(in_array('31',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>report/admin_transactionreport">Transaction</a></li>
				    <?php// } ?>
					<li><a href="<?php echo base_url();?>report/salesReport">Sales Report</a></li>
					
					<?php  //if(in_array('31',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>report/scheduleReport">Schedule Report</a></li>
					<li><a href="<?php echo base_url();?>report/paymentModeReport">Payment Mode Report</a></li>
					<li><a href="<?php echo base_url();?>report/price_report">Price Report</a></li>
					<?php
					/*
					<li><a href="<?php echo base_url();?>report/dailyStatementReport">Daily Statement Report</a></li> 
					*/
					?>
					<li><a href="<?php echo base_url();?>report/stock_transfer_recieve_inventory">Transfer Report</a></li>
					<li><a href="<?php echo base_url();?>report/salesallreport">Sales All Report</a></li>
					<li><a href="<?php echo base_url();?>report/saleInventoryReportdetail">Sale & Inventory Detail Report</a></li>
				</ul>
			</li>
			
			<!--
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-file"></i><span> Reports</span></a>
				<ul class="dropdown-menu">
					<li><a href="#">Super Administrator</a></li>
					<li><a href="#">Ware House Manager</a></li>
					<li><a href="#">H.O Users</a></li>
					<li><a href="#">Distributor Administrator</a></li>
					<li><a href="#">Distributor Manager</a></li>
					<li><a href="#">POS User</a></li>
					<li><a href="#">Maker and Authorizer</a></li>
				</ul>
			</li>
			-->
		<li><a href="<?php echo base_url('user/user_activity'); ?>"><i class="glyphicon glyphicon-wrench"></i><span>Activity Log</span></a></li>
		</ul>
	    <?php 
		
		}?>
        <?php if($this->session->userdata('role_id') == '1'){ ?>
		<ul class="nav navbar-nav">
			<li class="active"> <a href="<?php echo base_url();?>user/dashboard"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a> </li>
			<?php  if(in_array('1',$user_page_access_array)){
				if($user_role_data->regional_store_id=='0')
				{
				?>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-user"></i><span>User Management</span></a>
				<ul class="dropdown-menu">
					<li style="display:none"><a href="<?php echo base_url();?>user/role_master">Role Master</a></li>
					<li><a href="<?php echo base_url();?>user/user_master">User Master</a></li>
				</ul>
			</li>
				<?php } } ?>
			<?php  if(in_array('2',$user_page_access_array) || in_array('3',$user_page_access_array) || in_array('4',$user_page_access_array) || in_array('5',$user_page_access_array) || in_array('6',$user_page_access_array) || in_array('7',$user_page_access_array) || in_array('8',$user_page_access_array) || in_array('9',$user_page_access_array) || in_array('10',$user_page_access_array) || in_array('11',$user_page_access_array) || in_array('12',$user_page_access_array) || in_array('13',$user_page_access_array) || in_array('14',$user_page_access_array) || in_array('15',$user_page_access_array) || in_array('16',$user_page_access_array) || in_array('17',$user_page_access_array) || in_array('32',$user_page_access_array) || in_array('33',$user_page_access_array) ){ 
			if($user_role_data->regional_store_id=='0')
				{
			?>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-list-alt"></i><span> Master forms</span></a>
				<ul class="dropdown-menu">
				<?php  if(in_array('2',$user_page_access_array) || in_array('3',$user_page_access_array) || in_array('4',$user_page_access_array) || in_array('5',$user_page_access_array) ){?>	
					<li role="presentation" class="dropdown-submenu">
						<a class="dropdown-toggle" data-toggle="dropdown-submenu" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="my-span"> Location Management ></span></a>
						<ul class="dropdown-menu">
						<?php  if(in_array('2',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url('masterForm/zone_master');?>">Zone Master</a></li>
						<?php } ?>
						<?php  if(in_array('3',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url('masterForm/state_master');?>">State Master</a></li>
						<?php } ?>
						<?php  if(in_array('4',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url('masterForm/district_master');?>">District Master</a></li>
						<?php } ?>
						<?php  if(in_array('5',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url('masterForm/city_master');?>">City/Town Master</a></li>
						<?php } ?>
						</ul>
					</li>
				<?php } ?>
				<?php  if(in_array('6',$user_page_access_array) || in_array('7',$user_page_access_array) || in_array('32',$user_page_access_array) ){?>
					<li role="presentation" class="dropdown-submenu">
						<a class="dropdown-toggle" data-toggle="dropdown-submenu" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="my-span"> Office Location Management ></span></a>
						<ul class="dropdown-menu">
						<?php  if(in_array('32',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url('masterForm/head_office_master');?>">H.O. Master</a></li>
						<?php } ?>
						<?php  if(in_array('6',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url('masterForm/regional_store_master');?>">Region Office Master</a></li>
						<?php } ?>
						<?php  if(in_array('7',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url('masterForm/office_master');?>">Office Master</a></li>
						<?php } ?>
						</ul>
					</li>
				<?php } ?>
				<?php  if(in_array('8',$user_page_access_array) || in_array('9',$user_page_access_array) || in_array('10',$user_page_access_array) || in_array('11',$user_page_access_array) || in_array('12',$user_page_access_array) ){?>
					<li role="presentation" class="dropdown-submenu">
						<a class="dropdown-toggle" data-toggle="dropdown-submenu"  href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="my-span"> Product Management ></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url();?>masterForm/unit_master">Unit Of Measurement Master</a></li>
						<?php  if(in_array('8',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url();?>product/metal_master">Metal Master</a></li>
						<?php } ?>
						<?php  if(in_array('9',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url();?>product/product_category">Product Category Master</a></li>
						<?php } ?>
						<?php  if(in_array('10',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url();?>product/product_sub_category">Product Sub-category Master</a></li>
						<?php } ?>
						<?php  if(in_array('11',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url();?>product/product_type_master">Product Type Master</a></li>
						<?php } ?>
						<?php  if(in_array('12',$user_page_access_array)){ ?>
							<li><a href="<?php echo base_url();?>product/product_master">Product Master</a></li>
						<?php } ?>
						</ul>
					</li>
				<?php } ?>
				<?php  if(in_array('13',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>masterForm/vendor_type_master">Vendor Type Master</a></li>
				<?php } ?>
				<?php  if(in_array('14',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>masterForm/vendor_master">Vendor Master</a></li>
				<?php } ?>
				<?php  if(in_array('15',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>masterForm/price_master">Price Master</a></li>
				<?php } ?>
				<?php  if(in_array('16',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>masterForm/taxListing">Tax Master</a></li>
				<?php } ?>
				<?php  if(in_array('17',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>masterForm/back_date_listing">Back Date Invoice</a></li>
				<?php } ?>
				<?php
				/*
				if(in_array('33',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>masterForm/employee_loan_listing">Employee Loan</a></li>
				<?php } 
				*/
				?>
				</ul>
			</li>
				<?php } } ?>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-list"></i><span> Reports</span></a>
				<ul class="dropdown-menu">
				<?php
				if($user_role_data->regional_store_id=='0')
				{
					?>
					<li><a href="<?php echo base_url();?>report/admin_allreport">Stock Ledger</a></li>
					<?php  //if(in_array('31',$user_page_access_array)){ ?>
				<?php
					}
					?>
					<li><a href="<?php echo base_url();?>report/admin_transactionreport">Transaction</a></li>
				    <?php// } ?>
					<li><a href="<?php echo base_url();?>report/salesReport">Sales Report</a></li>
					<?php  //if(in_array('31',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>report/scheduleReport">Schedule Report</a></li>
					<li><a href="<?php echo base_url();?>report/paymentModeReport">Payment Mode Report</a></li>
					<li><a href="<?php echo base_url();?>report/price_report">Price Report</a></li>
					<li><a href="<?php echo base_url();?>report/adminTransactionTaxReport">Tax Transaction Report</a></li>
					<?php
					/*
					<li><a href="<?php echo base_url();?>report/dailyStatementReport">Daily Statement Report</a></li> 
					*/
					?>
					<li><a href="<?php echo base_url();?>report/stock_transfer_recieve_inventory">Transfer Report</a></li>
					<li><a href="<?php echo base_url();?>report/salesallreport">Sales All Report</a></li>
					<li><a href="<?php echo base_url();?>report/saleInventoryReportdetail">Sale & Inventory Detail Report</a></li>
				</ul>
			</li>
		</ul>
	    <?php 
		
		}

		else if($this->session->userdata('role_id') == '2'){ 
		
		
		// for store manager
		
		
		?>
		<ul class="nav navbar-nav">
			<li class="active"> <a href="<?php echo base_url();?>user/dashboard"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a> </li>
			<?php  if(in_array('18',$user_page_access_array) || in_array('19',$user_page_access_array) || in_array('20',$user_page_access_array) || in_array('21',$user_page_access_array) || in_array('22',$user_page_access_array) ){?>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-edit"></i><span> Inventory</span></a>
				<ul class="dropdown-menu">
				<?php  if(in_array('18',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>inventory/initial_stock_form">Initial Stock</a></li>
				<?php } ?>
				<?php  if(in_array('19',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>inventory/product_current_stock">Current Stock</a></li>
				<?php } ?>
				<?php  if(in_array('20',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>inventory/product_stock_receipt_inventory">Stock Received From Vendor</a></li>
				<?php } ?>
				<?php  if(in_array('21',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>inventory/stock_transfer_inventory">Stock Transfer/Issue</a></li>
				<?php } ?>
				<?php  if(in_array('22',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>inventory/stock_receipt_inventory">Stock Receipt</a></li>
				<?php } ?>
				</ul>
			</li>
			<?php } ?>
			<?php  if(in_array('23',$user_page_access_array) ){?>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-edit"></i><span> Reports</span></a>
				<ul class="dropdown-menu">
				<?php  if(in_array('23',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>report/allreport">Stock Ledger</a></li>
				<?php } ?>
					<li><a href="<?php echo base_url();?>report/officeScheduleReport">Schedule Report</a></li>
					<li><a href="<?php echo base_url();?>report/productStockReceiptReport">Stock Receipt From Vendor Report</a></li>
					<li><a href="<?php echo base_url();?>report/currentInventoryReport">Current Inventory Report</a></li>
				</ul>
			</li>
			<?php } ?>
		<?php /*	<li><a href="#"><i class="glyphicon glyphicon-wrench"></i><span> Settings</span></a></li>*/?>
		</ul>
	    <?php


		}

		else if($this->session->userdata('role_id') == '3'){


		// for showroom manager
		
		?>
		<ul class="nav navbar-nav">
			<li class="active"> <a href="<?php echo base_url();?>user/dashboard"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a> </li>
			<?php  if(in_array('24',$user_page_access_array) || in_array('25',$user_page_access_array) || in_array('26',$user_page_access_array) || in_array('27',$user_page_access_array) || in_array('28',$user_page_access_array) || in_array('29',$user_page_access_array) ){?>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-edit"></i><span> Inventory</span></a>
				<ul class="dropdown-menu">
				<?php  if(in_array('24',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>inventory/product_current_stock">Current Stock</a></li>
				<?php } ?>
				<?php  if(in_array('25',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>inventory/stock_transfer_inventory">Stock Transfer/Issue</a></li>
				<?php } ?>
				<?php  if(in_array('26',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>inventory/stock_receipt_inventory">Stock Receipt</a></li>
				<?php } ?>
				<?php  if(in_array('27',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>invoice/sales_invoice_details">Sales Invoice</a></li>
				<?php } ?>
				<?php  if(in_array('28',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>BackDateInvoice/back_date_sales_invoice_details">Back Date Sales Invoice</a></li>
				<?php } ?>
				<?php  if(in_array('29',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>buyBack/buy_back_inventory">BuyBack</a></li>
				<?php } ?>
				</ul>
			</li>
			<?php } ?>
			<?php  if(in_array('30',$user_page_access_array) || in_array('31',$user_page_access_array) || in_array('34',$user_page_access_array) ){?>
			<li role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<i class="glyphicon glyphicon-edit"></i><span> Reports</span></a>
				<ul class="dropdown-menu">
				<?php  if(in_array('30',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>report/allreport">Stock Ledger</a></li>
				<?php } ?>
				<?php  if(in_array('31',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>report/transactionreport">Transaction</a></li>
				<?php } ?>
				<?php  if(in_array('34',$user_page_access_array)){ ?>
					<li><a href="<?php echo base_url();?>report/tax_report">Tax Master Report</a></li>
				<?php } ?>
					<li><a href="<?php echo base_url();?>report/officeSalesReport">Sales Report</a></li>
					<li><a href="<?php echo base_url();?>report/price_report">Price Report</a></li>
					<li><a href="<?php echo base_url();?>report/officeScheduleReport">Schedule Report</a></li>
					<li><a href="<?php echo base_url();?>report/currentInventoryReport">Current Inventory Report</a></li>
					<li><a href="<?php echo base_url();?>report/soldInventoryReport">Sold Inventory Report</a></li>
					<li><a href="<?php echo base_url();?>report/transactionTaxReport">Tax Transaction Report</a></li>
				</ul>
			</li>
			<?php } ?>
			
			<?php /*	<li><a href="#"><i class="glyphicon glyphicon-wrench"></i><span> Settings</span></a></li>*/?>
		</ul>
	    <?php } ?>
	</div>    
    <!-- topbar ends -->
