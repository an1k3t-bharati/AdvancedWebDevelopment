<?php include APPPATH . 'Views/templates/header.php'; ?>
<?php include APPPATH . 'Views/templates/nav.php'; ?>

<link rel="stylesheet" href="/assets/css/contact.css">

<div class="container my-5 contact-container">
    <h2 class="text-center mb-4">Contact Us</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success text-center"><?= session()->getFlashdata('success'); ?></div>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger text-center"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <div class="row g-5">
        
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h4 class="mb-3">Send Us a Message</h4>
                <form action="/contactus" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Aniket Bharati" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea name="message" class="form-control" id="message" rows="4" placeholder="Type your message here..." required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Send Message</button>
                    </div>
                </form>
            </div>
        </div>

        
        <div class="col-md-6">
            <div class="contact-info text-center p-4 rounded shadow-sm">
                <h4 class="mb-3">Our Official Store</h4>
                <p><i class="bi bi-geo-alt-fill me-2"></i>Wulfruna St, Wolverhampton WV1 1LY</p>
                <div class="text-center mb-3">
                    <button onclick="openDirections()" class="btn btn-outline-dark btn-sm">
                        <i class="bi bi-compass"></i> Get Directions
                    </button>
                </div>
                <p><i class="bi bi-envelope-fill me-2"></i>support@a-oneclothingstore.com</p>
                <p><i class="bi bi-telephone-fill me-2"></i>+44 1234 567890</p>
                <hr>
                <p class="small text-muted">We'll get back to you within 24 hours!</p>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/contactMap.js"></script>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
