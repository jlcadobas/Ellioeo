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
        <script src="../scripts/sendUrl.js"> </script>
    </head>
    <body style="color: black;" >
        <!-- Binder div -->
        <div class="absolute left" id="binder" style="background-color: <?php echo $primaryImageColor; ?>;"> </div>
        
        <!-- Artwork image div -->
        <div class="absolute left" id="active-image"> 
        </div>

        <!-- Information about the artwork div -->
        <div class="absolute right" id="info" style="background-color: <?php echo $secondaryImageColor; ?>; ">
            <div>
                <button type="button" class="float-left"> Previous </button>
                <button type="button" class="float-right"> Next </button>
            </div>

            <div>
                <header id="artwork-name"> Lorem Ipsum </header>
                <span class="float-right"> 01 - 25 - 2023 </span>
            </div>

            <p id="details">  
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet laborum nobis non eos atque rem ullam 
                necessitatibus perspiciatis nihil, repellendus voluptas quas aliquam delectus ipsum id repudiandae est facilis 
                quo? Lorem ipsum dolor sit amet consectetur, adipisicing elit.Eveniet laborum nobis non eos atque rem ullam 
                necessitatibus perspiciatis nihil, repellendus voluptas quas aliquam delectus ipsum id repudiandae est facilis 
                quo?
            </p>

            <b> About Ellioeo </b>
            <?php require "../scripts/getColors.php"; ?>
        </div>
        <!-- Gets the clicked artwork and display it onto this page, and to get the color pallette used in the artwork. -->
        <script src="../scripts/updateImage.js"> </script>
    </body>
</html>