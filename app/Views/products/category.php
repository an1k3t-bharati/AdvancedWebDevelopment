<?php include APPPATH . 'Views/templates/header.php'; ?>
<?php include APPPATH . 'Views/templates/nav.php'; ?>
<div class="container my-5">
    <h2 class="mb-4 text-center"><?= $category; ?> Collection</h2>

    <?php foreach ($productsByType as $type => $products) : ?>
        <?php if (!empty($products)) : ?>
            <h3 class="mb-3"><?= $type; ?></h3>
            <div class="row mb-5">
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="/assets/images/<?= strtolower($category); ?>/<?= $product['image']; ?>" class="card-img-top" alt="<?= $product['name']; ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $product['name']; ?></h5>
                                <p class="fw-bold">£<?= $product['price']; ?></p>

                                <!-- Add to Cart -->
                          <button type="button" class="btn btn-dark mt-2 add-to-cart"
    data-id="<?= $product['id']; ?>"
    data-name="<?= $product['name']; ?>"
    data-price="<?= $product['price']; ?>"
    data-image="/assets/images/<?= strtolower($category); ?>/<?= $product['image']; ?>">Add to Cart</button>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
