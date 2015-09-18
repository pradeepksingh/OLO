<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i>New Locality</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Add Locality</h2>

			<form action="" id="save-locality-form"
				method="post">
				<div class="form-group">
				  <div id="zone-name-error" class="alert alert-danger" style="display:none;"></div>
					<label>Zone Name *</label> <select name="zoneid">
					<option value= "">Select Zone</option>
					<?php foreach ($zonedrop as $item):?>
					<option value= "<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="form-group">
				 <div id="locality-name-error" class="alert alert-danger" style="display:none;"></div>
					<label>Locality Name *</label> <input class="form-control"
						name="locality" placeholder="Enter name of the locality">
				</div>
				<div class="form-group">
				 <div id="locality-long-error" class="alert alert-danger" style="display:none;"></div>
					<label>Locality Longitude *</label> <input class="form-control"
						name="longitude" placeholder="Enter locality longitude">
				</div>
				<div class="form-group">
				 <div id="locality-lat-error" class="alert alert-danger" style="display:none;"></div>
					<label>Locality Latidute *</label> <input class="form-control"
						name="latitude" placeholder="Enter locality latitude">
				</div>
				<button type="button" name="savelocality" id="savelocality" class="btn btn-success">Save Locality</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>
	<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
	<script type="text/javascript">
	$('#savelocality').click(function(){
		var options = {
	 			target : '#error-prevStudent', // target element(s) to be updated with server response 
	 			beforeSubmit : showPreStudentRequest, // pre-submit callback 
	 			success :  showPreStudentResponse,
	 			url : '<?php echo base_url()?>index.php/general/address/savelocality',
	 			semantic : true,
	 			dataType : 'json'
	 		};
   		$('#save-locality-form').ajaxSubmit(options);
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

				$("#zone-name-error").html(responseText.message.zone);
				$("#locality-name-error").html(responseText.message.locality);
				$("#locality-long-error").html(responseText.message.longitude);
				$("#locality-lat-error").html(responseText.message.latitude);
				$("#zone-name-error").show();
				$("#locality-name-error").show();
				$("#locality-long-error").show();
				$("#locality-lat-error").show();
			}
			else if(typeof responseText.message.locality != "undefined"	&&	
			   typeof responseText.message.latitude != "undefined" &&
			   typeof responseText.message.longitude != "undefined"){

				$("#locality-name-error").html(responseText.message.locality);
				$("#locality-long-error").html(responseText.message.longitude);
				$("#locality-lat-error").html(responseText.message.latitude);
				$("#zone-name-error").hide();
				$("#locality-name-error").show();
				$("#locality-long-error").show();
				$("#locality-lat-error").show();
			}
			else if( typeof responseText.message.zone != "undefined" &&	
					typeof responseText.message.latitude != "undefined" &&
					typeof responseText.message.longitude != "undefined"){

				$("#zone-name-error").html(responseText.message.zone);
				$("#locality-long-error").html(responseText.message.longitude);
				$("#locality-lat-error").html(responseText.message.latitude);
				$("#locality-name-error").hide();
				$("#zone-name-error").show();
				$("#locality-long-error").show();
				$("#locality-lat-error").show();
			}
			else if(typeof responseText.message.zone != "undefined" &&
					typeof responseText.message.locality != "undefined"	&&	
					typeof responseText.message.longitude != "undefined"){

				$("#zone-name-error").html(responseText.message.zone);
				$("#locality-name-error").html(responseText.message.locality);
				$("#locality-long-error").html(responseText.message.longitude);
				$("#zone-name-error").show();
				$("#locality-name-error").show();
				$("#locality-long-error").show();
				$("#locality-lat-error").hide();
			}
			else if(typeof responseText.message.zone != "undefined" &&
			   typeof responseText.message.locality != "undefined"	&&	
			   typeof responseText.message.latitude != "undefined"){

				$("#zone-name-error").html(responseText.message.zone);
				$("#locality-name-error").html(responseText.message.locality);
				$("#locality-lat-error").html(responseText.message.latitude);
				$("#zone-name-error").show();
				$("#locality-name-error").show();
				$("#locality-long-error").show();
				$("#locality-lat-error").show();
				$("#locality-long-error").hide();
			}
			else if(typeof responseText.message.zone != "undefined" &&
			   typeof responseText.message.locality != "undefined"){

				$("#zone-name-error").html(responseText.message.zone);
				$("#locality-name-error").html(responseText.message.locality);
				$("#zone-name-error").show();
				$("#locality-name-error").show();
				$("#locality-long-error").hide();
				$("#locality-lat-error").hide();
			}
			else if(typeof responseText.message.zone != "undefined" &&
			   typeof responseText.message.latitude != "undefined"){

				$("#zone-name-error").html(responseText.message.zone);
				$("#locality-lat-error").html(responseText.message.latitude);
				$("#zone-name-error").show();
				$("#locality-name-error").hide();
				$("#locality-long-error").hide();
				$("#locality-lat-error").show();
			}
			else if(typeof responseText.message.zone != "undefined" &&
			   typeof responseText.message.longitude != "undefined"){
				
				$("#zone-name-error").html(responseText.message.zone);
				$("#locality-long-error").html(responseText.message.longitude);
				$("#zone-name-error").show();
				$("#locality-name-error").hide();
				$("#locality-long-error").show();
				$("#locality-lat-error").hide();
			}
			else if(typeof responseText.message.locality != "undefined"	&&	
			   typeof responseText.message.latitude != "undefined"){

				$("#locality-name-error").html(responseText.message.locality);
				$("#locality-lat-error").html(responseText.message.latitude);
				$("#zone-name-error").hide();
				$("#locality-name-error").show();
				$("#locality-long-error").hide();
				$("#locality-lat-error").show();
			}
			else if(typeof responseText.message.locality != "undefined"	&&	
			   typeof responseText.message.longitude != "undefined"){

				$("#locality-name-error").html(responseText.message.locality);
				$("#locality-long-error").html(responseText.message.longitude);
				$("#zone-name-error").hide();
				$("#locality-name-error").show();
				$("#locality-long-error").show();
				$("#locality-lat-error").hide();
			}
			else if(typeof responseText.message.latitude != "undefined" &&
			   typeof responseText.message.longitude != "undefined"){

				$("#locality-long-error").html(responseText.message.longitude);
				$("#locality-lat-error").html(responseText.message.latitude);
				$("#zone-name-error").hide();
				$("#locality-name-error").hide();
				$("#locality-long-error").show();
				$("#locality-lat-error").show();
			}
			else if(typeof responseText.message.zone != "undefined"){

				$("#zone-name-error").html(responseText.message.zone);
				$("#zone-name-error").show();
				$("#locality-name-error").hide();
				$("#locality-long-error").hide();
				$("#locality-lat-error").hide();
			}
			else if(typeof responseText.message.locality != "undefined"){

				$("#locality-name-error").html(responseText.message.locality);
				$("#zone-name-error").hide();
				$("#locality-name-error").show();
				$("#locality-long-error").hide();
				$("#locality-lat-error").hide();
			}
			else if(typeof responseText.message.latitude != "undefined"){

				$("#locality-lat-error").html(responseText.message.latitude);
				$("#zone-name-error").hide();
				$("#locality-name-error").hide();
				$("#locality-long-error").hide();
				$("#locality-lat-error").show();
			}
			else if(typeof responseText.message.longitude != "undefined"){

				$("#locality-long-error").html(responseText.message.longitude);
				$("#zone-name-error").hide();
				$("#locality-name-error").hide();
				$("#locality-long-error").show();
				$("#locality-lat-error").hide();
			}
		}else{
			$("#zone-name-error").hide();
			$("#locality-name-error").hide();
			$("#locality-long-error").hide();
			$("#locality-lat-error").hide();
			window.location.href = '<?php echo base_url()?>index.php/general/address/localitylist';
		}
	}
	</script>