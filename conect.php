<?php
require_once'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;



 $db = new FirestoreClient([
        'projectId' => 'wearycare'
    ]);
	

	
?>