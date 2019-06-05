<?php
require_once '../classes/DBInsert.php';
require_once '../classes/DBSelect.php';

$newComponentIsValid = true;
if (count($_POST) > 0) {
    if (!isset($_POST["Bezeichnung"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Hersteller"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Einkaufsdatum"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Raum"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Gewaehrleistungsdauer"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Kaufbeleg"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Lieferant"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Notiz"])) {
        $_POST["Notiz"] = "";
    }

    if (!isset($_POST["Versionsnummer"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Lizenztyp"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Lizenzanzahl"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Lizenzlaufzeit"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Lizenzinformationen"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Installationshinweise"])) {
        $newComponentIsValid = false;
    }
} else {
    $newComponentIsValid = false;
}

$DBSelect = new DBSelect();

if ($newComponentIsValid) {
    $insertManager = new SQLInsert();

    $insertManager->komponenteHinzufuegen($_POST["Bezeichnung"], $_POST["Raum"], $_POST["Hersteller"], $_POST["Einkaufsdatum"], $_POST["Gewaehrleistungsdauer"], $_POST["Notiz"], $_POST["Hersteller"], 8);

    $komponenten_k_id = $DBSelect->getComponentIDWhere($_POST["Bezeichnung"], $_POST["Raum"], $_POST["Hersteller"], $_POST["Einkaufsdatum"], $_POST["Gewaehrleistungsdauer"], $_POST["Notiz"], $_POST["Hersteller"], 8);

    $insertManager->khaHinzufuegen($komponenten_k_id, 18, $_POST["Versionsnummer"]);
    $insertManager->khaHinzufuegen($komponenten_k_id, 19, $_POST["Lizenztyp"]);
    $insertManager->khaHinzufuegen($komponenten_k_id, 20, $_POST["Lizenzanzahl"]);
    $insertManager->khaHinzufuegen($komponenten_k_id, 21, $_POST["Lizenzlaufzeit"]);
    $insertManager->khaHinzufuegen($komponenten_k_id, 22, $_POST["Lizenzinformationen"]);
    $insertManager->khaHinzufuegen($komponenten_k_id, 23, $_POST["Installationshinweise"]);
}
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <header>
        <a href="#">Test</a>
        <a href="#">Test</a>
        <a href="#">Test</a>
        <a href="#">Test</a>
        <a href="#">Test</a>
        <img src="../images/Logo.png">
    </header>

    <div class="container">

        <form method="post">
            <div class="form-group">
                <label for="Hersteller">Hersteller</label>
                <input name="Hersteller" type="text" class="form-control" id="Hersteller" aria-describedby="Hersteller" value="<?php isset($_POST['Hersteller'])? $_POST['Hersteller'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="Bezeichnung">Bezeichnung</label>
                <input name="Bezeichnung" type="text" class="form-control" id="Bezeichnung" aria-describedby="Bezeichnung" value="<?php isset($_POST['Bezeichnung'])? $_POST['Bezeichnung'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="Raum">Raum</label>
                <select name="Raum" class="form-control" id="Raum" required>
                    <option selected hidden></option>
                    <?php
                    $result = $DBSelect->getAllRoomIDsAndLabels();
                    foreach ($result as $element) {
                        var_dump($element);
                        echo '<option value="'.$element['0'].'">'.$element['1'].' '.$element['2'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Einkaufsdatum">Einkaufsdatum</label>
                <input name="Einkaufsdatum" type="date" class="form-control" id="Einkaufsdatum" aria-describedby="Einkaufsdatum" value="<?php isset($_POST['Einkaufsdatum'])? $_POST['Einkaufsdatum'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="Gewaehrleistungsdauer">Gewährleistungsdauer</label>
                <input name="Gewaehrleistungsdauer" type="text" class="form-control" id="Gewaehrleistungsdauer" aria-describedby="Gewährleistungsdauer" value="<?php isset($_POST['Gewährleistungsdauer'])? $_POST['Gewährleistungsdauer'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="Kaufbeleg">Kaufbeleg</label>
                <input type="text" class="form-control" id="Kaufbeleg" aria-describedby="Kaufbeleg" value="<?php isset($_POST['Kaufbeleg'])? $_POST['Kaufbeleg'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="Lieferant">Lieferant</label>
                <select name="Lieferant" class="form-control" id="Lieferant" required>
                    <option selected hidden></option>
                    <?php
                    $result = $DBSelect->getAllSupplierIDsAndNames();
                    foreach ($result as $element) {
                        var_dump($element);
                        echo '<option value="'.$element['0'].'">'.$element['1'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Notiz">Notiz</label>
                <textarea class="form-control" id="Notiz" aria-describedby="Notiz" value="<?php isset($_POST['Notiz'])? $_POST['Notiz'] : '' ?>"></textarea>
            </div>

            <div class="form-group">
                <label for="Versionsnummer">Versionsnummer</label>
                <input name="Versionsnummer" type="text" class="form-control" id="Versionsnummer" aria-describedby="Versionsnummer" required>
            </div>
            <div class="form-group">
                <label for="Lizenztyp">Lizenztyp</label>
                <input name="Lizenztyp" type="text" class="form-control" id="Lizenztyp" aria-describedby="Lizenztyp" required>
            </div>
            <div class="form-group">
                <label for="Lizenzanzahl">Lizenzanzahl</label>
                <input name="Lizenzanzahl" type="text" class="form-control" id="Lizenzanzahl" aria-describedby="Lizenzanzahl" required>
            </div>
            <div class="form-group">
                <label for="Lizenzlaufzeit">Lizenzlaufzeit</label>
                <input name="Lizenzlaufzeit" type="text" class="form-control" id="Lizenzlaufzeit" aria-describedby="Lizenzlaufzeit" required>
            </div>
            <div class="form-group">
                <label for="Lizenzinformationen">Lizenzinformationen</label>
                <input name="Lizenzinformationen" type="text" class="form-control" id="Lizenzinformationen" aria-describedby="Lizenzinformationen" required>
            </div>
            <div class="form-group">
                <label for="Installationshinweise">Installationshinweise</label>
                <input name="Installationshinweise" type="text" class="form-control" id="Installationshinweise" aria-describedby="Installationshinweise" required>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Absenden</button>
        </form>

    </div>


</body>

</html>

<?php
mysqli_close(connect());
