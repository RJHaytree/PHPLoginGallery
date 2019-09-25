<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Gallery | Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="assets/css/footer.css" rel="stylesheet" type="text/css">
    <link href="assets/css/nav.css" rel="stylesheet" type="text/css">
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="wrapper">
        <?php
            require_once "header.php";
        ?>

        <div class="content">
            <h1>Admin Gallery</h1>
            <hr>
            <div class="intro section">
                <h2>What is Admin Gallery?</h2>
                <p>Admin Gallery is a password protected site that allows a user to upload an image to the web
                    server if they are logged into an account, and have the image displayed on the index page. This
                    website is part of my Unit 42 -
                    Web Server Scripting assignment.</p>
                <div class="upload-inst">
                    <ol class="centre">
                        <p>To upload an image, simply:</p>
                        <li class="text-center">Create an account in the register page</li>
                        <li class="text-center">Open the panel using the navigation bar</li>
                        <li class="text-center">Navigate to the image upload page on the panel</li>
                        <li class="text-center">Upload an image of your choice</li>
                    </ol>
                </div>
            </div>
            <br>
            <div class="image-gallery section">
                <h2>Image Gallery</h2>

                <div class="gallery-images">
                    <?php
                        # upload dir
                        $dir = "uploads/";
                        # acceptable file extensions
                        $filetype = "*.*";
                        # store files in directory in array
                        $images = glob($dir.$filetype);

                        # cycle through array and display in an image tag
                        for ($i = 0; $i < count($images); $i++)
                        {
                           echo '<img  src="' . $images[$i] . '" />';
                        }
                    ?>
                </div>
            </div>
        </div>

        <?php
            require_once "footer.php";
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>