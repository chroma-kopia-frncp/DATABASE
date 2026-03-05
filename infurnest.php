<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>INFURNEST — Premium Pet Shop</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
<style>
  :root {
    --cream: #FDF6EC;
    --warm-white: #FFFAF4;
    --amber: #E8922A;
    --amber-dark: #C4751A;
    --amber-light: #F5B56B;
    --brown: #3D2B1F;
    --brown-mid: #6B4226;
    --brown-light: #A0674A;
    --sage: #7A9E7E;
    --sage-light: #B2CFAF;
    --blush: #F2D5B0;
    --text-dark: #2A1A0E;
    --text-mid: #5C3D28;
    --text-light: #9E7B5E;
    --shadow: 0 8px 32px rgba(61,43,31,0.12);
    --shadow-hover: 0 16px 48px rgba(61,43,31,0.2);
    --radius: 16px;
    --radius-sm: 10px;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--text-dark);
    overflow-x: hidden;
  }
  .display-font { font-family: 'Playfair Display', serif; }

  /* ===== PAGES ===== */
  .page { display: none; min-height: 100vh; }
  .page.active { display: block; }

  /* ===== NAVBAR ===== */
  .navbar-custom {
    background: rgba(253,246,236,0.97);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(232,146,42,0.15);
    padding: 14px 0;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 20px rgba(61,43,31,0.08);
  }
  .navbar-brand-logo {
    font-family: 'Playfair Display', serif;
    font-size: 1.65rem;
    font-weight: 900;
    color: var(--brown);
    letter-spacing: -0.5px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .navbar-brand-logo .logo-icon {
    background: linear-gradient(135deg, var(--amber), var(--amber-dark));
    color: white;
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
  }
  .navbar-brand-logo span.accent { color: var(--amber); }
  .nav-links a {
    color: var(--text-mid);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9rem;
    padding: 6px 14px;
    border-radius: 8px;
    transition: all 0.2s;
  }
  .nav-links a:hover, .nav-links a.active-nav { color: var(--amber); background: rgba(232,146,42,0.1); }
  .cart-btn {
    background: var(--brown);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 9px 18px;
    font-size: 0.88rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 7px;
    transition: all 0.2s;
    position: relative;
  }
  .cart-btn:hover { background: var(--amber-dark); transform: translateY(-1px); }
  .cart-count {
    background: var(--amber);
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 0.7rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: -6px;
    right: -6px;
  }
  .hamburger {
    background: none;
    border: 1.5px solid var(--blush);
    border-radius: 8px;
    padding: 6px 10px;
    color: var(--brown);
    font-size: 1.1rem;
    cursor: pointer;
  }
  .mobile-menu {
    display: none;
    background: var(--warm-white);
    border-top: 1px solid var(--blush);
    padding: 12px 20px;
  }
  .mobile-menu.open { display: block; }
  .mobile-menu a {
    display: block;
    padding: 10px 0;
    color: var(--text-mid);
    text-decoration: none;
    font-weight: 500;
    border-bottom: 1px solid var(--blush);
    font-size: 0.95rem;
  }
  .mobile-menu a:last-child { border-bottom: none; }

  /* ===== HERO ===== */
  .hero {
    background: linear-gradient(135deg, #3D2B1F 0%, #6B4226 50%, #A0674A 100%);
    min-height: 580px;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
  }
  .hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  }
  .hero-paw {
    position: absolute;
    font-size: 8rem;
    opacity: 0.06;
    color: white;
    pointer-events: none;
  }
  .hero-paw.p1 { top: -20px; right: 5%; transform: rotate(20deg); font-size: 12rem; }
  .hero-paw.p2 { bottom: 20px; right: 20%; font-size: 6rem; transform: rotate(-15deg); }
  .hero-paw.p3 { top: 40%; left: -2%; font-size: 5rem; transform: rotate(10deg); }
  .hero-badge {
    background: rgba(232,146,42,0.2);
    border: 1px solid rgba(232,146,42,0.4);
    color: var(--amber-light);
    border-radius: 50px;
    padding: 6px 16px;
    font-size: 0.78rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    display: inline-block;
    margin-bottom: 16px;
  }
  .hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.4rem, 5vw, 4rem);
    font-weight: 900;
    color: white;
    line-height: 1.15;
    margin-bottom: 18px;
  }
  .hero h1 .highlight {
    color: var(--amber-light);
    position: relative;
  }
  .hero p {
    color: rgba(255,255,255,0.75);
    font-size: 1rem;
    line-height: 1.7;
    margin-bottom: 28px;
    max-width: 480px;
  }
  .btn-primary-custom {
    background: linear-gradient(135deg, var(--amber), var(--amber-dark));
    color: white;
    border: none;
    border-radius: 12px;
    padding: 13px 28px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.25s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 20px rgba(232,146,42,0.4);
  }
  .btn-primary-custom:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(232,146,42,0.5); color: white; }
  .btn-outline-custom {
    background: transparent;
    color: white;
    border: 1.5px solid rgba(255,255,255,0.4);
    border-radius: 12px;
    padding: 12px 24px;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.25s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }
  .btn-outline-custom:hover { background: rgba(255,255,255,0.1); border-color: white; color: white; }
  .hero-stats {
    display: flex;
    gap: 28px;
    margin-top: 32px;
    flex-wrap: wrap;
  }
  .stat-item { color: white; }
  .stat-item .num { font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 700; color: var(--amber-light); }
  .stat-item .lbl { font-size: 0.75rem; color: rgba(255,255,255,0.6); }
  .hero-image-area {
    text-align: center;
    font-size: 11rem;
    line-height: 1;
    filter: drop-shadow(0 20px 40px rgba(0,0,0,0.3));
    animation: floatHero 4s ease-in-out infinite;
  }
  @keyframes floatHero { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-12px)} }

  /* ===== SEARCH BAR ===== */
  .search-section {
    background: white;
    padding: 28px 0;
    box-shadow: 0 4px 20px rgba(61,43,31,0.06);
    position: relative;
    z-index: 10;
  }
  .search-wrap {
    background: var(--cream);
    border: 1.5px solid var(--blush);
    border-radius: 14px;
    display: flex;
    align-items: center;
    overflow: hidden;
    transition: all 0.2s;
  }
  .search-wrap:focus-within { border-color: var(--amber); box-shadow: 0 0 0 4px rgba(232,146,42,0.12); }
  .search-wrap input {
    border: none;
    background: transparent;
    flex: 1;
    padding: 14px 18px;
    font-size: 0.95rem;
    color: var(--text-dark);
    outline: none;
    font-family: 'DM Sans', sans-serif;
  }
  .search-wrap input::placeholder { color: var(--text-light); }
  .search-wrap button {
    background: linear-gradient(135deg, var(--amber), var(--amber-dark));
    border: none;
    color: white;
    padding: 14px 22px;
    cursor: pointer;
    font-size: 1rem;
    transition: all 0.2s;
  }
  .search-wrap button:hover { background: var(--amber-dark); }
  .search-filter-tabs {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-top: 12px;
  }
  .filter-tab {
    background: var(--cream);
    border: 1.5px solid var(--blush);
    color: var(--text-mid);
    border-radius: 50px;
    padding: 6px 16px;
    font-size: 0.82rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    white-space: nowrap;
  }
  .filter-tab:hover, .filter-tab.active { background: var(--amber); border-color: var(--amber); color: white; }

  /* ===== SECTIONS ===== */
  .section-label {
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--amber);
    margin-bottom: 8px;
  }
  .section-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(1.6rem, 3vw, 2.2rem);
    font-weight: 900;
    color: var(--brown);
    line-height: 1.25;
  }
  .section-title span { color: var(--amber); }

  /* ===== CATEGORY CARDS ===== */
  .cat-card {
    background: white;
    border-radius: var(--radius);
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s;
    border: 2px solid transparent;
    text-align: center;
    padding: 24px 16px 20px;
    position: relative;
    box-shadow: var(--shadow);
  }
  .cat-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-hover); border-color: var(--amber-light); }
  .cat-card.selected { border-color: var(--amber); background: linear-gradient(135deg, #FFF8F0, #FDF6EC); }
  .cat-icon { font-size: 3rem; margin-bottom: 12px; display: block; }
  .cat-name { font-weight: 700; font-size: 0.95rem; color: var(--brown); margin-bottom: 4px; }
  .cat-count { font-size: 0.78rem; color: var(--text-light); }
  .cat-card .cat-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: var(--amber);
    color: white;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 20px;
  }

  /* ===== PRODUCT CARD ===== */
  .product-card {
    background: white;
    border-radius: var(--radius);
    overflow: hidden;
    transition: all 0.3s;
    cursor: pointer;
    box-shadow: var(--shadow);
    position: relative;
    border: 2px solid transparent;
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  .product-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-hover); border-color: var(--amber-light); }
  .product-img {
    background: linear-gradient(135deg, var(--cream), var(--blush));
    padding: 28px;
    text-align: center;
    font-size: 5.5rem;
    position: relative;
    line-height: 1;
    min-height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .product-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: var(--amber);
    color: white;
    font-size: 0.68rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  .product-badge.sale { background: #E84A2A; }
  .product-badge.new { background: var(--sage); }
  .wishlist-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: white;
    border: none;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 0.85rem;
    color: var(--text-light);
    transition: all 0.2s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }
  .wishlist-btn:hover, .wishlist-btn.active { color: #E84A2A; transform: scale(1.1); }
  .product-body { padding: 16px; flex: 1; display: flex; flex-direction: column; }
  .product-pet-tag {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 0.72rem;
    font-weight: 600;
    color: var(--amber-dark);
    background: rgba(232,146,42,0.12);
    padding: 3px 9px;
    border-radius: 20px;
    margin-bottom: 8px;
  }
  .product-name { font-weight: 700; font-size: 0.92rem; color: var(--brown); margin-bottom: 6px; line-height: 1.3; }
  .product-desc { font-size: 0.78rem; color: var(--text-light); line-height: 1.5; margin-bottom: 10px; flex: 1; }
  .product-stars { color: #F5B300; font-size: 0.75rem; margin-bottom: 8px; }
  .product-stars span { color: var(--text-light); font-size: 0.72rem; margin-left: 4px; }
  .product-price-row { display: flex; align-items: center; justify-content: space-between; margin-top: auto; padding-top: 10px; border-top: 1px solid var(--blush); }
  .product-price { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 700; color: var(--brown); }
  .product-price .old-price { font-size: 0.78rem; color: var(--text-light); text-decoration: line-through; font-family: 'DM Sans', sans-serif; font-weight: 400; display: block; }
  .add-cart-btn {
    background: var(--brown);
    color: white;
    border: none;
    border-radius: 9px;
    padding: 8px 14px;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .add-cart-btn:hover { background: var(--amber-dark); transform: scale(1.03); }

  /* ===== PROMO BANNER ===== */
  .promo-banner {
    background: linear-gradient(135deg, var(--sage) 0%, #4A7A4E 100%);
    border-radius: var(--radius);
    padding: 32px 36px;
    color: white;
    position: relative;
    overflow: hidden;
  }
  .promo-banner::before {
    content: '🐾';
    position: absolute;
    font-size: 8rem;
    right: -20px;
    top: -20px;
    opacity: 0.15;
  }
  .promo-banner h3 { font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 700; margin-bottom: 8px; }
  .promo-banner p { font-size: 0.88rem; opacity: 0.85; margin-bottom: 18px; }
  .promo-code {
    background: rgba(255,255,255,0.2);
    border: 1.5px dashed rgba(255,255,255,0.6);
    border-radius: 8px;
    padding: 8px 14px;
    display: inline-block;
    font-weight: 700;
    letter-spacing: 2px;
    font-size: 0.9rem;
    margin-bottom: 16px;
  }

  /* ===== FOOTER ===== */
  footer {
    background: var(--brown);
    color: white;
    padding: 50px 0 20px;
  }
  footer h5 { font-family: 'Playfair Display', serif; font-size: 1rem; margin-bottom: 16px; color: var(--amber-light); }
  footer a { color: rgba(255,255,255,0.65); text-decoration: none; font-size: 0.85rem; display: block; margin-bottom: 8px; transition: color 0.2s; }
  footer a:hover { color: var(--amber-light); }
  footer .footer-bottom { border-top: 1px solid rgba(255,255,255,0.12); padding-top: 20px; margin-top: 30px; }

  /* ===== SHOP PAGE ===== */
  .shop-filter-sidebar {
    background: white;
    border-radius: var(--radius);
    padding: 24px;
    box-shadow: var(--shadow);
    position: sticky;
    top: 90px;
  }
  .filter-group { margin-bottom: 24px; }
  .filter-group h6 { font-weight: 700; font-size: 0.85rem; color: var(--brown); margin-bottom: 12px; text-transform: uppercase; letter-spacing: 1px; }
  .filter-check label { font-size: 0.85rem; color: var(--text-mid); cursor: pointer; display: flex; align-items: center; gap: 8px; margin-bottom: 8px; }
  .filter-check input[type=checkbox] { accent-color: var(--amber); width: 15px; height: 15px; }
  .price-range { width: 100%; accent-color: var(--amber); }
  .sort-select {
    border: 1.5px solid var(--blush);
    border-radius: 9px;
    padding: 8px 12px;
    font-size: 0.85rem;
    color: var(--text-mid);
    background: var(--cream);
    width: 100%;
    cursor: pointer;
    outline: none;
    font-family: 'DM Sans', sans-serif;
  }
  .sort-select:focus { border-color: var(--amber); }
  .results-count { font-size: 0.85rem; color: var(--text-light); }
  .results-count strong { color: var(--brown); }

  /* ===== PRODUCT DETAIL ===== */
  .detail-img-box {
    background: linear-gradient(135deg, var(--cream), var(--blush));
    border-radius: var(--radius);
    padding: 50px;
    text-align: center;
    font-size: 10rem;
    line-height: 1;
    box-shadow: var(--shadow);
  }
  .quantity-box {
    display: flex;
    align-items: center;
    gap: 0;
    border: 1.5px solid var(--blush);
    border-radius: 10px;
    overflow: hidden;
    width: fit-content;
  }
  .quantity-box button {
    background: var(--cream);
    border: none;
    width: 40px;
    height: 42px;
    font-size: 1.1rem;
    cursor: pointer;
    color: var(--brown);
    font-weight: 700;
    transition: background 0.2s;
  }
  .quantity-box button:hover { background: var(--blush); }
  .quantity-box input {
    border: none;
    border-left: 1.5px solid var(--blush);
    border-right: 1.5px solid var(--blush);
    width: 52px;
    height: 42px;
    text-align: center;
    font-weight: 700;
    font-size: 0.95rem;
    color: var(--brown);
    background: white;
    outline: none;
  }
  .tab-btn {
    background: none;
    border: none;
    border-bottom: 2.5px solid transparent;
    padding: 10px 20px;
    font-size: 0.88rem;
    font-weight: 600;
    color: var(--text-light);
    cursor: pointer;
    transition: all 0.2s;
  }
  .tab-btn.active { color: var(--amber); border-bottom-color: var(--amber); }
  .tab-content-panel { display: none; padding: 20px 0; }
  .tab-content-panel.active { display: block; }

  /* ===== CART PAGE ===== */
  .cart-table { background: white; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow); }
  .cart-table thead { background: var(--brown); color: white; }
  .cart-table th { padding: 14px 18px; font-size: 0.82rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
  .cart-table td { padding: 16px 18px; vertical-align: middle; border-bottom: 1px solid var(--blush); font-size: 0.88rem; }
  .cart-item-img { font-size: 2.5rem; background: var(--cream); width: 60px; height: 60px; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
  .cart-item-name { font-weight: 600; color: var(--brown); font-size: 0.9rem; }
  .cart-remove { background: none; border: none; color: #E84A2A; cursor: pointer; font-size: 1rem; transition: transform 0.2s; }
  .cart-remove:hover { transform: scale(1.2); }
  .order-summary { background: white; border-radius: var(--radius); padding: 24px; box-shadow: var(--shadow); }
  .order-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid var(--blush); font-size: 0.88rem; }
  .order-row:last-child { border-bottom: none; font-weight: 700; font-size: 1rem; color: var(--brown); }
  .checkout-btn {
    background: linear-gradient(135deg, var(--amber), var(--amber-dark));
    color: white;
    border: none;
    border-radius: 12px;
    padding: 14px;
    font-size: 0.95rem;
    font-weight: 700;
    cursor: pointer;
    width: 100%;
    transition: all 0.25s;
    margin-top: 16px;
  }
  .checkout-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(232,146,42,0.4); }

  /* ===== CHECKOUT PAGE ===== */
  .form-group-custom { margin-bottom: 18px; }
  .form-group-custom label { font-size: 0.82rem; font-weight: 600; color: var(--brown); margin-bottom: 6px; display: block; text-transform: uppercase; letter-spacing: 0.5px; }
  .form-group-custom input, .form-group-custom select, .form-group-custom textarea {
    width: 100%;
    border: 1.5px solid var(--blush);
    border-radius: 10px;
    padding: 11px 14px;
    font-size: 0.9rem;
    font-family: 'DM Sans', sans-serif;
    color: var(--text-dark);
    background: white;
    outline: none;
    transition: border-color 0.2s;
  }
  .form-group-custom input:focus, .form-group-custom select:focus { border-color: var(--amber); box-shadow: 0 0 0 3px rgba(232,146,42,0.12); }
  .checkout-section { background: white; border-radius: var(--radius); padding: 28px; box-shadow: var(--shadow); margin-bottom: 20px; }
  .checkout-section h5 { font-family: 'Playfair Display', serif; font-size: 1.1rem; color: var(--brown); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--blush); }
  .payment-option {
    border: 1.5px solid var(--blush);
    border-radius: 10px;
    padding: 14px 16px;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 10px;
  }
  .payment-option:hover { border-color: var(--amber-light); }
  .payment-option.selected { border-color: var(--amber); background: rgba(232,146,42,0.05); }
  .payment-icon { font-size: 1.5rem; }

  /* ===== SUCCESS PAGE ===== */
  .success-icon { font-size: 6rem; animation: popIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
  @keyframes popIn { 0%{transform:scale(0);opacity:0} 100%{transform:scale(1);opacity:1} }

  /* ===== ABOUT / CONTACT ===== */
  .team-card { background: white; border-radius: var(--radius); padding: 28px 20px; text-align: center; box-shadow: var(--shadow); transition: transform 0.3s; }
  .team-card:hover { transform: translateY(-6px); }
  .team-avatar { font-size: 4rem; width: 80px; height: 80px; background: var(--blush); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
  .contact-info-card { background: white; border-radius: var(--radius); padding: 24px; box-shadow: var(--shadow); display: flex; align-items: flex-start; gap: 16px; }
  .contact-icon { width: 48px; height: 48px; background: rgba(232,146,42,0.12); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--amber); font-size: 1.2rem; flex-shrink: 0; }

  /* ===== WISHLIST ===== */
  .empty-state { text-align: center; padding: 80px 20px; }
  .empty-icon { font-size: 6rem; opacity: 0.3; margin-bottom: 20px; }

  /* ===== BACK BTN ===== */
  .back-home-btn {
    position: fixed;
    bottom: 24px;
    right: 24px;
    background: var(--brown);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 12px 20px;
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 8px 24px rgba(61,43,31,0.3);
    transition: all 0.25s;
    z-index: 999;
  }
  .back-home-btn:hover { background: var(--amber-dark); transform: translateY(-3px); }

  /* ===== TOAST ===== */
  .toast-container-custom { position: fixed; bottom: 80px; right: 24px; z-index: 9999; }
  .toast-custom {
    background: white;
    border-left: 4px solid var(--amber);
    border-radius: 10px;
    padding: 14px 18px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    font-size: 0.88rem;
    font-weight: 500;
    color: var(--brown);
    display: flex;
    align-items: center;
    gap: 10px;
    animation: slideIn 0.3s ease;
    margin-bottom: 10px;
    min-width: 240px;
  }
  @keyframes slideIn { from{transform:translateX(100%);opacity:0} to{transform:translateX(0);opacity:1} }
  @keyframes slideOut { from{transform:translateX(0);opacity:1} to{transform:translateX(100%);opacity:0} }

  /* ===== LOADING SPINNER ===== */
  .page-loader { display: flex; align-items: center; justify-content: center; padding: 60px; }
  .spinner { width: 40px; height: 40px; border: 3px solid var(--blush); border-top-color: var(--amber); border-radius: 50%; animation: spin 0.7s linear infinite; }
  @keyframes spin { to{transform:rotate(360deg)} }

  /* ===== RESPONSIVE ===== */
  @media(max-width:768px) {
    .hero { min-height: 420px; }
    .hero-image-area { font-size: 6rem; }
    .shop-filter-sidebar { position: static; margin-bottom: 20px; }
    .detail-img-box { font-size: 6rem; padding: 30px; }
    .cart-table { font-size: 0.8rem; }
    .cart-table td { padding: 10px 10px; }
    .back-home-btn span { display: none; }
    .back-home-btn { padding: 12px 14px; }
  }
  @media(max-width:576px) {
    .hero h1 { font-size: 2rem; }
    .hero-stats { gap: 16px; }
    .stat-item .num { font-size: 1.2rem; }
  }

  /* ===== MISC ===== */
  .page-header {
    background: linear-gradient(135deg, #3D2B1F, #6B4226);
    padding: 48px 0 36px;
    color: white;
    position: relative;
    overflow: hidden;
  }
  .page-header::after {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm10 0c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z'/%3E%3C/g%3E%3C/svg%3E");
  }
  .page-header h2 { font-family: 'Playfair Display', serif; font-size: clamp(1.6rem, 3vw, 2.4rem); font-weight: 900; color: white; margin-bottom: 6px; }
  .page-header p { color: rgba(255,255,255,0.7); font-size: 0.9rem; }
  .breadcrumb-custom { display: flex; gap: 8px; align-items: center; font-size: 0.8rem; color: rgba(255,255,255,0.55); margin-bottom: 10px; flex-wrap: wrap; }
  .breadcrumb-custom span { cursor: pointer; transition: color 0.2s; }
  .breadcrumb-custom span:hover { color: var(--amber-light); }
  .breadcrumb-custom .sep { opacity: 0.4; }
  .badge-pet { display: inline-flex; align-items: center; gap: 4px; font-size: 0.72rem; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
  .badge-dog { background: rgba(232,146,42,0.15); color: var(--amber-dark); }
  .badge-cat { background: rgba(122,158,126,0.15); color: var(--sage); }
  .no-results { text-align: center; padding: 60px 20px; }
  .no-results-icon { font-size: 4rem; opacity: 0.4; margin-bottom: 16px; }
  .stars-input { display: flex; gap: 4px; font-size: 1.5rem; cursor: pointer; }
  .stars-input span { color: #DDD; transition: color 0.15s; }
  .stars-input span.filled, .stars-input span:hover { color: #F5B300; }
  .review-card { background: var(--cream); border-radius: 12px; padding: 18px; margin-bottom: 14px; }
  .review-card .reviewer { font-weight: 700; font-size: 0.88rem; color: var(--brown); }
  .review-card .review-text { font-size: 0.85rem; color: var(--text-mid); margin-top: 6px; line-height: 1.55; }
</style>
</head>
<body>

<!-- ========== NAVBAR ========== -->
<nav class="navbar-custom" id="mainNav">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <a class="navbar-brand-logo" href="#" onclick="showPage('home')">
        <div class="logo-icon"><i class="fas fa-paw"></i></div>
        IN<span class="accent">FUR</span>NEST
      </a>
      <div class="nav-links d-none d-md-flex align-items-center gap-1">
        <a href="#" onclick="showPage('home')" class="active-nav" id="nav-home">Home</a>
        <a href="#" onclick="showPage('shop')" id="nav-shop">Shop</a>
        <a href="#" onclick="showPage('about')" id="nav-about">About</a>
        <a href="#" onclick="showPage('contact')" id="nav-contact">Contact</a>
        <a href="#" onclick="showPage('wishlist')" id="nav-wishlist"><i class="far fa-heart"></i> Wishlist</a>
      </div>
      <div class="d-flex align-items-center gap-2">
        <button class="cart-btn d-none d-sm-flex" onclick="showPage('cart')">
          <i class="fas fa-shopping-bag"></i> Cart
          <span class="cart-count" id="cartCount">0</span>
        </button>
        <button class="cart-btn d-flex d-sm-none" onclick="showPage('cart')" style="padding:9px 12px;">
          <i class="fas fa-shopping-bag"></i>
          <span class="cart-count" id="cartCount2">0</span>
        </button>
        <button class="hamburger d-md-none" onclick="toggleMobileMenu()"><i class="fas fa-bars"></i></button>
      </div>
    </div>
  </div>
  <div class="mobile-menu" id="mobileMenu">
    <a href="#" onclick="showPage('home');toggleMobileMenu()">🏠 Home</a>
    <a href="#" onclick="showPage('shop');toggleMobileMenu()">🛍️ Shop</a>
    <a href="#" onclick="showPage('about');toggleMobileMenu()">🐾 About</a>
    <a href="#" onclick="showPage('contact');toggleMobileMenu()">✉️ Contact</a>
    <a href="#" onclick="showPage('wishlist');toggleMobileMenu()">❤️ Wishlist</a>
    <a href="#" onclick="showPage('cart');toggleMobileMenu()">🛒 Cart</a>
  </div>
</nav>

<!-- ========== TOAST ========== -->
<div class="toast-container-custom" id="toastContainer"></div>

<!-- ========== BACK HOME BUTTON (hidden on home) ========== -->
<button class="back-home-btn" id="backHomeBtn" onclick="showPage('home')" style="display:none;">
  <i class="fas fa-arrow-left"></i>
  <span>Back to Home</span>
</button>

<!-- ======================================================== -->
<!-- PAGE: HOME                                               -->
<!-- ======================================================== -->
<div class="page active" id="page-home">
  <!-- HERO -->
  <section class="hero">
    <span class="hero-paw p1">🐾</span>
    <span class="hero-paw p2">🐾</span>
    <span class="hero-paw p3">🐾</span>
    <div class="container py-4">
      <div class="row align-items-center g-4">
        <div class="col-lg-6 col-md-7">
          <div class="hero-badge">🐶🐱 Premium Pet Essentials</div>
          <h1>Everything Your <span class="highlight">Furry Friend</span> Needs</h1>
          <p>Discover handpicked products for dogs and cats — from gourmet treats and stylish accessories to cozy beds and wellness essentials. Because your pet deserves the best.</p>
          <div class="d-flex gap-3 flex-wrap">
            <button class="btn-primary-custom" onclick="showPage('shop')"><i class="fas fa-store"></i> Shop Now</button>
            <button class="btn-outline-custom" onclick="showPage('about')"><i class="fas fa-play-circle"></i> Learn More</button>
          </div>
          <div class="hero-stats">
            <div class="stat-item"><div class="num">2,400+</div><div class="lbl">Products</div></div>
            <div class="stat-item"><div class="num">18K+</div><div class="lbl">Happy Pets</div></div>
            <div class="stat-item"><div class="num">4.9★</div><div class="lbl">Rating</div></div>
          </div>
        </div>
        <div class="col-lg-6 col-md-5 d-none d-md-block">
          <div class="hero-image-area">🐕</div>
        </div>
      </div>
    </div>
  </section>

  <!-- SEARCH -->
  <section class="search-section">
    <div class="container">
      <div class="search-wrap">
        <input type="text" id="heroSearch" placeholder="Search for dog food, cat toys, accessories…" oninput="liveSearch(this.value)" onkeydown="if(event.key==='Enter')doSearch()"/>
        <button onclick="doSearch()"><i class="fas fa-search"></i></button>
      </div>
      <div class="search-filter-tabs mt-2">
        <button class="filter-tab active" onclick="filterCategory('all',this)">All Products</button>
        <button class="filter-tab" onclick="filterCategory('dog',this)">🐕 Dogs</button>
        <button class="filter-tab" onclick="filterCategory('cat',this)">🐈 Cats</button>
        <button class="filter-tab" onclick="filterCategory('food',this)">🥩 Food</button>
        <button class="filter-tab" onclick="filterCategory('toys',this)">🎾 Toys</button>
        <button class="filter-tab" onclick="filterCategory('beds',this)">🛏 Beds</button>
        <button class="filter-tab" onclick="filterCategory('accessories',this)">👜 Accessories</button>
        <button class="filter-tab" onclick="filterCategory('grooming',this)">✂️ Grooming</button>
      </div>
    </div>
  </section>

  <!-- CATEGORIES -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center mb-4">
        <div class="col">
          <div class="section-label">Browse By</div>
          <h2 class="section-title">Shop by <span>Category</span></h2>
        </div>
        <div class="col-auto">
          <button class="btn-primary-custom" onclick="showPage('shop')">View All <i class="fas fa-arrow-right"></i></button>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <div class="cat-card" onclick="filterCategory('dog',null);showPage('shop')">
            <span class="cat-badge">Hot</span>
            <span class="cat-icon">🐕</span>
            <div class="cat-name">Dogs</div>
            <div class="cat-count">420+ items</div>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <div class="cat-card" onclick="filterCategory('cat',null);showPage('shop')">
            <span class="cat-icon">🐈</span>
            <div class="cat-name">Cats</div>
            <div class="cat-count">380+ items</div>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <div class="cat-card" onclick="filterCategory('food',null);showPage('shop')">
            <span class="cat-icon">🥩</span>
            <div class="cat-name">Food</div>
            <div class="cat-count">290+ items</div>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <div class="cat-card" onclick="filterCategory('toys',null);showPage('shop')">
            <span class="cat-badge">New</span>
            <span class="cat-icon">🎾</span>
            <div class="cat-name">Toys</div>
            <div class="cat-count">180+ items</div>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <div class="cat-card" onclick="filterCategory('beds',null);showPage('shop')">
            <span class="cat-icon">🛏</span>
            <div class="cat-name">Beds</div>
            <div class="cat-count">95+ items</div>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
          <div class="cat-card" onclick="filterCategory('grooming',null);showPage('shop')">
            <span class="cat-icon">✂️</span>
            <div class="cat-name">Grooming</div>
            <div class="cat-count">140+ items</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FEATURED PRODUCTS -->
  <section class="py-4 pb-5" style="background:#FFF8F0;">
    <div class="container">
      <div class="row align-items-center mb-4">
        <div class="col">
          <div class="section-label">Top Picks</div>
          <h2 class="section-title">Featured <span>Products</span></h2>
        </div>
        <div class="col-auto">
          <button class="btn-primary-custom" onclick="showPage('shop')">See All <i class="fas fa-arrow-right"></i></button>
        </div>
      </div>
      <div class="row g-3" id="featuredProducts"></div>
    </div>
  </section>

  <!-- PROMO BANNERS -->
  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-6">
          <div class="promo-banner">
            <div class="section-label" style="color:rgba(255,255,255,0.7);">Limited Offer</div>
            <h3>20% Off All Dog Food</h3>
            <p>Premium nutrition for your furry companion. Use code below at checkout.</p>
            <div class="promo-code">DOGFOOD20</div>
            <br/>
            <button class="btn-primary-custom" onclick="filterCategory('food',null);showPage('shop')" style="background:white;color:var(--sage);box-shadow:none;">Shop Dog Food <i class="fas fa-arrow-right"></i></button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="promo-banner" style="background:linear-gradient(135deg,#8B5A2B,#C4751A);">
            <div class="section-label" style="color:rgba(255,255,255,0.7);">New Arrivals</div>
            <h3>Cat Luxury Collection</h3>
            <p>Indulge your feline with our new premium accessories range.</p>
            <div class="promo-code">CATLUV15</div>
            <br/>
            <button class="btn-primary-custom" onclick="filterCategory('cat',null);showPage('shop')" style="background:white;color:var(--amber-dark);box-shadow:none;">Shop Cats <i class="fas fa-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- WHY US -->
  <section class="py-5" style="background:#FFF8F0;">
    <div class="container">
      <div class="text-center mb-5">
        <div class="section-label">Why INFURNEST</div>
        <h2 class="section-title">Trusted by <span>18,000+</span> Pet Parents</h2>
      </div>
      <div class="row g-4 text-center">
        <div class="col-6 col-md-3">
          <div style="font-size:3rem;margin-bottom:12px;">🚚</div>
          <h6 style="font-weight:700;color:var(--brown);">Free Delivery</h6>
          <p style="font-size:0.82rem;color:var(--text-light);">On orders over ₱999. Same-day metro delivery available.</p>
        </div>
        <div class="col-6 col-md-3">
          <div style="font-size:3rem;margin-bottom:12px;">✅</div>
          <h6 style="font-weight:700;color:var(--brown);">Vet-Approved</h6>
          <p style="font-size:0.82rem;color:var(--text-light);">All products reviewed by licensed veterinarians.</p>
        </div>
        <div class="col-6 col-md-3">
          <div style="font-size:3rem;margin-bottom:12px;">🔄</div>
          <h6 style="font-weight:700;color:var(--brown);">Easy Returns</h6>
          <p style="font-size:0.82rem;color:var(--text-light);">30-day hassle-free returns. No questions asked.</p>
        </div>
        <div class="col-6 col-md-3">
          <div style="font-size:3rem;margin-bottom:12px;">💬</div>
          <h6 style="font-weight:700;color:var(--brown);">24/7 Support</h6>
          <p style="font-size:0.82rem;color:var(--text-light);">Our pet care team is always here to help you.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <div class="navbar-brand-logo mb-3" style="color:white;font-size:1.4rem;">
            <div class="logo-icon"><i class="fas fa-paw"></i></div>
            IN<span style="color:var(--amber-light);">FUR</span>NEST
          </div>
          <p style="font-size:0.82rem;color:rgba(255,255,255,0.6);line-height:1.7;">The Philippines' most trusted online pet store. Delivering love and care to furry families since 2020.</p>
          <div class="d-flex gap-3 mt-3">
            <button onclick="showToast('🐦 Opening Facebook page...','info')" style="background:rgba(255,255,255,0.1);border:none;color:rgba(255,255,255,0.7);width:36px;height:36px;border-radius:8px;cursor:pointer;font-size:0.9rem;transition:all 0.2s;" title="Facebook"><i class="fab fa-facebook"></i></button>
            <button onclick="showToast('📸 Opening Instagram page...','info')" style="background:rgba(255,255,255,0.1);border:none;color:rgba(255,255,255,0.7);width:36px;height:36px;border-radius:8px;cursor:pointer;font-size:0.9rem;" title="Instagram"><i class="fab fa-instagram"></i></button>
            <button onclick="showToast('🐦 Opening Twitter/X page...','info')" style="background:rgba(255,255,255,0.1);border:none;color:rgba(255,255,255,0.7);width:36px;height:36px;border-radius:8px;cursor:pointer;font-size:0.9rem;" title="Twitter"><i class="fab fa-twitter"></i></button>
          </div>
        </div>
        <div class="col-6 col-md-2">
          <h5>Shop</h5>
          <a href="#" onclick="filterCategory('dog',null);showPage('shop')">Dog Products</a>
          <a href="#" onclick="filterCategory('cat',null);showPage('shop')">Cat Products</a>
          <a href="#" onclick="filterCategory('food',null);showPage('shop')">Pet Food</a>
          <a href="#" onclick="filterCategory('toys',null);showPage('shop')">Toys</a>
        </div>
        <div class="col-6 col-md-2">
          <h5>Help</h5>
          <a href="#" onclick="showPage('contact')">Contact Us</a>
          <a href="#" onclick="showToast('📄 Opening FAQ page...','info')">FAQ</a>
          <a href="#" onclick="showToast('🔄 Opening returns page...','info')">Returns</a>
          <a href="#" onclick="showPage('about')">About Us</a>
        </div>
        <div class="col-md-4">
          <h5>Stay Updated 🐾</h5>
          <p style="font-size:0.82rem;color:rgba(255,255,255,0.6);margin-bottom:12px;">Get exclusive deals and pet care tips in your inbox.</p>
          <div class="d-flex gap-2">
            <input type="email" id="footerEmail" placeholder="Enter your email" style="background:rgba(255,255,255,0.1);border:1.5px solid rgba(255,255,255,0.2);border-radius:8px;padding:9px 13px;color:white;flex:1;font-family:inherit;font-size:0.85rem;outline:none;"/>
            <button onclick="subscribeEmail()" style="background:var(--amber);border:none;color:white;border-radius:8px;padding:9px 16px;cursor:pointer;font-weight:600;font-size:0.85rem;transition:all 0.2s;white-space:nowrap;">Subscribe</button>
          </div>
        </div>
      </div>
      <div class="footer-bottom row align-items-center">
        <div class="col-md-6"><p style="font-size:0.8rem;color:rgba(255,255,255,0.45);margin:0;">© 2025 INFURNEST. All rights reserved. Made with ❤️ for pets.</p></div>
        <div class="col-md-6 text-md-end">
          <span style="font-size:0.78rem;color:rgba(255,255,255,0.4);">🔒 Secure Payments &nbsp;·&nbsp; 🐾 Vet Approved &nbsp;·&nbsp; 🚚 Fast Delivery</span>
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- ======================================================== -->
<!-- PAGE: SHOP                                               -->
<!-- ======================================================== -->
<div class="page" id="page-shop">
  <div class="page-header">
    <div class="container">
      <div class="breadcrumb-custom">
        <span onclick="showPage('home')">Home</span><span class="sep">/</span>
        <span style="color:var(--amber-light)">Shop</span>
      </div>
      <h2>🛍️ Our Pet Shop</h2>
      <p>Explore our full collection of premium pet products</p>
    </div>
  </div>
  <div class="container py-4">
    <!-- Shop search bar -->
    <div class="search-wrap mb-4">
      <input type="text" id="shopSearch" placeholder="Search products..." oninput="renderShopProducts()" />
      <button onclick="renderShopProducts()"><i class="fas fa-search"></i></button>
    </div>
    <!-- Category tabs -->
    <div class="search-filter-tabs mb-4">
      <button class="filter-tab active" id="shopTabAll" onclick="shopFilterCategory('all',this)">All</button>
      <button class="filter-tab" onclick="shopFilterCategory('dog',this)">🐕 Dogs</button>
      <button class="filter-tab" onclick="shopFilterCategory('cat',this)">🐈 Cats</button>
      <button class="filter-tab" onclick="shopFilterCategory('food',this)">🥩 Food</button>
      <button class="filter-tab" onclick="shopFilterCategory('toys',this)">🎾 Toys</button>
      <button class="filter-tab" onclick="shopFilterCategory('beds',this)">🛏 Beds</button>
      <button class="filter-tab" onclick="shopFilterCategory('accessories',this)">👜 Accessories</button>
      <button class="filter-tab" onclick="shopFilterCategory('grooming',this)">✂️ Grooming</button>
    </div>
    <div class="row g-4">
      <!-- Sidebar Filters -->
      <div class="col-lg-3 col-md-4">
        <div class="shop-filter-sidebar">
          <h6 style="font-family:'Playfair Display',serif;font-size:1rem;color:var(--brown);margin-bottom:20px;">Filters</h6>
          <div class="filter-group">
            <h6>Pet Type</h6>
            <div class="filter-check">
              <label><input type="checkbox" id="fDog" onchange="renderShopProducts()" checked/> 🐕 Dogs</label>
              <label><input type="checkbox" id="fCat" onchange="renderShopProducts()" checked/> 🐈 Cats</label>
            </div>
          </div>
          <div class="filter-group">
            <h6>Price Range</h6>
            <div class="d-flex justify-content-between mb-2">
              <span style="font-size:0.8rem;color:var(--text-light);">₱0</span>
              <span style="font-size:0.8rem;font-weight:600;color:var(--amber);" id="priceLabel">₱5,000</span>
            </div>
            <input type="range" class="price-range" min="0" max="5000" value="5000" id="priceRange" oninput="document.getElementById('priceLabel').textContent='₱'+this.value;renderShopProducts()"/>
          </div>
          <div class="filter-group">
            <h6>Rating</h6>
            <div class="filter-check">
              <label><input type="checkbox" id="r5" onchange="renderShopProducts()" checked/> ⭐⭐⭐⭐⭐ 5 Stars</label>
              <label><input type="checkbox" id="r4" onchange="renderShopProducts()" checked/> ⭐⭐⭐⭐ 4+ Stars</label>
              <label><input type="checkbox" id="r3" onchange="renderShopProducts()" checked/> ⭐⭐⭐ 3+ Stars</label>
            </div>
          </div>
          <div class="filter-group">
            <h6>Sort By</h6>
            <select class="sort-select" id="shopSort" onchange="renderShopProducts()">
              <option value="featured">Featured</option>
              <option value="price-asc">Price: Low to High</option>
              <option value="price-desc">Price: High to Low</option>
              <option value="rating">Best Rating</option>
              <option value="name">Name A–Z</option>
            </select>
          </div>
          <button onclick="resetFilters()" style="background:var(--cream);border:1.5px solid var(--blush);border-radius:9px;padding:9px;width:100%;font-size:0.82rem;font-weight:600;color:var(--text-mid);cursor:pointer;transition:all 0.2s;" onmouseover="this.style.borderColor='var(--amber)'" onmouseout="this.style.borderColor='var(--blush)'">🔄 Reset Filters</button>
        </div>
      </div>
      <!-- Products Grid -->
      <div class="col-lg-9 col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="results-count" id="shopResultsCount"><strong>0</strong> products found</div>
        </div>
        <div class="row g-3" id="shopProductsGrid"></div>
      </div>
    </div>
  </div>
</div>

<!-- ======================================================== -->
<!-- PAGE: PRODUCT DETAIL                                     -->
<!-- ======================================================== -->
<div class="page" id="page-product">
  <div class="page-header">
    <div class="container">
      <div class="breadcrumb-custom">
        <span onclick="showPage('home')">Home</span><span class="sep">/</span>
        <span onclick="showPage('shop')">Shop</span><span class="sep">/</span>
        <span style="color:var(--amber-light)" id="detailBreadcrumb">Product</span>
      </div>
      <h2 id="detailPageTitle">Product Detail</h2>
    </div>
  </div>
  <div class="container py-5" id="productDetailContent"></div>
</div>

<!-- ======================================================== -->
<!-- PAGE: CART                                               -->
<!-- ======================================================== -->
<div class="page" id="page-cart">
  <div class="page-header">
    <div class="container">
      <div class="breadcrumb-custom">
        <span onclick="showPage('home')">Home</span><span class="sep">/</span>
        <span style="color:var(--amber-light)">Cart</span>
      </div>
      <h2>🛒 Your Cart</h2>
    </div>
  </div>
  <div class="container py-4">
    <div id="cartContent"></div>
  </div>
</div>

<!-- ======================================================== -->
<!-- PAGE: CHECKOUT                                           -->
<!-- ======================================================== -->
<div class="page" id="page-checkout">
  <div class="page-header">
    <div class="container">
      <div class="breadcrumb-custom">
        <span onclick="showPage('home')">Home</span><span class="sep">/</span>
        <span onclick="showPage('cart')">Cart</span><span class="sep">/</span>
        <span style="color:var(--amber-light)">Checkout</span>
      </div>
      <h2>📋 Checkout</h2>
    </div>
  </div>
  <div class="container py-4">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="checkout-section">
          <h5>📍 Shipping Information</h5>
          <div class="row g-3">
            <div class="col-sm-6"><div class="form-group-custom"><label>First Name</label><input type="text" placeholder="Juan"/></div></div>
            <div class="col-sm-6"><div class="form-group-custom"><label>Last Name</label><input type="text" placeholder="dela Cruz"/></div></div>
            <div class="col-12"><div class="form-group-custom"><label>Email Address</label><input type="email" placeholder="juan@example.com"/></div></div>
            <div class="col-12"><div class="form-group-custom"><label>Phone Number</label><input type="tel" placeholder="+63 9XX XXX XXXX"/></div></div>
            <div class="col-12"><div class="form-group-custom"><label>Complete Address</label><input type="text" placeholder="House/Unit No., Street, Barangay"/></div></div>
            <div class="col-sm-6"><div class="form-group-custom"><label>City / Municipality</label><input type="text" placeholder="Quezon City"/></div></div>
            <div class="col-sm-6"><div class="form-group-custom"><label>Province</label><select><option>Metro Manila</option><option>Cebu</option><option>Davao</option><option>Laguna</option><option>Cavite</option><option>Bulacan</option><option>Other</option></select></div></div>
            <div class="col-sm-6"><div class="form-group-custom"><label>ZIP Code</label><input type="text" placeholder="1100"/></div></div>
            <div class="col-sm-6"><div class="form-group-custom"><label>Delivery Type</label><select><option>Standard (3-5 days)</option><option>Express (1-2 days)</option><option>Same Day Metro</option></select></div></div>
          </div>
        </div>
        <div class="checkout-section">
          <h5>💳 Payment Method</h5>
          <div class="payment-option selected" onclick="selectPayment(this)" id="pay1">
            <div class="payment-icon">💳</div>
            <div><div style="font-weight:700;font-size:0.88rem;color:var(--brown);">Credit / Debit Card</div><div style="font-size:0.78rem;color:var(--text-light);">Visa, Mastercard, JCB</div></div>
          </div>
          <div class="payment-option" onclick="selectPayment(this)" id="pay2">
            <div class="payment-icon">📱</div>
            <div><div style="font-weight:700;font-size:0.88rem;color:var(--brown);">GCash / Maya</div><div style="font-size:0.78rem;color:var(--text-light);">Mobile wallet payment</div></div>
          </div>
          <div class="payment-option" onclick="selectPayment(this)" id="pay3">
            <div class="payment-icon">🏦</div>
            <div><div style="font-weight:700;font-size:0.88rem;color:var(--brown);">Bank Transfer</div><div style="font-size:0.78rem;color:var(--text-light);">BPI, BDO, UnionBank</div></div>
          </div>
          <div class="payment-option" onclick="selectPayment(this)" id="pay4">
            <div class="payment-icon">💵</div>
            <div><div style="font-weight:700;font-size:0.88rem;color:var(--brown);">Cash on Delivery</div><div style="font-size:0.78rem;color:var(--text-light);">Pay when you receive</div></div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="order-summary">
          <h5 style="font-family:'Playfair Display',serif;font-size:1.1rem;color:var(--brown);margin-bottom:18px;padding-bottom:12px;border-bottom:1px solid var(--blush);">🧾 Order Summary</h5>
          <div id="checkoutItems"></div>
          <div class="order-row"><span>Subtotal</span><span id="coSubtotal">₱0.00</span></div>
          <div class="order-row"><span>Shipping</span><span style="color:var(--sage);font-weight:600;">FREE</span></div>
          <div class="order-row"><span>Discount</span><span style="color:#E84A2A;">−₱0.00</span></div>
          <div id="promoRow" style="display:none;" class="order-row"><span>Promo Code</span><span style="color:var(--sage);font-weight:600;" id="promoDiscount">−₱0.00</span></div>
          <div class="order-row" style="border-top:2px solid var(--blush);padding-top:14px;"><strong>Total</strong><strong id="coTotal" style="font-size:1.2rem;color:var(--amber-dark);">₱0.00</strong></div>
          <div class="d-flex gap-2 mt-3">
            <input type="text" id="promoCode" placeholder="Promo code" style="flex:1;border:1.5px solid var(--blush);border-radius:9px;padding:9px 12px;font-size:0.85rem;font-family:inherit;outline:none;"/>
            <button onclick="applyPromo()" style="background:var(--sage);border:none;color:white;border-radius:9px;padding:9px 16px;font-weight:600;font-size:0.82rem;cursor:pointer;white-space:nowrap;">Apply</button>
          </div>
          <button class="checkout-btn" onclick="placeOrder()">Place Order 🐾 →</button>
          <p style="font-size:0.75rem;color:var(--text-light);text-align:center;margin-top:10px;">🔒 Your payment info is secure &amp; encrypted</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ======================================================== -->
<!-- PAGE: ORDER SUCCESS                                      -->
<!-- ======================================================== -->
<div class="page" id="page-success">
  <div class="container py-5 text-center">
    <div style="max-width:500px;margin:0 auto;background:white;border-radius:24px;padding:50px 40px;box-shadow:var(--shadow);">
      <div class="success-icon">🎉</div>
      <h2 style="font-family:'Playfair Display',serif;font-size:2rem;color:var(--brown);margin:16px 0 10px;">Order Placed!</h2>
      <p style="color:var(--text-light);margin-bottom:6px;">Your furry friend's goodies are on their way 🐾</p>
      <p style="font-size:0.85rem;color:var(--text-light);margin-bottom:28px;">Order confirmation has been sent to your email.</p>
      <div style="background:var(--cream);border-radius:12px;padding:18px;margin-bottom:24px;">
        <div style="font-size:0.78rem;color:var(--text-light);margin-bottom:4px;">Order Number</div>
        <div style="font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:var(--amber);" id="orderNumber">#INF-00001</div>
      </div>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <button class="btn-primary-custom" onclick="showPage('home')"><i class="fas fa-home"></i> Back to Home</button>
        <button class="btn-outline-custom" onclick="showPage('shop')" style="color:var(--brown);border-color:var(--blush);">Continue Shopping</button>
      </div>
    </div>
  </div>
</div>

<!-- ======================================================== -->
<!-- PAGE: WISHLIST                                           -->
<!-- ======================================================== -->
<div class="page" id="page-wishlist">
  <div class="page-header">
    <div class="container">
      <div class="breadcrumb-custom">
        <span onclick="showPage('home')">Home</span><span class="sep">/</span>
        <span style="color:var(--amber-light)">Wishlist</span>
      </div>
      <h2>❤️ My Wishlist</h2>
    </div>
  </div>
  <div class="container py-4">
    <div id="wishlistContent"></div>
  </div>
</div>

<!-- ======================================================== -->
<!-- PAGE: ABOUT                                              -->
<!-- ======================================================== -->
<div class="page" id="page-about">
  <div class="page-header">
    <div class="container">
      <div class="breadcrumb-custom">
        <span onclick="showPage('home')">Home</span><span class="sep">/</span>
        <span style="color:var(--amber-light)">About</span>
      </div>
      <h2>🐾 About INFURNEST</h2>
    </div>
  </div>
  <div class="container py-5">
    <div class="row align-items-center g-5 mb-5">
      <div class="col-md-6">
        <div class="section-label">Our Story</div>
        <h2 class="section-title" style="margin-bottom:20px;">Born from <span>Love</span> for Pets</h2>
        <p style="color:var(--text-mid);line-height:1.8;margin-bottom:16px;">INFURNEST started in 2020 when two pet parents — frustrated with the lack of quality, affordable pet products in the Philippines — decided to build something better. What began as a small online store has grown into the country's most beloved pet e-commerce destination.</p>
        <p style="color:var(--text-mid);line-height:1.8;margin-bottom:24px;">We work directly with trusted manufacturers and veterinary consultants to ensure every product we carry meets the highest standards of safety, nutrition, and quality. Your pet deserves nothing less.</p>
        <div class="row g-3">
          <div class="col-6"><div style="background:var(--cream);border-radius:12px;padding:18px;text-align:center;"><div style="font-family:'Playfair Display',serif;font-size:2rem;font-weight:900;color:var(--amber);">18K+</div><div style="font-size:0.8rem;color:var(--text-light);">Happy Pet Families</div></div></div>
          <div class="col-6"><div style="background:var(--cream);border-radius:12px;padding:18px;text-align:center;"><div style="font-family:'Playfair Display',serif;font-size:2rem;font-weight:900;color:var(--amber);">2,400+</div><div style="font-size:0.8rem;color:var(--text-light);">Products Available</div></div></div>
          <div class="col-6"><div style="background:var(--cream);border-radius:12px;padding:18px;text-align:center;"><div style="font-family:'Playfair Display',serif;font-size:2rem;font-weight:900;color:var(--amber);">4.9★</div><div style="font-size:0.8rem;color:var(--text-light);">Average Rating</div></div></div>
          <div class="col-6"><div style="background:var(--cream);border-radius:12px;padding:18px;text-align:center;"><div style="font-family:'Playfair Display',serif;font-size:2rem;font-weight:900;color:var(--amber);">24/7</div><div style="font-size:0.8rem;color:var(--text-light);">Customer Support</div></div></div>
        </div>
      </div>
      <div class="col-md-6 text-center">
        <div style="font-size:12rem;line-height:1;filter:drop-shadow(0 20px 40px rgba(61,43,31,0.15));">🐶🐱</div>
      </div>
    </div>
    <div class="mb-5">
      <div class="text-center mb-4">
        <div class="section-label">Our Team</div>
        <h2 class="section-title">The People Behind <span>INFURNEST</span></h2>
      </div>
      <div class="row g-4">
        <div class="col-sm-6 col-md-3"><div class="team-card"><div class="team-avatar">👩‍💼</div><h6 style="font-weight:700;color:var(--brown);">Maria Santos</h6><div style="font-size:0.78rem;color:var(--amber);margin-bottom:8px;">Co-Founder & CEO</div><p style="font-size:0.8rem;color:var(--text-light);">Dog mom of 3. Passionate about quality and animal welfare.</p></div></div>
        <div class="col-sm-6 col-md-3"><div class="team-card"><div class="team-avatar">👨‍💻</div><h6 style="font-weight:700;color:var(--brown);">Carlo Reyes</h6><div style="font-size:0.78rem;color:var(--amber);margin-bottom:8px;">Co-Founder & CTO</div><p style="font-size:0.8rem;color:var(--text-light);">Cat dad. Builds tech that makes pet shopping easy.</p></div></div>
        <div class="col-sm-6 col-md-3"><div class="team-card"><div class="team-avatar">👩‍⚕️</div><h6 style="font-weight:700;color:var(--brown);">Dr. Ana Cruz</h6><div style="font-size:0.78rem;color:var(--amber);margin-bottom:8px;">Veterinary Advisor</div><p style="font-size:0.8rem;color:var(--text-light);">Licensed vet. Reviews all our food and health products.</p></div></div>
        <div class="col-sm-6 col-md-3"><div class="team-card"><div class="team-avatar">👩‍🎨</div><h6 style="font-weight:700;color:var(--brown);">Bea Lim</h6><div style="font-size:0.78rem;color:var(--amber);margin-bottom:8px;">Head of Products</div><p style="font-size:0.8rem;color:var(--text-light);">Curates every item in our store with love.</p></div></div>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-6">
        <div style="background:linear-gradient(135deg,var(--brown),var(--brown-mid));border-radius:var(--radius);padding:36px;color:white;">
          <h3 style="font-family:'Playfair Display',serif;font-size:1.4rem;margin-bottom:14px;">🌱 Our Mission</h3>
          <p style="color:rgba(255,255,255,0.75);line-height:1.8;font-size:0.9rem;">To make premium, vet-approved pet products accessible to every Filipino pet parent — with unbeatable prices, fast delivery, and genuine care for animal welfare.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div style="background:linear-gradient(135deg,var(--sage),#4A7A4E);border-radius:var(--radius);padding:36px;color:white;">
          <h3 style="font-family:'Playfair Display',serif;font-size:1.4rem;margin-bottom:14px;">🌍 Our Vision</h3>
          <p style="color:rgba(255,255,255,0.75);line-height:1.8;font-size:0.9rem;">A Philippines where every pet is well-nourished, happy, and loved — and where being a responsible pet parent is made easy and affordable for all.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ======================================================== -->
<!-- PAGE: CONTACT                                            -->
<!-- ======================================================== -->
<div class="page" id="page-contact">
  <div class="page-header">
    <div class="container">
      <div class="breadcrumb-custom">
        <span onclick="showPage('home')">Home</span><span class="sep">/</span>
        <span style="color:var(--amber-light)">Contact</span>
      </div>
      <h2>✉️ Get In Touch</h2>
      <p>We'd love to hear from you — or your pet!</p>
    </div>
  </div>
  <div class="container py-5">
    <div class="row g-5">
      <div class="col-md-5">
        <div class="section-label">Contact Info</div>
        <h2 class="section-title" style="margin-bottom:24px;">We're Here <span>For You</span></h2>
        <div class="d-flex flex-column gap-3">
          <div class="contact-info-card">
            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div><div style="font-weight:700;color:var(--brown);font-size:0.9rem;">Office Address</div><div style="font-size:0.82rem;color:var(--text-light);margin-top:4px;">123 Katipunan Ave., Quezon City, Metro Manila, Philippines</div></div>
          </div>
          <div class="contact-info-card">
            <div class="contact-icon"><i class="fas fa-phone"></i></div>
            <div><div style="font-weight:700;color:var(--brown);font-size:0.9rem;">Phone</div><div style="font-size:0.82rem;color:var(--text-light);margin-top:4px;">+63 (02) 8888-INFUR · 0917-INFURNEST</div></div>
          </div>
          <div class="contact-info-card">
            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
            <div><div style="font-weight:700;color:var(--brown);font-size:0.9rem;">Email</div><div style="font-size:0.82rem;color:var(--text-light);margin-top:4px;">hello@infurnest.ph · support@infurnest.ph</div></div>
          </div>
          <div class="contact-info-card">
            <div class="contact-icon"><i class="fas fa-clock"></i></div>
            <div><div style="font-weight:700;color:var(--brown);font-size:0.9rem;">Business Hours</div><div style="font-size:0.82rem;color:var(--text-light);margin-top:4px;">Mon–Sat: 8:00 AM – 6:00 PM · Sun: 9:00 AM – 5:00 PM</div></div>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div style="background:white;border-radius:var(--radius);padding:36px;box-shadow:var(--shadow);">
          <h5 style="font-family:'Playfair Display',serif;color:var(--brown);margin-bottom:24px;">Send Us a Message 🐾</h5>
          <div class="row g-3">
            <div class="col-sm-6"><div class="form-group-custom"><label>Your Name</label><input type="text" id="cName" placeholder="Juan dela Cruz"/></div></div>
            <div class="col-sm-6"><div class="form-group-custom"><label>Email</label><input type="email" id="cEmail" placeholder="juan@example.com"/></div></div>
            <div class="col-12"><div class="form-group-custom"><label>Subject</label><select id="cSubject"><option>General Inquiry</option><option>Order Support</option><option>Product Question</option><option>Wholesale/Bulk</option><option>Partnership</option><option>Complaint</option></select></div></div>
            <div class="col-12"><div class="form-group-custom"><label>Message</label><textarea id="cMessage" rows="5" placeholder="Tell us how we can help you or your pet..."></textarea></div></div>
          </div>
          <button class="btn-primary-custom w-100 mt-2" onclick="sendContactForm()" style="justify-content:center;padding:14px;font-size:0.95rem;"><i class="fas fa-paper-plane"></i> Send Message</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ================================================================ -->
<!-- JAVASCRIPT                                                        -->
<!-- ================================================================ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ==================== DATA ====================
const products = [
  { id:1, name:'Royal Canin Adult Dog Food', emoji:'🥘', category:'food', pet:'dog', price:1299, oldPrice:1599, rating:5, reviews:124, badge:'bestseller', desc:'Complete balanced nutrition for adult dogs. Scientifically formulated for optimal health.', details:'Supports healthy digestion, a shiny coat, and strong muscles. Suitable for all breeds.', brand:'Royal Canin', weight:'2kg', ageGroup:'Adult', inStock:true },
  { id:2, name:'Interactive Feather Cat Toy', emoji:'🪶', category:'toys', pet:'cat', price:349, oldPrice:null, rating:5, reviews:87, badge:'new', desc:'Retractable feather wand toy. Keeps cats mentally stimulated and physically active.', details:'Telescopic rod extends up to 90cm. Feather attachments are replaceable.', brand:'PetPlay', weight:'150g', ageGroup:'All Ages', inStock:true },
  { id:3, name:'Cozy Donut Dog Bed', emoji:'🛏', category:'beds', pet:'dog', price:2199, oldPrice:2799, rating:4, reviews:56, badge:'sale', desc:'Ultra-plush donut-shaped dog bed. Self-warming design for deep, restful sleep.', details:'Machine washable cover. Available in brown, grey, and cream. Supports joints.', brand:'PawDreams', weight:'1.2kg', ageGroup:'All Sizes', inStock:true },
  { id:4, name:'Cat Dental Treats', emoji:'🦷', category:'food', pet:'cat', price:299, oldPrice:null, rating:4, reviews:43, badge:'new', desc:'Chicken-flavored dental chews that clean teeth and freshen breath naturally.', details:'Vet-recommended formula. 60 treats per bag. Reduces tartar buildup.', brand:'Whiskas Care', weight:'200g', ageGroup:'Adult', inStock:true },
  { id:5, name:'GPS Dog Collar Tracker', emoji:'📡', category:'accessories', pet:'dog', price:3499, oldPrice:3999, rating:5, reviews:92, badge:'bestseller', desc:'Real-time GPS tracking collar. Monitor your dog\'s location via smartphone app.', details:'Waterproof, rechargeable, works nationwide. Compatible with iOS & Android.', brand:'PetTrack', weight:'80g', ageGroup:'All Breeds', inStock:true },
  { id:6, name:'Cat Grooming Brush Set', emoji:'✂️', category:'grooming', pet:'cat', price:649, oldPrice:null, rating:4, reviews:31, badge:'', desc:'Professional 3-piece grooming set. Deshedding brush, comb, and nail clipper.', details:'Ergonomic handles. Stainless steel blades. Suitable for short and long coats.', brand:'GloomGroom', weight:'300g', ageGroup:'All Ages', inStock:true },
  { id:7, name:'Orthopedic Cat Bed', emoji:'😴', category:'beds', pet:'cat', price:1799, oldPrice:2299, rating:5, reviews:68, badge:'sale', desc:'Memory foam orthopedic bed with removable, washable cover. Perfect for senior cats.', details:'High-density memory foam relieves pressure points. Waterproof inner lining.', brand:'PawDreams', weight:'900g', ageGroup:'All Ages', inStock:true },
  { id:8, name:'Natural Dog Shampoo', emoji:'🛁', category:'grooming', pet:'dog', price:459, oldPrice:null, rating:4, reviews:29, badge:'', desc:'Oatmeal & aloe vera formula. Gentle on sensitive skin. Dermatologist-tested.', details:'pH-balanced, sulfate-free, no artificial fragrances. 500ml bottle.', brand:'PurePaws', weight:'550g', ageGroup:'All Ages', inStock:true },
  { id:9, name:'Dog Rope Chew Toy Set', emoji:'🪢', category:'toys', pet:'dog', price:399, oldPrice:null, rating:4, reviews:47, badge:'new', desc:'Set of 5 durable cotton rope toys. Promotes dental health and satisfies chewing instincts.', details:'100% natural cotton, no synthetic dyes. Machine washable. Great for tug-of-war.', brand:'RopePlay', weight:'500g', ageGroup:'All Ages', inStock:true },
  { id:10, name:'Premium Cat Wet Food Pack', emoji:'🍖', category:'food', pet:'cat', price:799, oldPrice:999, rating:5, reviews:108, badge:'sale', desc:'12-pack of gourmet wet food in tuna, chicken, and salmon flavors. No preservatives.', details:'Real meat first ingredient. High protein, low carb. Suitable for all life stages.', brand:'Felix Gourmet', weight:'1.4kg', ageGroup:'Adult', inStock:true },
  { id:11, name:'Cat Window Perch', emoji:'🪟', category:'accessories', pet:'cat', price:1149, oldPrice:null, rating:4, reviews:38, badge:'', desc:'Suction-cup mounted window seat. Lets cats enjoy a birds-eye view in comfort.', details:'Holds up to 15kg. UV-resistant fabric. Easy installation, no tools needed.', brand:'CatView', weight:'700g', ageGroup:'All Ages', inStock:true },
  { id:12, name:'Dog Training Clicker Kit', emoji:'🔔', category:'accessories', pet:'dog', price:299, oldPrice:null, rating:5, reviews:64, badge:'new', desc:'Professional training clicker with wrist strap + 50-page training guide included.', details:'Loud, clear click sound. Ergonomic design. Works for basic and advanced training.', brand:'SmartPet', weight:'100g', ageGroup:'All Ages', inStock:true },
  { id:13, name:'Cat Scratching Tower', emoji:'🏰', category:'accessories', pet:'cat', price:2899, oldPrice:3499, rating:5, reviews:91, badge:'bestseller', desc:'5-level cat tower with scratching posts, hammock, and dangling toys. Saves your furniture.', details:'Sisal rope scratching posts. Stable base. Easy assembly. Accommodates multiple cats.', brand:'CatKingdom', weight:'5.2kg', ageGroup:'All Ages', inStock:true },
  { id:14, name:'Puppy Starter Pack', emoji:'🎁', category:'food', pet:'dog', price:1599, oldPrice:1999, rating:5, reviews:55, badge:'sale', desc:'Complete starter kit for new puppies. Includes food, toys, collar, and care guide.', details:'Age-appropriate nutrition. Soft puppy toys. Adjustable collar. PDF care guide.', brand:'INFURNEST', weight:'2.5kg', ageGroup:'Puppy', inStock:true },
  { id:15, name:'Automatic Pet Water Fountain', emoji:'⛲', category:'accessories', pet:'dog', price:1899, oldPrice:null, rating:4, reviews:73, badge:'', desc:'Circulating water fountain keeps water fresh and oxygenated. 2.5L capacity.', details:'Ultra-quiet pump. 3-stage filtration. LED water level indicator. BPA-free.', brand:'HydraPet', weight:'800g', ageGroup:'All Ages', inStock:true },
  { id:16, name:'Cat Litter Premium Clay', emoji:'🪣', category:'accessories', pet:'cat', price:549, oldPrice:null, rating:4, reviews:36, badge:'', desc:'Clumping clay litter with activated charcoal odor control. 7kg bag.', details:'99% dust-free. Fast clumping formula. 4-week odor protection. Unscented.', brand:'CleanPaws', weight:'7kg', ageGroup:'All Ages', inStock:true },
];

let cart = [];
let wishlist = [];
let activeShopCategory = 'all';
let currentProductId = null;

// ==================== NAVIGATION ====================
function showPage(name) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.getElementById('page-' + name).classList.add('active');
  window.scrollTo({ top: 0, behavior: 'smooth' });
  const backBtn = document.getElementById('backHomeBtn');
  backBtn.style.display = name === 'home' ? 'none' : 'flex';
  // Update nav active state
  document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active-nav'));
  const navEl = document.getElementById('nav-' + name);
  if (navEl) navEl.classList.add('active-nav');
  // Render page-specific content
  if (name === 'shop') renderShopProducts();
  if (name === 'cart') renderCart();
  if (name === 'wishlist') renderWishlist();
  if (name === 'checkout') renderCheckout();
}

function toggleMobileMenu() {
  const m = document.getElementById('mobileMenu');
  m.classList.toggle('open');
}

// ==================== PRODUCTS DATA ====================
function getFeaturedProducts() { return products.filter(p => p.badge === 'bestseller' || p.rating === 5).slice(0, 8); }

function renderProductCard(p, container) {
  const stars = '⭐'.repeat(p.rating);
  const col = document.createElement('div');
  col.className = 'col-6 col-md-4 col-lg-3';
  col.innerHTML = `
    <div class="product-card" onclick="viewProduct(${p.id})">
      <div class="product-img">
        ${p.badge ? `<span class="product-badge ${p.badge==='sale'?'sale':p.badge==='new'?'new':''}">${p.badge==='bestseller'?'🏆 Best Seller':p.badge==='sale'?'🔥 Sale':p.badge==='new'?'✨ New':p.badge}</span>` : ''}
        <button class="wishlist-btn ${wishlist.find(w=>w.id===p.id)?'active':''}" onclick="event.stopPropagation();toggleWishlist(${p.id},this)">
          <i class="${wishlist.find(w=>w.id===p.id)?'fas':'far'} fa-heart"></i>
        </button>
        <span>${p.emoji}</span>
      </div>
      <div class="product-body">
        <div class="product-pet-tag">${p.pet==='dog'?'🐕 Dog':'🐈 Cat'}</div>
        <div class="product-name">${p.name}</div>
        <div class="product-desc">${p.desc}</div>
        <div class="product-stars">${stars} <span>(${p.reviews})</span></div>
        <div class="product-price-row">
          <div class="product-price">
            ${p.oldPrice ? `<span class="old-price">₱${p.oldPrice.toLocaleString()}</span>` : ''}
            ₱${p.price.toLocaleString()}
          </div>
          <button class="add-cart-btn" onclick="event.stopPropagation();addToCart(${p.id})">
            <i class="fas fa-plus"></i> Add
          </button>
        </div>
      </div>
    </div>`;
  container.appendChild(col);
}

// ==================== FEATURED PRODUCTS ====================
function renderFeatured() {
  const container = document.getElementById('featuredProducts');
  container.innerHTML = '';
  getFeaturedProducts().forEach(p => renderProductCard(p, container));
}

// ==================== SEARCH (HOME) ====================
let searchTimeout;
function liveSearch(val) {
  clearTimeout(searchTimeout);
  searchTimeout = setTimeout(() => {
    if (val.trim().length > 0) {
      activeShopCategory = 'all';
      showPage('shop');
      document.getElementById('shopSearch').value = val;
      renderShopProducts();
    }
  }, 500);
}

function doSearch() {
  const val = document.getElementById('heroSearch').value.trim();
  if (val) {
    activeShopCategory = 'all';
    showPage('shop');
    document.getElementById('shopSearch').value = val;
    renderShopProducts();
  }
}

function filterCategory(cat, btn) {
  activeShopCategory = cat;
  if (btn) {
    document.querySelectorAll('.search-filter-tabs .filter-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');
  }
}

// ==================== SHOP PAGE ====================
function shopFilterCategory(cat, btn) {
  activeShopCategory = cat;
  document.querySelectorAll('#page-shop .filter-tab').forEach(t => t.classList.remove('active'));
  if (btn) btn.classList.add('active');
  renderShopProducts();
}

function renderShopProducts() {
  const container = document.getElementById('shopProductsGrid');
  container.innerHTML = '';
  const search = (document.getElementById('shopSearch')?.value || '').toLowerCase();
  const maxPrice = parseInt(document.getElementById('priceRange')?.value || 5000);
  const fDog = document.getElementById('fDog')?.checked ?? true;
  const fCat = document.getElementById('fCat')?.checked ?? true;
  const r5 = document.getElementById('r5')?.checked ?? true;
  const r4 = document.getElementById('r4')?.checked ?? true;
  const r3 = document.getElementById('r3')?.checked ?? true;
  const sort = document.getElementById('shopSort')?.value || 'featured';

  let filtered = products.filter(p => {
    if (activeShopCategory !== 'all' && p.category !== activeShopCategory && p.pet !== activeShopCategory) return false;
    if (!fDog && p.pet === 'dog') return false;
    if (!fCat && p.pet === 'cat') return false;
    if (p.price > maxPrice) return false;
    if (!r5 && p.rating === 5) return false;
    if (!r4 && p.rating === 4) return false;
    if (!r3 && p.rating === 3) return false;
    if (search && !p.name.toLowerCase().includes(search) && !p.desc.toLowerCase().includes(search) && !p.category.toLowerCase().includes(search) && !p.pet.toLowerCase().includes(search)) return false;
    return true;
  });

  // Sort
  if (sort === 'price-asc') filtered.sort((a,b) => a.price - b.price);
  else if (sort === 'price-desc') filtered.sort((a,b) => b.price - a.price);
  else if (sort === 'rating') filtered.sort((a,b) => b.rating - a.rating);
  else if (sort === 'name') filtered.sort((a,b) => a.name.localeCompare(b.name));

  document.getElementById('shopResultsCount').innerHTML = `<strong>${filtered.length}</strong> product${filtered.length!==1?'s':''} found`;

  if (filtered.length === 0) {
    container.innerHTML = `<div class="col-12"><div class="no-results"><div class="no-results-icon">🔍</div><h5 style="color:var(--brown);">No products found</h5><p style="color:var(--text-light);margin-bottom:16px;">Try adjusting your search or filters</p><button class="btn-primary-custom" onclick="resetFilters()">Reset Filters</button></div></div>`;
    return;
  }
  filtered.forEach(p => renderProductCard(p, container));
}

function resetFilters() {
  activeShopCategory = 'all';
  if (document.getElementById('shopSearch')) document.getElementById('shopSearch').value = '';
  if (document.getElementById('priceRange')) { document.getElementById('priceRange').value = 5000; document.getElementById('priceLabel').textContent = '₱5,000'; }
  if (document.getElementById('fDog')) { document.getElementById('fDog').checked = true; document.getElementById('fCat').checked = true; }
  if (document.getElementById('r5')) { document.getElementById('r5').checked = true; document.getElementById('r4').checked = true; document.getElementById('r3').checked = true; }
  if (document.getElementById('shopSort')) document.getElementById('shopSort').value = 'featured';
  document.querySelectorAll('#page-shop .filter-tab').forEach(t => t.classList.remove('active'));
  document.getElementById('shopTabAll').classList.add('active');
  renderShopProducts();
}

// ==================== PRODUCT DETAIL ====================
function viewProduct(id) {
  currentProductId = id;
  const p = products.find(pr => pr.id === id);
  if (!p) return;
  document.getElementById('detailBreadcrumb').textContent = p.name;
  document.getElementById('detailPageTitle').textContent = p.name;
  const stars = '⭐'.repeat(p.rating) + '☆'.repeat(5-p.rating);
  const isWishlisted = !!wishlist.find(w => w.id === id);
  document.getElementById('productDetailContent').innerHTML = `
    <div class="row g-5">
      <div class="col-md-5">
        <div class="detail-img-box">${p.emoji}</div>
        <div class="d-flex gap-2 mt-3 justify-content-center">
          ${[p.emoji,p.emoji,p.emoji].map((e,i)=>`<div style="background:var(--cream);border-radius:10px;padding:14px;cursor:pointer;border:2px solid ${i===0?'var(--amber)':'var(--blush)'};">${e}</div>`).join('')}
        </div>
      </div>
      <div class="col-md-7">
        <div class="d-flex gap-2 flex-wrap mb-2">
          <span class="badge-pet ${p.pet==='dog'?'badge-dog':'badge-cat'}">${p.pet==='dog'?'🐕 Dog':'🐈 Cat'}</span>
          <span class="badge-pet" style="background:rgba(61,43,31,0.08);color:var(--brown);">📦 ${p.category.charAt(0).toUpperCase()+p.category.slice(1)}</span>
          ${p.badge ? `<span class="product-badge" style="position:static;display:inline-flex;">${p.badge==='bestseller'?'🏆 Best Seller':p.badge==='sale'?'🔥 On Sale':p.badge==='new'?'✨ New Arrival':p.badge}</span>` : ''}
        </div>
        <h3 style="font-family:'Playfair Display',serif;font-size:1.8rem;color:var(--brown);font-weight:900;margin-bottom:10px;">${p.name}</h3>
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
          <span style="color:#F5B300;font-size:1.1rem;">${stars}</span>
          <span style="font-size:0.85rem;color:var(--text-light);">${p.reviews} reviews</span>
          <span style="font-size:0.85rem;color:${p.inStock?'var(--sage)':'#E84A2A'};font-weight:600;">${p.inStock?'✅ In Stock':'❌ Out of Stock'}</span>
        </div>
        <div style="margin-bottom:20px;">
          ${p.oldPrice ? `<span style="font-size:1rem;color:var(--text-light);text-decoration:line-through;margin-right:10px;">₱${p.oldPrice.toLocaleString()}</span>` : ''}
          <span style="font-family:'Playfair Display',serif;font-size:2.2rem;font-weight:900;color:var(--amber-dark);">₱${p.price.toLocaleString()}</span>
          ${p.oldPrice ? `<span style="font-size:0.82rem;background:#E84A2A;color:white;border-radius:5px;padding:3px 7px;margin-left:10px;">Save ₱${(p.oldPrice-p.price).toLocaleString()}</span>` : ''}
        </div>
        <p style="color:var(--text-mid);line-height:1.8;margin-bottom:20px;">${p.details}</p>
        <div style="background:var(--cream);border-radius:12px;padding:16px;margin-bottom:22px;">
          <div class="row g-2" style="font-size:0.82rem;">
            <div class="col-6"><span style="color:var(--text-light);">Brand:</span> <strong style="color:var(--brown);">${p.brand}</strong></div>
            <div class="col-6"><span style="color:var(--text-light);">Weight:</span> <strong style="color:var(--brown);">${p.weight}</strong></div>
            <div class="col-6"><span style="color:var(--text-light);">Age Group:</span> <strong style="color:var(--brown);">${p.ageGroup}</strong></div>
            <div class="col-6"><span style="color:var(--text-light);">Pet:</span> <strong style="color:var(--brown);">${p.pet==='dog'?'🐕 Dogs':'🐈 Cats'}</strong></div>
          </div>
        </div>
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:20px;flex-wrap:wrap;">
          <label style="font-size:0.82rem;font-weight:600;color:var(--brown);">Quantity:</label>
          <div class="quantity-box">
            <button onclick="changeQty(-1)">−</button>
            <input type="number" id="detailQty" value="1" min="1" max="99"/>
            <button onclick="changeQty(1)">+</button>
          </div>
        </div>
        <div class="d-flex gap-3 flex-wrap">
          <button class="btn-primary-custom" onclick="addToCartDetail(${p.id})" style="flex:1;justify-content:center;"><i class="fas fa-shopping-bag"></i> Add to Cart</button>
          <button onclick="toggleWishlistDetail(${p.id})" id="detailWishBtn" style="background:${isWishlisted?'rgba(232,74,42,0.1)':'var(--cream)'};border:1.5px solid ${isWishlisted?'#E84A2A':'var(--blush)'};border-radius:12px;padding:12px 18px;cursor:pointer;color:${isWishlisted?'#E84A2A':'var(--text-light)'};font-size:1rem;transition:all 0.2s;"><i class="${isWishlisted?'fas':'far'} fa-heart"></i></button>
        </div>
        <div class="d-flex gap-3 mt-3 flex-wrap" style="font-size:0.78rem;color:var(--text-light);">
          <span>🚚 Free delivery on orders ₱999+</span>
          <span>🔄 30-day returns</span>
          <span>✅ Vet approved</span>
        </div>
      </div>
    </div>
    <!-- TABS -->
    <div class="mt-5">
      <div style="border-bottom:1.5px solid var(--blush);display:flex;gap:0;overflow-x:auto;">
        <button class="tab-btn active" onclick="switchTab('desc',this)">Description</button>
        <button class="tab-btn" onclick="switchTab('reviews',this)">Reviews (${p.reviews})</button>
        <button class="tab-btn" onclick="switchTab('shipping',this)">Shipping</button>
      </div>
      <div class="tab-content-panel active" id="tab-desc">
        <p style="color:var(--text-mid);line-height:1.8;">${p.desc}</p>
        <ul style="color:var(--text-mid);font-size:0.88rem;line-height:2;margin-top:12px;padding-left:20px;">
          <li>Brand: ${p.brand}</li><li>Net Weight: ${p.weight}</li>
          <li>Suitable for: ${p.ageGroup} ${p.pet}s</li>
          <li>100% vet approved and quality-tested</li>
          <li>Ships from our Metro Manila warehouse</li>
        </ul>
      </div>
      <div class="tab-content-panel" id="tab-reviews">
        <div style="margin-bottom:20px;">
          <div style="font-family:'Playfair Display',serif;font-size:2.5rem;font-weight:900;color:var(--amber);">${p.rating}.0</div>
          <div style="color:#F5B300;font-size:1.2rem;margin-bottom:4px;">${'⭐'.repeat(p.rating)}</div>
          <div style="font-size:0.82rem;color:var(--text-light);">Based on ${p.reviews} reviews</div>
        </div>
        <div class="review-card"><div class="d-flex justify-content-between"><span class="reviewer">Ana M.</span><span style="color:#F5B300;font-size:0.78rem;">⭐⭐⭐⭐⭐</span></div><div class="review-text">My dog absolutely loves this! Worth every peso. Will definitely re-order!</div></div>
        <div class="review-card"><div class="d-flex justify-content-between"><span class="reviewer">Carlo D.</span><span style="color:#F5B300;font-size:0.78rem;">⭐⭐⭐⭐⭐</span></div><div class="review-text">Great quality and fast delivery. INFURNEST never disappoints. My cat is so happy 🐈</div></div>
        <div class="review-card"><div class="d-flex justify-content-between"><span class="reviewer">Bea R.</span><span style="color:#F5B300;font-size:0.78rem;">⭐⭐⭐⭐</span></div><div class="review-text">Solid product, packaging was excellent. Slight delay in delivery but otherwise perfect.</div></div>
        <div style="margin-top:20px;padding-top:20px;border-top:1px solid var(--blush);">
          <h6 style="font-weight:700;color:var(--brown);margin-bottom:14px;">Write a Review</h6>
          <div class="stars-input" id="reviewStars" onclick="setReviewStars(event)">
            <span data-val="1">★</span><span data-val="2">★</span><span data-val="3">★</span><span data-val="4">★</span><span data-val="5">★</span>
          </div>
          <textarea style="width:100%;border:1.5px solid var(--blush);border-radius:10px;padding:12px;margin-top:10px;font-family:inherit;font-size:0.85rem;outline:none;" rows="3" id="reviewText" placeholder="Share your experience..."></textarea>
          <button class="btn-primary-custom mt-2" onclick="submitReview()"><i class="fas fa-paper-plane"></i> Submit Review</button>
        </div>
      </div>
      <div class="tab-content-panel" id="tab-shipping">
        <div class="row g-3" style="font-size:0.88rem;">
          <div class="col-md-6"><div style="background:var(--cream);border-radius:12px;padding:18px;"><div style="font-size:1.5rem;margin-bottom:8px;">🚚</div><strong style="color:var(--brown);">Standard Delivery (3–5 days)</strong><p style="color:var(--text-light);margin:8px 0 0;line-height:1.7;">Free on orders ₱999+. ₱99 flat rate for smaller orders. Available nationwide.</p></div></div>
          <div class="col-md-6"><div style="background:var(--cream);border-radius:12px;padding:18px;"><div style="font-size:1.5rem;margin-bottom:8px;">⚡</div><strong style="color:var(--brown);">Express Delivery (1–2 days)</strong><p style="color:var(--text-light);margin:8px 0 0;line-height:1.7;">₱149 flat rate. Metro Manila and key cities. Order before 2 PM.</p></div></div>
          <div class="col-md-6"><div style="background:var(--cream);border-radius:12px;padding:18px;"><div style="font-size:1.5rem;margin-bottom:8px;">🏙️</div><strong style="color:var(--brown);">Same-Day Metro (Today)</strong><p style="color:var(--text-light);margin:8px 0 0;line-height:1.7;">₱199 flat rate. Metro Manila only. Order before 11 AM. Guaranteed delivery.</p></div></div>
          <div class="col-md-6"><div style="background:var(--cream);border-radius:12px;padding:18px;"><div style="font-size:1.5rem;margin-bottom:8px;">🔄</div><strong style="color:var(--brown);">Returns & Refunds</strong><p style="color:var(--text-light);margin:8px 0 0;line-height:1.7;">30-day hassle-free returns. Full refund or exchange. Contact us to initiate.</p></div></div>
        </div>
      </div>
    </div>
    <!-- Related Products -->
    <div class="mt-5">
      <h4 style="font-family:'Playfair Display',serif;color:var(--brown);margin-bottom:20px;">You Might Also Like</h4>
      <div class="row g-3" id="relatedProductsGrid"></div>
    </div>`;

  // Render related
  const related = products.filter(pr => pr.id !== id && (pr.category === p.category || pr.pet === p.pet)).slice(0, 4);
  const rGrid = document.getElementById('relatedProductsGrid');
  related.forEach(rp => renderProductCard(rp, rGrid));

  showPage('product');
}

function changeQty(delta) {
  const inp = document.getElementById('detailQty');
  let v = parseInt(inp.value) + delta;
  if (v < 1) v = 1;
  if (v > 99) v = 99;
  inp.value = v;
}

function switchTab(name, btn) {
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.tab-content-panel').forEach(p => p.classList.remove('active'));
  if (btn) btn.classList.add('active');
  document.getElementById('tab-'+name).classList.add('active');
}

function setReviewStars(e) {
  const val = parseInt(e.target.dataset.val);
  if (!val) return;
  document.querySelectorAll('#reviewStars span').forEach((s,i) => {
    s.classList.toggle('filled', i < val);
  });
}

function submitReview() {
  const text = document.getElementById('reviewText').value.trim();
  if (!text) { showToast('Please write your review first!', 'error'); return; }
  showToast('✅ Review submitted! Thank you!', 'success');
  document.getElementById('reviewText').value = '';
  document.querySelectorAll('#reviewStars span').forEach(s => s.classList.remove('filled'));
}

function addToCartDetail(id) {
  const qty = parseInt(document.getElementById('detailQty').value) || 1;
  const p = products.find(pr => pr.id === id);
  if (!p) return;
  const existing = cart.find(c => c.id === id);
  if (existing) existing.qty += qty;
  else cart.push({ ...p, qty });
  updateCartCount();
  showToast(`🛒 ${p.name} (x${qty}) added to cart!`, 'success');
}

// ==================== CART ====================
function addToCart(id) {
  const p = products.find(pr => pr.id === id);
  if (!p) return;
  const existing = cart.find(c => c.id === id);
  if (existing) existing.qty++;
  else cart.push({ ...p, qty: 1 });
  updateCartCount();
  showToast(`🛒 ${p.name} added to cart!`, 'success');
}

function updateCartCount() {
  const count = cart.reduce((s, c) => s + c.qty, 0);
  document.getElementById('cartCount').textContent = count;
  document.getElementById('cartCount2').textContent = count;
}

function removeFromCart(id) {
  cart = cart.filter(c => c.id !== id);
  updateCartCount();
  renderCart();
  showToast('🗑️ Item removed from cart', 'info');
}

function updateCartQty(id, val) {
  const item = cart.find(c => c.id === id);
  if (item) { item.qty = Math.max(1, parseInt(val)||1); }
  renderCart();
}

function getCartTotal() { return cart.reduce((s, c) => s + c.price * c.qty, 0); }

function renderCart() {
  const container = document.getElementById('cartContent');
  if (cart.length === 0) {
    container.innerHTML = `<div class="empty-state"><div class="empty-icon">🛒</div><h4 style="color:var(--brown);">Your cart is empty</h4><p style="color:var(--text-light);margin-bottom:24px;">Add some products to get started!</p><button class="btn-primary-custom" onclick="showPage('shop')" style="display:inline-flex;"><i class="fas fa-store"></i> Browse Products</button></div>`;
    return;
  }
  const total = getCartTotal();
  container.innerHTML = `
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="cart-table">
          <table class="table mb-0">
            <thead><tr>
              <th>Product</th><th class="d-none d-sm-table-cell">Price</th><th>Qty</th><th>Total</th><th></th>
            </tr></thead>
            <tbody>
              ${cart.map(item => `
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <div class="cart-item-img">${item.emoji}</div>
                    <div>
                      <div class="cart-item-name">${item.name}</div>
                      <div class="badge-pet ${item.pet==='dog'?'badge-dog':'badge-cat'}" style="display:inline-flex;font-size:0.68rem;padding:2px 7px;">${item.pet==='dog'?'🐕':'🐈'} ${item.pet}</div>
                    </div>
                  </div>
                </td>
                <td class="d-none d-sm-table-cell" style="font-weight:600;color:var(--brown);">₱${item.price.toLocaleString()}</td>
                <td>
                  <div class="quantity-box" style="transform:scale(0.85);transform-origin:left;">
                    <button onclick="updateCartQty(${item.id}, ${item.qty-1})">−</button>
                    <input type="number" value="${item.qty}" min="1" max="99" onchange="updateCartQty(${item.id},this.value)" style="width:42px;"/>
                    <button onclick="updateCartQty(${item.id}, ${item.qty+1})">+</button>
                  </div>
                </td>
                <td style="font-weight:700;color:var(--amber-dark);">₱${(item.price*item.qty).toLocaleString()}</td>
                <td><button class="cart-remove" onclick="removeFromCart(${item.id})"><i class="fas fa-trash-alt"></i></button></td>
              </tr>`).join('')}
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <button onclick="showPage('shop')" style="background:var(--cream);border:1.5px solid var(--blush);border-radius:10px;padding:10px 18px;font-size:0.85rem;font-weight:600;color:var(--brown);cursor:pointer;transition:all 0.2s;display:flex;align-items:center;gap:8px;"><i class="fas fa-arrow-left"></i> Continue Shopping</button>
          <button onclick="cart=[];updateCartCount();renderCart();showToast('🗑️ Cart cleared','info')" style="background:var(--cream);border:1.5px solid var(--blush);border-radius:10px;padding:10px 18px;font-size:0.85rem;font-weight:600;color:#E84A2A;cursor:pointer;">Clear Cart</button>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="order-summary">
          <h5 style="font-family:'Playfair Display',serif;color:var(--brown);margin-bottom:18px;padding-bottom:12px;border-bottom:1px solid var(--blush);">Order Summary</h5>
          <div class="order-row"><span>${cart.length} item(s)</span><span>₱${total.toLocaleString()}</span></div>
          <div class="order-row"><span>Shipping</span><span style="color:var(--sage);font-weight:600;">${total >= 999 ? 'FREE' : '₱99'}</span></div>
          <div class="order-row"><span><strong>Total</strong></span><span style="font-size:1.2rem;color:var(--amber-dark);font-weight:800;">₱${(total + (total >= 999 ? 0 : 99)).toLocaleString()}</span></div>
          <button class="checkout-btn" onclick="showPage('checkout');renderCheckout()">Proceed to Checkout <i class="fas fa-arrow-right"></i></button>
          <div style="text-align:center;margin-top:12px;">
            <span style="font-size:0.75rem;color:var(--text-light);">🔒 Secure &nbsp;·&nbsp; ✅ Vet Approved &nbsp;·&nbsp; 🚚 Fast Delivery</span>
          </div>
        </div>
      </div>
    </div>`;
}

// ==================== CHECKOUT ====================
function renderCheckout() {
  const items = document.getElementById('checkoutItems');
  if (!items) return;
  const total = getCartTotal();
  items.innerHTML = cart.map(item => `
    <div style="display:flex;align-items:center;gap:10px;padding:10px 0;border-bottom:1px solid var(--blush);">
      <span style="font-size:2rem;">${item.emoji}</span>
      <div style="flex:1;"><div style="font-size:0.85rem;font-weight:600;color:var(--brown);">${item.name}</div><div style="font-size:0.75rem;color:var(--text-light);">x${item.qty}</div></div>
      <div style="font-weight:700;color:var(--amber-dark);font-size:0.9rem;">₱${(item.price*item.qty).toLocaleString()}</div>
    </div>`).join('');
  document.getElementById('coSubtotal').textContent = '₱' + total.toLocaleString();
  document.getElementById('coTotal').textContent = '₱' + (total >= 999 ? total : total + 99).toLocaleString();
}

function selectPayment(el) {
  document.querySelectorAll('.payment-option').forEach(o => o.classList.remove('selected'));
  el.classList.add('selected');
}

function applyPromo() {
  const code = document.getElementById('promoCode').value.trim().toUpperCase();
  const validCodes = { 'DOGFOOD20': 0.20, 'CATLUV15': 0.15, 'INFURNEST10': 0.10, 'PETLOVE5': 0.05 };
  if (validCodes[code]) {
    const disc = Math.round(getCartTotal() * validCodes[code]);
    document.getElementById('promoRow').style.display = 'flex';
    document.getElementById('promoDiscount').textContent = '−₱' + disc.toLocaleString();
    document.getElementById('coTotal').textContent = '₱' + (getCartTotal() - disc).toLocaleString();
    showToast(`🎉 Promo code ${code} applied! You saved ₱${disc.toLocaleString()}`, 'success');
  } else {
    showToast('❌ Invalid promo code. Try: DOGFOOD20 or CATLUV15', 'error');
  }
}

function placeOrder() {
  if (cart.length === 0) { showToast('Your cart is empty!', 'error'); return; }
  const orderNum = '#INF-' + String(Math.floor(Math.random()*90000)+10000);
  document.getElementById('orderNumber').textContent = orderNum;
  cart = [];
  updateCartCount();
  showPage('success');
}

// ==================== WISHLIST ====================
function toggleWishlist(id, btn) {
  const p = products.find(pr => pr.id === id);
  if (!p) return;
  const idx = wishlist.findIndex(w => w.id === id);
  if (idx > -1) {
    wishlist.splice(idx, 1);
    if (btn) { btn.innerHTML = '<i class="far fa-heart"></i>'; btn.classList.remove('active'); }
    showToast(`💔 Removed from wishlist`, 'info');
  } else {
    wishlist.push(p);
    if (btn) { btn.innerHTML = '<i class="fas fa-heart"></i>'; btn.classList.add('active'); }
    showToast(`❤️ ${p.name} added to wishlist!`, 'success');
  }
}

function toggleWishlistDetail(id) {
  const p = products.find(pr => pr.id === id);
  const idx = wishlist.findIndex(w => w.id === id);
  const btn = document.getElementById('detailWishBtn');
  if (idx > -1) {
    wishlist.splice(idx, 1);
    if (btn) { btn.innerHTML = '<i class="far fa-heart"></i>'; btn.style.color='var(--text-light)'; btn.style.borderColor='var(--blush)'; btn.style.background='var(--cream)'; }
    showToast('💔 Removed from wishlist', 'info');
  } else {
    wishlist.push(p);
    if (btn) { btn.innerHTML = '<i class="fas fa-heart"></i>'; btn.style.color='#E84A2A'; btn.style.borderColor='#E84A2A'; btn.style.background='rgba(232,74,42,0.08)'; }
    showToast(`❤️ ${p.name} added to wishlist!`, 'success');
  }
}

function renderWishlist() {
  const container = document.getElementById('wishlistContent');
  if (wishlist.length === 0) {
    container.innerHTML = `<div class="empty-state"><div class="empty-icon">❤️</div><h4 style="color:var(--brown);">Your wishlist is empty</h4><p style="color:var(--text-light);margin-bottom:24px;">Save items you love to buy them later!</p><button class="btn-primary-custom" onclick="showPage('shop')" style="display:inline-flex;"><i class="fas fa-store"></i> Browse Products</button></div>`;
    return;
  }
  container.innerHTML = `<div class="row g-3"></div>`;
  const grid = container.querySelector('.row');
  wishlist.forEach(p => renderProductCard(p, grid));
}

// ==================== CONTACT ====================
function sendContactForm() {
  const name = document.getElementById('cName').value.trim();
  const email = document.getElementById('cEmail').value.trim();
  const msg = document.getElementById('cMessage').value.trim();
  if (!name || !email || !msg) { showToast('Please fill in all fields!', 'error'); return; }
  showToast(`✅ Message sent! We'll reply within 24 hours, ${name.split(' ')[0]}!`, 'success');
  document.getElementById('cName').value = '';
  document.getElementById('cEmail').value = '';
  document.getElementById('cMessage').value = '';
}

// ==================== NEWSLETTER ====================
function subscribeEmail() {
  const email = document.getElementById('footerEmail').value.trim();
  if (!email || !email.includes('@')) { showToast('Please enter a valid email!', 'error'); return; }
  showToast(`🎉 Subscribed! Welcome to the INFURNEST family!`, 'success');
  document.getElementById('footerEmail').value = '';
}

// ==================== TOAST ====================
function showToast(msg, type='success') {
  const container = document.getElementById('toastContainer');
  const toast = document.createElement('div');
  toast.className = 'toast-custom';
  const color = type === 'success' ? 'var(--amber)' : type === 'error' ? '#E84A2A' : 'var(--sage)';
  toast.style.borderLeftColor = color;
  toast.innerHTML = `<i class="fas ${type==='success'?'fa-check-circle':type==='error'?'fa-times-circle':'fa-info-circle'}" style="color:${color};font-size:1rem;"></i><span>${msg}</span>`;
  container.appendChild(toast);
  setTimeout(() => { toast.style.animation = 'slideOut 0.3s ease forwards'; setTimeout(() => toast.remove(), 300); }, 3000);
}

// ==================== INIT ====================
document.addEventListener('DOMContentLoaded', () => {
  renderFeatured();
  updateCartCount();
});
</script>
</body>
</html>
