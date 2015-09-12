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
			
			<form action="<?php echo base_url();?>index.php/general/address/updatecity"
				method="post">
				<input type="hidden" name="cityid" value="<?php echo $edtcity[0]['id']?>">
				<div class="form-group">
					<label>City Name *</label> <input name="updatecityname" value="<?php echo  $edtcity[0]['name']?>"
						class="form-control" placeholder="Enter name of the city">
				</div>
				  <button type="submit" name="updatecity" class="btn btn-success">Update City</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>