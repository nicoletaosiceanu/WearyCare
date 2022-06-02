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
		
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		
		<!-- pentru Keyup-->
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  
  	<!-- pentru transmitere param -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

		

	<?php 
	   
	   
	    $pac_key= isset($_GET['pac_key'])? $_GET['pac_key']:"";
		$docRef = $db->collection('Pacient')->document($pac_key);
        $row = $docRef->snapshot();
		
		$query = $db->collection('Istoric_med')->where('id_pacient', '=', $pac_key);
	    $istoric = $query->documents();
		
		$query2 = $db->collection('Alergii')->where('id_pacient', '=', $pac_key);
	    $alergii = $query2->documents();
		
		
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
									<li class="breadcrumb-item active" aria-current="page"><b>Profil pacient</b></li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Recomandari</h2>
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
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										
										<div class="profile-det-info">
											<h3><?php echo $row['Nume'];  echo " ";  echo $row['Prenume'];  ?></h3>
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
											<li>
												<a href="profil_pacient.php?pac_key=<?php echo $pac_key; ?>">
													<i class="fas fa-columns"></i>
													<span>Consultatii</span>
												</a>
											</li>
											<li >
												<a href="acasa_pacient.php?pac_key=<?php echo $pac_key;  ?>">
												<i class="fas fa-user-cog"></i>
													<span>Date personale</span>
												</a>
											</li>
											
											<li>
												<a href="sistem_inteligent.php?pac_key=<?php echo $pac_key;  ?>"">
													<i class="fas fa-heartbeat"></i>
													<span>Sistem purtabil</span>
												</a>
											</li>
											
												<li class="active">				
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
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							
							<div class="card">
							<div class="card-body">
								<div class="pro-content">
								
									<form method="post" action="">  
									<h4>Recomandari</h4>
									
									
									<div class="row form-row">
	
										<div class="col-md-12">
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
									
									</div>
									               
											<input type="hidden" name="pac_key" id="pac_key"  type="text" class="form-control" value="<?php echo $pac_key;?>">
											
							
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Tipul recomandarii <span class="text-danger">* </span>  </label> 
													
												<input name="tip_rec" id="tip_rec"  type="text" class="form-control" required >
											</div>
										</div>
										
										
									
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Durata zilnica: </label> 
												<input name="durata" id="durata" type="text" class="form-control" >
											</div>
										</div>
										
										<div class="col-md-5">
											<div class="form-group">
												<label>Alte indicatii </label> 
												<input name="indicatii" id="indicatii" type="text" class="form-control" >
											</div>
											
							             </div>	
										
									</div>
									
									
									
					
								<div class="submit-section submit-btn-bottom">
								<button type="submit" name="adauga_rec" class="btn btn-rounded btn-outline-primary">Adauga</button>
								<input type="reset" name="Anulare" class="btn btn-rounded btn-outline-danger" value="Anuleaza" />
								</div>
									
									</form>
									</div>
									</div>
									</div>
									
					<div class="card">
							<div class="card-body">
								<div class="pro-content">				
									
						<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
								
								<br>
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Recomandare</th>
													<th>Durata</th>
												<th>Indicatii</th>
												
													
													<th class="text-right"></th>
													<th class="text-right"></th>
												</tr>
											</thead>
											<tbody id="myTable">
											
								<?php 

                                $fetchdata= $db->collection('Pacient')->documents();			
								$query2 = $db->collection('Recomandari')->where('id_pacient', '=', $pac_key);
	                             $recomandari = $query2->documents();
								
								if($recomandari)
								{
									foreach ($recomandari as $key => $row)
									{
?>
											 <tr>
											 
													
													<td><?php echo $row['tip_recomandare']; ?></td>
													<td><?php echo $row['durata']; ?></td>
													<td><?php echo $row['indicatii']; ?></td>
													
													
										
													
												<td> <a class="btn btn-sm bg-info-light"  data-toggle="modal" href="#modif_recomandare"  data-toggle="tooltip" title="Modifica recomandare" id_recomandare="<?php echo $row->id(); ?>">
																				<i class="far fa-eye"></i> Editeaza
																			</a> </td>
																		
													
												
													
													<td> <a  class="btn btn-sm bg-danger"  data-toggle="modal" href="#sterge_recomandare"  id_recomandare="<?php echo $row->id(); ?>" data-toggle="tooltip" title="Sterge recomandare"   ><i class="fas fa-trash-alt"  > </i> Sterge </a> </td>
										
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
		
		

			
			<!-- Modif prog  -->
			<div class="modal fade" id="modif_recomandare" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-body">
						<form method="post" action="" name="apptform" id="apptform" >
						
						   <input type="hidden"  name="id_recomandare" class="form__input" value="" readonly  />
						   
							<div class="form-content p-2">
							<center>	<h4 class="modal-title ">Modificare recomandare</h4></center>
								<center> 
							
								 
								<div class="col-md-6">
											<div class="form-group">
												<label>Recomandare</label> 
												<input name="rec" id="rec"  type="text" >
												
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Durata</label>

											<input type="text"  name="durata" id="durata" ">
									
											</div>
										</div>
										                
									 <div class="col-md-12">
											<div class="form-group">
												<label>Indicatii </label> 
												<input name="indicatii" id="indicatii"  type="text" class="form-control" >
											</div>
										</div>
			
								<button type="submit" name="Modifrecomandare" class="btn btn-primary">Salveaza </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Inchide</button> </center> </div>
							</div>
							
						
						</div>
						</form>
					</div>
				</div>
			</div>
			
	  <!-- Delete Modal -->
			<div class="modal fade" id="delete_modal2" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					
						<div class="modal-body">
						<form method="post" action="" name="appt" id="appt" >
						
						   <input type="hidden"  name="cnp_pacc" class="form__input" value="<?php echo $pac_key;?>" readonly  />
						   
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
			
		<!-- Delete Modal recomandare -->
			<div class="modal fade" id="sterge_recomandare" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					
						<div class="modal-body">
						<form method="post" action="" name="apptf" id="apptf" >
						
						 <input  type="hidden" name="id_recomandare" class="form__input" value="" readonly  />	   
							<div class="form-content p-2">
							<center>	<h4 class="modal-title ">Stergere</h4></center>
								<center> <p class="mb-4">Sunteti sigur ca doriti stergerea recomandarii?</p>
								<button type="submit" name="StergeRec" class="btn btn-primary">Salveaza </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Inchide</button> </center>
							</div>						
						</div>
						</form>
					</div>
				</div>
			</div>
		
		<script>
$('#modif_recomandare').on('shown.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener = $(e.relatedTarget); //this holds the element who called the modal

   //we get details from attributes
var id_recomandare=$(opener).attr('id_recomandare');
//set what we got to our form
  $('#apptform').find('[name="id_recomandare"]').val(id_recomandare);
});
</script>  

<script>
$('#sterge_recomandare').on('shown.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener = $(e.relatedTarget); //this holds the element who called the modal

   //we get details from attributes
var id_recomandare=$(opener).attr('id_recomandare');
//set what we got to our form
  $('#apptf').find('[name="id_recomandare"]').val(id_recomandare);
});
</script>  
		
		<script type="text/javascript">
function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}
</script>
<script type="text/javascript">
 
function limitlength(obj, length){
    var maxlength=length
    if (obj.value.length>maxlength)
        obj.value=obj.value.substring(0, maxlength)
}
 
</script>
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
		<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/chartjs-plugin-style.min.js"></script>

		<script src="assets/js/charts-custom-dashboard.js"></script>
		<script src="assets/js/charts-custom-patient.js"></script>
		<script src="main.js">
		</script>
	</body>

<!-- doccure/favourites.html  30 Nov 2019 04:12:17 GMT -->
</html>