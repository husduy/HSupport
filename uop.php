<?
require "connect.php";

$solutions = ["решение 1", "прими болеутоляющие таблетки", "отдохни", "решение 4"];
$diagnosises = ["головная боль", "головокружение", "переутомление"];
$id = 2; 
if (isset($_POST['textBtn'])) {
	$text = R::dispense('problems');
	$text->name = $_POST['textName'];
	R::store($text);
	header("Location: cards.php");
}


if (isset($_POST['specSolBtn'])) {
	$text = R::load('problems', $_POST['idofprob']);
	$text->specsol = $_POST['specSolText'];
	$text->dangerrnage = $_POST['dangerRange'];
	R::store($text);
	header("Location: spec.php");
}

if (isset($_POST['logbtn'])) {
	if ($_POST['logpass'] == "password") {
		header("Location: spec.php");
	}
	else {
		header("Location: login.php");
	}
}

if (isset($_POST['specProfBtn'])) {
	$text = R::dispense('profil');
	$text->topic = $_POST['specProfilTop'];
	$text->name = $_POST['specProfilName'];
	$text->text = $_POST['specProfilText'];
	R::store($text);
	header("Location: specprofil.php");
}

if (isset($_POST['eventbtn'])) {
	$text = R::dispense('calendar');
	$text->date = $_POST['dateof'];
	$text->event = $_POST['event'];
	R::store($text);
	header("Location: speccalend.php");
}

if (isset($_POST['combtn'])) {
	$text = R::dispense('comchat');
	$text->comtext = "Дежурный врач: ".$_POST['comtext'];	
	R::store($text);
	header("Location: specchat.php");
}
if (isset($_POST['ncombtn'])) {
	$text = R::dispense('comchat');
	$text->comtext = $_POST['ncomtext'];	
	R::store($text);
	header("Location: chat.php");
}
?>