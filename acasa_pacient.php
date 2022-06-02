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
							<h2 class="breadcrumb-title">Informatii personale</h2>
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
											<li class="active">
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
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
							
								<div class="card-body">
								<div class="pro-content">
								
								
								
								
								
								
								
											<form method="post" action="">  
									<h4>Informatii personale</h4>
									
									
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
												<label>CNP <span class="text-danger">* </span>  </label> 
												<input name="cnp" id="cnp"  type="text" class="form-control" value="<?php echo $row['CNP'];?>" readonly >
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Nume <span class="text-danger">*</span></label>
												<input name="nume" id="nume" type="text" class="form-control" value="<?php echo $row['Nume'];?>" oninput="this.value = this.value.replace(/[^a-zA-Z .]/g,'').replace(/(\..*?)\..*/g, '$1', this.setCustomValidity(''));"  oninvalid="this.setCustomValidity('Introduceti numele pacientului.')">
												
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Prenume<span class="text-danger">*</span></label>
												<input name="prenume" id="prenume" type="text" class="form-control" value="<?php echo $row['Prenume'];?>" oninput="this.value = this.value.replace(/[^a-zA-Z .]/g,'').replace(/(\..*?)\..*/g, '$1',this.setCustomValidity(''));"  oninvalid="this.setCustomValidity('Introduceti prenumele pacientului.')">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Data nasterii   </label> 
												<input name="datanasterii" id="datanasterii"  type="text" class="form-control" value="<?php echo date('d-m-Y',strtotime($row['Data_nasterii']));?>" readonly >
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Varsta  </label> 
												<input name="varsta" id="varsta"  type="text" class="form-control" value="<?php echo $row['Varsta'];?>" readonly >
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input type="email"  name="email" id="email" class="form-control" value="<?php echo $row['Email'];?>">
											</div>
										</div>
										
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Telefon</label>
												<input type="text" class="form-control"  name="tel" id="tel" onkeyup="return limitlength(this,10)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1',this.setCustomValidity(''));" pattern="0[0-9]{3}[0-9]{3}[0-9]{3}"  oninvalid="this.setCustomValidity('Numarul de telefon trebuie sa contina 10 cifre si sa inceapa cu 0.')" value="<?php echo $row['Telefon'];?>">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
										
												<label>Profesie</label>
												<input name="profesie" id="profesie" value="<?php echo $row['Profesie'];?>"text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z .]/g,'').replace(/(\..*?)\..*/g, '$1', this.setCustomValidity(''));"  oninvalid="this.setCustomValidity('Introduceti profesia pacientului.')  " >
												
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Loc de munca</label>
							<input name="locmunca" id="locmunca" value="<?php echo $row['Loc_munca'];?>"text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z .]/g,'').replace(/(\..*?)\..*/g, '$1',this.setCustomValidity(''));"  oninvalid="this.setCustomValidity('Introduceti locul de munca al pacientului.')"   >
						
											</div>
										</div>
										
									</div>
									
									
									<h4 class="card-title">Adresa</h4>
									<div class="row form-row">
										
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Judet </label> 
												<input name="judet" id="judet" type="text" class="form-control" value="<?php echo $row['Judet'];?>">
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Oras </label> 
												<input name="oras" id="oras" type="text" class="form-control" value="<?php echo $row['Oras'];?>" >
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Strada </label> 
												<input name="strada" id="strada" type="text" class="form-control" value="<?php echo $row['Strada'];?>">
											</div>
											
							             </div>	
										 
										<div class="col-md-3">
											<div class="form-group">
												<label>Numar strada</label>
												<input  name="nr_strada" id="nr_strada"  type="text" class="form-control"  value="<?php echo $row['Numar'];?>" >
												</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Bloc</label>
												<input name="bloc" id="bloc"type="text" class="form-control" value="<?php echo $row['Bloc'];?>">
												
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Scara </label>
												<input name="scara" id="scara" type="text" class="form-control" value="<?php echo $row['Scara'];?>">
												
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Apartament</label>
												<input name="ap" id="ap" type="text" class="form-control" value="<?php echo $row['Apartament'];?>" >
												
											</div>
										</div>
										
										<input type="hidden" name="data_compl" class="form__input" value="<?php echo date("Y-m-d") ?>" />
										
									</div>
									
									
				<h4 class="card-title"><b>Date medicale</b></h4>
				
					
										
				<div class="row form-row">					
									<!-- Istoric medical -->
								<div class="col-md-6">
									 <div class="form-group">
											<h5 class="text">Istoric medical </h5> 
											
									</div> 
									
									
					
									
									<div class="card card-table">
										<div class="card-body">
											<div class="table-responsive">

												
												<table class="table table-hover table-center">
													<table id="emptbl">
													<thead>
														<tr>
														<th>Boala</th>
														<th>Tratament</th>
														</tr> 
													</thead>
												
												<tbody id="table_body1">
												<?php 
								if($istoric)
								{
									foreach( $istoric as $key => $row2)
									{
										?>
										
											<tr> 
										
												<td id="col0"><input type="text" name="boala[]" value="<?php echo $row2['boala']; ?> " /></td> 
												<td id="col1"><input type="text" name="tratament[]" value="<?php echo $row2['tratament']; ?> " /></td>
												<input type="hidden" name="keyIstoric" class="form__input" value="<?php echo $row2->id(); ?>" />
											
											</tr>  
											
												<?php }} else { ?>
											Nu a fost adaugat un istoric.
											<?php } ?>	
											
												</tbody>
												
													</table> 
												</table>
							
										</div>
									</div>
									</div>
								</div>
								<!-- Istoric medical-->
								
								<!-- Alergii -->
								<div class="col-md-6">
									 <div class="form-group">
											<h5 class="text">Alergii</h5> 
											
									</div> 

								<div class="card card-table">
										<div class="card-body">
											<div class="table-responsive">

												
												<table class="table table-hover table-center">
													<table id="emptbl2">
													<thead>
														<tr>
														<th>Alergie</th>
														</tr> 
													</thead>
												
												<tbody>
												<?php 
								if($alergii)
								{
									foreach( $alergii as $key => $row3)
									{
										?>
											<tr> 
										
												<td id="coll0"><input type="text" name="alergie[]" value="<?php echo $row3['alergie']; ?> "  /></td> 
												<?php //echo $row3->id(); ?>
												<input type="hidden" name="keyAlergii" class="form__input" value="<?php echo $row3->id(); ?>" />
											
												
											</tr>  
									<?php }} else { ?>
											Nu au fost adaugate alergii.
											<?php } ?>	
												
												</tbody>
													</table> 
												</table>
							
										</div>
									</div>
									</div>
								</div>
								<!-- Istoric medical-->
								</div>
									
								<div class="submit-section submit-btn-bottom">
								<button type="submit" name="Modifprofil" class="btn btn-rounded btn-outline-primary">Modifica</button>
								<input type="reset" name="Anulare" class="btn btn-rounded btn-outline-danger" value="Anuleaza" />
								</div>
									
									</form>
							
											
											<div class="row row-sm">
												
												<div class="col-6">
													<a href="programari.php?pac_CNP=<?php echo $row['CNP']; ?>" class="btn book-btn" data-toggle="tooltip" title="Adauga programare" ><i class="far fa-calendar-check" style="color:blue" ></i> Consultatie</a>

													
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
        labels: ["IAN", "FEB", "MAR", "APR", "MAI", "IUN", "IUL","AUG","SEPT","OCT","NOV","DEC"],
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
            data: [<?php echo $row2['NrProg1'];?> , <?php echo $row3['NrProg1'];?>, <?php echo $row4['NrProg1'];?>,<?php echo $row5['NrProg1'];?>,<?php echo $row6['NrProg1'];?>,<?php echo $row7['NrProg1'];?>,<?php echo $row8['NrProg1'];?>,<?php echo $row9['NrProg1'];?>,<?php echo $row10['NrProg1'];?>,<?php echo $row11['NrProg1'];?>,<?php echo $row12['NrProg1'];?>,<?php echo $row13['NrProg1'];?>]
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
		<!-- jQuery -->
		
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