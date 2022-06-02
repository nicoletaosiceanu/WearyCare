<!DOCTYPE html> 
<html lang="en">
	
<?php include('server.php'); ?>

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:03 GMT -->
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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
		
	
		<!-- pentru transmitere param -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<?php 
	    $pac_CNP= isset($_GET['pac_CNP'])? $_GET['pac_CNP']:"";
		
		$sql="SELECT  * FROM pacient  WHERE CNP=('$pac_CNP')"  ;
		$result=mysqli_query($mysqli,$sql);   
		$row = mysqli_fetch_assoc($result);
		
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
									<li class="breadcrumb-item active"><a href="totipacientii.php">Acasa</a></li>
										<li class="breadcrumb-item active" aria-current="page"><b>Profil pacient</b></li>
									
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Consultatii</h2>
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
								<div class="widget-profile pro-widget-content ">
									<div class="profile-info-widget">
										
										<div class="profile-det-info">
											<h3>Dr. Osiceanu Nicoleta</h3>
											
											
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li >
													<a href="totipacientii.php">
													<i class="fas fa-columns"></i>
													<span>Pacienti</span>
												</a>
											</li>
											<li class="active">
												<a href="consultatie.php">
													<i class="fas fa-clipboard"></i>
													<span>Consultatiii</span>
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

							<div class="card">
								<div class="card-body">
								
								<h3 class="card-title text-dark" >Adaugare consultatie</h3>
								
								  <form method="post" action="consultatie.php"  name="appt2" >
									
									
									
									<div class="row form-row">
										
										<div class="col-md-12">
											
														<small class="form-text text-muted">Daca nu este afisat nici un interval orar inseamna ca nu aveti disponibilitate in ziua respectiva</small>
										</div>
										
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
									
										<div class="col-md-6">
											<div class="form-group">
												<label>CNP pacient <span class="text-danger">*</span></label> 
												<select name="cnp" id="cnp"  class="form-control select" oninvalid="this.setCustomValidity('Introduceti CNP-ul pacientului.')" oninput="this.setCustomValidity('')" required="required">
									<?php 
                                      if(isset($_GET['pac_CNP']))
									  {

									?>
									<option value="<?php echo $row['CNP'];?> "><?php echo $row['CNP'];?> </option>   </select>
									  <?php } else { ?>
												<option value="" ></option>
												<?php $sql="SELECT  * FROM pacient"  ;
	                      	$result=mysqli_query($mysqli,$sql); 
							
							if( mysqli_num_rows($result)>=1)
		               {
							while ($row=$result->fetch_assoc()) 
							{       ?>
										           <option value="<?php echo $row['CNP'];?> "><?php echo $row['CNP'];?> </option>
					   <?php } }?>
												</select>
												  <?php } ?>
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label>Data<span class="text-danger">*</span></label>

											<input type="date" placeholder="MM/DD/YYYY" class="form-control" name="date" id="date"  required="required" onchange="FunctieTimp()" oninvalid="this.setCustomValidity('Introduceti data programarii.')" oninput="this.setCustomValidity('')">
												
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Ora<span class="text-danger">*</span></label>
										
												<select name="timp" id="timp" type="time" class="form-control"  required="required" oninvalid="this.setCustomValidity('Introduceti ora programarii.')" oninput="this.setCustomValidity('')">
											<option value="">---Select---</option>
												</select>
											</div>
										</div>
                                              
									 <div class="col-md-12">
											<div class="form-group">
												<label>Observatii </label> 
												<input name="obs" id="obs"  type="text" class="form-control" >
											</div>
										</div>
										
								
										
									</div>
									
								<button type="submit" name="AdaugaProgramare" class="btn btn-primary submit-btn">Adauga</button>
								<input type="reset" name="Anulare" class="btn btn-danger submit-btn" value="Anuleaza" />
						
									
									</form>
											</div>
								</div>
		
							<!-- /Basic Information -->
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Consultatii</h4>
									<div class="appointment-tab">
									<div class="col-md-12">
									<?php  if(isset($_SESSION['unsuccess2']))
									{  ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>Eroare!</strong> 	<?php echo $_SESSION['unsuccess2']; ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									
									<?php
										unset($_SESSION['unsuccess2']);
									}  ?>
									
									
									<?php  if(isset($_SESSION['success2']))
									{  ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										 <?php echo $_SESSION['success2']; ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div> 
									
									<?php 
										unset($_SESSION['success2']);  }?>
									
									</div>
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Trecute</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-toggle="tab">Astazi</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
													<input class="form-control" id="myInput1" type="text" placeholder="Cauta">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																
																	<th>Id consultatie</th>	
																	<th>CNP</th>
															
																	<th>Data</th>
																	<th>Ora</th>
																    <th>Notite</th>
															
																		<th></th>
																	</tr>
																</thead>
																<tbody id="myTable">
										
										<?php 
									  
										$sql3="SELECT  * FROM programari  WHERE  Data < CURDATE() ORDER BY programari.data,programari.Ora ASC  "  ;
										$result3=mysqli_query($mysqli,$sql3);   
										
										if( mysqli_num_rows($result3)>=1)
										{
											while ($row3=$result3->fetch_assoc()) 
											{       
													?>	
																	<tr>
																	
																	   <td><?php echo $row3["Id_prog"]; ?> </td>
																<td><a href="profil_pacient.php?pac_CNP=<?php echo $row3['Cnp_pacient']; ?> " data-toggle="tooltip" title="Vizualizeaza profilul pacientului"> 
															<b>	<?php echo $row3['Cnp_pacient']; ?> </b> </a></td>
																	
																		<td><span class="d-block text-info"><?php echo $row3["Data"]; ?> </span></td> 																	   
																		  
																		 <td><span class="d-block text-info"><?php echo $row3["Ora"]; ?> </span></td>
															          <td><?php echo $row3["Notite"]; ?> </td> 	
																
																	<td class="text-right">
																		<div class="table-action">
																			
																			<a class="btn btn-sm bg-info-light"  data-toggle="modal" href="#modif_prog"  data-toggle="tooltip" title="Modifica programarea" id_prog="<?php echo $row3["Id_prog"]; ?>" cnp_pac="<?php echo $row3["Cnp_pacient"]; ?>">
																				<i class="far fa-eye"></i> Edit
																			</a>
																		
																			
																			<a  class="btn btn-sm bg-danger-light"  data-toggle="modal" href="#delete_modal"  data-toggle="tooltip" title="Sterge programarea" id_prog="<?php echo $row3["Id_prog"]; ?>">
																			<i class="fas fa-trash-alt"  style="color:red"> </i>Sterge</a> 
																		</div>
																	</td>
																</tr>
																	
																	<?php }}?>
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
											<div class="tab-pane" id="today-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
													<input class="form-control" id="myInput2" type="text" placeholder="Cauta">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																
																	<th>Id programare</th>	
																	<th>CNP</th>
															
																	<th>Data</th>
																	<th>Ora</th>
																    <th>Notite</th>
															
																		<th></th>
																	</tr>
																</thead>
																<tbody id="myTable2">
													<?php 
									  
										$sql3="SELECT  * FROM programari  WHERE  Data = CURDATE() ORDER BY programari.data,programari.Ora ASC  "  ;
										$result3=mysqli_query($mysqli,$sql3);   
										
										if( mysqli_num_rows($result3)>=1)
										{
											while ($row3=$result3->fetch_assoc()) 
											{       
													?>	
																<tr>
																	
																	   <td><?php echo $row3["Id_prog"]; ?> </td>
																<td><a href="profil_pacient.php?pac_CNP=<?php echo $row3['Cnp_pacient']; ?> " data-toggle="tooltip" title="Vizualizeaza profilul pacientului"> 
															<b>	<?php echo $row3['Cnp_pacient']; ?> </b> </a></td>
																	
																		<td><span class="d-block text-info"><?php echo $row3["Data"]; ?> </span></td> 																	   
																		  
																		 <td><span class="d-block text-info"><?php echo $row3["Ora"]; ?> </span></td>
															          <td><?php echo $row3["Notite"]; ?> </td> 	
																
																	<td class="text-right">
																		<div class="table-action">
																			
																			<a class="btn btn-sm bg-info-light"  data-toggle="modal" href="#modif_prog"  data-toggle="tooltip" title="Modifica programarea" id_prog="<?php echo $row3["Id_prog"]; ?>" cnp_pac="<?php echo $row3["Cnp_pacient"]; ?>">
																				<i class="far fa-eye"></i> Edit
																			</a>
																				<a  class="btn btn-sm bg-danger-light"  data-toggle="modal" href="#delete_modal"  data-toggle="tooltip" title="Sterge programarea" id_prog="<?php echo $row3["Id_prog"]; ?>">
																			<i class="fas fa-trash-alt"  style="color:red"> </i>Sterge</a> 
																		</div>
																	</td>
																	
																</tr>
																	
																	<?php }}?>
																</tbody>
															</table>		
														</div>	
													</div>	
												</div>	
											</div>
											<!-- /Today Appointment Tab -->
											
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
		
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		
	   <!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-body">
						<form method="post" action="" name="apptt" id="apptt" >
						   <input type="hidden"  name="id_prog" class="form__input" value="" readonly  />
							<div class="form-content p-2">
							<center>	<h4 class="modal-title ">Stergere</h4></center>
								<center> <p class="mb-4">Sunteti sigur ca doriti sa stergeti programarea??</p>
								<button type="submit" name="StergeProg" class="btn btn-primary">Salveaza </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Inchide</button> </center>
							</div>
							
						
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
			
			<!-- Modif prog  -->
			<div class="modal fade" id="modif_prog" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-body">
						<form method="post" action="" name="apptform" id="apptform" >
						   <input type="hidden"  name="id_progg" class="form__input" value="" readonly  />
							<div class="form-content p-2">
							<center>	<h4 class="modal-title ">Modificare programare</h4></center>
								<center> 
							
								 
								<div class="col-md-6">
											<div class="form-group">
												<label>CNP pacient <span class="text-danger">*</span></label> 
												<input name="cnp_pac" id="cnp_pac"  type="text" class="form-control" value="" readonly >
												
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Data<span class="text-danger">*</span></label>

											<input type="date" placeholder="MM/DD/YYYY" class="btn1" name="datee" id="datee"  required="required" onchange="FunctieTimp2()" oninvalid="this.setCustomValidity('Introduceti data programarii')" oninput="this.setCustomValidity('')">
									
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Ora<span class="text-danger">*</span></label>
										
												<select name="timpp" id="timpp" type="time" class="form-control"  required="required" oninvalid="this.setCustomValidity('Introduceti ora programarii.')" oninput="this.setCustomValidity('')">
											<option value="">---Select---</option>
												</select>
											</div>
										</div>
                                              
									 <div class="col-md-12">
											<div class="form-group">
												<label>Observatii </label> 
												<input name="obs" id="obs"  type="text" class="form-control" >
											</div>
										</div>
										
								
										
									
									
								<button type="submit" name="ModifProg" class="btn btn-primary">Salveaza </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Inchide</button> </center> </div>
							</div>
							
						
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
		<!-- jQuery -->
		<script type="text/javascript">	
	 //AJAX imi permite sa actualizez părți ale paginii, fara a reincarca întreaga pagină.
	      function FunctieTimp(){
			 
			 //creez un obiect nou XMLHttpRequest
		     var httpxml=new XMLHttpRequest();
			 
			 //specific ce se intampla la primirea informatiilor inapoi de la pagina denumita mai jos
		   httpxml.onreadystatechange=  function() {    
		   
		   //daca exista optiuni pentru intervalele orare de la o data anterioara, le elimin  	
		    	 if(document.appt2.timp.options.length >1){
					 for(j=document.appt2.timp.options.length-1;j>0;j--){
			 				document.appt2.timp.remove(j);
						 }
					}
			
//cand s-a terminat cererea si primesc toata informatia de la URL iar aceasta are codul 200(success) trec mai departe				
		     if(httpxml.readyState==4 && this.status == 200 ){	 

			     // deoarece rezultatele primite de la adresa URL sunt returnate in STRING xhttp.responseText procesez sirul utilizand JSON.parse() 
				 var myarray2 = JSON.parse(httpxml.responseText);
				
						for (i=0;i<myarray2.length;i++)
						 {
							 //se adauga optiunile pentru ora
						 	var  optnn = document.createElement("OPTION");
							optnn.text=myarray2[i];
							 document.appt2.timp.options.add(optnn);
						 }	
				 	 
		     }
		     }
			 
			
	     //aceasta pagina va returna intervalele orare libere din ziua NumeZi si data selectata, a doctorului cu email-ul doctor_email
	      var url="timedropdown.php";

		  
	
//am creat o functie pentru extragerea zilei din data	 
		function getDayName(dateString) 
		{
		const [date, options] = [new Date(dateString), {weekday: 'long'}];
		return new Intl.DateTimeFormat('en-Us', options).format(date);
	     }
         NumeZi= getDayName(document.getElementById('date').value);
		  //trimit impreuna cu URL-ul email-ul doctorului, data selectata de pacient si numele zilei deoarece fiecare zi are alt orar
		    url=url+"?date=" + document.getElementById("date").value + "&NumeZi=" + NumeZi;
	    
		//am informat obiectul XMLHttpRequest ca doresc sa folosesc metoda GET,apeland adresa URL mentionata mai sus iar conexiunea sa fie efectuata asincron
		//specific cerere
	      httpxml.open("GET",url,true);
		  
		  //cererea este trimisa la adresa URL, iar in momentul in care este primit raspunsul este apelata functia onreadystatechange de mai sus
	      httpxml.send(null);
	     }
	</script>
	
	<script type="text/javascript">	
	 //AJAX imi permite sa actualizez părți ale paginii, fara a reincarca întreaga pagină.
	      function FunctieTimp2(){
			 
			 //creez un obiect nou XMLHttpRequest
		     var httpxmll=new XMLHttpRequest();
			 
			 //specific ce se intampla la primirea informatiilor inapoi de la pagina denumita mai jos
		   httpxmll.onreadystatechange=  function() {    
		   
		   //daca exista optiuni pentru intervalele orare de la o data anterioara, le elimin  	
		    	 if(document.apptform.timpp.options.length >1){
					 for(j=document.apptform.timpp.options.length-1;j>0;j--){
			 				document.apptform.timpp.remove(j);
						 }
					}
			
//cand s-a terminat cererea si primesc toata informatia de la URL iar aceasta are codul 200(success) trec mai departe				
		     if(httpxmll.readyState==4 && this.status == 200 ){	 

			     // deoarece rezultatele primite de la adresa URL sunt returnate in STRING xhttp.responseText procesez sirul utilizand JSON.parse() 
				 var myarray = JSON.parse(httpxmll.responseText);
				
						for (i=0;i<myarray.length;i++)
						 {
							 //se adauga optiunile pentru ora
						 	var  optn = document.createElement("OPTION");
							optn.text=myarray[i];
							 document.apptform.timpp.options.add(optn);
						 }	
				 	 
		     }
		     }
			 
			
	     //aceasta pagina va returna intervalele orare libere din ziua NumeZi si data selectata, a doctorului cu email-ul doctor_email
	      var url="timedropdown.php";

		  
	
//am creat o functie pentru extragerea zilei din data	 
		function getDayName2(dateString) 
		{
		const [date, options] = [new Date(dateString), {weekday: 'long'}];
		return new Intl.DateTimeFormat('en-Us', options).format(date);
	     }
         NumeZi= getDayName2(document.getElementById('datee').value);
		  //trimit impreuna cu URL-ul email-ul doctorului, data selectata de pacient si numele zilei deoarece fiecare zi are alt orar
		    url=url+"?date=" + document.getElementById("datee").value + "&NumeZi=" + NumeZi;
	    
		//am informat obiectul XMLHttpRequest ca doresc sa folosesc metoda GET,apeland adresa URL mentionata mai sus iar conexiunea sa fie efectuata asincron
		//specific cerere
	      httpxmll.open("GET",url,true);
		  
		  //cererea este trimisa la adresa URL, iar in momentul in care este primit raspunsul este apelata functia onreadystatechange de mai sus
	      httpxmll.send(null);
	     }
	</script>
	<script>
$("#date").flatpickr({
    enableTime: false,
	minDate: "today",
	maxDate: new Date().fp_incr(28), // 14 days from now
    "disable": [
        function(date) {
           return (date.getDay() === 0 || date.getDay() === 6);  // disable weekends
        }
    ],
    "locale": {
        "firstDayOfWeek": 1 // set start day of week to Monday
    }
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
<script>
	   //am folosit ready () pentru a face functia disponibila dupa încarcarea documentului
$(document).ready(function(){
	//in momentul in care utilizatorul eliberează o tastă de pe tastatura are loc evenimentul keyup.
  $("#myInput2").on("keyup", function() {
    //parcurge fiecare rand de tabel pentru a verifica daca exista valori de text care se potrivesc cu valoarea intrarii
	// toLowerCase() converteste textul in minuscule, cautarea nefiind CASE SENSITIVE
	var value = $(this).val().toLowerCase();
    $("#myTable2 tr").filter(function() {
		// indexOf(value) returneaza indexul aparitii cautarii
		// toggle ascunde randul care nu corespunde cautarii
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

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


		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Full Calendar JS -->
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
			<!-- /Edit Time Slot Modal -->
         <script src="assets/js/jquery.min.js"></script>
		
	</body>

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:09 GMT -->
</html>