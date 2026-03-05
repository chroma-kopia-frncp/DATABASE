<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/Dashboard.css" rel="stylesheet">
    <title>InFurnest</title>
    <!-- BOOTSTRAP & CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

     <!--FONTS-->
     <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

     <link rel="" href="Login.php">


</head>
<body>
    
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="logo" href="#Home"><img src="img/Logo.png"></a>
    <!-- Brand -->

    <!-- Toggler for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar content -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <!-- Search bar -->
      <form class="d-flex ms-auto me-3 search-bar">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light ms-2" type="submit">Search</button>
      </form>

      <!-- Icons -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#About">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#FAQs">FAQ</a></li>
        <li class="nav-item"><a class="nav-link" href="#Account">Account</a></li>
        <li class="nav-item"><a class="nav-link" href="#Contact">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="Login.php">Log In</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Category bar -->
<div class="container-fluid category-bar py-2">
  <div class="d-flex flex-wrap justify-content-center">
    <a href="#Accessories" class="mx-3 category-link">Accessories</a>
    <a href="#Foods & Treats" class="mx-3 category-link">Foods & Treats</a>
    <a href="#Supplements" class="mx-3 category-link">Supplements</a>
    <a href="#Basic Necessities" class="mx-3 category-link">Basic Necessities</a>
    <a href="#Toys" class="mx-3 category-link">Toys</a>
    <a href="#Clothes" class="mx-3 category-link">Clothes</a>
  </div>
</div>

 <div class="container">
        <!-- HEADER WITH HERO -->
        <header>
            <div class="logo">InFurNest</div>
            <div class="tagline">🐾 Your Online Pet Store 🐾</div>
            
            <div class="hero-content">
                <div class="hero-image">
                    <div class="pet-mascot">
                        <div class="flower">🌼</div>
                    </div>
                    <div class="collar"></div>
                </div>
                <div class="hero-text">
                    <h2>Welcome to InFurNest!</h2>
                    <p>Whether you're a first-time "pawrent" or a seasoned animal lover, your pets deserve the world. At InFurNest, we believe that every wag, purr, and chirp is a reason to celebrate. We've curated a one-stop digital paradise to keep your companions healthy, happy, and looking their absolute best.</p>
                </div>
            </div>
        </header>

        <!-- DECORATIVE STRIP -->
        <div class="decorative-strip"></div>

        <!-- ANNOUNCEMENTS SECTION -->
        <section class="announcements-section">
            <h2 class="section-title">Announcements</h2>
            <div class="bulletin-board">
                <div class="bulletin-card">
                    <h3>🎉 Grand Opening Sale!</h3>
                    <p>Join us for our special opening week celebration. Get 20% off all items with code PAWS20. Limited time only!</p>
                    <div class="decoration-pet">🐕</div>
                </div>
                <div class="bulletin-card">
                    <h3>📦 Fast Shipping</h3>
                    <p>We now offer free shipping on orders over $50! Your pets' favorite treats and toys will arrive in 2-3 business days.</p>
                    <div class="decoration-pet">🐈</div>
                </div>
                <div class="bulletin-card">
                    <h3>✨ New Arrivals</h3>
                    <p>Check out our latest collection of eco-friendly pet toys and organic pet foods. Sustainability meets pet care!</p>
                    <div class="decoration-pet">🐰</div>
                </div>
                <div class="bulletin-card">
                    <h3>🏥 Pet Health Tips</h3>
                    <p>Visit our blog for expert advice on pet nutrition, exercise, and wellness. Learn how to keep your furry friends happy!</p>
                    <div class="decoration-pet">🦜</div>
                </div>
            </div>
        </section>

        <!-- DECORATIVE STRIP -->
        <div class="decorative-strip"></div>

        <!-- BEST SELLERS SECTION -->
        <section class="bestsellers-section">
            <h2 class="section-title">Best Sellers</h2>
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">🥩</div>
                    <div class="product-name">CHUNKY Dog Food</div>
                </div>
                <div class="product-card">
                    <div class="product-image">🛏️</div>
                    <div class="product-name">Cottage Bedding</div>
                </div>
                <div class="product-card">
                    <div class="product-image">🍃</div>
                    <div class="product-name">DREAMIES Treats</div>
                </div>
                <div class="product-card">
                    <div class="product-image">🧴</div>
                    <div class="product-name">BARKS & BUBBLES Shampoo</div>
                </div>
                <div class="product-card">
                    <div class="product-image">⚫</div>
                    <div class="product-name">Classic Black Collar</div>
                </div>
                <div class="product-card">
                    <div class="product-image">🎾</div>
                    <div class="product-name">DOG BALL Toy</div>
                </div>
            </div>
        </section>

        <!-- FOOTER DECORATIONS -->
        <div class="grass"></div>
        <div class="decorative-strip"></div>
    </div>

    <footer>
        <p>&copy; 2024 InFurnest. All rights reserved.</p>
    </footer>

    <!--BOOTSRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
