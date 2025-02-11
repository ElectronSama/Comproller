<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        $idopont_input = htmlspecialchars(trim($_POST['idopont_input']));
        $idopont_ido = htmlspecialchars(trim($_POST['idopont_ido']));
        $leiras_input = htmlspecialchars(trim($_POST['leiras_input']));
        $muszak_input = htmlspecialchars(trim($_POST['muszak_input']));

        if ($idopont_input === "" || $muszak_input === "") 
        {
            echo "Hiányzó mezők!";
            exit();
        }

        if ($idopont_ido === "") 
        {
            $idopont_ido = "00:00";
        }

        $idopont = $idopont_input . " " . $idopont_ido . ":00";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "comproller";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) 
        {
            die("Kapcsolódási hiba: " . $conn->connect_error);
        }

        $sql = "INSERT INTO muszakok (oraszam, muszaknev, idopont) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $leiras_input, $muszak_input, $idopont);

        if ($stmt->execute()) 
        {
            echo "<script>window.close()</script>";
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
