<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
	$appInfoPath = "./app.info";
	define('DOCROOT', realpath(dirname(__FILE__)).'/');
	require_once(DOCROOT ."/../lib/pCloud/autoload.php");
	$appInfoPath =DOCROOT ."/app.info";
	pCloud\Config::$credentialPath = DOCROOT ."/../lib/pCloud/app.cred";


	try {
		if (isset($_GET["code"])) {

			$appInfo = pCloud\App::loadAppInfoFile($appInfoPath);

			$appInfo->code = $_GET["code"];

			if (!file_put_contents($appInfoPath, json_encode($appInfo, 128))) {
				throw new Exception("\"code\" not found");
			}

			pCloud\App::getToken($appInfoPath, $credentialPath);

			echo "Done";
		} else {
			echo "
			<form>
				<input type=\"text\" name=\"code\" placeholder=\"Code\"/>
				<input type=\"submit\">
			</form>";
		}
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	?>
</body>
</html>