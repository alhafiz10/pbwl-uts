<?php 
include 'koneksi.php'; 



if(isset($_POST['login'])) { 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    try {
        $sql = "SELECT * FROM user WHERE username = :username AND password = :password"; 
        $stmt = $koneksi->prepare($sql); 
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute(); 

        $count = $stmt->rowCount(); 
        if($count == 1) { 
            $_SESSION['username'] = $username; 
            header("Location: sepatu.php"); 
            return;
        }else{
            echo "User dan password salah";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="garis">
    <header class="kepala">
        <div class="clearfix">
            <div class="logo">
                <h1>TOKO SEPATU  LARIS</h1>
            </div>

        </div>
        <div class="bagian-bawah">
            <ul class="menu">
                <li><a href="index.php" >Halaman Depan</a></li>
            </ul>
        </div>
    </header>
</div>
<div class="mainc garis">



<h1>Masuk</h1>
<p><a href="daftar.php">Daftar</a></p></br>
    <form action="" method="POST">
<center>
<table>
<tr>        
<td>Nama Pengguna</td>
<td>:</td>
<td><input type="text" name="username"></td>
</tr>
<tr>
    <td>&nbsp;</td>
    </tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="password"></td>
</tr>
<tr>
    <td>&nbsp;</td>
    </tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 <td> <input type="submit" value="Login" name="login"></td>
</tr>
</table>
</center>
</form>  

    </div>

    <footer class="kaki">
        <p> Rantau Prapat</P>
        <br><br>
        <p>Kabupaten Labuhan Batu,Provinsi  SUMATERA UTARA</p>
        <br><br>
        <p>&copy; 2022 Akbar Alhafiz</p>
    </footer>
</body>
</html>