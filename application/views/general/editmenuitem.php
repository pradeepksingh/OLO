<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i>Edit Menu Item</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Edit Menu Item</h2>

			<form action="" id="update-menuitem-form"
				method="post">
				<input type="hidden" name="menuitemid" value="<?php echo $edtmenuitem[0]['id']?>"/>
				<div class="form-group">
				<div id="update-categoryname-error" class="alert alert-danger" style="display:none;"></div>
					<label>Category Name *</label> <select name="updatecategoryid">
					<option value= "" >select category</option>
					<?php for($i=0;$i<count($categoryname); $i++){?>
					<?php $item = $categoryname[$i];?>
					<?php if($edtmenuitem[0]['catid'] == $item['id']){?>
						<option value= "<?php echo $item['id']?>" selected><?php echo $item['name']?></option>
					<?php }else {?>
						<option value= "<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php }?>
					<?php }?>
					</select>
				</div>
				<div class="form-group">
					<div id="update-menuitem-error" class="alert alert-danger" style="display:none;"></div>
					<label>Menu Item Name *</label> <input class="form-control" name="updatemenuitemname"
					 value="<?php echo $edtmenuitem[0]['name']?>"	placeholder="Enter name of the menu item">
				</div>
				<div class="form-group">
					<div id="update-price-error" class="alert alert-danger" style="display:none;"></div>
					<label>Menu Item Price *</label> <input class="form-control" name="updatemenuitemprice"
					 value="<?php echo $edtmenuitem[0]['price']?>"	placeholder="Enter price of the menu item">
				
				</div>
				<div class="form-group">
					<label>Due menu item </label><br><input type="radio" 
					name="updatemenuitemdue" id="updatemenuitemdue"
					 value="0"<?php echo($edtmenuitem[0]['due'] == 0)?'checked':'';?>>No <br/>
						<input type="radio" name="updatemenuitemdue" id="updatemenuitemdue" 
						 value="1"<?php echo($edtmenuitem[0]['due'] == 1)?'checked':'';?>>Yes
				</div>
				<button type="button" name="updatemenuitem" id="updatemenuitem" class="btn btn-success">Update menu item</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
	$('#updatemenuitem').click(function(){
		var options = {
	 			target : '#error-prevStudent', // target element(s) to be updated with server response 
	 			beforeSubmit : showPreStudentRequest, // pre-submit callback 
	 			success :  showPreStudentResponse,
	 			url : '<?php echo base_url()?>index.php/general/address/updatemenuitem',
	 			semantic : true,
	 			dataType : 'json'
	 		};
   		$('#update-menuitem-form').ajaxSubmit(options);
	});
	function showPreStudentRequest(formData, jqForm, options){
   		var queryString = $.param(formData);
		return true;
   	}
	function showPreStudentResponse(responseText, statusText, xhr, $form){
		if(responseText.status == 0){
			if(typeof responseText.message.category != "undefined" 
				&& typeof responseText.message.menuitem != "undefined"
				&& typeof responseText.message.price != "undefined"){
				$("#update-categoryname-error").html(responseText.message.category);
				$("#update-menuitem-error").html(responseText.message.menuitem);
				$("#update-price-error").html(responseText.message.price);
				$("#update-categoryname-error").show();
				$("#update-menuitem-error").show();
				$("#update-price-error").show();
			}
			else if(typeof responseText.message.category != "undefined" 
				&& typeof responseText.message.menuitem != "undefined"
			   ){
				$("#update-categoryname-error").html(responseText.message.category);
				$("#update-menuitem-error").html(responseText.message.menuitem);
				$("#update-categoryname-error").show();
				$("#update-menuitem-error").show();
				$("#update-price-error").hide();
			}
			else if(typeof responseText.message.category != "undefined" 
				&& typeof responseText.message.price != "undefined"){
				$("#update-categoryname-error").html(responseText.message.category);
				$("#update-price-error").html(responseText.message.price);
				$("#update-categoryname-error").show();
				$("#update-price-error").show();
				$("#update-menuitem-error").hide();
			}
			else if(typeof responseText.message.menuitem != "undefined"
				&& typeof responseText.message.price != "undefined"){
				$("#update-menuitem-error").html(responseText.message.menuitem);
				$("#update-price-error").html(responseText.message.price);
				$("#update-menuitem-error").show();
				$("#update-price-error").show();
				$("#update-categoryname-error").hide();
			}
			else if(typeof responseText.message.category != "undefined"){
				$("#update-categoryname-error").html(responseText.message.category);
				$("#update-categoryname-error").show();
				$("#update-menuitem-error").hide();
				$("#update-price-error").hide();
			}
			else if(typeof responseText.message.menuitem != "undefined"){
				$("#update-menuitem-error").html(responseText.message.menuitem);
				$("#update-menuitem-error").show();
				$("#update-categoryname-error").hide();
				$("#update-price-error").hide();
			}
			else if(typeof responseText.message.price != "undefined"){
				$("#update-price-error").html(responseText.message.price);
				$("#update-price-error").show();
				$("#update-categoryname-error").hide();
				$("#update-menuitem-error").hide();
			}
		}else{
			$("#update-menuitem-error").hide();
			$("#update-categoryname-error").hide();
			$("#update-price-error").hide();
			//window.location.href = '<?php echo base_url()?>index.php/general/address/menuitemlist';
		}
	}
	</script>