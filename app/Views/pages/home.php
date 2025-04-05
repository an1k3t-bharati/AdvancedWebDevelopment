<?php include APPPATH . 'Views/templates/header.php'; ?>
<?php include APPPATH . 'Views/templates/nav.php'; ?>


<div class="container my-5 text-center">
    <h2 class="mb-4">Welcome to A-One Clothing Store</h2>
    <div id="fashionCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/images/img1.jpg" class="d-block w-100" alt="A-One Clothing Store">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/img2.jpg" class="d-block w-100" alt="A-One Clothing Store">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/img3.jpg" class="d-block w-100" alt="A-One Clothing Store">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#fashionCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#fashionCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
