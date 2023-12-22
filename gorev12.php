<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastegele Sayı Tablosu</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rowCount = isset($_POST['rowCount']) ? intval($_POST['rowCount']) : 0;
    $colCount = isset($_POST['colCount']) ? intval($_POST['colCount']) : 0;

    if ($rowCount > 0 && $colCount > 0) {
        echo "<table border='1'>";
        for ($i = 1; $i <= $rowCount; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $colCount; $j++) {

                $randomNumber = rand(1, 100);
                echo "<td>$randomNumber</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Lütfen geçerli satır ve sütun sayıları girin.";
    }
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Satır Sayısı: <input type="number" name="rowCount" min="1" required><br>
    Sütun Sayısı: <input type="number" name="colCount" min="1" required><br>
    <input type="submit" value="Tablo Oluştur">
</form>

</body>
</html>
