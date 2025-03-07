<?php
	//set already a catch
	#include_once '../connection/connection.php';
	#
	#if (!isset($_SESSION['user_id'])){
	#	echo "<script>window.location.href='../Authentication/?page=index';</script>";
	#}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title><?= $this->page ?> | BMS</title>
		<link rel="icon" type="image/x-icon" href="../views/admin/resources/img/LNUTaclobanLogo.png">

		<!-- Custom fonts for this template-->
		<link href="../views/admin/resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="../views/admin/resources/css/sb-admin-2.min.css" rel="stylesheet">
		
		<!-- our project just needs Font Awesome Solid + Brands -->
		<link href="../views/admin/resources/fontawesome6/css/fontawesome.css" rel="stylesheet" />
		<link href="../views/admin/resources/fontawesome6/css/brands.css" rel="stylesheet" />
		<link href="../views/admin/resources/fontawesome6/css/solid.css" rel="stylesheet" />
		<link href="../views/admin/resources/fontawesome6/css/solid.css" rel="stylesheet" />
		<link rel="stylesheet" href="../views/admin/resources/fontawesome6/css/fontawesome.min.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- DataTables CSS -->
		<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

		<style>
			.black-border {
				border: 1px solid black;
				border-collapse: collapse;
			}

			.black-border td, 
			.black-border th {
				border: 1px solid black;
			}
			
			.boder-left-transparent td,
			.boder-left-transparent th {
				border-left: 1px solid transparent;
			}
			
			.boder-right-transparent td,
			.boder-right-transparent th {
				border-right: 1px solid transparent;
			}
			
			@media print {
				/* Retain colors during printing */
				body, table, th, td {
					-webkit-print-color-adjust: exact;
					print-color-adjust: exact;
					color: #000;
				}
				
				.font-16 {
					font-size: 16px;
				}
				
				/* Add your page break */
				.page-break {
					page-break-after: always; /* Forces a page break before the element */
				}
			}
			
			/* Style the tab */
			.tab {
			  overflow: hidden;
			  border: 1px solid #ccc;
			  background-color: #f1f1f1;
			}

			/* Style the buttons inside the tab */
			.tab button {
			  background-color: inherit;
			  float: left;
			  border: none;
			  outline: none;
			  cursor: pointer;
			  padding: 14px 16px;
			  transition: 0.3s;
			  font-size: 15px;
			  font-family: Arial;
			}

			/* Change background color of buttons on hover */
			.tab button:hover {
			  background-color: #ddd;
			}

			/* Create an active/current tablink class */
			.tab button.active {
			  background-color: #ccc;
			}

			/* Style the tab content */
			.tabcontent {
			  display: none;
			  padding: 6px 12px;
			  border: 1px solid #ccc;
			  border-top: none;
			}

		</style>

	</head>

	<body id="page-top">
		
		<!-- preparation variables -->
		<?php
			#$page = $_GET['page'];
		?>
		
		<!-- Page Wrapper -->
		<div id="wrapper">

			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center " href="../page/admin.php">
					<div class="sidebar-brand-icon">
						<img src="../views/admin/resources/img/LNUTaclobanLogo.png" alt="LNU Logo" height="50px" width="50px">
					</div>
					<div class="sidebar-brand-text mx-3" style="font-size:30px;">BMS</div>
				</a>

				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Nav Item - Dashboard -->
				<li class="nav-item <?= $this->page == "Administrator"? 'active':'asdasd' ?>">
					<a class="nav-link" href="../page/admin.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					Main
				</div>

				<!-- Nav Item - Main -->
				<li class="nav-item <?php if ($page == "ors"){echo 'active';}?>">
					<a class="nav-link" href="" data-toggle="modal" data-target="#ors">
						<i class="fas fa-fw fa-plus"></i>
						<span>Add New ORS</span>
					</a>
				</li>
				
				<li class="nav-item <?php if ($page == "update_ors"){echo 'active';}?>">
					<a class="nav-link" href="update_ors.php?page=update_ors">
						<i class="fas fa-fw fa-edit"></i>
						<span>List of Obligation Request</span>
					</a>
				</li>
				
				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					Miscellaneous
				</div>

				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item <?= $this->page == "Components"? 'active':''?>">
					<a class="nav-link <?= $this->page == "Components"? 'collapsed':''?>" href="#" data-toggle="collapse" data-target="#collapseTwo"
						aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span>Components</span>
					</a>
					<div id="collapseTwo" class="collapse <?= $this->page == 'Components'? 'show':'' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Custom Components:</h6>
							<a class="collapse-item <?= $this->subpage == "allotment"? 'active':''?>" href="../page/components.php?subpage=allotment">Allotment Class</a>
							<a class="collapse-item <?= $this->subpage == "fc"? 'active':''?>" href="../page/components.php?subpage=fc">Fund Cluster</a>
							<a class="collapse-item <?= $this->subpage == "mfopap"? 'active':''?>" href="../page/components.php?subpage=mfopap">MFO/PAP</a>
							<a class="collapse-item <?= $this->subpage == "uacs"? 'active':''?>" href="../page/components.php?subpage=uacs">UACS Object Code</a>
						</div>
					</div>
				</li>

				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item <?= $this->page == "Budget"? 'active':''?>">
					<a class="nav-link <?= $this->page == "Budget"? 'collapsed':''?>" href="#" data-toggle="collapse" data-target="#collapseTwo1"
						aria-expanded="true" aria-controls="collapseTwo1">
						<i class="fa fa-fw fa-money"></i>
						<span>Budget</span>
					</a>
					<div id="collapseTwo1" class="collapse <?= $this->page == 'Budget'? 'show':'' ?>" aria-labelledby="headingTwo1" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Allocation:</h6>
							<a class="collapse-item <?= $this->subpage == 'sby'? 'active':'' ?>" href="../page/budget.php?subpage=sby">Fiscal Year</a>
							<a class="collapse-item <?= $this->subpage == 'fyb'? 'active':'' ?>" href="../page/budget.php?subpage=fyb">Fiscal Year Budget</a>
							<a class="collapse-item <?= $this->subpage == 'afyb'? 'active':'' ?>" href="../page/budget.php?subpage=afyb">Allocate FY Budget</a>
						</div>
					</div>
				</li>

				<!-- Nav Item - Stationary Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link <?= $page == "designation" || $page == "stationary"? 'collapsed':'' ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities"
						aria-expanded="<?= $page == "designation" || $page == "stationary"? 'true':'' ?>" aria-controls="collapseUtilities">
						<i class="fas fa-fw fa-wrench"></i>
						<span>Stationary</span>
					</a>
					<div id="collapseUtilities" class="collapse <?= $page == "designation" || $page == "stationary"? 'show':'' ?>" aria-labelledby="headingUtilities"
						data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Custom Designation:</h6>
							<a class="collapse-item <?= $page == "designation"? 'active':'' ?>" href="designation.php?page=designation">Designation</a>
							<a class="collapse-item <?= $page == "stationary"? 'active':'' ?>" href="stationary.php?page=stationary">Budget</a>
						</div>
					</div>
				</li>
				
				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					Report
				</div>

				<!-- Nav Item - Tables -->
				<li class="nav-item <?php if ($page == "report"){echo 'active';}?>">
					<a class="nav-link" href="report.php?page=report">
						<i class="fas fa-fw fa-file"></i>
						<span>Report</span>
					</a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
			</ul>
			<!-- End of Sidebar -->
