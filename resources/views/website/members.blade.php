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
                    <li>Abhaya Sutar (President) - <span class="phone">9437376967</span> </li>
                    <li>Golak Nayak (Secretary)</li>
                    <li>Prafulla Behera (Treasurer)</li>
                    <li>Laxmidhar Majhi (Working President)</li>
                    <li>Srikant Mallaick (Headmaster)</li>
                    <li>Sudhansu Nayak</li>
                    <li>Rabindranath Panda</li>
                    <li>Gangadhar Barik</li>
                    <li>Shashadhar Behera</li>
                    <li>Bichitra Samal</li>
                    <li>Jagannath Behera</li>
                    <li>Biswajit Behera</li>
                    <li>Chinmaya Pati </li>
                </ol>
            </div>
        </div>

        {{-- Reception Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-success">Reception Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Aruna k Samal</li>
                    <li>Kunjabihari Majhi</li>
                    <li>Bidyadhar Sutar</li>
                    <li>Premananda Majhi</li>
                    <li>Bichitra Nayak</li>
                    <li>Omm Prakash Nayak</li>
                    <li>Saubhagya Nayak - <span class="phone">8658354843</span></li>
                    <li>Akshya Sutar</li>
                    <li>Sanjulata Majhi</li>
                    <li>Annapurna Majhi</li>
                    <li>Mayadhar Behera</li>
                    <li>Amulya Majhi</li>
                    <li>Jyotiranjan Behera - <span class="phone">8144879471</span></li>
                    <li>Gyanedra Rout - <span class="phone">9348173277</span></li>
                </ol>
            </div>
        </div>

        {{-- Food Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-warning text-dark">Food Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Laxmidhara Majhi</li>
                    <li>Umesh Ch. Nayak</li>
                    <li>Surendra Nayak</li>
                    <li>Gangadhar Barik</li>
                    <li>Sivananda Mallick</li>
                    <li>Ranjan Samal</li>
                    <li>Gangadhar Sutar</li>
                    <li>Bikas Nayak</li>
                    <li>Prasanta Pati</li>
                    <li>Narendra Swaim</li>
                    <li>Udaybhanu Mallick</li>
                    <li>Binduprasad Behera</li>
                    <li>Jyotiranjan Pati - <span class="phone">9090459952</span></li>
                    <li>Sukant Kumar Behera - <span class="phone">7977354576</span></li>
                </ol>
            </div>
        </div>

        {{-- Media Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-danger">Media Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Binduprasad Behera</li>
                    <li>Naresh Majhi</li>
                    <li>Om Prakash Nayak</li>
                    <li>Himanshu Nayak</li>
                    <li>Manmohan Samal Nayak</li>
                    <li>Abhay Das</li>
                    <li>Aruna k Samal</li>
                    <li>Gyanendra Rout - <span class="phone">9348173277</span></li>
                </ol>
            </div>
        </div>

        {{-- Adviser Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-info">Adviser Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Ramakrisna Samal</li>
                    <li>Sital Behera</li>
                    <li>Narendra Samal</li>
                    <li>Hrudananda Panda</li>
                    <li>Anirudha Nayak</li>
                    <li>Rathekar Panda</li>
                </ol>
            </div>
        </div>

        {{-- Magazine Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-secondary">Magazine Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Abhaya Sutar</li>
                    <li>Golak Nayak</li>
                    <li>Aruna K Samal</li>
                    <li>Amulya Behera</li>
                    <li>Kadambini Dhal</li>
                    <li>Bharati Majhi</li>
                    <li>Bijay Tripathy</li>
                    <li>Uday Ku. Samal</li>
                    <li>Ratikanta Majhi</li>
                </ol>
            </div>
        </div>

        {{-- Entertainment Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-dark">Entertainment Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Amulya Majhi - <span class="phone">7008796235</span></li>
                    <li>Truna Sutar - <span class="phone">7872473922</span></li>
                    <li>Ganesh Samal - <span class="phone">7789844729</span></li>
                    <li>Ajit Majhi - <span class="phone">8457954115</span></li>
                    <li>Amulya Bal - <span class="phone">9937824738</span></li>
                    <li>Srikanta Behera - <span class="phone">7682954426</span></li>
                    <li>Mahendra Biswal</li>
                    <li>Biswaranjan Nayak - <span class="phone">7327030994</span></li>
                </ol>
            </div>
        </div>

        {{-- Clean Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-light text-dark">Clean Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Prasanta Pati</li>
                    <li>Laxmidhara Nayak</li>
                </ol>
            </div>
        </div>

        {{-- Discipline Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-primary">Discipline Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Bidyadhar Sutar</li>
                    <li>Bichitra Nayak</li>
                    <li>Ratikanta Majhi</li>
                    <li>Ramakanta Lenka</li>
                    <li>Shashadhar Behera</li>
                    <li>Pradeep Pati</li>
                    <li>Ashok Samal</li>
                    <li>Bimal Nayak</li>
                    <li>Gagan Nayak</li>
                    <li>Ananta Nayak</li>
                    <li>Udaybhanu Mallick </li>
                    <li>Sankaranda Mallick - <span class="phone">9186162741</span></li>
                </ol>
            </div>
        </div>

        {{-- Award Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-success">Award Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Sital Behera</li>
                    <li>Manmohan Majhi</li>
                    <li>Binayak Majhi</li>
                    <li>Kulamani Samal</li>
                    <li>Bichitra Nayak</li>
                </ol>
            </div>
        </div>

        {{-- Decoration Committee --}}
        <div class="committee-card">
            <h3 class="committee-header bg-warning text-dark">Decoration Committee</h3>
            <div class="committee-body">
                <ol>
                    <li>Chinmaya Swain</li>
                    <li>Amulya Majhi</li>
                    <li>Sivananda Mallick</li>
                    <li>Kalia Behera</li>
                    <li>Badal Majhi</li>
                    <li>Om Prakash Nayak</li>
                    <li>Bikas Nayak - <span class="phone">9344064760</span></li>
                </ol>
            </div>
        </div>

    </div>
</div>

@endsection