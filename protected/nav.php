<hr>

<a href="index.php">Home</a>
<?php if(!IsUserLoggedIn()) : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=login">Login</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=register">Register</a>
<?php else : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=test">Permission test</a>
<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=apply_volunteers">Apply for volunteer</a>
<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=add_animals">Add animal</a>

<!--Admin felulet -->
	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 2) : ?>
		<span> &nbsp; || &nbsp; </span>
		<a href="index.php?P=users">User list</a>
		<span> &nbsp; | &nbsp; </span>
		<a href="index.php?P=list_animals">List animals</a>
		<span> &nbsp; | &nbsp; </span>
		<a href="index.php?P=list_volunteers">List volunteers</a>
		<span> &nbsp; || &nbsp; </span>
	<?php else : ?>
		<span> &nbsp; | &nbsp; </span>
	<?php endif; ?>

	<a href="index.php?P=logout">Logout</a>
<?php endif; ?>

<hr>