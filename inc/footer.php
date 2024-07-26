 
 <!-- Footer -->
 <footer>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p>&copy; <?php echo date('Y'); ?> The Mark. All rights reserved. | Designed by Saikat Das</p>
                </div>
            </div>
        </div>
    </footer>
 

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<!-- Initialize Swiper -->
<script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 1200,
                disableOnInteraction: false
            }
        });
    </script>

</body>
</html>
