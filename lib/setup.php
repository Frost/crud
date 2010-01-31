<?php
$function = $_GET['action'];

if($function == 'install_htaccess') {
	if(installHtaccessFile()) {
		echo(".htaccess created");
	} else {
		echo("nope");
	}
} elseif($function == 'uninstall_htaccess') {
	if(removeInstalledHtaccessFile()) {
		echo(".htaccess deleted");
	} else {
		echo("nope");
	}
} else {
	echo("unknown command: ".$function);
}

// create and install .htaccess file
function installHtaccessFile() {
	// filenames
	// uploaded file
	$filename = './htaccess';
	// name of .htaccess file...
	$htaccess = './.htaccess';

	if(file_exists($filename)) {
		// open the file streams
		$uploaded_file = fopen($filename, 'r');
		$handle = fopen($htaccess, 'w');
	
		// write .htaccess file
		fwrite($handle, fread($uploaded_file, filesize($filename)));

		// close file streams
		fclose($handle);
		fclose($uploaded_file);
		return true;
	} else {
		return false;
	}
}

// remove installed .htaccess file
function removeInstalledHtaccessFile() {
	$filename = './.htaccess';
	if(file_exists($filename)) {
		// unlink .htaccess file
		unlink($filename);
		return true;
	} else {
		return false;
	}
}
?>