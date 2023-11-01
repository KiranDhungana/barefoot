<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/homepahecss.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/47b6cf0509.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
 </style>
    @include('header')
</head>

<body>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('/images/ban3.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ url('/images/ban1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            {{-- <div class="carousel-item">
                <img src="{{ url('/images/tk8.jpg') }}" class="d-block w-100" alt="...">
            </div> --}}
            {{-- <div class="carousel-item">
                <img src="{{ url('/images/ban3.jpg') }}" class="d-block w-100" alt="...">
            </div> --}}

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container" style=" padding-top:10px">
        <div class="row">
            <div class="col-md-6">
                <h1 id="intro">INTRODUCTION</h1>
                <p style="font-size: 19px;  padding-top:10px; text-align: justify;">
                    We're glad you're here at Barefoot Martial Arts Academy, a top-notch facility for learning martial
                    arts with a focus on fostering self-defences abilities, mental focus, and physical fitness. When our
                    academy was established, the goal was to build a community of people who love martial arts and work
                    hard to improve themselves.
                    We at the Barefoot Martial Arts Academy consider martial arts training to be more than just physical
                    activity. It instils crucial virtues like respect, tenacity, and self-control that are crucial in
                    every facet of life. Our knowledgeable instructors are dedicated to provide top-notch instruction to
                    learners of all ages and skill levels, making certain that each student receives individualised
                    attention and direction.
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Read More
                </button>
                <div class="collapse" id="collapseExample">
                    Our goal is to establish a secure, welcoming setting where kids can study and develop both as
                    individuals and members of a community. In order to meet the different needs and interests of our
                    students, we provide a range of programmes, including Taekwondo, Boxing, and Tang Soo Do among
                    others.
                    In order to fulfil the changing requirements of our community, it is our intention to keep enhancing
                    and extending our programmes, facilities, and services in the future. We want Barefoot Martial Arts
                    Academy to be a centre for innovation where students may learn cutting-edge skills, make friends
                    with like-minded people, and realise their full potential.
                    Our goals are to build students' self-confidence, mental toughness, and self-defences abilities
                    while also building a sense of belonging and togetherness. We cordially invite you to become a part
                    of our community at Barefoot Martial Arts Academy, whether you are a novice looking to pick up a new
                    talent or an advanced martial artist wishing to polish your techniques.

                </p>
            </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" style="padding-top:10px" src="{{ url('/images/1.png') }}" alt="">
            </div>


        </div>
        <div style="background-color: rgb(154, 151, 151); height:2px">

        </div>

    </div>

    <div class="container" style=" padding-top:15px">
        <div class="row">
            <div class="col">
                <h1 id="intro">MESSAGE FROM OUR COACH</h1>
                <p style="font-size: 19px;   text-align: justify; padding-top:10px">
                    Greetings to all prospective students and martial arts enthusiasts!<br>

                    As the head coach of Barefoot Martial Arts Academy, I am delighted to welcome you to our website. We
                    are a community of dedicated martial artists who are passionate about sharing our knowledge and
                    expertise with everyone who wants to learn.

                    At Barefoot Martial Arts Academy, we believe that martial arts is not just a form of exercise, but a
                    way of life. Our classes are designed to help you build strength, improve your flexibility, develop
                    your coordination, and gain self-confidence.


                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Read More
                    </button>



                <div class="collapse" id="collapseExample">

                    Our instructors are highly trained and experienced, and they are committed to helping you achieve
                    your goals. They will provide you with personalized attention and guidance to ensure that you make
                    progress every step of the way. At Barefoot Martial Arts Academy, we foster a supportive and
                    inclusive environment where everyone can feel welcome and motivated to achieve their full
                    potential..
                    We offer a range of martial arts styles, including Taekwondo, Boxing, Tang Soo Do, among others.
                    Each style has its unique benefits, and we encourage you to try them all to discover which one
                    resonates with you the most.
                    <br>

                    Thank you for considering Barefoot Martial Arts Academy for your martial arts journey. We are
                    excited to have you join our community and look forward to seeing you on the mat soon.
                    <br>
                    Best regards,
                    <br>

                    <span style="color:#2F5CB7; font-weight:bold; font-size:25px">Manish Gupta </span>
                    Head Coach, Barefoot Martial Arts Academy
                </div>
                </p>
            </div>
        </div>
        <div style="background-color: rgb(154, 151, 151); height:2px">
        </div>
    </div>
    <div style=" padding-top:15px" class="container">
        <h1 id="intro">EXPLORE US</h1>
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
