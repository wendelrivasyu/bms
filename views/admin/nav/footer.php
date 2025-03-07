
				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; BUDGET MANAGEMENT SYSTEM (BMS) <?= date('Y') ?></span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Bootstrap core JavaScript-->
		<script src="../views/admin/resources/vendor/jquery/jquery.min.js"></script>
		<script src="../views/admin/resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="../views/admin/resources/vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="../views/admin/resources/js/sb-admin-2.min.js"></script>

		<!-- Page level plugins -->
		<script src="../views/admin/resources/vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="../views/admin/resources/js/demo/chart-area-demo.js"></script>
		<script src="../views/admin/resources/js/demo/chart-pie-demo.js"></script>
		
		<!-- Page level plugins -->
		<script src="../views/admin/resources/vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="../views/admin/resources/vendor/datatables/dataTables.bootstrap4.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="../views/admin/resources/js/demo/datatables-demo.js"></script>
		
		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		<!-- Bootstrap 5 JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
		<!-- DataTables JS -->
		<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
		
		<!-- Initialize DataTable -->
		<script>
			$(document).ready(function() {
				$('#dataTable1').DataTable();
			});
			
			$(document).ready(function() {
				$('#dataTable2').DataTable();
			});
		</script>
		
		<script>
			
			//var legal_basis = document.getElementById('hiddenInput').value;
		
			document.getElementById("printButton").addEventListener("click", function () {
				var printContent = document.getElementById("printContent").innerHTML;
				var originalContent = document.body.innerHTML;

				document.body.innerHTML = printContent;
				window.print();
				document.body.innerHTML = originalContent;

				// Ensure the original scripts and event listeners are still working after restoring the content
				window.location.reload();
			});
			
			document.getElementById("printButton1").addEventListener("click", function () {
				var printContent = document.getElementById("printContent1").innerHTML;
				var originalContent = document.body.innerHTML;

				document.body.innerHTML = printContent;
				window.print();
				document.body.innerHTML = originalContent;

				// Ensure the original scripts and event listeners are still working after restoring the content
				window.location.reload();
			});
			
			document.getElementById("printButton2").addEventListener("click", function () {
				var printContent = document.getElementById("printContent2").innerHTML;
				var originalContent = document.body.innerHTML;

				document.body.innerHTML = printContent;
				window.print();
				document.body.innerHTML = originalContent;

				// Ensure the original scripts and event listeners are still working after restoring the content
				window.location.reload();
			});
			
			document.getElementById("printButton3").addEventListener("click", function () {
				var printContent = document.getElementById("printContent3").innerHTML;
				var originalContent = document.body.innerHTML;

				document.body.innerHTML = printContent;
				window.print();
				document.body.innerHTML = originalContent;

				// Ensure the original scripts and event listeners are still working after restoring the content
				window.location.reload();
			});
		</script>

	</body>

</html>