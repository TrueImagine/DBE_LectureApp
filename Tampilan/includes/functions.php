<?php //filename: functions.php

function check_file_extension($file_name, $ext_boleh){
	$file_ext = strtolower(end(explode(".",$file_name)));
	$ext_boleh = (explode(",",str_replace(" ", "", $ext_boleh)));
	if(in_array($file_ext, $ext_boleh)){
		return true;
	}
	else{
		return false;
	}
}