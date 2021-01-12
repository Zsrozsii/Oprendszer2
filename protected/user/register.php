<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
	$postData = [
		'fname' => $_POST['first_name'],
		'lname' => $_POST['last_name'],
		'email' => $_POST['email'],
		'email1' => $_POST['email1'],
		'password' => $_POST['password'],
		'password1' => $_POST['password1']
	];

	if(empty($postData['fname']) || empty($postData['lname']) || empty($postData['email']) || empty($postData['email1']) || empty($postData['password']) || empty($postData['password1'])) {
		echo "Hiányzó adat(ok)!";
	} else if($postData['email'] != $postData['email1']) {
		echo "Az email címek nem egyeznek!";
	} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
		echo "Hibás email formátum!";
	} else if ($postData['password'] != $postData['password1']) {
		echo "A jelszavak nem egyeznek!";
	} else if(strlen($postData['password']) < 6) {
		echo "A jelszó túl rövid! Legalább 6 karakter hosszúnak kell lennie!";
	} else if(!UserRegister($postData['email'], $postData['password'], $postData['fname'], $postData['lname'])) {
		echo "Sikertelen regisztráció!";
	}

	$postData['password'] = $postData['password1'] = "";
}
?>
<div id="promo">
<div class="signup-form">
   <form method="post">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" id="registerFirstName" name="first_name" placeholder="First Name" required="required" value="<?=isset($postData) ? $postData['fname'] : "";?>"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="last_name" id="registerLastName"placeholder="Last Name" required="required" value="<?=isset($postData) ? $postData['lname'] : "";?>"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<label for="registerEmail">Email</label>
        	<input type="email" class="form-control" name="email" id="registerEmail"placeholder="Email" required="required" value="<?=isset($postData) ? $postData['email'] : "";?>">
        </div>
        <div class="form-group">
        	<label for="registerEmail1">Confirm Email</label>
        	<input type="email" class="form-control" name="email1" id="registerEmail1"placeholder="Confirm Email" required="required" value="<?=isset($postData) ? $postData['email1'] : "";?>">
        </div>
		<div class="form-group">
			<label for="registerPassword">Password</label>
            <input type="password" class="form-control" name="password" id="registerPassword" placeholder="Password" required="required">
        </div>
		<div class="form-group">
			<label for="registerPassword1">Confirm Password</label>
            <input type="password" class="form-control" name="password1" id="registerPassword1"placeholder="Confirm Password" required="required">
        </div>        
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		
   
	
	<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="register">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a href="#">Sign in</a></div>
   </div>
   </div>
</form>