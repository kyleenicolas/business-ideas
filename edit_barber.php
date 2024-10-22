<?php 
require_once 'core/handleforms.php'; 
require_once 'core/models.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Barber</title>
</head>
<body>
	<?php 
		// Fetch barber data by ID
		$barber = getBarberByID($pdo, $_GET['barber_id']); 
		if ($barber):
	?>
	<h1>Edit Barber Details</h1>
	<form action="core/handleforms.php?barber_id=<?php echo htmlspecialchars($_GET['barber_id']); ?>" method="POST">
		<p>
			<label for="name">Name</label>
			<input type="text" id="name" name="name" value="<?php echo htmlspecialchars($barber['name']); ?>" required>
		</p>
		<p>
			<label for="phone_number">Phone Number</label>
			<input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($barber['phone_number']); ?>" required>
		</p>
		<p>
			<label for="email">Email</label>
			<input type="email" id="email" name="email" value="<?php echo htmlspecialchars($barber['email']); ?>" required>
		</p>
		<p>
			<label for="experience_years">Experience Years</label>
			<input type="number" id="experience_years" name="experience_years" value="<?php echo htmlspecialchars($barber['experience_years']); ?>" min="0" required>
		</p>
		<p>
			<input type="submit" name="editBarberBtn" value="Update Barber">
		</p>
	</form>
	<?php else: ?>
		<p>Barber not found.</p>
	<?php endif; ?>
</body>
</html>
