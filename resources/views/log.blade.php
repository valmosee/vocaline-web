 <?php
 session_start();
 // Simulasi user login (bisa kamu ganti pakai database)
$validEmail = "user@example.com";
$validPassword = "123456";

 // Ambil data dari form
 $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

// Cek validasi
if ($email === $validEmail && $password === $validPassword) {
   // Login sukses
     header("Location: dashboard.php");
     exit;
 } else {
 // Login gagal
   echo "<script>alert('Email atau password salah!'); window.location.href = 'index.php';</script>";
  exit;
}
?> 
