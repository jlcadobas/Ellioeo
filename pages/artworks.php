<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> ellioeo </title>

        <link rel="stylesheet" type="text/css" href="../styles/artworks.css" />

        <!-- Artworks.html, displays three columns to feature the artwork.
                    namely the div with ids "binder", "active-image", and "info" respectively.
        -->
    </head>

    <body>
        <!-- Binder div -->
        <div class="absolute left" id="binder"> </div>

        <!-- Artwork image div -->
        <div class="absolute left" id="active-image">
        </div>

        <!-- Information about the artwork div -->
        <div class="absolute right" id="info">
            <div>
                <button type="button" class="float-left"> Previous </button>
                <button type="button" class="float-right"> Next </button>
            </div>

            <div>
                <header id="artwork-name">  </header>
                <span id="date" class="float-right">  </span>
            </div>

            <p id="details"> </p>

            <b> About Ellioeo </b>
        </div>
    </body>
    <!-- Gets the clicked artwork and display it onto this page, and to get the color pallette used in the artwork. -->
    <script src="../scripts/updateImage.js"></script>
</html>