@extends('website.layout')

@section('title', 'All Committees | MyWebsite')
<style>
    /* Page title */
    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #222;
    }

    /* Committee grid responsive */
    .committee-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.5rem;
    }

    /* Card styling */
    .committee-card {
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s ease;
    }

    .committee-card:hover {
        transform: translateY(-4px);
    }

    /* Header styling */
    .committee-header {
        margin: 0;
        padding: 0.75rem 1rem;
        color: #fff;
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* Body styling */
    .committee-body {
        padding: 1rem 1.25rem;
    }

    .committee-body ol {
        padding-left: 1.2rem;
        margin: 0;
    }

    .committee-body li {
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        color: #333;
    }

    /* Phone numbers */
    .phone {
        font-size: 0.85rem;
        color: #555;
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
        .page-title {
            font-size: 1.6rem;
        }

        .committee-body li {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .page-title {
            font-size: 1.4rem;
        }

        .committee-header {
            font-size: 1rem;
        }
    }
</style>
@section('content')
<div class="container">

    <h1 class="page-title text-center">ସମସ୍ତ ସଦସ୍ୟ (All Committees & Members)</h1>

    {{-- Responsive grid --}}
    <div class="committee-grid">

        {{-- Finance Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-primary">Finance Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>ମାଧବ</li>
                    <li>ପ୍ରଭାତ</li>
                    <li>ବଳଭଦ୍ର</li>
                    <li>ଲାଲୁମଣି ସମଲ</li>
                    <li>ସିତାଳ ବେହେରା</li>
                    <li>ସିବାନନ୍ଦ ମହାପାତ୍ର</li>
                    <li>ଅମିୟା</li>
                    <li>ନିରଞ୍ଜନ</li>
                    <li>ବାଳଭଦ୍ର</li>
                    <li>ଜୟକୃଷ୍ଣ</li>
                    <li>ମଧୁସୂଦନ – <span class="phone">93928376945</span></li>
                    <li>ଦୀପକ – <span class="phone">7892403761</span></li>
                    <li>ବିଶ୍ୱଜିତ – <span class="phone">9398768373</span></li>
                </ol>
            </div>
        </div>

        {{-- Reception Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-success">Reception Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Aruna Samal</li>
                    <li>Kunjabihari Majhi</li>
                    <li>Binod Bihari Sutar</li>
                    <li>Promananda Majhi</li>
                    <li>Bichutan Nayak</li>
                    <li>Om Prakash Nayak</li>
                    <li>Saubhagya Nayak – <span class="phone">8658354843</span></li>
                    <li>Aleshya Sutar</li>
                    <li>Gangulata Majhi</li>
                    <li>Annapurna Majhi</li>
                    <li>Mayadhar Behera</li>
                    <li>Amulya Majhi</li>
                    <li>Bindu Prasad Behera</li>
                </ol>
            </div>
        </div>

        {{-- Food Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-warning text-dark">Food Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Lamudhar Majhi</li>
                    <li>Umesh Ch. Nayak</li>
                    <li>Sumendra Nayak</li>
                    <li>Gangadhar Barik</li>
                    <li>Sivananda Mallick</li>
                    <li>Ranjan Samal</li>
                    <li>Gangadhar Sutar</li>
                    <li>Bilas Nayak</li>
                    <li>Prasanta Patt</li>
                    <li>Narendra Swain</li>
                    <li>Udaybhanu Mallick</li>
                    <li>Bindu Prasad Behera</li>
                </ol>
            </div>
        </div>

        {{-- Media Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-danger">Media Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Bindu Prasad Behera</li>
                    <li>Namita Majhi</li>
                    <li>Om Prakash Nayak</li>
                    <li>Himansu Nayak</li>
                    <li>Manmohan Samal</li>
                    <li>Abhaya Das</li>
                    <li>Arjun Samal</li>
                </ol>
            </div>
        </div>

        {{-- Adviser Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-secondary">Adviser Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Ramakrishna Samal</li>
                    <li>Sital Behera</li>
                    <li>Narendra Samal</li>
                    <li>Hrushikesh Panda</li>
                    <li>Anirudha Nayak</li>
                    <li>Rathekar Panda</li>
                </ol>
            </div>
        </div>

        {{-- Magazine Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-info">Magazine Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Abhaya Suman</li>
                    <li>Golak Nayak</li>
                    <li>Amulya Behera</li>
                    <li>Kalacharan Sahu</li>
                    <li>Brahmananda Majhi</li>
                    <li>Dr. Lalatendu Tripathy</li>
                    <li>Dr. Uddhaba Tripathy</li>
                    <li>Rudrachanda Nayak</li>
                </ol>
            </div>
        </div>

        {{-- Entertainment Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-dark">Entertainment Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Amulya Majhi</li>
                    <li>Pramod Sutar</li>
                    <li>Ajit Majhi</li>
                    <li>Amulya Behera</li>
                    <li>Satyendra Biswal</li>
                    <li>Mahendra Nayak</li>
                    <li>Swaranjan Nayak</li>
                </ol>
            </div>
        </div>

        {{-- Clean Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-light text-dark">Clean Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Prasanta Patt</li>
                    <li>Lamudhar Nayak</li>
                    <li>Bikas Nayak</li>
                </ol>
            </div>
        </div>

        {{-- Decoration Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-primary">Decoration Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Chinmaya Swain</li>
                    <li>Amulya Majhi</li>
                    <li>Sivananda Majhi</li>
                    <li>Kalia Behera</li>
                    <li>Kadel Nayak</li>
                    <li>Sada Nayak</li>
                    <li>Om Prakash Nayak</li>
                </ol>
            </div>
        </div>

        {{-- Award Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-warning text-dark">Award Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Sital Behera</li>
                    <li>Prabhat Tripathy</li>
                    <li>Kulamani Sahu</li>
                    <li>Bishwanath Majhi</li>
                    <li>Ramakrishna Panda</li>
                    <li>Shyamsundar Behera</li>
                    <li>Pradeep Patt</li>
                    <li>Arjun Samal</li>
                    <li>Bimal Nayak</li>
                    <li>Pramod Nayak</li>
                    <li>Asutosh Tripathy</li>
                    <li>Udaybhanu Mallick</li>
                    <li>Kalicharan Nayak</li>
                </ol>
            </div>
        </div>

    </div>
</div>
@endsection
