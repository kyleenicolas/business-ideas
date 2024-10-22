<?php 
require_once 'core/dbconfig.php'; 
require_once 'core/models.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Client</title>
</head>
<body>
	<?php 
		// Fetch client data by ID
		$client = getClientByID($pdo, $_GET['client_id']); 
		if ($client):
	?>
	<h1>Are you sure you want to delete this client?</h1>
	<div class="container" style="border: 1px solid; padding: 20px; max-width: 600px; margin: 0 auto;">
		<h2>Client Name: <?php echo htmlspecialchars($client['client_name']); ?></h2>
		<h2>Phone Number: <?php echo htmlspecialchars($client['client_phone']); ?></h2>
		<h2>Email: <?php echo htmlspecialchars($client['client_email']); ?></h2>
		<h2>Appointment Date: <?php echo htmlspecialchars($client['appointment_date']); ?></h2>
		<h2>Service Type: <?php echo htmlspecialchars($client['service_type']); ?></h2>
		<h2>Date Added: <?php echo htmlspecialchars($client['date_added']); ?></h2>

		<div class="deleteBtn" style="text-align: right; margin-top: 20px;">
			<form action="core/handleforms.php?client_id=<?php echo htmlspecialchars($_GET['client_id']); ?>&barber_id=<?php echo htmlspecialchars($_GET['barber_id']); ?>" method="POST">
				<input type="submit" name="deleteClientBtn" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?');">
			</form>			
		</div>	
	</div>

	<?php else: ?>
		<p>Client not found.</p>
	<?php endif; ?>

</body>
</html>
