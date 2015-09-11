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

			<form action="<?php echo base_url();?>/index.php/general/address/savezone"
				method="post">
				<div class="form-group">
					<label> Select City Name *</label> <select name="id">
					<?php foreach ($citydrop as $item):?>
					<option value= "<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="form-group">
					<label>Zone Name *</label> <input class="form-control" name="name"
						placeholder="Enter name of the zone">
				</div>
				<button type="submit" name="savezone" class="btn btn-default">Submit Button</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>