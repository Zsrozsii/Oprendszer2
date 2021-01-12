<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else :
	if(!array_key_exists('w', $_GET) || empty($_GET['w'])) : 
		header('Location: index.php');
else: 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editAnimals'])) {
		$postData = [
			'id' => $_POST['animalsId'],
			'name' => $_POST['name'],
			'species' => $_POST['species'],
			'ill' => $_POST['ill'],
			'gender' => $_POST['gender'],
			'vaccination' => $_POST['vaccination'],
			'owned' => $_POST['owned']
		];
		if($postData['id'] != $_GET['w']) {
			echo "Hiba a dolgozó azonosítása során!";
		} else {
			if(empty($postData['name']) || empty($postData['species']) || empty($postData['ill']) || empty($postData['vaccination']) || empty($postData['owned']) || $postData['gender'] < 0 && $postData['gender'] > 2) {
				echo "Hiányzó adat(ok)!";
			} else {
				$query = "UPDATE animals SET name = :name, species = :species, ill = :ill, gender = :gender, vaccination = :vaccination , owned= :owned WHERE id = :id";
				$params = [
					':name' => $postData['name'],
					':species' => $postData['species'],
					':ill' => $postData['ill'],
					':gender' => $postData['gender'],
					':vaccination' => $postData['vaccination'],
					':owned' => $postData['owned'],
					':id' => $postData['id']
				];
				require_once DATABASE_CONTROLLER;
				if(!executeDML($query, $params)) {
					echo "Hiba az adatbevitel során!";
				} header('Location: ?P=list_animals');
			}
		}
	}
	$query = "SELECT id, name, species, ill, gender, vaccination, owned FROM animals WHERE id = :id";
	$params = [':id' => $_GET['w']];
	require_once DATABASE_CONTROLLER;
	$animals = getRecord($query, $params);
	if(empty($animals)) :
		header('Location: index.php');
		else : ?>
			<form method="post">
				<input type="hidden" name="animalsId" value="<?=$animals['id'] ?>">
					<div class="form-group col-md-6">
						<label for="animalName">Name</label>
						<input type="text" class="form-control" id="animalName" name="name" value="<?=$animals['name'] ?>">
					</div>

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="animalSpecies">Species</label>
						<select class="form-control" id="animalSpecies" name="species">
							<option value="0" <?=$animals['species'] == 0 ? 'selected' : '' ?> >Tukan</option>
							<option value="1" <?=$animals['species'] == 1 ? 'selected' : '' ?> >Manatee</option>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="animalill">Ill</label>
						<input type="text" class="form-control" id="animalill" name="ill" value="<?=$animals['ill'] ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="animalGender">Gender</label>
						<select class="form-control" id="animalGender" name="gender">
							<option value="0" <?=$animals['gender'] == 0 ? 'selected' : '' ?> >Female</option>
							<option value="1" <?=$animals['gender'] == 1 ? 'selected' : '' ?> >Male</option>
							<option value="2" <?=$animals['gender'] == 2 ? 'selected' : '' ?> >Other</option>
						</select>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="animalVaccination">Vaccination</label>
						<input type="text" class="form-control" id="animalVaccination" name="vaccination" value="<?=$animals['vaccination'] ?>">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="animalOwned">Gender</label>
						<select class="form-control" id="animalOwned" name="owned">
							<option value="0" <?=$animals['owned'] == 0 ? 'selected' : '' ?> >Yes</option>
							<option value="1" <?=$animals['owned'] == 1 ? 'selected' : '' ?> >No</option>
							<option value="2" <?=$animals['owned'] == 2 ? 'selected' : '' ?> >Maybe</option>
						</select>
					</div>
				</div>

				<button type="submit" class="btn btn-primary" name="editAnimals">Save Animal</button>
			</form>
		<?php endif;
	endif;
endif;
?>