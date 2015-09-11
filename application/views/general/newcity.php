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
			
			<form action="<?php echo base_url();?>index.php/general/address/savecity"
				method="post">

				<div class="form-group">
					<label>City Name *</label> <input name="city"
						class="form-control" placeholder="Enter name of the city">
				</div>
				  <button type="submit" name="submit" class="btn btn-success">Save City</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>