<?php
    $thisPage = "index";
    require_once ("header.php");
?>

<div class="bgImage">
    <div class="welcomeTitle">
        <?php
            if(!isUserLoggedIn()){
                echo lang( "WELCOME_MSG" ) ;
            } else {
                echo lang( "WELCOME_MSG" )." ". strtoupper($_SESSION["name"]) ;
            }
        ?>
    </div>
</div>

<div class="welcomeText">
        Wir freuen uns dir die Möglichkeit zu bieten, deine Ideen in ein Multimediaprodukt umzusetzen.
        Unsere Angebotsstruktur ermöglicht dir, qualitativ hochstehende Unterstützung zu angemessenen Preisen.
        Unser Ziel ist es, mit dir, egal ob Unternehmung oder  Privatperson, ein Multimediaprodukt zu realisieren,
        welches deinen Vorstellungen gerecht wird. Dabei ist es unser Anliegen, das Projekt so zu gestalten, dass
        es deinen Möglichkeiten entspricht.
        <br/>
        Wir freuen uns darauf, mit dir deine Vorstellungen in Bild und Ton Realität werden zu lassen.
</div>

<?php
    require_once ("footer.php");
?>
















































