<div class="footer">
    <p class="copyright">&copy; Ryan Haytree</p>

    <?php

        require_once "includes/user-data.php";

        echo "<p>Browser: " . getBrowser() . "</p>";

    ?>

    <script type="text/javascript">
        document.cookie = 'res=' + screen.width + 'px x ' + screen.height + 'px;';
    </script>

    <?php

        if (isset($_COOKIE["res"]))
        {
            echo "<p>Resolution: " . $_COOKIE["res"] . "</p>";
        }
        else 
        {
            header("Refresh: 0");
        }
        
    ?>

</div>