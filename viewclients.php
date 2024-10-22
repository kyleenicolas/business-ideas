<?php 
require_once 'core/models.php'; 
require_once 'core/dbconfig.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barber and Client Management</title>
</head>
<body>
	<!-- Link to return to home -->
	<a href="index.php">Return to home</a>

	<?php
		// Fetch barber details by ID
		if (isset($_GET['barber_id'])) {
			$barber_id = htmlspecialchars($_GET['barber_id']);
			$getBarberByID = getBarberByID($pdo, $barber_id);
		} else {
			echo "<p>Invalid barber ID</p>";
			exit;
		}
	?>
	
	<!-- Barber details -->
	<h1>Barber: <?php echo htmlspecialchars($getBarberByID['name']); ?></h1>
	
	<!-- Form to add a new client -->
	<h1>Add Your New Client</h1>
	<form action="core/handleforms.php?barber_id=<?php echo $barber_id; ?>" method="POST">
		<p>
			<label for="name">Client Name</label> 
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
			<label for="appointment_date">Appointment Date</label> 
			<input type="date" id="appointment_date" name="appointment_date" required>
		</p>
		<p>
			<label for="service_type">Service Type</label> 
			<input type="text" id="service_type" name="service_type" required>
		</p>
		<p>
			<input type="submit" name="insertNewClientBtn" value="Add Client">
		</p>
	</form>

	<!-- Display list of clients -->
	<table style="width:100%; margin-top: 50px; border-collapse: collapse;">
		<tr>
			<th>Client ID</th>
			<th>Client Name</th>
			<th>Phone Number</th>
			<th>Email</th>
			<th>Appointment Date</th>
			<th>Service Type</th>
			<th>Date Added</th>
			<th>Action</th>
		</tr>
		<?php 
			$getClientsByBarber = getClientsByBarber($pdo, $barber_id); 
			if ($getClientsByBarber):
				foreach ($getClientsByBarber as $client): 
		?>
			<tr>
				<td><?php echo htmlspecialchars($client['client_id']); ?></td>
				<td><?php echo htmlspecialchars($client['client_name']); ?></td>
				<td><?php echo htmlspecialchars($client['client_phone']); ?></td>
				<td><?php echo htmlspecialchars($client['client_email']); ?></td>
				<td><?php echo htmlspecialchars($client['appointment_date']); ?></td>
				<td><?php echo htmlspecialchars($client['service_type']); ?></td>
				<td><?php echo htmlspecialchars($client['date_added']); ?></td>
				<td>
					<a href="edit_client.php?client_id=<?php echo htmlspecialchars($client['client_id']); ?>&barber_id=<?php echo $barber_id; ?>">Edit</a> |
					<a href="delete_client.php?client_id=<?php echo htmlspecialchars($client['client_id']); ?>&barber_id=<?php echo $barber_id; ?>" onclick="return confirm('Are you sure you want to delete this client?');">Delete</a>
				</td>
			</tr>
		<?php 
				endforeach;
			else: 
		?>
			<tr>
				<td colspan="8">No clients found for this barber.</td>
			</tr>
		<?php endif; ?>
	</table>
</body>
</html>
