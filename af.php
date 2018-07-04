<?php

// Original by n45ht
// Recoded by Exp3ct0v!z


echo " \033[93m
              _____     __           ________ 
             / ___/_ __/ /  ___ ____/ ___/ _ \
            / /__/ // / _ \/ -_) __/ (_ / // /
            \___/\_, /_.__/\__/_/  \___/____/ 
                /___/             
            
               [ AF Recoded By Exp3ct0v!z ]


";

echo "\033[91m Url Target : ";
$target = trim(fgets(STDIN));
echo "\033[91m List file : ";
$list = trim(fgets(STDIN));
if(!preg_match("/^http:\/\//",$target) AND !preg_match("/^https:\/\//",$target)){
	$targets = "http://$target";
}else{
	$targets = $target;
}

$open = fopen("$list","r");
$size = filesize("$list");
$read = fread($open,$size);
$lists = explode("\r\n",$read);

foreach($lists as $login){
	$admins = "$targets/$login";
	
	$ch = curl_init("$admins");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($httpcode == 200){
		echo "\n\n \033[92m Cek $admins => Zeeb\n";
	}else{
		echo "\n \033[94m Cek $admins => Zonk";
	}
}