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

			<form action="<?php echo base_url();?>index.php/general/address/savelocality"
				method="post">
				<div class="form-group">
					<label> Select Zone Name *</label> <select name="id">
					<?php foreach ($zonedrop as $item):?>
					<option value= "<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="form-group">
					<label>Locality Name *</label> <input class="form-control"
						name="locality" placeholder="Enter name of the locality">
				</div>
				<div class="form-group">
					<label>Locality Longitude *</label> <input class="form-control"
						name="longitude" placeholder="Enter locality longitude">
				</div>
				<div class="form-group">
					<label>Locality Latidute *</label> <input class="form-control"
						name="latitude" placeholder="Enter locality latitude">
				</div>
				<button type="submit" name="savelocality" class="btn btn-default">Submit Button</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>