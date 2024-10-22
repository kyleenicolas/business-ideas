<?php 
require_once 'core/models.php'; 
require_once 'core/dbConfig.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Client</title>
</head>
<body>
	<!-- Link to view all clients -->
	<a href="viewclients.php?barber_id=<?php echo htmlspecialchars($_GET['barber_id']); ?>">View All Clients</a>

	<h1>Edit Client Details</h1>

	<?php 
		// Fetch client data by ID
		$client = getClientByID($pdo, $_GET['client_id']); 
		if ($client):
	?>
	<form action="core/handleforms.php?client_id=<?php echo htmlspecialchars($_GET['client_id']); ?>&barber_id=<?php echo htmlspecialchars($_GET['barber_id']); ?>" method="POST">
		<p>
			<label for="name">Client Name</label> 
			<input type="text" id="name" name="name" value="<?php echo htmlspecialchars($client['client_name']); ?>" required>
		</p>
		<p>
			<label for="phone_number">Phone Number</label> 
			<input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($client['client_phone']); ?>" required>
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="email" id="email" name="email" value="<?php echo htmlspecialchars($client['client_email']); ?>" required>
		</p>
		<p>
			<label for="appointment_date">Appointment Date</label> 
			<input type="date" id="appointment_date" name="appointment_date" value="<?php echo htmlspecialchars($client['appointment_date']); ?>" required>
		</p>
		<p>
			<label for="service_type">Service Type</label> 
			<input type="text" id="service_type" name="service_type" value="<?php echo htmlspecialchars($client['service_type']); ?>" required>
		</p>
		<p>
			<input type="submit" name="editClientBtn" value="Update Client">
		</p>
	</form>
	<?php else: ?>
		<p>Client not found.</p>
	<?php endif; ?>
</body>
</html>
