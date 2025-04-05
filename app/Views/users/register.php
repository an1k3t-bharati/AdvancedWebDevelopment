<?php include APPPATH . 'Views/templates/header.php'; ?>
<?php include APPPATH . 'Views/templates/nav.php'; ?>

<div class="container auth-container">
    <div class="card auth-card">
        <h3 class="text-center mb-4">Create Your Account</h3>
        <form action="/user/register" method="post">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <div class="row mb-3">
                <div class="col">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" required>
                </div>
                <div class="col">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>

            <div class="mb-3">
                <label for="confirm_email" class="form-label">Confirm Email Address</label>
                <input type="email" name="confirm_email" class="form-control" id="confirm_email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-dark">Register</button>
            </div>

            <div class="text-center mt-3">
                <p>Already have an account? <a href="/user/login">Login here</a></p>
            </div>
        </form>
    </div>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
