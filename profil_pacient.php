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
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
	
		
		<!-- pentru filtrare tabel -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- pentru transmitere param -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<?php 
	    $pac_key= isset($_GET['pac_key'])? $_GET['pac_key']:"";
		
		$docRef = $db->collection('Pacient')->document($pac_key);
        $row = $docRef->snapshot();
										
   ?>
   
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
									<li class="breadcrumb-item active" aria-current="page"  ><b>Profil pacient  </b></li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Consultatie</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										
										<div class="profile-det-info">
											<h3><?php echo $row['Nume']; echo " "; echo $row['Prenume'];  ?></h3>
											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i> <?php echo date('d-m-Y',strtotime($row['Data_nasterii']));?></h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <?php echo $row['Oras']; ?> </h5>
											</div>
											
												<td> <a  data-toggle="modal" href="#delete_modal2"  data-toggle="tooltip" title="Sterge pacientul"   ><i class="fas fa-trash-alt"  style="color:red"> </i> <h7 style="color:red;">Stergere pacient</h7></a> </td>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="profil_pacient.php?pac_key=<?php echo $pac_key; ?>">
													<i class="fas fa-columns"></i>
													<span>Consultatii</span>
												</a>
												
												
											</li>
											<li>				
												<a href="acasa_pacient.php?pac_key=<?php echo $pac_key;  ?>">
												<i class="fas fa-user-cog"></i>
													<span>Date personale</span>
												</a>
											</li>
											
											
												<li>
												<a href="sistem_inteligent.php?pac_key=<?php echo $pac_key;  ?>">
												<i class="fas fa-heartbeat"></i>
													
													<span>Sistem purtabil</span>
												</a>
											</li>
											
											<li>				
												<a href="recomandari.php?pac_key=<?php echo $pac_key;  ?>">
												<i class="fas fa-file-medical"></i>
													<span>Recomandari</span>
												</a>
											</li>
											
										</ul>
									</nav>
								</div>

							</div>
						</div>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								<br>
								  <a href="programari.php?pac_CNP=<?php echo $row['CNP']; ?>" class="btn book-btn" data-toggle="tooltip" title="Adauga programare" ><i class="far fa-calendar-check" style="color:blue"></i> Consultatii</a>
								 
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
										<strong>Felicitari!</strong> <?php echo $_SESSION['success']; ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div> 
									
									<?php 
										unset($_SESSION['success']);  }?>
									
								
									<!-- Tab Menu -->
									
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#progtrecute" data-toggle="tab">Trecute</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#progazi" data-toggle="tab">Astazi</a>
											</li>
											
											
										</ul>
									</nav>
									<!-- /Tab Menu -->
							

							<!-- Tab Content -->
									<div class="tab-content pt-0">
								
										<!-- Prog trecute -->
										<div id="progtrecute" class="tab-pane fade show active">
											
													<div class="table-responsive">
													
												<input class="form-control" id="myInput" type="text" placeholder="Cauta">
												<br>
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
															
																	
																</tr>
															</thead>
															<tbody id="myTable">
										<?php 
									      
													?>						
																<tr>
																	
																	   <td> </td>
																		<td> </td> 																	   
																		   <td>
																		<span class="d-block text-info"> </span></td>
															          <td><?php  ?> </td> 	
																
																					
													
													
																</tr>
										<?php ?>
																
															</tbody>
														</table>
												
										</div>
										</div>
										
										<!-- /Prog trecute -->
										
										<!-- Prog Azi -->
										<div class="tab-pane" id="progazi">
											
													<div class="table-responsive">
													
												<input class="form-control" id="myInput2" type="text" placeholder="Cauta">
												<br>
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
															
																</tr>
															</thead>
															<tbody id="myTable2">
										<?php 
									         
													?>						
																<tr>
																	
																	   <td><?php  ?> </td>
																		<td><?php ?> </td> 																	   
																		   <td>
																		<span class="d-block text-info"><?php?> </span></td>
															          <td><?php  ?> </td> 	
																
															
																</tr>
										<?php ?>
																
															</tbody>
														</table>
													
										
											</div>
										</div>
										<!-- /Prog azi-->
									
										

								</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			
		   
		</div>
		<!-- /Main Wrapper -->
		
			
	  
			
		
		

	  <!-- Delete Modal -->
			<div class="modal fade" id="delete_modal2" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					
						<div class="modal-body">
						<form method="post" action="" name="appt" id="appt" >
						   <input type="hidden"  name="cnp_pacc" class="form__input" value="<?php echo $pac_CNP;?>" readonly  />
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
	
$('#delete_modal').on('shown.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener = $(e.relatedTarget); //this holds the element who called the modal

   //we get details from attributes
  var id_prog=$(opener).attr('id_prog');

//set what we got to our form
  $('#apptt').find('[name="id_prog"]').val(id_prog);

});
</script>  
	<script>
	
$('#modif_prog').on('shown.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener = $(e.relatedTarget); //this holds the element who called the modal

   //we get details from attributes
var id_progg=$(opener).attr('id_prog');
var cnp_pacc=$(opener).attr('cnp_pac');

//set what we got to our form
  $('#apptform').find('[name="id_progg"]').val(id_progg);
  $('#apptform').find('[name="cnp_pac"]').val(cnp_pacc);
});
</script>  

	<script>
	
$('#viz_fisa').on('shown.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener = $(e.relatedTarget); //this holds the element who called the modal

   //we get details from attributes
var id_progg1=$(opener).attr('id_prog');



//set what we got to our form
  $('#apptformm').find('[name="id_progg1"]').val(id_progg1);

});
</script>  
<script>
	
$('#viz_fisa2').on('shown.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener = $(e.relatedTarget); //this holds the element who called the modal

   //we get details from attributes
var id_progg2=$(opener).attr('id_prog2');

//set what we got to our form
  $('#apptformm2').find('[name="id_progg2"]').val(id_progg2);

});
</script>

		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/patient-dashboard.html  30 Nov 2019 04:12:16 GMT -->
</html>