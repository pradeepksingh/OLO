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

			<form action="<?php echo base_url();?>/index.php/general/address/updatezone"
				method="post">
				<input type="hidden" name="zoneid" value="<?php echo $edtzone[0]['id']?>">
				<?php $hzoneid = $edtzone[0]['id']?>
				<div class="form-group">
					<label> Select City Name *</label> <select name="cityid">
					<?php foreach ($cityname as $item):?>
					<?php if($hzoneid == $cityname['id']){?>
						<option value= "<?php echo $item['id']?>" selected><?php echo $item['name']?></option>
					<?php }else {?>
						<option value= "<?php echo $item['id']?>"><?php echo $item['name']?></option>
						<?php }?>
					<?php endforeach;?>
					</select>
				</div>
				<div class="form-group">
					<label>Zone Name *</label> <input class="form-control" name="updatezonename"
					 value="<?php echo $edtzone[0]['name']?>"	placeholder="Enter name of the zone">
				</div>
				<button type="submit" name="savezone" class="btn btn-success">Update zone</button>
			</form>
		</div>
		<!-- /.container-fluid -->

	</div>