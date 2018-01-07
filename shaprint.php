<?php

function human_filesize($bytes, $decimals = 1) {
	$sz = 'BKMGTP';
	$factor = floor((strlen($bytes) - 1) / 3);
	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

echo "<pre>";
foreach(glob('*') as $ent) {
	if (is_dir($ent)) {
		continue;
	}

	$str = sha1_file($ent) . '  ' . str_pad($ent, 20) . '  ' .
	     str_pad(human_filesize(filesize($ent)), 10) .
	     date("d/m/y H:i:s", filectime($ent)) . "\n";
	
	echo $str;
}
echo "</pre>";
?>
