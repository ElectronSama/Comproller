<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    if (isset($_POST['esemeny_neve'])) 
    {
        $esemeny_neve = $_POST['esemeny_neve'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comproller";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) 
        {
            die("Kapcsolódási hiba: " . $conn->connect_error);
        }

        $sql = "DELETE FROM esemenyek WHERE esemeny_neve = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $esemeny_neve);

        if ($stmt->execute()) 
        {
            echo "Esemény sikeresen törölve: " . htmlspecialchars($_POST['esemeny_neve']);
        } 
        else 
        {
            echo "Hiba a törlés során: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } 
    else 
    {
        echo "Érvénytelen kérés.";
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
