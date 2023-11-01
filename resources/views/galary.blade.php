<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/homepahecss.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/47b6cf0509.js" crossorigin="anonymous"></script>
    <style>
        i {
            border: 1px solid rgb(109, 109, 119);
            padding: 5px;
            margin-bottom: 9px;
            margin-right: 4px;
            border-radius: 6px;
        }

        .collapse {
            font-size: 19px;
            text-align: justify;
            font-family: 'PT Sans', sans-serif !important;
        }

        .navbar-nav {
            margin-left: auto;
        }
    </style>
</head>
@include('header')

<body>
    <div class="container">
        <h1 style="color: rgb(180, 127, 255);font-weight:bold">EXPLORE OUR GALLARY</h1>
    </div>

    <div class="lightbox">
        <div class="wrapper">
            <header>
                <div class="details">
                    <i class="uil uil-camera"></i>
                    <span>Image Preview</span>
                </div>
                <div class="buttons"><i class="close-icon uil uil-times"></i></div>
            </header>
            <div class="preview-img">
                <div class="img"><img src="" alt="preview-img"></div>
            </div>
        </div>
    </div>
    <section class="gallery">
        <ul class="images">
            <li class="img"><img src="images/tk1.jpg" alt="img"></li>
            <li class="img"><img src="images/tk2.jpg" alt="img"></li>
            <li class="img"><img src="images/tk3.jpg" alt="img"></li>
            <li class="img"><img src="images/tk4.jpg" alt="img"></li>
            <li class="img"><img src="images/tk5.jpg" alt="img"></li>
            <li class="img"><img src="images/tk6.jpg" alt="img"></li>
            <li class="img"><img src="images/tk7.jpg" alt="img"></li>
            <li class="img"><img src="images/tk8.jpg" alt="img"></li>
            <li class="img"><img src="images/tk9.jpg" alt="img"></li>
            <li class="img"><img src="images/tk10.jpg" alt="img"></li>
            <li class="img"><img src="images/tk11.jpg" alt="img"></li>
            <li class="img"><img src="images/tk12.jpg" alt="img"></li>
        </ul>
    </section>
    @include('footer')
    <script>
        const allImages = document.querySelectorAll(".images .img");
        const lightbox = document.querySelector(".lightbox");
        const closeImgBtn = lightbox.querySelector(".close-icon");
        allImages.forEach(img => {
            // Calling showLightBox function with passing clicked img src as argument
            img.addEventListener("click", () => showLightbox(img.querySelector("img").src));
        });
        const showLightbox = (img) => {
            // Showing lightbox and updating img source
            lightbox.querySelector("img").src = img;
            lightbox.classList.add("show");
            document.body.style.overflow = "hidden";
        }
        closeImgBtn.addEventListener("click", () => {
            // Hiding lightbox on close icon click
            lightbox.classList.remove("show");
            document.body.style.overflow = "auto";
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
