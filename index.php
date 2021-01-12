<?php session_start(); ?>
<?php require_once 'protected/config.php'; ?>
<?php require_once USER_MANAGER; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>WebProg2 - Távoktatás 1</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Iconra hivatkozás -->
	<link rel="stylesheet" href="<?=PUBLIC_DIR.'font-awesome/css/font-awesome.min.css'?>">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Saját CSS -->
	<link rel="stylesheet" type="text/css" href="<?=PUBLIC_DIR.'style.css?'.date('YmdHis', filemtime(PUBLIC_DIR.'style.css'))?>">
</head>
<body>
	<div class="container-fluid">
		<header><?php include_once PROTECTED_DIR.'header.php'; ?></header>
		<nav><?php require_once PROTECTED_DIR.'nav.php'; ?></nav>
		<content><?php require_once PROTECTED_DIR.'routing.php'; ?></content>
		<footer><?php include_once PROTECTED_DIR.'footer.php'; ?></footer>
	</div>
</body>
</html>