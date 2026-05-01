@extends('website.layout')

@section('title', '📖 Golden Jubilee Magazine')

@section('content')

<style>
/* ===== Section ===== */
.magazine-section {
    background: #f8f9fa;
    padding: 40px 15px;
}

/* ===== Card ===== */
.magazine-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    padding: 20px;
}

/* ===== Title ===== */
.magazine-title {
    text-align: center;
    font-weight: 700;
    margin-bottom: 20px;
    color: #2c3e50;
}

/* ===== Responsive Flipbook ===== */
.flipbook-wrapper {
    position: relative;
    width: 100%;
    padding-top: 70%; /* height ratio */
}

.flipbook-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    border-radius: 10px;
}

/* ===== Download Button ===== */
.download-btn {
    display: block;
    margin: 20px auto 0;
    padding: 10px 25px;
    font-size: 16px;
    border-radius: 10px;
    background: linear-gradient(90deg, #007bff, #00c6ff);
    color: #fff;
    text-decoration: none;
    text-align: center;
    width: fit-content;
    transition: 0.3s;
}

.download-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}
</style>

<section class="magazine-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="magazine-card">

                    <!-- Title -->
                    <h3 class="magazine-title">
                        📖 Golden Jubilee Magazine
                    </h3>

                    <!-- Flipbook -->
                    <div class="flipbook-wrapper">
                        <iframe 
                            src="https://heyzine.com/flip-book/dfbb2df8e4.html"
                            allowfullscreen
                            scrolling="no">
                        </iframe>
                    </div>

                    <!-- Download Button -->
                    <a href="https://heyzine.com/flip-book/dfbb2df8e4.pdf" 
                       target="_blank" 
                       class="download-btn">
                        ⬇ Download PDF
                    </a>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection