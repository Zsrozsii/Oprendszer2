<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addVolunteer'])) {
		$postData = [
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'email' => $_POST['email'],
			'gender' => $_POST['gender'],
			'address' => $_POST['address'],
			'city' => $_POST['city'],
			'country' => $_POST['country'],
			'postal' => $_POST['postal'],
			'days' => $_POST['days'],
			'phone' => $_POST['phone'],
			'note' => $_POST['note']
		];

		if(empty($postData['first_name']) || empty($postData['last_name']) || empty($postData['email']) ||  empty($postData['address']) || $postData['city'] < 0 && $postData['city'] > 2 || $postData['country'] < 0 && $postData['country'] > 2 || empty($postData['postal']) || empty($postData['phone']) || $postData['gender'] < 0 && $postData['gender'] > 2) {
			echo "Hiányzó adat(ok)!";
		} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
			echo "Hibás email formátum!";
		} else {
			$query = "INSERT INTO volunteers (first_name, last_name, email, gender, address, city, country, postal, days, phone ,note) VALUES (:first_name, :last_name, :email, :gender, :address, :city, :country, :postal, :days, :phone, :note)";
			$params = [
				':first_name' => $postData['first_name'],
				':last_name' => $postData['last_name'],
				':email' => $postData['email'],
				':gender' => $postData['gender'],
				'address' => $postData['address'],
				'city' => $postData['city'],
				'country' => $postData['country'],
				'postal' => $postData['postal'],
				'days' => $postData['days'],
				'phone' => $postData['phone'],
				'note' => $postData['note']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php');
		}
	}
	?>

	<form method="post">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="volunteerFirstName">First Name</label>
				<input type="text" class="form-control" id="volunteerFirstName" name="first_name">
			</div>
			<div class="form-group col-md-6">
				<label for="volunteerLastName">Last Name</label>
				<input type="text" class="form-control" id="volunteerLastName" name="last_name">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="volunteerEmail">Email</label>
				<input type="email" class="form-control" id="volunteerEmail" name="email">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
		    	<label for="volunteerGender">Gender</label>
		    	<select class="form-control" id="volunteerGender" name="gender">
		      		<option value="0">Female</option>
		      		<option value="1">Male</option>
		      		<option value="2">Other</option>
		    	</select>
		  	</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="volunteerAddress">Address</label>
				<input type="text" class="form-control" id="volunteerAddress" name="address">
			</div>
		</div>

<div class="form-row">
			<div class="form-group col-md-12">
		    	<label for="volunteerCity">City</label>
		    	<select class="form-control" id="volunteerCity" name="city">
		      		<option value="0">Eger</option>
		      		<option value="1">Debrecen</option>
		      		<option value="2">Miskolc</option>
		    	</select>
		  	</div>
</div>

<div class="form-row">
			<div class="form-group col-md-12">
		    	<label for="volunteerCountry">County</label>
		    	<select class="form-control" id="volunteerCountry" name="country">
		      		<option value="0">Hungary</option>
		      		<option value="1">Italy</option>
		      		<option value="2">Greece</option>
		    	</select>
		  	</div>
</div>

		<div class="form-row">
			<div class="col-6 mb-30">
				<label for="volunteerPostal">Postal code</label>
				<input type="text" class="form-control" id="volunteerPostal" name="postal">
			</div>
		</div>

<label for="volunteerDays">Which days you can be volunteer?</label>
                            <div class="form-group ">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="days" id="volunteerDays" value="1"> Monday
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="days" id="volunteerDays" value="2"> Tuesday
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="days" id="volunteerDays" value="3"> Wednesday
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="days" id="volunteerDays" value="4"> Thursday
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="days" id="volunteerDays" value="5"> Friday
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="days" id="volunteerDays" value="6"> Saturday
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="days" id="volunteerDays" value="7"> Sunday
                                    </label>
                                </div>                                
                            </div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="volunteerPhone">Phone</label>
				<input type="text" class="form-control" id="volunteerPhone" name="phone">
			</div>
		</div>

<div class="form-group">
	<label for="volunteerNote">Volunteer Note</label>
	<textarea class="form-control" id="volunteerNote" rows="5" name="note"placeholder="Write message"></textarea>
</div>


		<button type="submit" class="btn btn-primary" name="addVolunteer">Add Volunteer</button>
	</form>
<?php endif; ?>