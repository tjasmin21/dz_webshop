<footer class="row footer">
    <div class="content">

        <div class="footer-address">
            <p>dropzone production<br/>
            031 123 12 12<br/>
            Musterstrasse 123 <br/>
                234 Musterstadt</p>
            <p><a href="mailto:">customercare@dropzoneproduction.com</a></p>
        </div>
        <ul class="footer-language hidden-sm">
            <a
                <?php
                if ($_SESSION ["language"] == "models/languages/de.php") {
                    echo " id='currentLink'";
                }
                ?>
                    href='#' onclick='changeLang("de");'><span>DE</span></a>
            <a
                <?php
                if ($_SESSION ["language"] == "models/languages/en.php") {
                    echo " id='currentLink'";
                }
                ?>
                    href='#' onclick='changeLang("en");'><span>EN</span></a>
        </ul>

        <ul class="footer-copyright hidden-sm">
            <p> All Rights Reserved © 2017</p>
        </ul>
    </div>
</footer>


<script>
    function changeLang(langFile) {
        console.log(langFile);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('GET', 'change_language.php?lang=' + langFile, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function () {
            console.log(xmlhttp.responseText);
            console.log(document.URL);
            var newURL = getPathFromUrl(document.URL);
            if (newURL == document.URL) {
                location.reload(true);
            } else {
                location.replace(getPathFromUrl(document.URL));
            }
        }
    }

    function getPathFromUrl(url) {
        return url.split('?')[0];
    }
</script>
