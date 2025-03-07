<?php
	include 'Nav/sidebar.php';
	include 'Nav/topbar.php';
?>
					<!-- Begin Page Content -->
					<div class="container-fluid">

						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800"><i class="fa fa-dedent"></i> FUND CLUSTER</h1>
						</div>

						<!-- Content Row -->
						<div class="row">
							<!-- Area Chart -->
							<div class="col-xl-4 col-lg-5">
								<div class="card shadow mb-4 border-right-primary">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-calendar"></i> Create Fund Cluster</h6>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<form action="../page/components.php?function=addFC&&subpage=fc" method="post" align="right">
											<input class="form-control" type="text" name="fc_number" placeholder="Fund Cluster Code" autofocus autocomplete="off" required />
											<input class="form-control mt-2" type="text" name="fc_desc" placeholder="Fund Clsuter Description" autofocus autocomplete="off" required />
											<input class="form-control mt-2" type="text" name="fc_color" placeholder="Fund Cluster Color" autofocus autocomplete="off" required />
											<button class="btn btn-primary btn-sm mt-2" type="submit">
												<i class="fa fa-save"></i> Save
											</button>
										</form>
									</div>
								</div>
							</div>
							
							<!-- Area Chart -->
							<div class="col-xl-8 col-lg-9">
								<div class="card shadow mb-4 border-right-primary">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-dedent"></i> List of Fund Cluster </h6>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<div class="table-responsive">
											<table id="dataTable1" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th style="text-align:center;">No.</th>
														<th style="text-align:center;">Fund Cluster Code</th>
														<th style="text-align:center;">Fund Cluster Description</th>
														<th style="text-align:center;">Fund Cluster Color</th>
														<th style="text-align:center;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php $n = 1; foreach ($fund_cluster as $fc):?>
														<tr>
															<td align="center"><?= $n++ ?></td>
			 												<td align="center"><?= $fc['fc_number'] ?></td>
			 												<td align="center"><?= $fc['fc_desc'] ?></td>
			 												<td align="center" style="background-color:<?= $fc['fc_color']?>"><?= $fc['fc_color'] ?></td>
															<td align="center">
																<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_<?= $fc['fc_id'] ?>" ><span class="fa fa-edit"></span> Update</a>
																<!-- Update Modal -->
																<div class="modal fade" id="update_<?= $fc['fc_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
																	aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="exampleModalLabel">UPDATE FUND CLUSTER</h5>
																				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">×</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<form action="../page/components.php?function=updateFC&&subpage=fc" method="post">
																					<div class="" align="left">Fund Cluster Code:</div>
																					<input class="form-control" type="text" name="fc_number" value="<?= $fc['fc_number'] ?>" placeholder="Allotment Class Number"  autocomplete="off" required />
																					<div class="mt-2" align="left">Fund Cluster Description:</div>
																					<input class="form-control mt-2" type="text" name="fc_desc" value="<?= $fc['fc_desc'] ?>" placeholder="Allotment Class Code"  autocomplete="off" required />
																					<div class="mt-2" align="left">Fund Cluster Color:</div>
																					<input class="form-control mt-2" type="text" name="fc_color" value="<?= $fc['fc_color'] ?>" style="background-color:<?= $fc['fc_color'] ?>" placeholder="Allotment Class Abbreviation"  autocomplete="off" required />
																					<input type="hidden" name="fc_id" value="<?= $fc['fc_id'] ?>" />
																			</div>
																			<div class="modal-footer">
																				<button class="btn btn-danger btn-sm" type="button" data-dismiss="modal"><i class="fa fa-trash"></i> Cancel</button>
																				<button class="btn btn-success btn-sm" type="submit" ><i class="fa fa-save"></i> Save</button>
																				</form>
																			</div>
																		</div>
																	</div>
																</div>
																<a class="btn btn-warning btn-sm" href="../page/components.php?function=deleteFC&&subpage=fc&&fc_id=<?= $fc['fc_id'] ?>" ><span class="fa fa-trash"></span> Delete</a>
															</td>
														</tr>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Content Row -->

					</div>
					<!-- /.container-fluid -->

				</div>
				<!-- End of Main Content -->
<?php
	include 'Nav/footer.php';
?>