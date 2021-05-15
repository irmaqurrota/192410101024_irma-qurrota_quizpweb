<?php
session_start();
include 'konek.php';

if (isset($_POST["masuk"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $database = mysqli_query($koneksi,"SELECT * FROM datauser WHERE username='$username' and password='$password'");
    $result = mysqli_num_rows($database);
    
    if($result > 0){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        setcookie($_SESSION['username'], $_SESSION['password'], time() + (86400 * 30), "/");
        
        echo "<script>alert('Login Sukses'); document.location.href = 'login.php';</script>";
    }else{
        echo "<script>alert('Username atau Password Salah!'); document.location.href = 'login.php';</script>";
    }

}
?>