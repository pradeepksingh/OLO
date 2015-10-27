<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i>Category</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Edit Category</h2>
			
			<form action="" id="update-category-form"
				method="post">
				<input type="hidden" name="categoryid" value="<?php echo $edtcategory[0]['id']?>">
				<div class="form-group">
				<div id="update-category-error" class="alert alert-danger" style="display:none;"></div>
					<label>City Name *</label> <input name="updatecategoryname" value="<?php echo  $edtcategory[0]['name']?>"
						class="form-control" placeholder="Enter name of the category">
				</div>
				  <button type="button" name="updatecategory" id="updatecategory" class="btn btn-success">Update Category</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
	$('#updatecategory').click(function(){
		var options = {
	 			target : '#error-prevStudent', // target element(s) to be updated with server response 
	 			beforeSubmit : showPreStudentRequest, // pre-submit callback 
	 			success :  showPreStudentResponse,
	 			url : '<?php echo base_url()?>index.php/general/address/updatecategory',
	 			semantic : true,
	 			dataType : 'json'
	 		};
   		$('#update-category-form').ajaxSubmit(options);
	});
	function showPreStudentRequest(formData, jqForm, options){
   		var queryString = $.param(formData);
		return true;
   	}
	function showPreStudentResponse(responseText, statusText, xhr, $form){
		if(responseText.status == 0){
			$("#update-category-error").html(responseText.message.city);
			$("#update-category-error").show();
		}else{
			$("#update-category-error").hide();
			window.location.href = '<?php echo base_url()?>index.php/general/address/categorylist';
		}
	}
	</script>