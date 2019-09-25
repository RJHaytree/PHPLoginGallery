<div class="footer">
    <p class="copyright">&copy; Ryan Haytree</p>

    <?php

        require_once "includes/user-data.php";

        echo "<p>Browser: " . getBrowser() . "</p>";

    ?>

    <script type="text/javascript">
        // create cookie which stores screen resolution
        document.cookie = 'res=' + screen.width + 'px x ' + screen.height + 'px;';
    </script>

    <?php
        # check if cookie already exists
        if (isset($_COOKIE["res"]))
        {
            # cookie and resolution exists, so display resolution in the footer
            echo "<p>Resolution: " . $_COOKIE["res"] . "</p>";
        }
        else 
        {
            # cookie does not exists, reload page so javascript cookie is created
            header("Refresh: 0");
        }
    ?>

</div>