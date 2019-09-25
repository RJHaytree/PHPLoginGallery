<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Gallery | Admin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="assets/css/nav.css" rel="stylesheet" type="text/css">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="assets/css/footer.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="wrapper admin-small">
        <?php
            require_once "header.php";
        ?>

        <div class="content">
            <h1>Upload Image</h1>

            <div class="success">
                <?php
                if (isset($_GET['upload'])) 
                {
                    if ($_GET['upload'] == "success")
                    {
                        echo "<p>The image has been successfully uploaded to the web server.";
                    }
                }
            ?>
            </div>

            <div class="errors">
                <?php
                if (isset($_GET['upload']))
                {
                    if ($_GET['upload'] == "fail")
                    {
                        if ($_GET['error'] == "exists")
                        {
                            echo "<p>Upload failed: A file of this name already exists!</p>";
                        }
                        else if ($_GET['error'] == "toolarge")
                        {
                            echo "<p>Upload failed: This file is too large to be uploaded! Must be below 350kb in size.</p>";
                        }
                        else if ($_GET['error'] == "nofile")
                        {
                            echo "<p>Upload failed: File cannot be found. Please upload an image.</p>";
                        }
                    }
                }
                ?>
            </div>

            <div class="image-form">
                <form enctype="multipart/form-data" action="includes/image-uploader.php" method="POST">
                    <input class="uploaded-file" name="uploaded_file" type="file" value=""/>
                    <input class="image-upload" type="submit" value="Upload" />
                </form>
            </div>

            <?php
                require_once "footer.php";
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>