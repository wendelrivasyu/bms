<?php
	include 'Nav/sidebar.php';
	include 'Nav/topbar.php';
?>
					<!-- Begin Page Content -->
					<div class="container-fluid">

						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800"><i class="fa fa-calendar"></i> ALLOCATE FISCAL YEAR BUDGET/ALLOCATION/SARO</h1>
						</div>

						<!-- Content Row -->
						<div class="row">
							<!-- Area Chart -->
							<div class="col-xl-4 col-lg-5">
								<div class="card shadow mb-4 border-right-primary">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-calendar"></i> Create Budget/Allotment/SORA per Fiscal Year</h6>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<form action="../page/budget.php?function=addFYB&&subpage=fyb" method="post" align="right">
											<select class="form-control" name="fy" autofocus required>
												<option disabled selected value="">**SELECT FISCAL YEAR**</option>
												<option disabled></option>
												<?php foreach($fiscal_year as $fy):?>
													<option value="<?= $fy['fy_id'] ?>">F.Y. <?= $fy['fy_year'] ?></option>
												<?php endforeach ?>
											</select>
											<input class="form-control mt-2" type="number" name="budget" placeholder="Budget/Allotment Amount" min="0" step="any" autocomplete="off" required />
											<div class="mt-2" align="left">
												<input class="" type="checkbox" name="additional"> SARO
											</div>
											<input class="form-control mt-2" type="text" name="desc" placeholder="Description" autocomplete="off" />
											<div class="mt-3" align="left">
												<p><span style="color:red;"><b>Note:</b></span> Check the SARO if additional Budget/Allotment has been issued. And make sure it belongs to the selected fiscal year.</p>
											</div>
											<button class="btn btn-primary btn-sm mt-2" type="submit">
												<i class="fa fa-save"></i> Save
											</button>
										</form>
									</div>
								</div>
								
								<div class="card shadow mb-4 border-right-primary">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-calendar"></i> List of Budget/Allotment per Fiscal Year </h6>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<div class="table-responsive">
											<table id="dataTable2" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th style="text-align:center;">No.</th>
														<th style="text-align:center;">Fiscal Year</th>
														<th style="text-align:center;">Budget/Allotment</th>
														<th style="text-align:center;">Budget/Allotment Description</th>
														<th style="text-align:center;">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php $n = 1; foreach ($get_fiscal_year_budget as $bdgt):?>
														<tr>
															<td><?= $n++ ?></td>
															<?php foreach ($fiscal_year as $fy):?>
																<?= $fy['fy_id'] == $bdgt['budget_fy_id']? "<td align='center'>".$fy['fy_year']."</td>":'' ?>
															<?php endforeach ?>
															<td align="right"><?= number_format($bdgt['budget_allotment'],2) ?></td>
															<td><?= $bdgt['budget_additional'] == 1? "*SARO - ".$bdgt['budget_desc']:$bdgt['budget_desc'] ?></td>
															<td align="center">
																<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_<?= $bdgt['budget_id'] ?>" title="UPDATE"><span class="fa fa-edit"></span></a>
																<!-- Update Modal -->
																<div class="modal fade" id="update_<?= $bdgt['budget_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
																	aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="exampleModalLabel">UPDATE BUDGET/ALLOTMENT/SORA</h5>
																				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">×</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<form action="../page/budget.php?function=updateFYB&&subpage=fyb" method="post" align="left">
																					<label>Fiscal Year:</label>
																					<select class="form-control" name="fy" autofocus required>
																						<option disabled value="">**SELECT FISCAL YEAR**</option>
																						<option disabled></option>
																						<?php foreach($fiscal_year as $fy1):?>
																							<option value="<?= $fy1['fy_id'] ?>" <?= $bdgt['budget_fy_id'] == $fy1['fy_id']? 'selected':'' ?> >F.Y. <?= $fy1['fy_year'] ?></option>
																						<?php endforeach ?>
																					</select>
																					<label class="mt-2">Budget/Allotment Amount:</label>
																					<input class="form-control" type="number" name="budget" placeholder="Budget/Allotment" min="0" step="any" autocomplete="off" value="<?= $bdgt['budget_allotment'] ?>" required />
																					<div class="mt-2" align="left">
																						<input class="" type="checkbox" name="additional" <?= $bdgt['budget_additional'] == 1? "checked":"" ?> /> SARO
																					</div>
																					<label class="mt-2">Description:</label>
																					<input class="form-control" type="text" name="desc" placeholder="Description" value="<?= $bdgt['budget_desc'] ?>" autocomplete="off" />
																					<div class="mt-3" align="left">
																						<p><span style="color:red;"><b>Note:</b></span> Check the SARO if additional Budget/Allotment has been issued. And make sure it belongs to the selected fiscal year.</p>
																					</div>
																					<input type="hidden" name="budget_id" value="<?= $bdgt['budget_id'] ?>" />
																			</div>
																			<div class="modal-footer">
																				<button class="btn btn-danger btn-sm" type="button" data-dismiss="modal"><i class="fa fa-trash"></i> Cancel</button>
																				<button class="btn btn-success btn-sm" type="submit" ><i class="fa fa-save"></i> Save</button>
																				</form>
																			</div>
																		</div>
																	</div>
																</div>
																<a class="btn btn-warning btn-sm" href="../page/budget.php?function=deleteFYB&&subpage=fyb&&fyb_id=<?= $bdgt['budget_id'] ?>" title="DELETE"><span class="fa fa-trash"></span></a>
															</td>
														</tr>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							
							<!-- Area Chart -->
							<div class="col-xl-8 col-lg-9">
								<div class="card shadow mb-4 border-right-primary">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-calendar"></i> Consolidated List of Budget/Allotment/SORA per Fiscal Year</h6>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<div class="table-responsive">
											<table id="dataTable1" class="table table-striped table-bordered">
												<thead>
													<tr>
														<th style="text-align:center;">No.</th>
														<th style="text-align:center;">Fiscal Year</th>
														<th style="text-align:center;">Budget/Allotment</th>
														<th style="text-align:center;">Budget/Allotment Description</th>
													</tr>
												</thead>
												<tbody>
													<?php $n = 1; foreach ($fiscal_year as $fy):?>
														<tr>
															<td align="center"><?= $n++ ?></td>
			 												<td align="center"><?= $fy['fy_year'] ?></td>
															<td align="right">
																<?php 
																	$total_budget = 0;
																	$remarks = "";
																	foreach ($get_fiscal_year_budget as $budget){
																		if ($budget['budget_fy_id'] == $fy['fy_id'] || ($budget['budget_fy_id'] == $fy['fy_id'] && $budget['additional'] == 1)){
																			$total_budget += $budget['budget_allotment'];
																			$remarks .= $budget['budget_desc'].", ";
																		}
																	}
																	echo number_format($total_budget,2);
																?>
															</td>
															<td><?= $remarks?></td>
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