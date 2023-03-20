
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
    //image.loading = "eager";

    //var image = document.getElementById("demo");
    var colorRoot = document.documentElement;

    // Run this function when the image loads.
    image.onload = function() {

        // Get primary, secondary color and perceived brightness using Color Thief Library.
        var primaryColor = colorThief.getColor(image);
        var secondaryColor = colorThief.getPalette(image, 2)[1];
        var luminance = (0.2126 * (primaryColor[0] / 255 )) + (0.7152 * (primaryColor[1] / 255)) + (0.0722 * (primaryColor[2] / 255));

        // Get the width and height of the image
        var width = image.naturalWidth;
        var height = image.naturalHeight;

        // Set height to 100% if width is greater than height to cover the whole div.
        // If brighness of the primary color is lighter, then set font color to black.
        if (width > height) {

            image.style = "height: 100%";
        }

        // Set font color as the complementary rgb value of the background color.
        if (luminance >= 0.5) {

            //window.alert("Lighter:" + luminance);
            document.body.style.color = "black";
        }

        // Add rgb() string since it updates the css property on artworks.css
        var rgbPrimaryColor = "rgb(" + primaryColor + ")";
        var rgbSecondaryColor = "rgb(" + secondaryColor + ")";

        colorRoot.style.setProperty("--info", rgbPrimaryColor);
        colorRoot.style.setProperty("-binder", rgbSecondaryColor);

        //window.alert(primaryColor + " " + secondaryColor + ", image has loaded completely.");

        divReference.appendChild(image);
    }
