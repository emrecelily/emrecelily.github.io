<?php
$servername = "localhost";
$username = "kullanici_adi";
$password = "sifre";
$dbname = "test_database";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Veritabanına bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form1_submit"])) {
    $ad = $_POST["ad"];
    $soyad = $_POST["soyad"];
    $email = $_POST["email"];


    $sql = "INSERT INTO kisi (ad, soyad, email) VALUES ('$ad', '$soyad', '$email')";


    if ($conn->query($sql) === TRUE) {
        echo "Yeni kayıt başarıyla eklendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form2_submit"])) {
    $arananIsim = $_POST["aranan_isim"];


    $sql = "SELECT soyad, email FROM kisi WHERE ad='$arananIsim'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Soyad: " . $row["soyad"]. "<br>Email: " . $row["email"];
        }
    } else {
        echo "Kişi bulunamadı.";
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formlar</title>
</head>
<body>
 
    <form action="" method="post">
        <h2>Form 1: Kişi Ekleme</h2>
        <label for="ad">Ad:</label>
        <input type="text" name="ad" required>
        <br>
        <label for="soyad">Soyad:</label>
        <input type="text" name="soyad" required>
        <br>
        <label for="email">E-posta:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" name="form1_submit" value="Ekle">
    </form>

    <hr>


    <form action="" method="post">
        <h2>Form 2: Kişi Arama</h2>
        <label for="aranan_isim">Aranan İsim:</label>
        <input type="text" name="aranan_isim" required>
        <br>
        <input type="submit" name="form2_submit" value="Bul">
    </form>
</body>
</html>
