<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i>New Menu Item</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Add Menu Item</h2>

			<form action="" id="save-menuitem-form"
				method="post">
				<div class="form-group">
					<div id="category-name-error" class="alert alert-danger" style="display:none;"></div>
					<label>Category Name *</label> <select name="category-name">
					<option value= "">slect category</option>
					<?php foreach ($categorydrop as $item):?>
					<option value= "<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="form-group">
					<div id="menuitem-error" class="alert alert-danger" style="display:none;"></div>
					<label>Menu Item Name *</label> <input class="form-control" name="menuitemname"
						placeholder="Enter name of the menu Item">
				</div>
				<div class="form-group">
					<div id="price-error" class="alert alert-danger" style="display:none;"></div>
					<label>Price *</label> <input class="form-control" name="price"
						placeholder="Enter the price for menu item">
				</div>
				<div class="form-group">
					<label>Due menu item </label><br><input type="radio" name="due" id="due" value="0"> No<br/>
						<input type="radio" name="due" id="due" value="1" checked>Yes
				</div>
				<button type="button" name="savemenuitem" id="savemenuitem" class="btn btn-success">Save Menu Item</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
	$('#savemenuitem').click(function(){
		var options = {
	 			target : '#error-prevStudent', // target element(s) to be updated with server response 
	 			beforeSubmit : showPreStudentRequest, // pre-submit callback 
	 			success :  showPreStudentResponse,
	 			url : '<?php echo base_url()?>index.php/general/address/savemenuitem',
	 			semantic : true,
	 			dataType : 'json'
	 		};
   		$('#save-menuitem-form').ajaxSubmit(options);
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
				$("#category-name-error").html(responseText.message.category);
				$("#menuitem-error").html(responseText.message.menuitem);
				$("#price-error").html(responseText.message.price);
				$("#category-name-error").show();
				$("#menuitem-error").show();
				$("#price-error").show();
			}
			else if(typeof responseText.message.category != "undefined" 
				&& typeof responseText.message.menuitem != "undefined"
			   ){
				$("#category-name-error").html(responseText.message.category);
				$("#menuitem-error").html(responseText.message.menuitem);
				$("#category-name-error").show();
				$("#menuitem-error").show();
				$("#price-error").hide();
			}
			else if(typeof responseText.message.category != "undefined" 
				&& typeof responseText.message.price != "undefined"){
				$("#category-name-error").html(responseText.message.category);
				$("#price-error").html(responseText.message.price);
				$("#category-name-error").show();
				$("#price-error").show();
				$("#menuitem-error").hide();
			}
			else if(typeof responseText.message.menuitem != "undefined"
				&& typeof responseText.message.price != "undefined"){
				$("#menuitem-error").html(responseText.message.menuitem);
				$("#price-error").html(responseText.message.price);
				$("#menuitem-error").show();
				$("#price-error").show();
				$("#category-name-error").hide();
			}
			else if(typeof responseText.message.category != "undefined"){
				$("#category-name-error").html(responseText.message.category);
				$("#category-name-error").show();
				$("#menuitem-error").hide();
				$("#price-error").hide();
			}
			else if(typeof responseText.message.menuitem != "undefined"){
				$("#menuitem-error").html(responseText.message.menuitem);
				$("#menuitem-error").show();
				$("#category-name-error").hide();
				$("#price-error").hide();
			}
			else if(typeof responseText.message.price != "undefined"){
				$("#price-error").html(responseText.message.price);
				$("#price-error").show();
				$("#category-name-error").hide();
				$("#menuitem-error").hide();
			}
		}else{
			$("#menuitem-error").hide();
			$("#category-name-error").hide();
			$("#price-error").hide();
			window.location.href = '<?php echo base_url()?>index.php/general/address/menuitemlist';
		}
	}
	</script>