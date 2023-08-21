    
    // Attach events to each image elements, then run the function.

    var numImage = document.getElementsByClassName("image");

    for (let i = 0; i < numImage.length; i++) {

        // Gets the image path from the clicked image, and use local storage for the variable to be accessed from other page.
        numImage[i].addEventListener("click", function() {

            var image = this.getAttribute("src");

            localStorage.setItem("imageSrc", image);

            // Go to artworks.html for local. Use the other one for live changes.
            location.href = "http://localhost/Ellioeo/pages/artworks.php";
        });
    }
