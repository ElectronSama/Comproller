<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    if (isset($_POST['esemeny_leiras'], $_POST['datum'])) 
    {
        $esemeny_leiras = htmlspecialchars(trim($_POST['esemeny_leiras']));
        $datum = htmlspecialchars(trim($_POST['datum']));

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comproller";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) 
        {
            die("Kapcsolódási hiba: " . $conn->connect_error);
        }

        $sql = "INSERT INTO esemenyek (esemeny_neve, datum) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $esemeny_leiras, $datum);

        if ($stmt->execute()) 
        {
            echo "Az esemény sikeresen hozzáadva.";
        } 
        else 
        {
            echo "Hiba az esemény hozzáadása során: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } 
    else 
    {
        echo "Hiányzó adatok.";
    }
} 
else 
{
    echo "Hozzáférés megtagadva.";
}
?>

<script>

    window.close();

</script>