<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $id = intval($_POST['id']);
    $vezeteknev = htmlspecialchars(trim($_POST['vezeteknev']));
    $keresztnev = htmlspecialchars(trim($_POST['keresztnev']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefonszam = htmlspecialchars(trim($_POST['telefonszam']));
    $munkakor = htmlspecialchars(trim($_POST['munkakor']));

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comproller";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
    {
        echo json_encode(["success" => false, "error" => "Kapcsolódási hiba: " . $conn->connect_error]);
        exit();
    }

    $sql = "UPDATE nyilvantartas SET Vezeteknev = ?, Keresztnev = ?, Email = ?, Telefonszam = ?, Munkakor = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $vezeteknev, $keresztnev, $email, $telefonszam, $munkakor, $id);

    if ($stmt->execute()) 
    {
        echo json_encode(["success" => true]);
    } 
    else 
    {
        echo json_encode(["success" => false, "error" => "Hiba: " . $conn->error]);
    }

    $stmt->close();
    $conn->close();
} 
else 
{
    echo json_encode(["success" => false, "error" => "Hozzáférés megtagadva."]);
}
?>

<script>

    window.close();

</script>