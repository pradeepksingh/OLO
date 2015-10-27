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
			<h2>Add Category</h2>
			
			<form action=""
				id="save-category-form" method="post">
				<div class="form-group">
				<div id="category-error" class="alert alert-danger" style="display:none;"></div>
					<label>Category Name *</label> <input name="category"
					class="form-control" placeholder="Enter name of the category">
				</div>
				  <button type="button" name="submit" id="savecategory" class="btn btn-success">Save Category</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
	$('#savecategory').click(function(){
		var options = {
	 			target : '#error-prevStudent', // target element(s) to be updated with server response 
	 			beforeSubmit : showPreStudentRequest, // pre-submit callback 
	 			success :  showPreStudentResponse,
	 			url : '<?php echo base_url()?>index.php/general/address/savecategory',
	 			semantic : true,
	 			dataType : 'json'
	 		};
   		$('#save-category-form').ajaxSubmit(options);
	});
	function showPreStudentRequest(formData, jqForm, options){
   		var queryString = $.param(formData);
		return true;
   	}
	function showPreStudentResponse(responseText, statusText, xhr, $form){
		if(responseText.status == 0){
			$("#category-error").html(responseText.message.category);
			$("#category-error").show();
		}else{
			$("#category-error").hide();
			window.location.href = '<?php echo base_url()?>index.php/general/address/categorylist';
		}
	}
	</script>