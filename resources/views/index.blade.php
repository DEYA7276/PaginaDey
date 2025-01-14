@extends('layout.main_template')

@section('content')

{{-- Estilos personalizados para la página --}}
<style>
    .hero-section {
        background-image: url('https://symphony.cdn.tambourine.com/pueblo-bonito-resorts/media/pueblo-bonito-mazatlan-gallery-09-5d2e30450e0c9.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        padding: 100px 0;
    }

    .hero-section h1 {
        font-size: 4rem;
        font-weight: bold;
    }

    .hero-section p {
        font-size: 1.2rem;
        margin: 20px 0;
    }

    .btn-primary {
        background-color: #131e52;
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 30px;
        font-size: 1.2rem;
    }

    .btn-primary:hover {
        background-color: #131e52;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        margin-top: 50px;
        font-weight: bold;
        color: #131e52;
    }

    .menu-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: 20px 0;
        transition: transform 0.3s ease;
        
    }

    .menu-card:hover {
        transform: scale(1.05);
    }

    /* Estilos ajustados para las imágenes del menú */
    .menu-card img {
        width: 100%;
        height: 200px; /* Ajustamos la altura */
        object-fit: cover; /* Asegura que la imagen se ajuste sin perder la proporción */
        border-radius: 15px 15px 0 0;
    }

    .menu-card-body {
        padding: 20px;
        text-align: center;
        
    }

    .menu-card-body h3 {
        font-size: 1.8rem;
        font-weight: bold;
    }

    .menu-card-body p {
        font-size: 1.1rem;
        color: #000000;
    }

    .about-section {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
        gap: 50px;
    }

    .about-section img {
        width: 40%;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .about-section .about-text {
        width: 50%;
    }

    .about-section .about-text h2 {
        font-size: 2rem;
        color: #131e52;
        font-weight: bold;
    }

    .about-section .about-text p {
        font-size: 1.2rem;
        color: #040404;
    }

    .footer-section {
        background-color: #f8f9fa;
        text-align: center;
        padding: 30px 0;
    }

    .footer-section p {
        font-size: 1rem;
        color: #333;
    }

    .footer-section .social-icons i {
        font-size: 2rem;
        color: #131e52;
        margin: 0 15px;
        cursor: pointer;
    }

    .footer-section .social-icons i:hover {
        color: #131e52;
    }
</style>

{{-- Hero Section: Imagen de bienvenida --}}
<div class="hero-section">
    <h1>Welcome to Our Restaurant</h1>
    <p>Delicious dishes and unforgettable experiences await you.</p>
    <a href="{{ route('reservations.create') }}" class="btn-primary">Reservations</a>
</div>

{{-- Menú Section: Sección con tarjetas de menú --}}
<div class="container">
    <h2 class="section-title">Our Special Menu</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="menu-card">
                <img src="https://zenaskitchen.com/wp-content/uploads/2022/12/creamy-chicken-and-mushroom-pasta.jpg" alt="Dish 1">
                <div class="menu-card-body">
                    <h3>Delicious Pasta</h3>
                    <p>Freshly made pasta with a special sauce that will make you fall in love.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="menu-card">
                <img src="https://www.eatwell101.com/wp-content/uploads/2020/10/Garlic-Butter-Steak-recipe-roasted-in-Oven.jpg" alt="Dish 2">
                <div class="menu-card-body">
                    <h3>Grilled Steak</h3>
                    <p>Perfectly grilled steak with sides that complement every bite.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="menu-card">
                <img src="http://itdoesnttastelikechicken.com/wp-content/uploads/2016/01/rainbow-power-greens-salad-with-black-eyed-peas2.jpg" alt="Dish 3">
                <div class="menu-card-body">
                    <h3>Vegetarian Salad</h3>
                    <p>A healthy and flavorful mix of fresh veggies and homemade dressing.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- About Section: Información sobre el restaurante --}}
<div class="container about-section">
    <div class="about-text">
        <h2>About Us</h2>
        <p>Our restaurant is dedicated to providing a unique dining experience with the finest ingredients. We believe that food should not only satisfy your hunger but also delight your senses. Join us for a memorable meal and great service!</p>
    </div>
    <img src="https://i.pinimg.com/originals/69/6c/74/696c745675e78971ed170d16d26efdac.jpg" alt="Restaurant Interior">
</div>

{{-- Footer Section: Información de contacto y redes sociales --}}
<div class="footer-section">
    <p>&copy; 2025 Our Restaurant | All rights reserved.</p>
    <div class="social-icons">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
    </div>
</div>

@endsection
