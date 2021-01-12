<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 2) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM animals WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			}
		}
	?>
<?php 
	$query = "SELECT id, name, species, ill, gender, vaccination, owned FROM animals ORDER BY name ASC";
	require_once DATABASE_CONTROLLER;
	$animals = getList($query);
?>
	<?php if(count($animals) <= 0) : ?>
		<h1>No animals found in the database</h1>
	<?php else : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Species</th>
					<th scope="col">Ill</th>
					<th scope="col">Gender</th>
					<th scope="col">Vaccinations</th>
					<th scope="col">Owned</th>
					<th scope="col">Szerkesztés</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($animals as $a) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><a href="?P=animals&w=<?=$a['id'] ?>"><?=$a['name'] ?></a></td>
						<td><?=$a['species'] == 0 ? 'Tukan' : ($a['species'] == 1 ? 'Manatee' : 'Other spec') ?></td>
						<td><?=$a['ill'] ?></td>
						<td><?=$a['gender'] == 0 ? 'Female' : ($a['gender'] == 1 ? 'Male' : 'Other') ?></td>
						<td><?=$a['vaccination'] ?></td>
						<td><?=$a['owned'] == 0 ? 'Yes' : ($a['owned'] == 1 ? 'No' : 'Maybe') ?></td>
						<td><a href="?P=edit_animals&w=<?=$a['id'] ?>">Edit</a></td>
						<td><a href="?P=list_animals&d=<?=$a['id'] ?>">Delete</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>
