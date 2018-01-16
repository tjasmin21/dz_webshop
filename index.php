<?php
$thisPage = "index";
require_once("header.php");
?>

<div class="row row-header welcome-image-row welcomeimage ">
    <div class="content">
        <div class="row-title">
            <?php
            if (!isUserLoggedIn()) {
                echo lang("WELCOME_MSG");
            } else {
                echo lang("WELCOME_MSG") . " " . strtoupper($_SESSION["name"]);
            }
            ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="content">
        <div class="row-text">
            Wir freuen uns dir die Möglichkeit zu bieten, deine Ideen in ein Multimediaprodukt umzusetzen.
            Unsere Angebotsstruktur ermöglicht dir, qualitativ hochstehende Unterstützung zu angemessenen Preisen.
            Unser Ziel ist es, mit dir, egal ob Unternehmung oder Privatperson, ein Multimediaprodukt zu realisieren,
            welches deinen Vorstellungen gerecht wird. Dabei ist es unser Anliegen, das Projekt so zu gestalten, dass
            es deinen Möglichkeiten entspricht.
            <br/>
            <br/>
            Wir freuen uns darauf, mit dir deine Vorstellungen in Bild und Ton Realität werden zu lassen.
        </div>
    </div>
</div>

<?php
require_once("footer.php");
?>
















































