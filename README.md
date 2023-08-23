# Ellioeo

    A website designed and developed to feature an acquaintance's artworks.

    [See the website live.] (http://ellioeo.infinityfreeapp.com/)
    [Curious about the design? Look here.] (https://www.figma.com/file/r51ahDrsM37WUjzuxe1MrJ/Ella?type=design&node-id=0%3A1&mode=design&t=xeOO9t3JKYbjxxGa-1)

## Table of Contents
- [Functionalities](#functionalities)
- [Examples](#examples)
- [Tech Used](#tech-used)
- [File Structure](#file-structure)
- [References](#references)
    
### Functionalities   

    This project is inspired based on another website's slide functionality, see here:  

    More importantly, the main functionalities for this project:

    1) Slider functionality for the images, so it moves left to right based on the mouse location. 

    2) Using Cloudinary API, to automatically display images based on the url from the Content Delivery Network (CDN).

    3) Using Imagga API to extract primary and secondary colors of the images. 

    4) Determine luminance of the background color, to assign a contrasting font color for readability of the text.

### Examples

    1-2) Slider functionality, images url are stored in the database, and retrieved in the page. 

https://github.com/jlcadobas/Ellioeo/assets/74396545/95e3ace9-d9f0-458d-aca7-5a1b22fadb11

    3-4) Imagga API retrieved the background color, and luminance is computed to set the font color to either black or white for readability.

![Screenshot 2023-08-23 163539](https://github.com/jlcadobas/Ellioeo/assets/74396545/68e6f449-f468-47d4-aa49-79affa1bdce5)
![Screenshot 2023-08-23 163455](https://github.com/jlcadobas/Ellioeo/assets/74396545/b970ddff-2674-4adb-9ee6-6718eaade6da)

### Tech Used

    Languages: HTML, CSS, Vanilla JavaScript, and PHP (cURL) 
    Database: phpMyAdmin
    Web Hosting: InfinityFree

### File Structure

![Screenshot 2023-08-23 170210](https://github.com/jlcadobas/Ellioeo/assets/74396545/0e402ca8-0c3b-4fa2-8ddb-2a092d9c963d)

### References

1) Slider functionality: https://www.youtube.com/watch?v=PkADl0HubMY
2) Cloudinary API: https://cloudinary.com/documentation/how_to_integrate_cloudinary#learn_how_to_apply_image_transformations
3) Imagga API: https://docs.imagga.com/#colors
