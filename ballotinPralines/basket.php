<?php


ob_start();

header("Cache-Control: no-cache");  // --> ne met jamais en cache, envoie à chaque fois un ficheir différent (qd change souvent...)

header("Content-Type: application/json"); //--> Change le contenu: je ne veux pas que tu m'envoie du html ou du texte, mais du Json

var_dump($_POST); // est vidé avant dêtre envoyé (et donc d'avoir une chance d'être écrit) avec ob_get_clean()  //mais neccessaire pour avoir quelque chose 'envoyable' à mettre dans le fichier texte

if (isset($_POST)) {

	echo $_POST[1]; // pareil que var_dump
	    $result = ob_get_clean(); // vide ce qui serait envoyé (trucs dans les echo, var dump,...) (et d'habitude interprété en html)
	    // var_dump($result);

	//on ne peut envoyer qu'un seul type de données à la fois. Plusieurs echo même au forma json ne marchera pas car ça fera plusieurs accolades -> ne comprendra plus que c'est du json

		echo '{"result" : "ok"}'; // --> le Json
	}
	else{
	echo '{"result" : "nok"}'; // --> le Json
}

ob_flush();
//(ob/start --> output/buffer  --> au lieu d'envoyer ligne par ligne, il retient tout avant d'envoyer  (envoie rien ou tout d'un coup)
//=> utile en cas de redirection pour éviter problèmes)


?>
