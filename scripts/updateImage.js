
    /* Solution 1:

    // Get the image path from changePage.js    

    var image = localStorage.getItem("imageSrc");

    var imageWithUrl = "url(" + "\'." + image + "\'" + ")";

    // Set the root variable --image from artworks.css to change the image 

    var imageRoot = document.documentElement;

    imageRoot.style.setProperty("--image", imageWithUrl);

    */

    // Solution 2: More on Color Thief Library at https://lokeshdhakar.com/projects/color-thief/

    var colorThief = new ColorThief();

    // Get src of clicked image, and reference to the div where you'll insert the new image
    var imagePath = localStorage.getItem("imageSrc");
    var divReference = document.getElementById("active-image");

    // Create a new image element
    var image = document.createElement("img");

    // Set src and id for the new image
    image.src = imagePath;
    image.id = "clickedImage";

    //var image = document.getElementById("demo");
    var colorRoot = document.documentElement;

    // Run this function when the image loads.
    image.onload = function() {

        // Get primary and secondary color using COlor Thief Library.
        var primaryColor = colorThief.getColor(image);
        var secondaryColor = colorThief.getPalette(image, 2)[1];

        // Add rgb() string since it updates the css property on artworks.css
        var rgbPrimaryColor = "rgb(" + primaryColor + ")";
        var rgbSecondaryColor = "rgb(" + secondaryColor + ")";

        colorRoot.style.setProperty("--binder", rgbPrimaryColor);
        colorRoot.style.setProperty("--info", rgbSecondaryColor);

        //window.alert(primaryColor + " " + secondaryColor + ", image has loaded completely.");

        divReference.appendChild(image);
    }