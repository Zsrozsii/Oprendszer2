<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addAnimal'])) {
		$postData = [
			'name' => $_POST['name'],
			'species' => $_POST['species'],
			'ill' => $_POST['ill'],
			'gender' => $_POST['gender'],
			'vaccination' => $_POST['vaccination'],
			'owned' => $_POST['owned']
		];

		if(empty($postData['name']) || $postData['species'] < 0 && $postData['species'] > 1 || empty($postData['ill']) || empty($postData['vaccination']) || $postData['owned'] < 0 && $postData['owned'] > 2 || $postData['gender'] < 0 && $postData['gender'] > 2)  {
			echo "Hiányzó adat(ok)!";
		} else {
			$query = "INSERT INTO animals (name, species, ill, gender, vaccination, owned) VALUES (:name, :species, :ill, :gender, :vaccination, :owned)";
			$params = [
				':name' => $postData['name'],
				':species' => $postData['species'],
				':ill' => $postData['ill'],
				':gender' => $postData['gender'],
				':vaccination' => $postData['vaccination'],
				':owned' => $postData['owned']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php');
		}
	}
	?>

	<form method="post">
			<div class="form-group col-md-5">
				<label for="animalName">Name</label>
				<input type="text" class="form-control" id="animalName" name="name">
			</div>


		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="animalVaccination">Vaccination</label>
				<input type="text" class="form-control" id="animalVaccination" name="vaccination">
			</div>
		</div>

		<div class="form-group col-md-12">
				<label for="animalill">Ill</label>
				<input type="text" class="form-control" id="animalill" name="ill">
			</div>


		<div class="form-row">
			<div class="form-group col-md-3">
		    	<label for="animalSpecies">Species</label>
		    	<select class="form-control" id="animalSpecies" name="species">
		      		<option value="0">Tukan</option>
		      		<option value="1">Manatee</option>
		    	</select>
		  	</div>
		</div>


		<div class="form-row">
			<div class="form-group col-md-3">
		    	<label for="animalGender">Gender</label>
		    	<select class="form-control" id="animalGender" name="gender">
		      		<option value="0">Female</option>
		      		<option value="1">Male</option>
		      		<option value="2">Other</option>
		    	</select>
		  	</div>
		</div>



<div class="form-row">
			<div class="form-group col-md-2">
		    	<label for="animalOwned">Owned</label>
		    	<select class="form-control" id="animalOwned" name="owned">
		      		<option value="0">Yes</option>
		      		<option value="1">No</option>
		      		<option value="2">Maybe</option>
		    	</select>
		  	</div>
		</div>

		<button type="submit" class="btn btn-primary" name="addAnimal">Add Animal</button>
	</form>
<?php endif; ?>