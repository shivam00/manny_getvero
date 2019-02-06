<?php

// Include autoload.php and set the credential file path
define('DOCROOT', realpath(dirname(__FILE__)).'/');
require_once(DOCROOT ."lib/pCloud/autoload.php");

pCloud\Config::$credentialPath = DOCROOT ."lib/pCloud/app.cred";

try {
	// Create Folder instance

	$pcloudFolder = new pCloud\Folder();

	$pclouduser = new pCloud\User();

	// Create new folder in root

	// $folderId = $pcloudFolder->create("New folder");

	// Create File instance
	// $folderId=$pcloudFolder->rename($folderId,"shivam");




	$name=$filename;

	$folderId=612914703;

	$fileId=(int)2786085544;
	// echo $folderId;
	// print_r($folderId);


	$pcloudFile = new pCloud\File();

	// Upload new file in created folder
//
	$fileMetadata = $pcloudFile->upload(DOCROOT .$name, $folderId);
	$getContent = $pcloudFolder->getContent($folderId);

	foreach ($getContent as $k ) {
	# code...

		if ($k->name == $name) {
	# code...
			$fileId=$k->fileid;

		}


	}






	$link=$pcloudFile->getpubLink($fileId);


	// $info=$pcloudFile->getInfo($fileId);
	// // Get folder content
	// print_r($info);
	// echo "<br>$link<br><br>";
	$linksession = array('link' => $link);
			$this->session->set_userdata('link', $linksession);
	unlink(DOCROOT .$name);



}

catch (Exception $e) {

	echo $e->getMessage();
}
?>
