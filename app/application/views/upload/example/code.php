<?php

define('DOCROOT', realpath(dirname(__FILE__)).'/');
require_once(DOCROOT ."/../lib/pCloud/autoload.php");

$path = DOCROOT ."/app.info";

try {
	$appInfo = pCloud\App::loadAppInfoFile($path);
	$codeUrl = pCloud\App::getAuthorizeCodeUrl($appInfo);

	echo "Visit <a target=\"_blank\" href=\"{$codeUrl}\">{$codeUrl}</a>";
} catch (Exception $e) {
	echo $e->getMessage();
}

?>