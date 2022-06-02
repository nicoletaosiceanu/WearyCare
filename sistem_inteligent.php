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

				<!-- pentru filtrare tabel -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	
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
		
		$query = $db->collection('Parametrii_modul')->where('id_pacient', '=', $pac_key);
	    $param = $query->documents();
		
		$date = $db->collection('Date_colectate')->where('id_pacient', '=', $pac_key);
	    $colect = $date->documents();
		 
		 $val=0;
		
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
											<td> <a  data-toggle="modal" href="#delete_modal2"  data-toggle="tooltip" title="Sterge pacientul"   ><i class="fas fa-trash-alt"  style="color:red"> </i> <h7 style="color:red;"> Stergere pacient </h7></a> </td>
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
											
											<li class="active" >
												<a href="sistem_inteligent.php?pac_key=<?php echo $pac_key;  ?>"">
													<i class="fas fa-heartbeat"></i>
													<span>Sistem purtabil</span>
												</a>
											</li>
											
												<li >				
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
								
									
									<h4>Valori sistem </h4>
									
									
										
										
						<!--------------------------------------------------------------- daca au fost setati parametrii ii vizualizam si ii modificam -->
											
							       
										<?php
									//if(isset($_SESSION['areparametrii']))
									
									foreach( $param as $key => $parametrii)
									{    
									       if ($parametrii->exists())
											   {
												   $val=1;
									?>
									
									<form method="post" action="">  
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
											
											<input type="hidden" name="id_valori" id="id_valori"  type="text" class="form-control" value="<?php echo $parametrii->id();?>">
							          <div class="col-md-3">
									  <b> ECG </b>
									  </div>
									  
									  <div class="col-md-3">
									  <b> Umiditate</b>
									  </div>
									  
									  <div class="col-md-3">
									 <b> Puls</b>
									  </div>
									  
									  <div class="col-md-3">
									 <b> Temperatura</b>
									  </div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare minima <span class="text-danger">* </span>  </label> 
												<input name="ecg_min" id="ecg_min"  type="text" class="form-control" value="<?php echo $parametrii['Val_min_ECG'];?>" required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare minima <span class="text-danger">* </span>  </label> 
												<input name="umid_min" id="umid_min"  type="text" class="form-control" value="<?php echo $parametrii['Val_min_umid'];?>" required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare minima <span class="text-danger">* </span>  </label> 
												<input name="temp_min" id="temp_min"  type="text" class="form-control" value="<?php echo $parametrii['Val_min_temp'];?>" required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare minima <span class="text-danger">* </span>  </label> 
												<input name="puls_min" id="puls_min"  type="text" class="form-control"  value="<?php echo $parametrii['Val_min_puls'];?>"required >
											</div>
										</div>
										
									
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare maxima <span class="text-danger">* </span>  </label> 
												<input name="ecg_max" id="ecg_max"  type="text" class="form-control" value="<?php echo $parametrii['Val_max_ECG'];?>"required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare maxima <span class="text-danger">* </span>  </label> 
												<input name="umid_max" id="umid_max"  type="text" class="form-control" value="<?php echo $parametrii['Val_max_umid'];?>"required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare maxima <span class="text-danger">* </span>  </label> 
												<input name="temp_max" id="temp_max"  type="text" class="form-control" value="<?php echo $parametrii['Val_max_temp'];?>" required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare maxima <span class="text-danger">* </span>  </label> 
												<input name="puls_max" id="puls_max"  type="text" class="form-control"value="<?php echo $parametrii['Val_max_puls'];?>"  required >
											</div>
										</div>
								
									</div>
									
								<div class="submit-section submit-btn-bottom">
								<button type="submit" name="modifica_valori" class="btn btn-rounded btn-outline-primary">Modifica</button>
								<input type="reset" name="Anulare" class="btn btn-rounded btn-outline-danger" value="Anuleaza" />
								</div>
									
									</form>
									
								
								<!----------------------------------------- daca nu au fost setati parametrii ii setam -->
									<?php }} //else 
									if( $val!=1 )
									{ 
									?>
									<form method="post" action="">  
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
											
							          <div class="col-md-3">
									  <b> ECG </b>
									  </div>
									  
									  <div class="col-md-3">
									  <b> Umiditate</b>
									  </div>
									  
									  <div class="col-md-3">
									 <b> Puls</b>
									  </div>
									  
									  <div class="col-md-3">
									 <b> Temperatura</b>
									  </div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare minima <span class="text-danger">* </span>  </label> 
												<input name="ecg_min" id="ecg_min"  type="text" class="form-control" required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare minima <span class="text-danger">* </span>  </label> 
												<input name="umid_min" id="umid_min"  type="text" class="form-control" required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare minima <span class="text-danger">* </span>  </label> 
												<input name="puls_min" id="puls_min"  type="text" class="form-control" required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare minima <span class="text-danger">* </span>  </label> 
												<input name="temp_min" id="temp_min"  type="text" class="form-control" required >
											</div>
										</div>
										
									
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare maxima <span class="text-danger">* </span>  </label> 
												<input name="ecg_max" id="ecg_max"  type="text" class="form-control" required >
											</div>
										</div>
										
									
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare maxima <span class="text-danger">* </span>  </label> 
												<input name="umid_max" id="umid_max"  type="text" class="form-control" required >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Valoare maxima <span class="text-danger">* </span>  </label> 
												<input name="temp_max" id="temp_max"  type="text" class="form-control" required >
											</div>
										</div>
										
											<div class="col-md-3">
											<div class="form-group">
												<label>Valoare maxima <span class="text-danger">* </span>  </label> 
												<input name="puls_max" id="puls_max"  type="text" class="form-control" required >
											</div>
										</div>
										
									</div>
									
									
									
					
								<div class="submit-section submit-btn-bottom">
								<button type="submit" name="adauga_valori" class="btn btn-rounded btn-outline-primary">Adauga</button>
								<input type="reset" name="Anulare" class="btn btn-rounded btn-outline-danger" value="Anuleaza" />
								</div>
									
									
									</form>
									
									
									<?php } ?> 
									
									</div>
									</div>
									</div>
					

<!-- grafice ------------------------------->					
					<div class="card">
						<div class="card-body">
						<div class="pro-content">				
									
						<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
									
									
									 <div class="grid__col grid__col--8 grid__col--margin grid__col--padding bg-white">
											<center> <h5 class="card-title text-dark" >Statistica programari/luna</h5> </center>
					                          <canvas id="ActivityChart" width="100%" height="20"></canvas>
				                              </div>
											
											
								
									</div>
									</div>
								</div>
							</div>
						</div>			
					</div>			
								</div>					
								</div>
	
								
							
	<!------------------------------------------------------- valori de la senzori -->
								
								<div class="card">
						<div class="card-body">
						<div class="pro-content">				
									
						<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
							
									<div class="table-responsive">
									
									<h4>Valori masurate </h4>
							
								<input class="form-control" id="myInput1" type="text" placeholder="Cauta">
								<br>
										<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Data </th>
													<th>Ora</th>
													<th>ECG</th>
												<th>Umiditate</th>
												<th>Puls</th>
												<th>Temperatura</th>
												</tr>
											</thead>
											<tbody id="myTable">
											
									<?php 

                                	
								$query2 = $db->collection('Date_colectate')->where('id_pacient', '=', $pac_key);
	                             $date = $query2->documents();
								
								if($date)
								{
									foreach ($date as $key => $row)
									{
?>
											 <tr>
											 
													<td><?php echo date('d-m-Y',strtotime($row['Data']));    ?></td>
													<td><?php echo $time = date("H:i:s",strtotime($row['Data']));   ?></td>
													<td><?php echo $row['ECG']; ?></td>
													<td><?php echo $row['Umiditate']; ?></td>
													<td><?php echo $row['Puls']; ?></td>
													<td><?php echo $row['Temperatura']; ?></td>
													
										
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
									<?php }		  ?>
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

 <script>
	    var chartactivity = document.getElementById('ActivityChart').getContext("2d");
	  
		var gradientStroke = chartactivity.createLinearGradient(200, 0, 100, 0);
		gradientStroke.addColorStop(0, "rgba(58, 233, 245, 1)");
		gradientStroke.addColorStop(1, "rgba(18, 216, 227, 1)");

		var gradientStroke2 = chartactivity.createLinearGradient(200, 0, 100, 0);
		gradientStroke2.addColorStop(0, "rgba(255, 92, 203, 1)");
		gradientStroke2.addColorStop(1, "rgba(253, 133, 168, 1)");    

		var gradientFill = chartactivity.createLinearGradient(0, 0, 0, 350);
		gradientFill.addColorStop(0, "rgba(128, 182, 244, 0.5)");
		gradientFill.addColorStop(1, "rgba(128, 182, 244, 0)");

		var gradientFill2 = chartactivity.createLinearGradient(0, 0, 0, 350);
		gradientFill2.addColorStop(0, "rgba(255, 91, 204, 0.5)");
		gradientFill2.addColorStop(1, "rgba(255, 91, 204, 0)");
		

										  
	  var ActivityChart = new Chart(chartactivity, {
    type: 'line',
    data: {
        labels: [  <?php
	                         	$query2 = $db->collection('Date_colectate')->where('id_pacient', '=', $pac_key);
	                             $date = $query2->documents();
								
								if($date)
								{
									foreach ($date as $key => $row)
									{
?>
										"<?php echo $time = date("H:i:s",strtotime($row['Data']));   ?>" 
										
								<?php  }}?>
			],
        datasets: [{
            label: "Programari",
            borderColor: gradientStroke,
            pointBorderColor: gradientStroke,
            pointBackgroundColor: "rgba(255, 255, 255, 1)",
            pointHoverBackgroundColor: "rgba(128, 182, 244, 1)",
            pointHoverBorderColor: gradientStroke,
            pointBorderWidth: 1,
            pointHoverRadius: 3,
            pointHoverBorderWidth: 1,
            pointRadius: 3,
            fill: true,
			backgroundColor: gradientFill,
            borderWidth: 2,
            data: [ 3 , 4,2]
        }
		]
    },
    options: {          
        legend: {
            position: "top",
            labels: {
                boxWidth: 15,
				padding: 15
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 5,
                    padding: 20
                },
                gridLines: {
                    drawTicks: false,
                    display: false
                }

            }],
            xAxes: [{
                gridLines: {
                    zeroLineColor: "transparent"
                },
                ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold"
                }
            }]
        }
    }
});

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