<?php
# Uploads Script for Getting Started with Flex and PHP
# http://www.adobe.com/devnet/flex/articles/php_getstarted.html
#echo "\n temporary file name = " . $_FILES['Filedata']['tmp_name']."\n";
#echo " file name = " . $_FILES['Filedata']['name']."\n";
#echo " file size = " . $_FILES['Filedata']['size']."\n";
#echo " attempting to move file...\n";
$microtime=round(microtime(true)*1000);

function getExtension($filename) {
	$filename=strtolower($filename);
	$exts=explode(".",$filename);
	$ext=$exts[1];
	return $ext;
};

if(strlen($_FILES['file']['name'])!=0) {
		
	$extz=getExtension($_FILES['file']['name']);
	$target=$microtime.".".$extz;
	$moved=move_uploaded_file($_FILES['file']['tmp_name'],"./pics/".$target);
	
	echo "<div id='picname'>".$target."</div><br/>";
	echo "<img src='pics/".$target."' class='preview' width='250px'></img>";
} else {
	echo "<img src='pics/noimage.png' class='preview' width='250px'> No File to upload</img>";
}
?>