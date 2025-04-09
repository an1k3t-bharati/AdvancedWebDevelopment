<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container-fluid">

        <a class="navbar-brand" href="/">A-One Clothing Store</a>

      
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
           
       <form class="d-flex mx-auto position-relative" action="/search" method="get" role="search" style="width: 400px;">
  
    <input type="text" class="form-control pe-5 ps-3" id="searchInput" name="q" placeholder="Search products..." aria-label="Search">

    <input type="hidden" name="category" id="selectedCategory" value="">

    
    <div class="dropdown position-absolute" style="right: 40px; top: 50%; transform: translateY(-50%);">
        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Category
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="categoryDropdown">
            <li><a class="dropdown-item category-option" data-value="">All</a></li>
            <li><a class="dropdown-item category-option" data-value="1">Men</a></li>
            <li><a class="dropdown-item category-option" data-value="2">Women</a></li>
        </ul>
    </div>

   
    <button class="btn position-absolute end-0 me-1" type="submit" style="background: none; border: none;">
        <i class="bi bi-search"></i>
    </button>

   
    <div id="selectedCategoryTag" class="position-absolute bg-light border px-2 py-1 rounded-pill d-none"
         style="right: 115px; top: 50%; transform: translateY(-50%); font-size: 0.8rem; cursor: pointer;">
        <span id="categoryText"></span> &times;
    </div>
</form>
            
    <ul class="navbar-nav ms-auto">
    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/products/men">Men</a></li>
            <li><a class="dropdown-item" href="/products/women">Women</a></li>
        </ul>
    </li>

    <li class="nav-item"><a class="nav-link" href="/contactus">Contact</a></li>
    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
    <li class="nav-item"><a class="nav-link" href="/news">News</a></li>

    <?php if (session()->get('isLoggedIn')) : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-1"></i> <?= session()->get('user_name'); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="/user/logout">Logout</a></li>
            </ul>
        </li>
    <?php else : ?>
        <li class="nav-item">
            <a class="nav-link" href="/user/login">
                <i class="bi bi-person-circle"></i>
            </a>
        </li>
    <?php endif; ?>

    <li class="nav-item">
        <a class="nav-link position-relative" href="/cart">
            <i class="bi bi-cart3"></i>
            <?php if (isset($_SESSION['cart_count']) && $_SESSION['cart_count'] > 0) : ?>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?= $_SESSION['cart_count']; ?>
                </span>
            <?php endif; ?>
        </a>
    </li>
</ul>
      
        </div>
    </div>
</nav>
