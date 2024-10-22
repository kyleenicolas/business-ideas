<?php 
require_once 'core/models.php'; 
require_once 'core/dbconfig.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Barber</title>
</head>
<body>
	<h1>Are you sure you want to delete this barber?</h1>

	<?php 
		// Fetch barber data by ID
		$barber = getBarberByID($pdo, $_GET['barber_id']);
		if ($barber): 
	?>

	<div class="container" style="border: solid 1px; padding: 20px; max-width: 600px; margin: 0 auto;">
		<h2>Name: <?php echo htmlspecialchars($barber['name']); ?></h2>
		<h2>Phone Number: <?php echo htmlspecialchars($barber['phone_number']); ?></h2>
		<h2>Email: <?php echo htmlspecialchars($barber['email']); ?></h2>
		<h2>Experience Years: <?php echo htmlspecialchars($barber['experience_years']); ?></h2>
		<h2>Date Added: <?php echo htmlspecialchars($barber['date_added']); ?></h2>

		<div class="deleteBtn" style="text-align: right; margin-top: 20px;">
			<form action="core/handleforms.php?barber_id=<?php echo htmlspecialchars($_GET['barber_id']); ?>" method="POST">
				<input type="submit" name="deleteBarberBtn" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this barber?');">
			</form>			
		</div>	
	</div>

	<?php else: ?>
		<p>Barber not found.</p>
	<?php endif; ?>

</body>
</html>
