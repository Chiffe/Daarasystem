<?php
/**
 * Created by PhpStorm.
 * User: Jr
 * Date: 04/10/2017
 * Time: 15:36
 */

session_start();
$dataPost = $_POST;
$dataPost = array_map('htmlspecialchars', array_map('trim', $dataPost));
$dest = 'makhtarndiaye87@gmail.com';

//Les champs requis
$fieldsRequired = ['lastname', 'phone', 'email', 'objet', 'comment'];
//Pour chaque champ requis
foreach ($fieldsRequired as $field){
	//Si champ inexistant ou vide
	if(!isset($dataPost[$field]) || empty($dataPost[$field])){
		$_SESSION['response_code'] = 1;
		header("Location: http://www.touba.bewworks.online/");
		exit;
	}
}

//Si l'email n'est pas valide
if(!filter_var($dataPost['email'], FILTER_VALIDATE_EMAIL)){
	$_SESSION['response_code'] = 2;
	header("Location: http://www.touba.bewworks.online/");
	exit;
}

$subject = ($dataPost['objet'] == 'devis')?'Demande de devis':'Autre';
$headers = 'From: '.$dataPost['email']."\r\n".'Reply-To: '.$dataPost['email']."\r\n".'X-Mailer: PHP/' . phpversion();
$message = 'Un message a été envoyé par un visiteur du site.'."\n\n".
'Ci-dessous les informations sur le visiteur :'."\n\n".
'Nom : '.$dataPost['lastname']."\n".
'Téléphone : '.$dataPost['phone']."\n".
'Nom école : '.((isset($dataPost['schoolname']) && !empty($dataPost['schoolname']))?$dataPost['schoolname']:'Non renseigné')."\n".
'Ville : '.((isset($dataPost['city']) && !empty($dataPost['city']))?$dataPost['city']:'Non renseigné')."\n".
'Email : '.$dataPost['email']."\n\n".
'Son message : '."\n\n\t".$dataPost['comment'];

mail($dest, $subject, $message, $headers)?$_SESSION['response_code'] = 3:$_SESSION['response_code'] = 4;
header("Location: http://www.touba.bewworks.online/");