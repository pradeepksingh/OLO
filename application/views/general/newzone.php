<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i>New Zone</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Add Zone</h2>

			<form action="" id="save-zone-form"
				method="post">
				<div class="form-group">
					<div id="city-name-error" class="alert alert-danger" style="display:none;"></div>
					<label>City Name *</label> <select name="cityid">
					<option value= "">slect city</option>
					<?php foreach ($citydrop as $item):?>
					<option value= "<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="form-group">
					<div id="zone-error" class="alert alert-danger" style="display:none;"></div>
					<label>Zone Name *</label> <input class="form-control" name="zonename"
						placeholder="Enter name of the zone">
				</div>
				<button type="button" name="savezone" id="savezone" class="btn btn-success">Save Zone</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
	$('#savezone').click(function(){
		var options = {
	 			target : '#error-prevStudent', // target element(s) to be updated with server response 
	 			beforeSubmit : showPreStudentRequest, // pre-submit callback 
	 			success :  showPreStudentResponse,
	 			url : '<?php echo base_url()?>index.php/general/address/savezone',
	 			semantic : true,
	 			dataType : 'json'
	 		};
   		$('#save-zone-form').ajaxSubmit(options);
	});
	function showPreStudentRequest(formData, jqForm, options){
   		var queryString = $.param(formData);
		return true;
   	}
	function showPreStudentResponse(responseText, statusText, xhr, $form){
		if(responseText.status == 0){
			if(typeof responseText.message.city != "undefined" && typeof responseText.message.zone != "undefined"){
				$("#city-name-error").html(responseText.message.city);
				$("#zone-error").html(responseText.message.zone);
				$("#city-name-error").show();
				$("#zone-error").show();
			}
			else if(typeof responseText.message.city != "undefined"){
				$("#city-name-error").html(responseText.message.city);
				$("#city-name-error").show();
				$("#zone-error").hide();
			}
			else if(typeof responseText.message.zone != "undefined"){
				$("#zone-error").html(responseText.message.zone);
				$("#zone-error").show();
				$("#city-name-error").hide();
			}
		}else{
			$("#zone-error").hide();
			$("#city-name-error").hide();
			 window.location.href = '<?php echo base_url()?>index.php/general/address/zonelist';
		}
	}
	</script>