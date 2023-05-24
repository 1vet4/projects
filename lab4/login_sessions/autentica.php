<?php

$link = mysqli_connect('localhost', 'root', '', 'usersdb') or die("Não ligou");

session_start(); 

if (@$_REQUEST['logout'] == 1) {
	logout();
}


if (@$_POST['user'] && @$_POST['pass']){

	$uuser= mysqli_real_escape_string($link, $_POST['user']);
	$upass= md5($_POST['pass']);

	$sql="SELECT id FROM users WHERE password='$upass' AND username='$uuser'";
	$result = mysqli_query($link, $sql);
	$num = mysqli_num_rows($result);


	if ($num<1) {
		form_login();
		exit; // after presenting form exits
	} else {
		$_SESSION['user'] = $uuser;  // guarda em sessao
	}
	
} else if (!@isset($_SESSION['user'])) { // nao vem do form 
	form_login();
	exit;   // after presenting form exits
}


function form_login(){
	header("Location: login.php");
}


function logout(){
	unset($_SESSION['user']);
	//session_unset();
	//session_destroy();
	
	//after redirect to somewere	
	//form_login();
	header("Location: index.php");
}
?>
