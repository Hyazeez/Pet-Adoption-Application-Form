<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? 0;
    $email = $_POST['email'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $address = $_POST['address'] ?? '';
    $petType = $_POST['petType'] ?? '';
    $petGender = $_POST['petGender'] ?? '';
    $housing = $_POST['housing'] ?? '';
    $experience = $_POST['experience'] ?? '';
    $date = $_POST['date'] ?? date('Y-m-d');

    // Insert into DB
    $sql = "INSERT INTO applications2 
            (name, age, email, mobile, address, pet_type, pet_gender, housing, experience, date_applied)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sissssssss", $name, $age, $email, $mobile, $address, $petType, $petGender, $housing, $experience, $date);
        if ($stmt->execute()) {
            echo "Application submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Statement Preparation Failed: " . $conn->error;
    }

    $conn->close();
}
?>
