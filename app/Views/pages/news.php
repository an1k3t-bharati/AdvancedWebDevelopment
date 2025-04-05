<?php include APPPATH . 'Views/templates/header.php'; ?>
<?php include APPPATH . 'Views/templates/nav.php'; ?>

<link rel="stylesheet" href="/assets/css/news.css">

<div class="container my-5">
    <h2 class="text-center mb-4">Latest Fashion News</h2>

    <?php if (empty($articles)) : ?>
        <div class="alert alert-warning text-center">No news available at the moment.</div>
    <?php else : ?>
        <div class="row">
            <?php foreach ($articles as $article) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 news-card shadow-sm">
                        <?php if (!empty($article['image'])) : ?>
                            <img src="<?= esc($article['image']) ?>" class="card-img-top" alt="News Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($article['title']) ?></h5>
                            <p class="card-text"><?= esc($article['description']) ?></p>
                            <a href="<?= esc($article['url']) ?>" target="_blank" class="btn btn-outline-dark btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include APPPATH . 'Views/templates/footer.php'; ?>
