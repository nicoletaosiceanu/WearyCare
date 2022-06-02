<?php 
session_start();
include('conect.php');

$zi=0;
$luna=0;
$an=0;

function validCNP($p_cnp) {
    // CNP must have 13 characters
    if(strlen($p_cnp) != 13) {
        return false;
    }
    $cnp = str_split($p_cnp);
    unset($p_cnp);
    $hashTable = array( 2 , 7 , 9 , 1 , 4 , 6 , 3 , 5 , 8 , 2 , 7 , 9 );
    $hashResult = 0;
    // All characters must be numeric
    for($i=0 ; $i<13 ; $i++) {
        if(!is_numeric($cnp[$i])) {
            return false;
        }
        $cnp[$i] = (int)$cnp[$i];
        if($i < 12) {
            $hashResult += (int)$cnp[$i] * (int)$hashTable[$i];
        }
    }
    unset($hashTable, $i);
    $hashResult = $hashResult % 11;
    if($hashResult == 10) {
        $hashResult = 1;
    }
    // verificare an
	global $an, $luna, $zi, $s;
    $an = ($cnp[1] * 10) + $cnp[2];
	
	
	$luna=($cnp[3] * 10) + $cnp[4];
	$zi=($cnp[5] * 10) + $cnp[6];
	
	if( $cnp[0] == 1 || $cnp[0] == 3 || $cnp[0] == 5 || $cnp[0] == 7 )
	     $s=0;
	 else 
		 $s=1;
	 
    switch( $cnp[0] ) {
        case 1  : case 2 : { $an += 1900; } break; // cetateni romani nascuti intre 1 ian 1900 si 31 dec 1999
        case 3  : case 4 : { $an += 1800; } break; // cetateni romani nascuti intre 1 ian 1800 si 31 dec 1899
        case 5  : case 6 : { $an += 2000; } break; // cetateni romani nascuti intre 1 ian 2000 si 31 dec 2099
        case 7  : case 8 : case 9 : {                // rezidenti si Cetateni Straini
            $an += 2000;
            if($an > (int)date('Y')-14) {
                $an -= 100;
            }
        } break;
        default : {
            return false;
        } break;
    }
    return ($an > 1800 && $an < 2099 && $cnp[12] == $hashResult);
}




if (isset($_POST['AdaugaPac'])) {
	
	$cnp=$_POST['cnp'];
	$nume=$_POST['nume'];
	$prenume=$_POST['prenume'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$profesie=$_POST['profesie'];
	$locmunca=$_POST['locmunca'];
	$judet=$_POST['judet'];
	$oras=$_POST['oras'];
	$strada=$_POST['strada'];
	$nr_strada=$_POST['nr_strada'];
	$bloc=$_POST['bloc'];
	$scara=$_POST['scara'];
	$ap=$_POST['ap'];
	
	
	
       if(validCNP($cnp))
	   {
		  // adaugare pacient -----------------------------------------------------------------------------------------------------------------
		   $Data_nasterii=($an.'-'.$luna.'-'.$zi);	  
			$data_curenta=date("Y-m-d");	
            $diff = date_diff(date_create($Data_nasterii), date_create($data_curenta));
	       
		   $docRef = [
						'id_medic'=>'1',
						'Nume'=>$nume,
						'Prenume'=>$prenume,
						'CNP'=>$cnp,
						'Judet'=>$judet,
						'Oras'=>$oras,
						'Strada'=>$strada,
						'Numar'=>$nr_strada,
						'Bloc'=>$bloc,
						'Scara'=>$scara,
						'Apartament'=>$ap,
						'Telefon'=>$tel,
						'Email'=>$email,
						'Profesie'=>$profesie,
						'Loc_munca'=>$locmunca,
						'Data_nasterii'=>$Data_nasterii,
						'Varsta'=> $diff->format('%y')			
			];
			$succes = $db->collection('Pacient')->document($cnp)->set($docRef);
						

                
				// adaugam istoric medical
				for($i1=0;$i1<count($_POST['boala']);$i1++)
	     	{
				$diagnostic = ($_POST['boala'][$i1]);
				$tratament =  ($_POST['tratament'][$i1]);
			
				if($diagnostic!=='' && $tratament!=='' )
			{
				$data = [
					    'id_pacient'=>$cnp,
						'boala'=>$diagnostic,
						'tratament'=>$tratament];
						
				$docRef2 = $db->collection('Istoric_med')->add($data);
						
			 }										
			}
			
			
			// adaugam alergii
				for($i=0;$i<count($_POST['alergie']);$i++)
			{
				$alergie = ($_POST['alergie'][$i]);
				if($alergie!=='')
			{
	
				$data2= [
					    'id_pacient'=>$cnp,
						'alergie'=>$alergie
						];	
				$docRef3 = $db->collection('Alergii')->add($data2);
			 }		
			}
			
			if($succes )
						{
							$_SESSION['success']="Adaugare realizata cu succes.";
						}
						
							 else
							 {
								$_SESSION['unsuccess']="A aparut o eroare la adaugarea pacientului.";
									
							} 
	   }
	   else 
	   {
		    array_push($errors, "CNP-ul nu este ok");
			   $_SESSION['unsuccess']="CNP-ul nu este valid";
	   }
	
}

//modificare date pacient
if (isset($_POST['Modifprofil'])) {
	
	$pac_key=$_POST['pac_key'];
	$cnp=$_POST['cnp'];
	$nume=$_POST['nume'];
	$prenume=$_POST['prenume'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$profesie=$_POST['profesie'];
	$locmunca=$_POST['locmunca'];
	$judet=$_POST['judet'];
	$oras=$_POST['oras'];
	$strada=$_POST['strada'];
	$nr_strada=$_POST['nr_strada'];
	$bloc=$_POST['bloc'];
	$scara=$_POST['scara'];
	$ap=$_POST['ap'];
	$datanasterii=$_POST['datanasterii'];
	
	$key=$_POST['keyIstoric'];
	$key2=$_POST['keyAlergii'];
	
	$pacientt = $db->collection('Pacient')->document($cnp);

	$pacientt->update([
					[	'path' => 'id_medic', 'value'=>'1'],
					[	'path' => 'Nume', 'value'=> $nume],
					[	'path' => 'Prenume', 'value'=> $prenume],
					[	'path' => 'Judet', 'value'=> $judet],
					[	'path' => 'Oras', 'value'=> $oras],
					[	'path' => 'Strada', 'value'=> $strada],
					[	'path' => 'Numar', 'value'=> $nr_strada],
					[	'path' => 'Bloc', 'value'=> $bloc],
					[	'path' => 'Scara', 'value'=> $scara],
					[	'path' => 'Apartament', 'value'=> $ap],
					[	'path' => 'Telefon', 'value'=> $tel],
					[	'path' => 'Email', 'value'=> $email],
					[	'path' => 'Profesie', 'value'=> $profesie],
					[	'path' =>'Loc_munca', 'value'=> $locmunca ]
			]);
	
	// update istoric medical
				for($i1=0;$i1<count($_POST['boala']);$i1++)
	     	{
				$diagnostic = ($_POST['boala'][$i1]);
				$tratament =  ($_POST['tratament'][$i1]);
			
				$istoric = $db->collection('Istoric_med')->document($key);
				$istoric->update([
					 [ 'path' =>'id_pacient', 'value'=>$cnp],
					[	'path' =>'boala', 'value'=>$diagnostic],
					[	'path' =>'tratament', 'value'=>$tratament]
						]);
 									
			}
			
				// adaugam alergii
				for($i=0;$i<count($_POST['alergie']);$i++)
			{
				$alergie = ($_POST['alergie'][$i]);
				
				$al = $db->collection('Alergii')->document($key2);
				
				$al->update([
					 [ 'path' =>'id_pacient', 'value'=>$cnp],
					[	'path' =>'alergie', 'value'=>$alergie]
						]);
			 	
			}
						
	if($pacientt && $istoric && $al)
	{
		$_SESSION['success']="Modificare realizata cu succes.";
	}
						
	 else
	
	{
	   $_SESSION['unsuccess']="A aparut o eroare la modificare datelor pacientului.";
									
	} 
}

//modificare recomandare
if (isset($_POST['Modifrecomandare']))
{
	$id_rec=$_POST['id_recomandare'];
	$tip_rec=$_POST['rec'];
	$durata=$_POST['durata'];
	$indicatii=$_POST['indicatii'];
	
	$recomandare = $db->collection('Recomandari')->document($id_rec);

	$recomandare->update([
					[	'path' => 'tip_recomandare', 'value'=> $tip_rec],
					[	'path' => 'durata', 'value'=> $durata],
					[	'path' => 'indicatii', 'value'=> $indicatii]
			]);
}

//stergere recomandare
if (isset($_POST['StergeRec']))
{
	$id_rec=$_POST['id_recomandare'];
	$db->collection('Recomandari')->document($id_rec)->delete();
}

//sterge pacient
if (isset($_POST['StergePac']))
{
	$pac_key=$_POST['cnp_pacc'];
	//$db->collection('Pacienti')->document($pac_key)->delete();
	//$db->collection('Recomandari')->where('id_pacient', '=', $pac_key)->delete();
	//$db->collection('Alergii')->where('id_pacient', '=', $pac_key)->delete();
	//$db->collection('Istoric_med')->where('id_pacient', '=', $pac_key)->delete();
}

//adaugare recomandare
if (isset($_POST['adauga_rec'])) {
	
	$CNP_pac=$_POST['pac_key'];
	$tip_rec=$_POST['tip_rec'];
	$durata=$_POST['durata'];
	$indicatii=$_POST['indicatii'];
	
	   $docRef = [
						'id_pacient'=>$CNP_pac,
						'tip_recomandare'=>$tip_rec,
						'durata'=>$durata,
						'indicatii'=>$indicatii			
			];
	
       $succes = $db->collection('Recomandari')->add($docRef);
        
		if($succes )
		{ $_SESSION['success']="Adaugare realizata cu succes.";}
		else
		{ $_SESSION['unsuccess']="A aparut o eroare la adaugarea recomandarii."; } 
}


//adaugare valori
if (isset($_POST['adauga_valori'])) {
	
	$CNP_pac=$_POST['pac_key'];
	$ecg_min=$_POST['ecg_min'];
	$ecg_max=$_POST['ecg_max'];
	$umid_min=$_POST['umid_min'];
	$umid_max=$_POST['umid_max'];
	$puls_min=$_POST['puls_min'];
	$puls_max=$_POST['puls_max'];
	$temp_min=$_POST['temp_min'];
	$temp_max=$_POST['temp_max'];
	
	   $parametrii = [
						'id_pacient'=>$CNP_pac,
						 'Val_min_ECG'=>$ecg_min ,
						  'Val_max_ECG'=>$ecg_max,
						  'Val_min_umid'=>$umid_min,
						  'Val_max_umid'=>$umid_max,
						  'Val_min_temp'=>$puls_min,
						  'Val_max_temp'=>$puls_max,
						  'Val_min_puls'=>$temp_min,
						  'Val_max_puls'=>$temp_max

			];
	
       $succes = $db->collection('Parametrii_modul')->add($parametrii);
        
		if($succes )
		{ $_SESSION['success']="Adaugare realizata cu succes.";
		  $_SESSION['areparametrii']="are";
	        }
		else
		{ $_SESSION['unsuccess']="A aparut o eroare la adaugarea parametriilor."; 
	    	 } 
}


//modificare valori sistem 
if (isset($_POST['modifica_valori']))
{
	$id=$_POST['id_valori'];
	$CNP_pac=$_POST['pac_key'];
	$ecg_min=$_POST['ecg_min'];
	$ecg_max=$_POST['ecg_max'];
	$umid_min=$_POST['umid_min'];
	$umid_max=$_POST['umid_max'];
	$puls_min=$_POST['puls_min'];
	$puls_max=$_POST['puls_max'];
	$temp_min=$_POST['temp_min'];
	$temp_max=$_POST['temp_max'];
		
	$recomandare = $db->collection('Parametrii_modul')->document($id);

	$recomandare->update([
					[	'path' => 'id_pacient', 'value'=> $CNP_pac],
					[	'path' => 'Val_min_ECG', 'value'=> $ecg_min],
					[	'path' => 'Val_max_ECG', 'value'=> $ecg_max],
					[	'path' => 'Val_min_umid', 'value'=> $umid_min],
					[	'path' => 'Val_max_umid', 'value'=> $umid_max],
					[	'path' => 'Val_min_temp', 'value'=> $temp_min],
					[	'path' => 'Val_max_temp', 'value'=> $temp_max],
					[	'path' => 'Val_min_puls', 'value'=> $puls_min],
					[	'path' => 'Val_max_puls', 'value'=> $puls_max]
			]);
			
	if($recomandare )
		{ $_SESSION['success']="Modificare realizata cu succes.";
		 
	        }
		else
		{ $_SESSION['unsuccess']="A aparut o eroare la modificarea parametriilor."; 
	    	 } 
}
?>