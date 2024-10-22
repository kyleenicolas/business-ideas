<?php 
require_once 'core/dbconfig.php'; 
require_once 'core/models.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nicolas Barber Shop</title>
</head>
<body>
	<h1>Welcome To Nicolas's Barber Shop Management System!</h1>

	<!-- Form to insert a new barber -->
	<form action="core/handleforms.php" method="POST">
		<p>
			<label for="name">Name</label> 
			<input type="text" id="name" name="name" required>
		</p>
		<p>
			<label for="phone_number">Phone Number</label> 
			<input type="text" id="phone_number" name="phone_number" required>
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="email" id="email" name="email" required>
		</p>
		<p>
			<label for="experience_years">Experience Years</label> 
			<input type="number" id="experience_years" name="experience_years" required>
		</p>
		<p>
			<input type="submit" name="insertBarberBtn" value="Add Barber">
		</p>
	</form>

	<!-- Fetch and display all barbers -->
	<?php 
		$getAllBarbers = getAllBarbers($pdo); 
		if ($getAllBarbers):
	?>
		<?php foreach ($getAllBarbers as $barber): ?>
			<div class="container" style="border: solid 1px; width: 50%; height: 300px; margin-top: 20px;">
				<h3>Name: <?php echo htmlspecialchars($barber['name']); ?></h3>
				<h3>Phone Number: <?php echo htmlspecialchars($barber['phone_number']); ?></h3>
				<h3>Email: <?php echo htmlspecialchars($barber['email']); ?></h3>
				<h3>Experience Years: <?php echo htmlspecialchars($barber['experience_years']); ?></h3>
				<h3>Date Added: <?php echo htmlspecialchars($barber['date_added']); ?></h3>

				<div class="editAndDelete" style="float: right; margin-right: 20px;">
					<a href="viewclients.php?barber_id=<?php echo htmlspecialchars($barber['barber_id']); ?>">View Clients</a>
					<a href="edit_barber.php?barber_id=<?php echo htmlspecialchars($barber['barber_id']); ?>">Edit</a>
					<a href="delete_barber.php?barber_id=<?php echo htmlspecialchars($barber['barber_id']); ?>">Delete</a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<p>No barbers found.</p>
	<?php endif; ?>
</body>
</html>
