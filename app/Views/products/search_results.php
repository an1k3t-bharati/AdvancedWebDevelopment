<?php include APPPATH . 'Views/templates/header.php'; ?>
<?php include APPPATH . 'Views/templates/nav.php'; ?>

<div class="container my-5">
    <h3 class="mb-4">Search Results for: "<?= esc($searchQuery); ?>"</h3>

    <?php if (empty($products)) : ?>
        <div class="alert alert-warning">No products found.</div>
    <?php else : ?>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="/assets/images/<?= $product['category_id'] == 1 ? 'men' : 'women'; ?>/<?= $product['image']; ?>" class="card-img-top" alt="<?= $product['name']; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $product['name']; ?></h5>
                            <p class="text-muted">£<?= number_format($product['price'], 2); ?></p>
                            <form action="/cart/add" method="post">
                                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                <input type="hidden" name="product_name" value="<?= $product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?= $product['price']; ?>">
                                <input type="hidden" name="product_image" value="/assets/images/<?= $product['category_id'] == 1 ? 'men' : 'women'; ?>/<?= $product['image']; ?>">
                                <button class="btn btn-dark btn-sm mt-2" type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
