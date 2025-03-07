<?php
	include 'Nav/sidebar.php';
	include 'Nav/topbar.php';
?>
					<!-- Begin Page Content -->
					<div class="container-fluid">

						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800"><i class="fa fa-list"></i> MFO/PAP</h1>
						</div>

						<!-- Content Row -->
						<div class="row">
							<!-- Area Chart -->
							<div class="col-xl-6 col-lg-7">
								<div class="card shadow mb-4 border-right-primary">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list"></i> Create MFO/PAP</h6>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<form action="../page/components.php?function=addMFOPAP&&subpage=mfopap" method="post" align="right">
											<input class="form-control" type="number" name="mfopap_id" placeholder="MFO/PAP Number" autofocus autocomplete="off" required />
											<textarea class="form-control mt-1" type="text" name="mfopap_desc" placeholder="MFO/PAP Description" autocomplete="off" required ></textarea>
											<button class="btn btn-primary btn-sm mt-2" type="submit">
												<i class="fa fa-save"></i> Save
											</button>
										</form>
									</div>
								</div>
							</div>
							
							<!-- Area Chart -->
							<div class="col-xl-6 col-lg-7">
								<div class="card shadow mb-4 border-right-primary">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list"></i> List of MFO/PAP</h6>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<div class="table-responsive">
											<table id="dataTable1" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th style="text-align:center;">No.</th>
														<th style="text-align:center;">MFO/PAP Number</th>
														<th style="text-align:center;">MFO/PAP Description</th>
														<th style="text-align:center;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php $n = 1; foreach ($mfopap as $mp):?>
														<tr>
															<td align="center"><?= $n++ ?></td>
			 												<td align="center"><?= $mp['mp_number'] ?></td>
			 												<td><?= $mp['mp_desc'] ?></td>
															<td align="center">
																<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_<?= $mp['mp_id'] ?>" ><span class="fa fa-edit"></span> Update</a>
																<!-- Update Modal -->
																<div class="modal fade" id="update_<?= $mp['mp_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
																	aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="exampleModalLabel">UPDATE MFO/PAP DETAILS</h5>
																				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">×</span>
																				</button>
																			</div>
																			<div class="modal-body" align="left">
																				<form action="../page/components.php?function=updateMFOPAP&&subpage=mfopap" method="post">
																					<label>MFO/PAP Number:</label>
																					<input class="form-control" type="number" name="mfopap_number" placeholder="MFO/PAP Number" value="<?= $mp['mp_number'] ?>" autofocus autocomplete="off" required />
																					<label class="mt-2">MFO/PAP Description:</label>
																					<textarea class="form-control" type="text" name="mfopap_desc" placeholder="MFO/PAP Description" autocomplete="off" required ><?= $mp['mp_desc'] ?></textarea>
																					<input type="hidden" name="mp_id" value="<?= $mp['mp_id'] ?>" />
																			</div>
																			<div class="modal-footer">
																				<button class="btn btn-danger btn-sm" type="button" data-dismiss="modal"><i class="fa fa-trash"></i> Cancel</button>
																				<button class="btn btn-success btn-sm" type="submit" ><i class="fa fa-save"></i> Save</button>
																				</form>
																			</div>
																		</div>
																	</div>
																</div>
																<a class="btn btn-warning btn-sm" href="../page/components.php?function=deleteMFOPAP&&subpage=mfopap&&mp_id=<?= $mp['mp_id'] ?>" ><span class="fa fa-trash"></span> Delete</a>
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