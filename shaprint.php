<?php
foreach(glob('*') as $ent) {
	if (is_dir($ent)) {
		continue;
	}

	$str = sha1_file($ent) . '  ' . str_pad($ent, 20) . '  ' .
	     date("d/m/y H:i:s", filectime($ent)) . "\n";
	
	echo $str;
}
?>
