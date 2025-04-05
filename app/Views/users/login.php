<?php include APPPATH . 'Views/templates/header.php'; ?>
<?php include APPPATH . 'Views/templates/nav.php'; ?>

<div class="container auth-container">
    <div class="card auth-card">
        <h3 class="text-center mb-4">Login to Your Account</h3>
        <form action="/user/login" method="post">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-dark">Login</button>
            </div>

            <div class="text-center mt-3">
                <p>Don't have an account? <a href="/user/register">Sign Up</a></p>
            </div>
        </form>
    </div>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
