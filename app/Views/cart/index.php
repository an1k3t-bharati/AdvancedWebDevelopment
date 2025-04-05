<?php include APPPATH . 'Views/templates/header.php'; ?>
<?php include APPPATH . 'Views/templates/nav.php'; ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Your Shopping Cart</h2>

    <?php if (empty($cart)) : ?>
        <div class="alert alert-info text-center">Your cart is empty.</div>
    <?php else : ?>
        <div class="cart-wrapper">
            <?php $total = 0; ?>
            <?php foreach ($cart as $item) : ?>
                <?php
                    $qty = $item['quantity'] ?? 1;
                    $subtotal = $item['price'] * $qty;
                    $total += $subtotal;
                    $imagePath = $item['image'];
                ?>
                <div class="cart-item card mb-3 shadow-sm p-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-2">
                            <img src="<?= esc($imagePath) ?>" class="img-fluid rounded" alt="<?= esc($item['name']) ?>">
                        </div>
                        <div class="col-md-7">
                            <h5><?= esc($item['name']) ?></h5>
                            <p class="mb-1 text-muted">
                                Price: £<?= number_format($item['price'], 2) ?> × <?= $qty ?> =
                                <strong>£<?= number_format($subtotal, 2) ?></strong>
                            </p>
                        </div>
                        <div class="col-md-3 text-end">
                            <form action="/cart/remove" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                                <button type="submit" class="btn btn-outline-danger btn-sm">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="text-end mt-4">
                <h4>Total: £<?= number_format($total, 2) ?></h4>
                <a href="/checkout" class="btn btn-success">Checkout</a>
            </div>

            <div id="shipping-estimate" class="alert alert-info mt-4 text-center">
                Detecting your location for shipping estimate...
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
