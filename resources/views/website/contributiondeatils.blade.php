@extends('website.layout')

@section('title', 'Home | MyWebsite')


@section('content')
@if(false)

@else
<style>
    /* Under Development Page Styles - Responsive */

    .under-dev {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: radial-gradient(800px at 10% 20%, #1e293b 0, transparent 50%),
            radial-gradient(1000px at 90% 80%, #7c3aed 0, transparent 50%),
            #0f172a;
        color: #e5e7eb;
        padding: 1.5rem;
        text-align: center;
        font-family: system-ui, -apple-system, Segoe UI, Roboto, Ubuntu, Cantarell,
            Noto Sans, Helvetica Neue, Arial, sans-serif;
    }

    .under-dev__container {
        width: 100%;
        max-width: 700px;
        background: rgba(17, 24, 39, 0.85);
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5),
            inset 0 0 0 1px rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(8px);
    }

    .under-dev__title {
        font-size: clamp(24px, 6vw, 42px);
        font-weight: 800;
        margin-bottom: 1rem;
        background: linear-gradient(90deg, #22d3ee, #a78bfa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .under-dev__desc {
        font-size: clamp(14px, 4vw, 18px);
        line-height: 1.6;
        color: #94a3b8;
        margin-bottom: 2rem;
    }

    .under-dev__progress {
        width: 100%;
        height: 10px;
        background: #1e293b;
        border-radius: 999px;
        overflow: hidden;
        margin-bottom: 1rem;
        border: 1px solid #334155;
    }

    .under-dev__bar {
        height: 100%;
        width: 0%;
        background: linear-gradient(90deg, #22d3ee, #a78bfa);
        animation: load 5s ease-in-out infinite;
    }

    @keyframes load {
        0% {
            width: 10%;
        }

        40% {
            width: 70%;
        }

        60% {
            width: 50%;
        }

        100% {
            width: 100%;
        }
    }

    .under-dev__status {
        font-size: clamp(13px, 3.5vw, 16px);
        color: #cbd5e1;
        font-weight: 600;
    }

    /* 📱 Small devices (phones) */
    @media (max-width: 576px) {
        .under-dev__container {
            padding: 1.5rem;
            border-radius: 14px;
        }

        .under-dev__desc {
            font-size: 14px;
        }

        .under-dev__status {
            font-size: 13px;
        }
    }

    /* 📱💻 Medium devices (tablets) */
    @media (min-width: 577px) and (max-width: 991px) {
        .under-dev__container {
            padding: 2rem 2.5rem;
        }

        .under-dev__title {
            font-size: 32px;
        }
    }

    /* 💻 Large devices (laptops & desktops) */
    @media (min-width: 992px) {
        .under-dev__container {
            padding: 3rem;
        }

        .under-dev__title {
            font-size: 42px;
        }

        .under-dev__desc {
            font-size: 18px;
        }
    }
</style>
<div class="under-dev">
    <div class="under-dev__container text-center">
        <h1 class="under-dev__title">🚧 Under Development 🚧</h1>
        <p class="under-dev__desc">
            Our website is currently under development.
            We’re working hard to bring you an awesome experience.
            Please check back soon!
        </p>

        <div class="under-dev__progress">
            <div class="under-dev__bar"></div>
        </div>

        <p class="under-dev__status">Estimated Launch: <span id="eta">—</span></p>
    </div>
</div>

<script>
    // Simple ETA countdown
    const targetDate = new Date("2025-09-14T00:00:00"); // Change as needed
    const etaEl = document.getElementById("eta");

    function updateETA() {
        const now = new Date();
        const diff = targetDate - now;
        const days = Math.ceil(diff / (1000 * 60 * 60 * 24));

        etaEl.textContent = (days > 0) ? days + (days === 1 ? " day" : " days") : "soon";
    }

    updateETA();
</script>
@endif
@endsection

<!-- src='{{ ROOT_URL }}storage/uploads/emp_images/" + IMAGE_LIST[i] + "' -->