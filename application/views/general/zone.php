<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i> Zone List</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Zones</h2>
			<a href="<?php echo base_url();?>index.php/general/address/newzone"
				class="btn btn-primary view-contacts bottom-margin"><i
				class="fa fa-plus"></i> Zone</a>
			<form action="<?php echo base_url().'general/editzone'?>"
				method="post">

				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($zones as $item):?>
							<tr>
								<td><?php echo $item['id'];?>
								</td>
								<td><?php echo $item['name'];?>
								</td>
								<td><?php echo $item['status'];?>
								</td>
								<td><a href = "<?php echo base_url();?>index.php/general/address/editzone/<?php echo $item['id']?>" class="btn btn-success icon-btn"><i class="fa fa-pencil"></i></a></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</form>
			<a href="<?php echo base_url();?>index.php/general/address/newzone"
				class="btn btn-primary view-contacts bottom-margin"><i
				class="fa fa-plus"></i> Zone</a>

		</div>
		<!-- /.container-fluid -->

	</div>