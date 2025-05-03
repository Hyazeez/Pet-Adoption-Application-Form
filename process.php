<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Safely get all POST data
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


    try {
        $sql = "INSERT INTO applications (name, age, email, mobile, address, pet_type, pet_gender, housing_type, experience, adoption_date)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sissssssss", $name, $age, $email, $mobile, $address, $petType, $petGender, $housing, $experience, $date);

        if ($stmt->execute()) {
            echo "<script>alert('Application submitted!'); window.location.href='index.php';</script>";
        } else {
            throw new Exception($conn->error);
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
    } finally {
        $stmt->close();
        $conn->close();
    }
} else {
    header("Location: index.php");
    exit();
}
?>