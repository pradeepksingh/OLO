<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i>City</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Add City</h2>
			
			<form action=""
				id="save-city-form" method="post">
				<div class="form-group">
				<div id="city-error" class="alert alert-danger" style="display:none;"></div>
					<label>City Name *</label> <input name="city"
					class="form-control" placeholder="Enter name of the city">
				</div>
				  <button type="button" name="submit" id="savecity" class="btn btn-success">Save City</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
	$('#savecity').click(function(){
		var options = {
	 			target : '#error-prevStudent', // target element(s) to be updated with server response 
	 			beforeSubmit : showPreStudentRequest, // pre-submit callback 
	 			success :  showPreStudentResponse,
	 			url : '<?php echo base_url()?>index.php/general/address/savecity',
	 			semantic : true,
	 			dataType : 'json'
	 		};
   		$('#save-city-form').ajaxSubmit(options);
	});
	function showPreStudentRequest(formData, jqForm, options){
   		var queryString = $.param(formData);
		return true;
   	}
	function showPreStudentResponse(responseText, statusText, xhr, $form){
		if(responseText.status == 0){
			$("#city-error").html(responseText.message.city);
			$("#city-error").show();
		}else{
			$("#city-error").hide();
			window.location.href = '<?php echo base_url()?>index.php/general/address/citylist';
		}
	}
	</script>