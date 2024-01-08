<?php
session_start();
include "conf/conn.php";
// Ambil nilai dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa apakah user ada dalam tabel
$query = "SELECT * FROM user WHERE username='$username'";
$result = $conn->query($query);

$query2 = "SELECT * FROM dokter WHERE no_hp='$username'";
$result2 = $conn->query($query2);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];
    if (password_verify($password, $hashed_password)) {
        // Redirect
        $_SESSION['username'] = $username;
        header('Location: index_admin.php');
    } else {
        // Jika kata sandi tidak cocok
        echo "Kata sandi salah";
    }
} elseif ($result2->num_rows > 0){
    $row = $result2->fetch_assoc();
    if ($password == $row['password']) {
        // Redirect
        $_SESSION['username'] = $row['nama'];
        $_SESSION['id'] = $row['id'];
        header('Location: index_dokter.php');
    } else {
        // Jika kata sandi tidak cocok
        echo'<script>alert("Kata sandi salah !!!"); window.location.href="login_dokter.php"</script>';
    }
} else {
    // Jika user tidak ditemukan
    echo "User tidak ditemukan";
}

$conn->close();
?>