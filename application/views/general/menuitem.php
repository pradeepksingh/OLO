<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">
                            City <small>List</small>
                        </h1-->
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i> Menu Item List</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<h2>Menu Items</h2>
			<a href="<?php echo base_url();?>index.php/general/address/newmenuitem"
				class="btn btn-primary view-contacts bottom-margin"><i
				class="fa fa-plus"></i> Menu Item</a>
			<form action="<?php echo base_url().'general/editmenuitem'?>"
				method="post">

				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Category Id</th>
								<th>Name</th>
								<th>Price</th>
								<th>Due</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($menuitems as $item):?>
							<tr>
								<td><?php echo $item['catid'];?>
								</td>
								<td><?php echo $item['name'];?>
								</td>
								<td><?php echo $item['price'];?>
								</td>
								<td><?php 
									if($item['due'] == 0)
								    	echo 'No';
									else 
										echo 'Yes';?>
								</td>
								<td><?php echo $item['status'];?>
								</td>
								<td><a href = "<?php echo base_url();?>index.php/general/address/editmenuitem/<?php echo $item['id']?>" class="btn btn-success icon-btn"><i class="fa fa-pencil"></i></a></td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</form>
			<a href="<?php echo base_url();?>index.php/general/address/newmenuitem"
				class="btn btn-primary view-contacts bottom-margin"><i
				class="fa fa-plus"></i> Menu Item</a>

		</div>
		<!-- /.container-fluid -->

	</div>