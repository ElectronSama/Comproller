<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
        $keresznev_input = htmlspecialchars(trim($_POST['keresztnev_input']));
        $vezeteknev_input = htmlspecialchars(trim($_POST['vezeteknev_input']));
        $datum = htmlspecialchars(trim($_POST['datum_input']));
        $anyu_input = htmlspecialchars(trim($_POST['anyu_input']));
        $tajszam_input = htmlspecialchars(trim($_POST['tajszam_input']));
        $adoszam_input = htmlspecialchars(trim($_POST['adoszam_input']));
        $szamla_input = htmlspecialchars(trim($_POST['szamla_input']));
        $cim_input = htmlspecialchars(trim($_POST['cim_input']));
        $allam_input = htmlspecialchars(trim($_POST['allam_input']));
        $tartozkodas_input = htmlspecialchars(trim($_POST['tartozkodas_input']));
        $szemelyi_input = htmlspecialchars(trim($_POST['szemelyi_input']));
        $email_input = htmlspecialchars(trim($_POST['email_input']));
        $telefon_input = htmlspecialchars(trim($_POST['telefon_input']));
        $munkakor_input = htmlspecialchars(trim($_POST['munkakor_input']));

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comproller";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) 
        {
            die("Kapcsolódási hiba: " . $conn->connect_error);
        }

        $sql = "INSERT INTO nyilvantartas (Keresztnev, Vezeteknev, Szuletesi_datum, Anyja_neve, Tajszam, Adoszam, Bankszamlaszam, Cim, Allampolgarsag, Tartozkodasi_hely,
        Szemelyigazolvany_szam, Email, Telefonszam, Munkakor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssss", $keresznev_input, $vezeteknev_input, $datum, $anyu_input, $tajszam_input, $adoszam_input, $szamla_input, $cim_input, $allam_input
        , $tartozkodas_input, $szemelyi_input, $email_input, $telefon_input, $munkakor_input);

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
    echo "Hozzáférés megtagadva.";
}
?>

<script>
    window.close();
</script>