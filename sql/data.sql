-- Create the barbers table
CREATE TABLE barbers (
    barber_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(15) NULL,
    email VARCHAR(100) NULL,
    experience_years INT NOT NULL CHECK (experience_years >= 0), -- Ensures non-negative experience years
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the clients table
CREATE TABLE clients (
    client_id INT AUTO_INCREMENT PRIMARY KEY,
    barber_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(15) NULL,
    email VARCHAR(100) NULL,
    appointment_date DATE NOT NULL,
    service_type VARCHAR(100) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (barber_id) REFERENCES barbers(barber_id) ON DELETE CASCADE ON UPDATE CASCADE
);
