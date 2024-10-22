<?php  

function insertBarber($pdo, $name, $phone_number, $email, $experience_years) {
    $sql = "INSERT INTO barbers (name, phone_number, email, experience_years) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$name, $phone_number, $email, $experience_years])) {
        return true;
    }
    return false;
}

function updateBarber($pdo, $name, $phone_number, $email, $experience_years, $barber_id) {
    $sql = "UPDATE barbers
            SET name = ?, phone_number = ?, email = ?, experience_years = ?
            WHERE barber_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$name, $phone_number, $email, $experience_years, $barber_id])) {
        return true;
    }
    return false;
}

function deleteBarber($pdo, $barber_id) {
    // Delete clients associated with the barber first
    $sqlDeleteClients = "DELETE FROM clients WHERE barber_id = ?";
    $stmtDeleteClients = $pdo->prepare($sqlDeleteClients);
    if ($stmtDeleteClients->execute([$barber_id])) {
        // Delete the barber after clients are deleted
        $sql = "DELETE FROM barbers WHERE barber_id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$barber_id])) {
            return true;
        }
    }
    return false;
}

function getAllBarbers($pdo) {
    $sql = "SELECT * FROM barbers";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute()) {
        return $stmt->fetchAll();
    }
    return false;
}

function getBarberByID($pdo, $barber_id) {
    $sql = "SELECT * FROM barbers WHERE barber_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$barber_id])) {
        return $stmt->fetch();
    }
    return false;
}

function getClientsByBarber($pdo, $barber_id) {
    $sql = "SELECT 
                clients.client_id, clients.name AS client_name, clients.phone_number, 
                clients.email, clients.appointment_date, clients.service_type, clients.date_added, 
                barbers.name AS barber_name
            FROM clients
            JOIN barbers ON clients.barber_id = barbers.barber_id
            WHERE clients.barber_id = ?
            GROUP BY clients.name";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$barber_id])) {
        return $stmt->fetchAll();
    }
    return false;
}

function insertClient($pdo, $name, $phone_number, $email, $appointment_date, $service_type, $barber_id) {
    $sql = "INSERT INTO clients (name, phone_number, email, appointment_date, service_type, barber_id) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$name, $phone_number, $email, $appointment_date, $service_type, $barber_id])) {
        return true;
    }
    return false;
}

function getClientByID($pdo, $client_id) {
    $sql = "SELECT 
                clients.client_id, clients.name AS client_name, clients.phone_number, 
                clients.email, clients.appointment_date, clients.service_type, clients.date_added, 
                barbers.name AS barber_name
            FROM clients
            JOIN barbers ON clients.barber_id = barbers.barber_id
            WHERE clients.client_id = ?
            GROUP BY clients.name";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$client_id])) {
        return $stmt->fetch();
    }
    return false;
}

function updateClient($pdo, $name, $phone_number, $email, $appointment_date, $service_type, $client_id) {
    $sql = "UPDATE clients
            SET name = ?, phone_number = ?, email = ?, appointment_date = ?, service_type = ?
            WHERE client_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$name, $phone_number, $email, $appointment_date, $service_type, $client_id])) {
        return true;
    }
    return false;
}

function deleteClient($pdo, $client_id) {
    $sql = "DELETE FROM clients WHERE client_id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$client_id])) {
        return true;
    }
    return false;
}
?>
