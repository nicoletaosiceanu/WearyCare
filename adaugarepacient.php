<!DOCTYPE html> 
<html lang="en">
 <?php include('functionalitate.php'); ?> 


<head>
		<meta charset="utf-8">
		<title>WearyCare</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
<script type="module" src="conectareFB.js"> </script>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
		
		<link rel="stylesheet" href="assets/plugins/dropzone/dropzone.min.css">
		
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- pentru Keyup-->
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
 

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
									<li class="breadcrumb-item active" aria-current="page">Adaugare pacient</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Adaugare pacient</h2>
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
											<li>
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
											
											
											
											<li class="active">
												
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
						
							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
								
								<h3 class="card-title text-dark" >Adaugare pacient</h3>
									
									
									  <form method="post" action=""> 
									<h4><b>Date demografice</b></h4>
									
									
									<div class="row form-row">
										
										<div class="col-md-12">
											
														<small class="form-text text-muted">Data nasterii va fii extrasa din CNP.</small>
											
											<small class="form-text text-muted">Codul numeric personal este format din 13 cifre.</small>

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
									
										<div class="col-md-4">
											<div class="form-group">
												<label>CNP <span class="text-danger">* </span>  </label> 
													
												<input name="cnp" id="cnp"  type="text" class="form-control" oninvalid="this.setCustomValidity('Introduceti CNP-ul pacientului.')"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1',this.setCustomValidity(''));" required >
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Nume <span class="text-danger">*</span></label>
												<br>
									
												<input name="nume" id="nume" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z .]/g,'').replace(/(\..*?)\..*/g, '$1', this.setCustomValidity(''));"  oninvalid="this.setCustomValidity('Introduceti numele pacientului.')" required>
											</div>
											
							             </div>	
										<div class="col-md-4">
											<div class="form-group">
											<label>Prenume<span class="text-danger">*</span></label>
											
							<input name="prenume" id="prenume" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z .]/g,'').replace(/(\..*?)\..*/g, '$1',this.setCustomValidity(''));"  oninvalid="this.setCustomValidity('Introduceti prenumele pacientului.')"   required>
												</div>
										</div>
										
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Email<span class="text-danger">* </span></label>
												<input type="email"  name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="this.setCustomValidity('Structura email-ul nu este buna.')" oninput="this.setCustomValidity('')" required >
											</div>
										</div>
										
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Telefon</label>
												<input type="text" class="form-control"  name="tel" id="tel"  onkeyup="return limitlength(this,10)"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1',this.setCustomValidity(''));" pattern="0[0-9]{3}[0-9]{3}[0-9]{3}"  oninvalid="this.setCustomValidity('Numarul de telefon trebuie sa contina 10 cifre si sa inceapa cu 0.')" >
											</div>
										</div>
										
										
										
										<div class="col-md-6">
											<div class="form-group">
										
												<label>Profesie</label>
												<input name="profesie" id="profesie" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z .]/g,'').replace(/(\..*?)\..*/g, '$1', this.setCustomValidity(''));"  oninvalid="this.setCustomValidity('Introduceti profesia pacientului.')" >
												
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Loc de munca</label>
							<input name="locmunca" id="locmunca" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z .]/g,'').replace(/(\..*?)\..*/g, '$1',this.setCustomValidity(''));"  oninvalid="this.setCustomValidity('Introduceti locul de munca al pacientului.')"   >
						
											</div>
										</div>
										
										
									</div>
									
									
									<h5 class="card-title">Adresa</h5>
									<div class="row form-row">
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Judet </label> 
												<input name="judet" id="judet" type="text" class="form-control" >
											</div>
										</div>
									
										<div class="col-md-4">
											<div class="form-group">
												<label>Oras </label> 
												<input name="oras" id="oras" type="text" class="form-control" >
											</div>
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
												<label>Strada </label> 
												<input name="strada" id="strada" type="text" class="form-control" >
											</div>
											
							             </div>	
										 
										<div class="col-md-3">
											<div class="form-group">
												<label>Numar strada</label>
												<input  name="nr_strada" id="nr_strada"  type="text" class="form-control" oninput="this.value = this.value.replace(/[^\d]/g, '');" >
												</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Bloc</label>
												<input name="bloc" id="bloc"type="text" class="form-control" >
												
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Scara </label>
												<input name="scara" id="scara" type="text" class="form-control" >
												
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label>Apartament</label>
												<input name="ap" id="ap" type="text" class="form-control" oninput="this.value = this.value.replace(/[^\d]/g, '');" >
												
											</div>
										</div>
										
										<input type="hidden" name="data_compl" class="form__input" value="<?php echo date("Y-m-d"); ?>" />
										
									</div>
									
									
									<h4 class="card-title"><b>Date medicale</b></h4>
				<div class="row form-row">					
									<!-- Istoric medical -->
								<div class="col-md-6">
									 <div class="form-group">
											<h5 class="text">Istoric medical </h5> 
											<div class="add-more-item ">  	
											<a href="javascript:void(0);" value="Add Row" onclick="addRows()"><i class="fas fa-plus-circle"></i> Adauga linie noua</a> <br>		
											<a href="#"  value="Delete Row" onclick="deleteRows()" style="color:red;"><i class="far fa-trash-alt"></i> Sterge linie</a>	
										</div>
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
												
												<tbody>
											<tr> 
										
												<td id="col0"><input type="text" name="boala[]" value="" /></td> 
												<td id="col1"><input type="text" name="tratament[]" value="" /></td>
												
											</tr>  
														
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
											<div class="add-more-item ">  	
											<a href="javascript:void(0);" value="Add Row" onclick="addRows2()"><i class="fas fa-plus-circle"></i> Adauga linie noua</a> <br>		
											<a href="#"  value="Delete Row" onclick="deleteRows2()" style="color:red;"><i class="far fa-trash-alt"></i> Sterge linie</a>	
										</div>
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
											<tr> 
										
												<td id="coll0"><input type="text" name="alergie[]" value="" /></td> 
												</td> 
											</tr>  
														
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
								<button type="submit" name="AdaugaPac" class="btn btn-primary submit-btn">Salveaza</button>
								<input type="reset" name="Anulare" class="btn btn-danger submit-btn" value="Anuleaza" />
								</div>
									
									<!--</form>-->
								</div>
							</div>
							<!-- /Basic Information -->
							</div>
						
						
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
   
			
		   
		</div>
		<!-- /Main Wrapper -->
	  <!-- jQuery -->
	<script type="module" src="main.js"> </script>  

<script>
document.getElementById("nr").addEventListener("invalid", myFunction);

function myFunction() {

   console.log("Numarul trebuie sa contina 6 cifre.");
}
</script>

<script>
document.getElementById("tel").addEventListener("invalid", myFunction2);

function myFunction2() {

   console.log("Numarul de telefon trebuie sa aiba 10 cifre si sa inceapa cu 0.");
}
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
	  $('.emailt').first().keyup(function(){
    $email = $(this).val();// use val here to get value of input
     validateEmail($email);
});

   function validateEmail($email) {
          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
          if( !emailReg.test( $email ) ) {
            alert('foo');
          } else {
            alert('bar');
          }
        }
</script>

<script type="text/javascript">
function addRows(){ 
	var table = document.getElementById('emptbl');
	var rowCount = table.rows.length;
	var cellCount = table.rows[0].cells.length; 
	var row = table.insertRow(rowCount);
	for(var i =0; i <= cellCount; i++){
		var cell = 'cell'+i;
		cell = row.insertCell(i);
		var copycel = document.getElementById('col'+i).innerHTML;
		cell.innerHTML=copycel;
		if(i == 3){ 
			var radioinput = document.getElementById('col3').getElementsByTagName('input'); 
			for(var j = 0; j <= radioinput.length; j++) { 
				if(radioinput[j].type == 'radio') { 
					var rownum = rowCount;
					radioinput[j].name = 'gender['+rownum+']';
				}
			}
		}
	}
}
function deleteRows(){
	var table = document.getElementById('emptbl');
	var rowCount = table.rows.length;
	if(rowCount > '2'){
		var row = table.deleteRow(rowCount-1);
		rowCount--;
	}
	else{
		alert('Trebuie sa exista macar un rand.');
	}
}
</script>


<script type="text/javascript">
function addRows2(){ 
	var table2 = document.getElementById('emptbl2');
	var rowCount = table2.rows.length;
	var cellCount = table2.rows[0].cells.length; 
	var row = table2.insertRow(rowCount);
	for(var i2 =0; i2 <= cellCount-1; i2++){
		var cell = 'cell'+i2;
		cell = row.insertCell(i2);
		var copycel = document.getElementById('coll'+i2).innerHTML;
		cell.innerHTML=copycel;
		if(i2 == 3){ 
			var radioinput = document.getElementById('col3').getElementsByTagName('input'); 
			for(var j2 = 0; j2 <= radioinput.length; j2++) { 
				if(radioinput[j2].type == 'radio') { 
					var rownum = rowCount;
					radioinput[j2].name = 'gender['+rownum+']';
				}
			}
		}
	}
}
function deleteRows2(){
	var table = document.getElementById('emptbl2');
	var rowCount = table.rows.length;
	if(rowCount > '2'){
		var row = table.deleteRow(rowCount-1);
		rowCount--;
	}
	else{
		alert('Trebuie sa exista macar un rand.');
	}
}
</script>
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Dropzone JS -->
		<script src="assets/plugins/dropzone/dropzone.min.js"></script>
		
		<!-- Bootstrap Tagsinput JS -->
		<script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
		
		<!-- Profile Settings JS -->
		<script src="assets/js/profile-settings.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

		<script type="module" src="main.js"> </script>
		
	
	
	
	</body>


</html>