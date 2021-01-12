<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 2) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM volunteers WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			}
		}
	?>
<?php 
	$query = "SELECT id, first_name, last_name, address, gender, city, country, postal, email, phone, days, note FROM volunteers ORDER BY first_name ASC";
	require_once DATABASE_CONTROLLER;
	$volunteers = getList($query);
?>
	<?php if(count($volunteers) <= 0) : ?>
		<h1>No volunteers found in the database</h1>
	<?php else : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Email</th>
					<th scope="col">Gender</th>
					<th scope="col">City</th>
					<th scope="col">Address</th>
					<th scope="col">Country</th>
					<th scope="col">Postal</th>
					<th scope="col">Phone</th>
					<th scope="col">Days</th>
					<th scope="col">Note</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($volunteers as $v) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$v['first_name'] ?></a></td>
						<td><?=$v['last_name'] ?></td>
						<td><?=$v['email'] ?></td>
						<td><?=$v['gender'] == 0 ? 'Female' : ($v['gender'] == 1 ? 'Male' : 'Other') ?></td>
						<td><?=$v['city'] == 0 ? 'Eger' : ($v['city'] == 1 ? 'Debrecen' : 'Miskolc') ?></td>
						<td><?=$v['address'] ?></td>
						<td><?=$v['country'] == 0 ? 'Hungary' : ($v['country'] == 1 ? 'Italy' : 'Greece') ?></td>
						<td><?=$v['postal'] ?></td>
						<td><?=$v['phone'] ?></td>
						<td><?=$v['days'] ?></td>
						<td><?=$v['note'] ?></td>
						<td><a href="?P=list_volunteers&d=<?=$v['id'] ?>">Delete</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>
