@extends('website.layout')

@section('title', 'Gallery | MyWebsite')

@section('content')

<style>
.gallery-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    cursor: pointer;
    border-radius: 10px;
    transition: 0.3s;
}
.gallery-img:hover {
    transform: scale(1.05);
}

/* Tabs */
.tab-btn {
    padding: 10px 20px;
    border: none;
    background: #eee;
    margin-right: 10px;
    border-radius: 5px;
    cursor: pointer;
}
.tab-btn.active {
    background: #24cdcd;
    color: #fff;
}

/* Lightbox */
.lightbox {
    display: none;
    position: fixed;
    z-index: 999;
    padding-top: 60px;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.9);
}
.lightbox img, .lightbox video {
    margin: auto;
    display: block;
    max-width: 50%;
    max-height: 80%;
}
.close, .prev, .next {
    position: absolute;
    color: #fff;
    font-size: 30px;
    cursor: pointer;
}
.lightbox-content-media {
    display: block;
    margin: auto;
    max-width: 95vw;   /* fit screen width */
    max-height: 85vh;  /* fit screen height */
    width: auto;
    height: auto;
    object-fit: contain; /* keep aspect ratio */
    border-radius: 8px;
}
	.text{
		color:white;
		text-align:center;
	}
.close {  right: 30px; }
.prev { top: 50%; left: 20px; }
.next { top: 50%; right: 20px; }
</style>

<div class="container py-5">

    <!-- Tabs -->
    <div class="mb-4">
        <button class="tab-btn active" onclick="showTab('teacher')">👨‍🏫 Teacher</button>
        <button class="tab-btn" onclick="showTab('event')">🎉 Event</button>
    </div>

    <!-- Teacher Gallery -->
    <div id="teacher" class="row g-4">
        @foreach($teachers as $key => $item)
            <div class="col-md-3">
                <img src="{{ asset('storage/app/public/gallery/'.$item->media) }}"
                     class="gallery-img"
                     onclick="openLightbox('teacher', {{ $key }})">

                <p class="mt-2 text-center">{{ $item->name }}</p>
            </div>
        @endforeach
    </div>

    <!-- Event Gallery -->
    <div id="event" class="row g-4" style="display:none;">
        @foreach($events as $key => $item)
            <div class="col-md-3">
                <img src="{{ asset('storage/app/public/gallery/'.$item->media) }}"
                     class="gallery-img"
                     onclick="openLightbox('event', {{ $key }})">

                <p class="mt-2 text-center">{{ $item->heading }}</p>
            </div>
        @endforeach
    </div>

</div>

<!-- Lightbox -->
<div id="lightbox" class="lightbox">
    <span class="close" onclick="closeLightbox()">✖</span>
    <span class="prev" onclick="changeSlide(-1)">❮</span>
    <span class="next" onclick="changeSlide(1)">❯</span>

    <div id="lightbox-content"></div>
</div>

<script>
let currentIndex = 0;
let currentType = 'teacher';

let teacherData = @json($teachers);
let eventData = @json($events);

function showTab(tab) {
    document.getElementById('teacher').style.display = (tab === 'teacher') ? 'flex' : 'none';
    document.getElementById('event').style.display = (tab === 'event') ? 'flex' : 'none';

    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
}

function openLightbox(type, index) {
    currentType = type;
    currentIndex = index;
    document.getElementById('lightbox').style.display = 'block';
    showSlide();
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}

function changeSlide(step) {
    let data = (currentType === 'teacher') ? teacherData : eventData;

    currentIndex += step;

    if (currentIndex < 0) currentIndex = data.length - 1;
    if (currentIndex >= data.length) currentIndex = 0;

    showSlide();
}

function showSlide() {
    let data = (currentType === 'teacher') ? teacherData : eventData;
    let item = data[currentIndex];

    let title = '';

    // 🔥 Dynamic title based on type
    if (currentType === 'teacher') {
        title = item.name ?? '';
    } else {
        title = item.heading ?? '';
    }

    let html = '';

    if (item.media_type === 'image') {
        html = `
            <img src="/storage/app/public/gallery/${item.media}" class="lightbox-content-media">
            <h3 class="text">${title}</h3>
        `;
    } else {
        html = `
            <video controls autoplay class="lightbox-content-media">
                <source src="/storage/app/public/gallery/${item.media}">
            </video>
            <h3 class="text">${title}</h3>
        `;
    }

    document.getElementById('lightbox-content').innerHTML = html;
}
</script>

@endsection