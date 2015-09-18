<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i>Edit Zone</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Edit Zone</h2>

			<form action="" id="update-zome-form"
				method="post">
				<input type="hidden" name="zoneid" value="<?php echo $edtzone[0]['id']?>">
				<div class="form-group">
				<div id="update-city-name-error" class="alert alert-danger" style="display:none;"></div>
					<label>City Name *</label> <select name="cityid">
					<option value= "" >select city</option>
					<?php for($i=0;$i<count($cityname); $i++){?>
					<?php $item = $cityname[$i];?>
					<?php if($edtzone[0]['city_id'] == $item['id']){?>
						<option value= "<?php echo $item['id']?>" selected><?php echo $item['name']?></option>
					<?php }else {?>
						<option value= "<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php }?>
					<?php }?>
					</select>
				</div>
				<div class="form-group">
					<div id="update-zone-error" class="alert alert-danger" style="display:none;"></div>
					<label>Zone Name *</label> <input class="form-control" name="updatezonename"
					 value="<?php echo $edtzone[0]['name']?>"	placeholder="Enter name of the zone">
				</div>
				<button type="button" name="updatezone" id="updatezone" class="btn btn-success">Update zone</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
	$('#updatezone').click(function(){
		var options = {
	 			target : '#error-prevStudent', // target element(s) to be updated with server response 
	 			beforeSubmit : showPreStudentRequest, // pre-submit callback 
	 			success :  showPreStudentResponse,
	 			url : '<?php echo base_url()?>index.php/general/address/updatezone',
	 			semantic : true,
	 			dataType : 'json'
	 		};
   		$('#update-zone-form').ajaxSubmit(options);
	});
	function showPreStudentRequest(formData, jqForm, options){
   		var queryString = $.param(formData);
		return true;
   	}
	function showPreStudentResponse(responseText, statusText, xhr, $form){
		if(responseText.status == 0){
			if(typeof responseText.message.city != "undefined" && typeof responseText.message.zone != "undefined"){
				$("#update-city-name-error").html(responseText.message.city);
				$("#update-zone-error").html(responseText.message.zone);
				$("#update-city-name-error").show();
				$("#update-zone-error").show();
			}
			else if(typeof responseText.message.city != "undefined"){
				$("#update-city-name-error").html(responseText.message.city);
				$("#update-city-name-error").show();
				$("#update-zone-error").hide();
			}
			else if(typeof responseText.message.zone != "undefined"){
				$("#update-zone-error").html(responseText.message.zone);
				$("#update-zone-error").show();
				$("#update-city-name-error").hide();
			}
			$("#update-zone-error").html(responseText.message.zone);
			$("#update-zone-error").show();
		}else{
			$("#update-zone-error").hide();
			window.location.href = '<?php echo base_url()?>index.php/general/address/zonelist';
		}
	}
	</script>