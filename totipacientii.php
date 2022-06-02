<!DOCTYPE html> 
<html lang="en">

 <?php include('functionalitate.php'); ?>
<head>
		<meta charset="utf-8">
		<title>WearyCare</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
	
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		
				<!-- Datatables CSS -->
		<link rel="stylesheet" href="admin/assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">

<!-- pentru transmitere param -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
				<!-- pentru filtrare tabel -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	
	
	
	</head>
	<body>

		
		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="totipacientii.php">Acasa</a></li>
									<li class="breadcrumb-item active" aria-current="page">Lista pacienti</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Lista pacienti</h2>
						
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										
										<div class="profile-det-info">
											<h3>Dr. Osiceanu Nicoleta</h3>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										
										<ul>
											<li class="active">
												<a href="totipacientii.php">
													<i class="fas fa-columns"></i>
													<span>Pacienti</span>
												</a>
											</li>
											<li>
												<a href="consultatie.php">
													<i class="fas fa-clipboard"></i>
													<span>Consultatii</span>
												</a>
											</li>
											
											
											
											<li>
												<a href="adaugarepacient.php">
													<i class="fas fa-user-plus"></i>
													<span>Adaugare pacient</span>
												</a>
											</li>
										
							
										</ul>
								
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
		
		
		<div class="col-md-7 col-lg-8 col-xl-9">
					
					<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" >
																<img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
												<?php 
																	
												$query = $db->collection('Pacient')->where('id_medic', '=', "1");
												$param = $query->documents();
												$nr=0;
									if($param)
								{
									foreach ($param as $key => $row)
									{
										$nr++;
									}
								}
												
												?>
												
															<h6>Total pacienti</h6>
															<h3><span class="d-block text-info"><?php echo $nr;?></span></h3>
															
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" >
																<img src="assets/img/icon-02.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
														<?php 
										
											?>
															<h6>Total consultatii </h6>
															<h3><span class="d-block text-info">  <?php// echo $row2['NrPacienti']; ?> </span></h3>
															<p class="text-muted"><?php //echo date("Y-m-d"); ?></p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" >
																<img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
											<?php 
										?>
														<div class="dash-widget-info">
															<h6>Consultatii astazi</h6>
															<h3><span class="d-block text-info"><?php //echo $row3['NrPacienti']; ?></span></h3>
															<p class="text-muted"><?php //echo date("Y-m-d"); ?></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					
								<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Lista pacienti</h3>
								
										  <a href="adaugarepacient.php" class="btn book-btn" data-toggle="tooltip" title="Adauga pacient" ><i class="far fa-user" style="color:blue"></i> Adaugare pacient nou</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
					<div class="col-sm-12">
									<?php  if(isset($_SESSION['unsuccess']))
									{  ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>Eroare!</strong> 	<?php echo $_SESSION['unsuccess']; ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									
									<?php
										unset($_SESSION['unsuccess']);
									}  ?>
									
									
									<?php  if(isset($_SESSION['success']))
									{  ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										 <?php echo $_SESSION['success']; ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div> 
									
									<?php 
										unset($_SESSION['success']);  }?>
									
					</div> </div>
									
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
								<input class="form-control" id="myInput1" type="text" placeholder="Cauta">
								<br>
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>CNP</th>
													<th>Nume si prenume</th>
												<th>Data nasterii</th>
													<th>Telefon</th>
													
													<th class="text-right"></th>
													<th class="text-right"></th>
													<th class="text-right"></th>
												</tr>
											</thead>
											<tbody id="myTable">
											
								<?php 
								
								$fetchdata= $db->collection('Pacient')->documents();
								
								if($fetchdata)
								{
									foreach ($fetchdata as $key => $row)
									{
?>
											 <tr>
											 
													<td> <a href="profil_pacient.php?pac_key=<?php echo $row['CNP']; ?>" data-toggle="tooltip" title="Vizualizeaza profilul "> <?php echo $row['CNP']; ?> </a> </td>
												
													<td> <a href="profil_pacient.php?pac_key=<?php echo $row['CNP']; ?>" data-toggle="tooltip" title="Vizualizeaza profilul"> <b> <?php echo $row['Nume']; ?> <?php echo $row['Prenume']; ?> </b> </a> </td>
													<td><?php echo date('d-m-Y',strtotime($row['Data_nasterii'])); ?></td>
													<td><?php echo $row['Telefon']; ?></td>
													
													<td> <a  href="consultatie.php?pac_key=<?php echo $row['CNP']; ?>" data-toggle="tooltip" title="Adauga o consultatie"><i class="fas fa-clipboard" style="color:blue"></i> </a> </td>
													
										
													<td> <a href="profil_pacient.php?pac_key=<?php echo $row['CNP']; ?>" data-toggle="tooltip" title="Vizualizeaza profilul pacientului" ><i class="fas fa-address-card"></i> </a> </td>
													
												
													
													<td> <a  data-toggle="modal" href="#delete_modal"  cnp_pacc="<?php echo $row['CNP']; ?>" data-toggle="tooltip" title="Sterge pacientul"   ><i class="fas fa-trash-alt"  style="color:red"> </i></a> </td>
										
												</tr>
												
									
									<?php
									}
								}
								else 
								{
									?>
									<tr>
									<td>Nu exista; </td>
									</tr> 
									
									<?php
								}
								           
					?>
												
						
											</tbody>
										</table>
									</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   

		</div>
		<!-- /Main Wrapper -->
	  
	  <!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					
						<div class="modal-body">
						<form method="post" action="" name="appt" id="appt" >
						   <input type="hidden"  name="cnp_pacc" class="form__input" value="" readonly  />
							<div class="form-content p-2">
							<center>	<h4 class="modal-title ">Stergere</h4></center>
								<center> <p class="mb-4">Sunteti sigur ca doriti stergerea pacientului?</p>
								<button type="submit" name="StergePac" class="btn btn-primary">Salveaza </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Inchide</button> </center>
							</div>
							
						
						</div>
						</form>
					</div>
				</div>
			</div>
		
		<script>
		$(document).ready(function(){
		  $('[data-toggle="tooltip"]').tooltip();
		});
		</script>
	
	   <script>	
$('#delete_modal').on('shown.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener = $(e.relatedTarget); //this holds the element who called the modal

   //we get details from attributes
  var cnp_pacc=$(opener).attr('cnp_pacc');

//set what we got to our form
  $('#appt').find('[name="cnp_pacc"]').val(cnp_pacc);
 
});
</script>  

   <script>
 //am folosit ready () pentru a face functia disponibila dupa încarcarea documentului
$(document).ready(function(){
	//in momentul in care utilizatorul eliberează o tastă de pe tastatura are loc evenimentul keyup.
  $("#myInput1").on("keyup", function() {
    //parcurge fiecare rand de tabel pentru a verifica daca exista valori de text care se potrivesc cu valoarea intrarii
	// toLowerCase() converteste textul in minuscule, cautarea nefiind CASE SENSITIVE
	var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
		// indexOf(value) returneaza indexul aparitii cautarii
		// toggle ascunde randul care nu corespunde cautarii
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

 
		<script type="module" src="main.js"> </script>
		
	
		<!-- jQuery -->
       <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
       <script src="admin/assets/js/popper.min.js"></script>
		<script src="admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		<!-- Slimscroll JS -->
        <script src="admin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="admin/assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		<script  src="admin/assets/js/script.js"></script>
	
		
	</body>

<!-- doccure/my-patients.html  30 Nov 2019 04:12:09 GMT -->
</html>