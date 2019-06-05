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

    if (!isset($_POST["Seriennummer"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Druckertyp"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Druckerart"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Druckformat"])) {
        $newComponentIsValid = false;
    }
    if (!isset($_POST["Beidseitig"])) {
        $newComponentIsValid = false;
    }
} else {
    $newComponentIsValid = false;
}

$DBSelect = new DBSelect();

if ($newComponentIsValid) {
    $insertManager = new SQLInsert();

    $insertManager->komponenteHinzufuegen($_POST["Bezeichnung"], $_POST["Raum"], $_POST["Hersteller"], $_POST["Einkaufsdatum"], $_POST["Gewaehrleistungsdauer"], $_POST["Notiz"], $_POST["Hersteller"], 5);

    $komponenten_k_id = $DBSelect->getComponentIDWhere($_POST["Bezeichnung"], $_POST["Raum"], $_POST["Hersteller"], $_POST["Einkaufsdatum"], $_POST["Gewaehrleistungsdauer"], $_POST["Notiz"], $_POST["Hersteller"], 5);

    $insertManager->khaHinzufuegen($komponenten_k_id, 1, $_POST["Seriennummer"]);
    $insertManager->khaHinzufuegen($komponenten_k_id, 10, $_POST["Druckertyp"]);
    $insertManager->khaHinzufuegen($komponenten_k_id, 11, $_POST["Druckerart"]);
    $insertManager->khaHinzufuegen($komponenten_k_id, 12, $_POST["Druckformat"]);
    $insertManager->khaHinzufuegen($komponenten_k_id, 13, $_POST["Beidseitig"]);
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
                <label for="Seriennummer">Seriennummer</label>
                <input name="Seriennummer" type="text" class="form-control" id="Seriennummer" aria-describedby="Seriennummer" required>
            </div>
            <div class="form-group">
                <label for="Druckertyp">Druckertyp</label>
                <input name="Druckertyp" type="text" class="form-control" id="Druckertyp" aria-describedby="Druckertyp" required>
            </div>
            <div class="form-group">
                <label for="Druckerart">Druckerart</label>
                <input name="Druckerart" type="text" class="form-control" id="Druckerart" aria-describedby="Druckerart" required>
            </div>
            <div class="form-group">
                <label for="Druckformat">Druckformat</label>
                <input name="Druckformat" type="text" class="form-control" id="Druckformat" aria-describedby="Druckformat" required>
            </div>
            <div class="form-group">
                <label for="Beidseitig">Beidseitig</label>
                <input name="Beidseitig" type="text" class="form-control" id="Beidseitig" aria-describedby="Beidseitig" required>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Absenden</button>
        </form>

    </div>


</body>

</html>