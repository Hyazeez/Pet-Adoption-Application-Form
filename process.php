<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $petType = $_POST['petType'];
    $petGender = $_POST['petGender'];
    $housing = $_POST['housing'];
    $experience = $_POST['experience'];
    $date = $_POST['date'];

    $sql = "INSERT INTO applications (name, age, email, mobile, address, pet_type, pet_gender, housing_type, experience, adoption_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssssss", $name, $age, $email, $mobile, $address, $petType, $petGender, $housing, $experience, $date);

    if ($stmt->execute()) {
        echo "<script>alert('Application submitted successfully!'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
