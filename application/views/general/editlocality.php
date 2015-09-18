<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i>Edit Locality</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Edit Locality</h2>

			<form action="" id="update-locality-form" method="post">
				<input type="hidden" name="localityid" value="<?php echo $edtlocality[0]['id']?>">
				<div class="form-group">
				 <div id="upzone-name-error" class="alert alert-danger" style="display:none;"></div>
					<label>Zone Name *</label> <select name="zoneid">
					<option value= "">select zone</option>
					<?php for($i=0;$i<count($zonename);$i++){
						 $item = $zonename[$i];
						 if($edtlocality[0]['zone_id'] == $item['id']){
					?>
						 	<option value= "<?php echo $item['id']?>" selected><?php echo $item['name']?></option>
					<?php 
						 }else{
					?>
							<option value= "<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php }
						 }?>
					</select>
				</div>
				<div class="form-group">
				 <div id="uplocality-name-error" class="alert alert-danger" style="display:none;"></div>
					<label>Locality Name *</label> <input class="form-control"
					value="<?php echo $edtlocality[0] ['name']?>"	name="updatelocalityname" placeholder="Enter name of the locality">
				</div>
				<div class="form-group">
				 <div id="uplocality-long-error" class="alert alert-danger" style="display:none;"></div>
					<label>Locality Longitude *</label> <input class="form-control"
					value="<?php echo $edtlocality[0]['longitude']?>"	name="updatelongitude" placeholder="Enter locality longitude">
				</div>
				<div class="form-group">
				<div id="uplocality-lat-error" class="alert alert-danger" style="display:none;"></div>
					<label>Locality Latidute *</label> <input class="form-control"
						value="<?php echo $edtlocality[0]['latitude']?>" name="updatelatitude" placeholder="Enter locality latitude">
				</div>
				<button type="button" id="updatelocality" class="btn btn-success">Update locality</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>
		<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
	$('#updatelocality').click(function(){
		var options = {
	 			target : '#error-prevStudent', // target element(s) to be updated with server response 
	 			beforeSubmit : showPreStudentRequest, // pre-submit callback 
	 			success :  showPreStudentResponse,
	 			url : '<?php echo base_url()?>index.php/general/address/updatelocality',
	 			semantic : true,
	 			dataType : 'json'
	 		};
   		$('#update-locality-form').ajaxSubmit(options);
	});
	function showPreStudentRequest(formData, jqForm, options){
   		var queryString = $.param(formData);
		return true;
   	}
	function showPreStudentResponse(responseText, statusText, xhr, $form){
		if(responseText.status == 0){
			if(typeof responseText.message.zone != "undefined" &&
			   typeof responseText.message.locality != "undefined"	&&	
			   typeof responseText.message.latitude != "undefined" &&
			   typeof responseText.message.longitude != "undefined"){

				$("#upzone-name-error").html(responseText.message.zone);
				$("#uplocality-name-error").html(responseText.message.locality);
				$("#uplocality-long-error").html(responseText.message.longitude);
				$("#uplocality-lat-error").html(responseText.message.latitude);
				$("#upzone-name-error").show();
				$("#uplocality-name-error").show();
				$("#uplocality-long-error").show();
				$("#uplocality-lat-error").show();
			}
			else if(typeof responseText.message.locality != "undefined"	&&	
			   typeof responseText.message.latitude != "undefined" &&
			   typeof responseText.message.longitude != "undefined"){

				$("#uplocality-name-error").html(responseText.message.locality);
				$("#uplocality-long-error").html(responseText.message.longitude);
				$("#uplocality-lat-error").html(responseText.message.latitude);
				$("#upzone-name-error").hide();
				$("#uplocality-name-error").show();
				$("#uplocality-long-error").show();
				$("#uplocality-lat-error").show();
			}
			else if( typeof responseText.message.zone != "undefined" &&	
					typeof responseText.message.latitude != "undefined" &&
					typeof responseText.message.longitude != "undefined"){

				$("#upzone-name-error").html(responseText.message.zone);
				$("#uplocality-long-error").html(responseText.message.longitude);
				$("#uplocality-lat-error").html(responseText.message.latitude);
				$("#uplocality-name-error").hide();
				$("#upzone-name-error").show();
				$("#uplocality-long-error").show();
				$("#uplocality-lat-error").show();
			}
			else if(typeof responseText.message.zone != "undefined" &&
					typeof responseText.message.locality != "undefined"	&&	
					typeof responseText.message.longitude != "undefined"){

				$("#upzone-name-error").html(responseText.message.zone);
				$("#uplocality-name-error").html(responseText.message.locality);
				$("#uplocality-long-error").html(responseText.message.longitude);
				$("#upzone-name-error").show();
				$("#uplocality-name-error").show();
				$("#uplocality-long-error").show();
				$("#uplocality-lat-error").hide();
			}
			else if(typeof responseText.message.zone != "undefined" &&
			   typeof responseText.message.locality != "undefined"	&&	
			   typeof responseText.message.latitude != "undefined"){

				$("#upzone-name-error").html(responseText.message.zone);
				$("#uplocality-name-error").html(responseText.message.locality);
				$("#uplocality-lat-error").html(responseText.message.latitude);
				$("#upzone-name-error").show();
				$("#uplocality-name-error").show();
				$("#uplocality-long-error").show();
				$("#uplocality-lat-error").show();
				$("#uplocality-long-error").hide();
			}
			else if(typeof responseText.message.zone != "undefined" &&
			   typeof responseText.message.locality != "undefined"){

				$("#upzone-name-error").html(responseText.message.zone);
				$("#uplocality-name-error").html(responseText.message.locality);
				$("#upzone-name-error").show();
				$("#uplocality-name-error").show();
				$("#uplocality-long-error").hide();
				$("#uplocality-lat-error").hide();
			}
			else if(typeof responseText.message.zone != "undefined" &&
			   typeof responseText.message.latitude != "undefined"){

				$("#upzone-name-error").html(responseText.message.zone);
				$("#uplocality-lat-error").html(responseText.message.latitude);
				$("#upzone-name-error").show();
				$("#uplocality-name-error").hide();
				$("#uplocality-long-error").hide();
				$("#uplocality-lat-error").show();
			}
			else if(typeof responseText.message.zone != "undefined" &&
			   typeof responseText.message.longitude != "undefined"){
				
				$("#upzone-name-error").html(responseText.message.zone);
				$("#uplocality-long-error").html(responseText.message.longitude);
				$("#upzone-name-error").show();
				$("#uplocality-name-error").hide();
				$("#uplocality-long-error").show();
				$("#uplocality-lat-error").hide();
			}
			else if(typeof responseText.message.locality != "undefined"	&&	
			   typeof responseText.message.latitude != "undefined"){

				$("#uplocality-name-error").html(responseText.message.locality);
				$("#uplocality-lat-error").html(responseText.message.latitude);
				$("#upzone-name-error").hide();
				$("#uplocality-name-error").show();
				$("#uplocality-long-error").hide();
				$("#uplocality-lat-error").show();
			}
			else if(typeof responseText.message.locality != "undefined"	&&	
			   typeof responseText.message.longitude != "undefined"){

				$("#uplocality-name-error").html(responseText.message.locality);
				$("#uplocality-long-error").html(responseText.message.longitude);
				$("#upzone-name-error").hide();
				$("#uplocality-name-error").show();
				$("#uplocality-long-error").show();
				$("#uplocality-lat-error").hide();
			}
			else if(typeof responseText.message.latitude != "undefined" &&
			   typeof responseText.message.longitude != "undefined"){

				$("#uplocality-long-error").html(responseText.message.longitude);
				$("#uplocality-lat-error").html(responseText.message.latitude);
				$("#upzone-name-error").hide();
				$("#uplocality-name-error").hide();
				$("#uplocality-long-error").show();
				$("#uplocality-lat-error").show();
			}
			else if(typeof responseText.message.zone != "undefined"){

				$("#upzone-name-error").html(responseText.message.zone);
				$("#upzone-name-error").show();
				$("#uplocality-name-error").hide();
				$("#uplocality-long-error").hide();
				$("#uplocality-lat-error").hide();
			}
			else if(typeof responseText.message.locality != "undefined"){

				$("#uplocality-name-error").html(responseText.message.locality);
				$("#upzone-name-error").hide();
				$("#uplocality-name-error").show();
				$("#uplocality-long-error").hide();
				$("#uplocality-lat-error").hide();
			}
			else if(typeof responseText.message.latitude != "undefined"){

				$("#uplocality-lat-error").html(responseText.message.latitude);
				$("#upzone-name-error").hide();
				$("#uplocality-name-error").hide();
				$("#uplocality-long-error").hide();
				$("#uplocality-lat-error").show();
			}
			else if(typeof responseText.message.longitude != "undefined"){

				$("#uplocality-long-error").html(responseText.message.longitude);
				$("#upzone-name-error").hide();
				$("#uplocality-name-error").hide();
				$("#uplocality-long-error").show();
				$("#uplocality-lat-error").hide();
			}
		}else{
			$("#upzone-name-error").hide();
			$("#uplocality-name-error").hide();
			$("#uplocality-long-error").hide();
			$("#uplocality-lat-error").hide();
			window.location.href = '<?php echo base_url()?>index.php/general/address/localitylist';
		}
	}
					
	</script>