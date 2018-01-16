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
            <?php echo lang("WELCOME_TEXT_1") ?>
            <br/>
            <br/>
            <?php echo lang("WELCOME_TEXT_2") ?>
        </div>
    </div>
</div>

<?php
require_once("footer.php");
?>
















































