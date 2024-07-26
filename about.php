<?php
$page_title = "About Us";
require('inc/header.php');
?>

<div class="container mt-5 mb-5">
    <h2 class="font-weight-bold text-center mb-5">About Us</h2>

    <div class="row mt-4 align-items-center">
        <!-- Owner's Section -->
        <div class="col-md-6 text-center">
            <img src="images/about/2.png" alt="Owner" class="rounded-circle shadow mb-3" style="width: 400px; height: 400px;">
            <h3 class="font-weight-bold">Elon Musk</h3>
            <p class="text-muted">"Money money money"</p>
        </div>

        <div class="col-md-6 text-center">
            <div class="mt-5">
                <p class="lead text-justify">"Another note from the owner, emphasizing values and goals."</p>
                <p class="lead text-justify">"Final thoughts on the company direction and commitment to quality."</p>
            </div>
        </div>
    </div>
</div>

<style>
    .lead {
        font-size: 1.2rem;
        color: #555;
    }

    h3 {
        color: #333;
    }

    .shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .text-muted {
        font-style: italic;
    }
</style>


<div class="container mt-5 mb-5">
    <h3 class="font-weight-bold text-center mb-5">Management Team</h3>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide text-center p-2">
                <img src="images/about/u.jpg" alt="Manager 1" style="width: 400px; height: 400px;">
                <h4>Manager 1</h4>
                <p>Position</p>
            </div>
            <div class="swiper-slide text-center p-2">
                <img src="images/about/p.webp" alt="Manager 2" style="width: 400px; height: 400px;">
                <h4>Manager 2</h4>
                <p>Position</p>
            </div>
            <div class="swiper-slide text-center p-2">
                <img src="images/about/i.png" alt="Manager 3" style="width: 400px; height: 400px;">
                <h4>Manager 3</h4>
                <p>Position</p>
            </div>
            <div class="swiper-slide text-center p-2">
                <img src="images/about/u.jpg" alt="Manager 1" style="width: 400px; height: 400px;">
                <h4>Manager 4</h4>
                <p>Position</p>
            </div>
            <div class="swiper-slide text-center p-2">
                <img src="images/about/i.png" alt="Manager 3" style="width: 400px; height: 400px;">
                <h4>Manager 5</h4>
                <p>Position</p>
            </div>
            <div class="swiper-slide text-center p-2">
                <img src="images/about/u.jpg" alt="Manager 1" style="width: 400px; height: 400px;">
                <h4>Manager 6</h4>
                <p>Position</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 10, // Reduced space between slides
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        loop: true,
        autoplay: {
            delay: 1200,
            disableOnInteraction: false
        }
    });
</script>

<?php require('inc/footer.php'); ?>
