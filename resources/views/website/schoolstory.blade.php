@extends('website.layout')

@section('title', 'Home | MyWebsite')

@section('content')
<style>
    /* ==== Global Styles ==== */
    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f8f9fa, #eef2f7);
        color: #333;
    }

    h2 {
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    /* ==== Card Styling ==== */
    .custom-card {
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        background: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
    }

    .card-body {
        padding: 2.5rem;
    }

    /* ==== Language Switcher ==== */
    .language-switcher {
        border-radius: 50px;
        padding: 0.5rem 1.2rem;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        transition: all 0.2s ease-in-out;
    }

    .language-switcher:hover {
        transform: scale(1.05);
    }

    /* ==== Paragraphs ==== */
    .fs-5 {
        line-height: 1.8;
        margin-bottom: 1rem;
        color: #444;
    }

    /* ==== Section Animation ==== */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center fade-in">
        <div class="col-lg-10 col-md-12">

            <!-- Language Dropdown -->
            <div class="d-flex justify-content-end mb-4">
                <select id="languageSwitcher" class="form-select language-switcher w-auto">
                    <option value="en" selected>English</option>
                    <option value="or">Odia</option>
                </select>
            </div>

            <!-- Card -->
            <div class="custom-card">
                <div class="card-body">

                    <!-- English Content -->
                    <div id="content-en">
                        <h2 class="text-center text-gradient mb-4">History of Our School</h2>
                        <p class="fs-5 text-justify">
                            Utkalmani Gopabandhu Nodal Bidyapitha (UGNB), established in 1973 in the historic village of Narendrapur, carries forward a rich educational legacy dating back to 1896...
                        </p>
                        <p class="fs-5 text-justify">
                            Our school is deeply connected to Narendrapur, a village renowned for its sacred Shiv Lingas and harmonious cultural diversity...
                        </p>
                        <p class="fs-5 text-justify">
                            From its inception through community-led funding to its current status of a Government School, UGNB has consistently pursued a forward-thinking vision...
                        </p>
                        <p class="fs-5 text-justify">
                            UGNB delivers a comprehensive curriculum from standard 6 to 10, striking a balance between rigorous academic instruction and extracurricular activities...
                        </p>
                        <p class="fs-5 text-justify">
                            The institution is further enriched by Narendrapur’s vibrant cultural traditions. Annual celebrations like Makar Sankranti and Pana Sankranti inspire engagement...
                        </p>
                        <p class="fs-5 text-justify">
                            As UGNB commemorates its Golden Jubilee, we remain steadfast in our mission to provide quality education while upholding discipline, cultural awareness, and civic responsibility...
                        </p>
                    </div>

                    <!-- Odia Content -->
                    <div id="content-or" style="display:none;">
                        <h2 class="text-center text-gradient mb-4">ଆମ ବିଦ୍ୟାଳୟର ଇତିହାସ</h2>
                        <p class="fs-5 text-justify">
                            ଉତ୍କଳମଣି ଗୋପବନ୍ଧୁ ନୋଡାଲ ବିଦ୍ୟାପୀଠ (UGNB), ୧୯୭୩ ମସିହାରେ ଐତିହାସିକ ନରେନ୍ଦ୍ରପୁର ଗ୍ରାମରେ ପ୍ରତିଷ୍ଠିତ...
                        </p>
                        <p class="fs-5 text-justify">
                            ଆମର ସ୍କୁଲ ନରେନ୍ଦ୍ରପୁର ସହିତ ଗଭୀର ଭାବରେ ଜଡିତ, ଏକ ଗ୍ରାମ ଯାହା ପବିତ୍ର ଶିବ ଲିଙ୍ଗ ଏବଂ ସାଂସ୍କୃତିକ ବିବିଧତା ପାଇଁ ପ୍ରସିଦ୍ଧ...
                        </p>
                        <p class="fs-5 text-justify">
                            ସମ୍ପ୍ରଦାୟ ନେତୃତ୍ୱାଧୀନ ପାଣ୍ଠି ମାଧ୍ୟମରେ, UGNB ନିରନ୍ତର ଏକ ଭବିଷ୍ୟତ ଚିନ୍ତାଧାରା ଅନୁସରଣ କରିଛି...
                        </p>
                        <p class="fs-5 text-justify">
                            UGNB ମାନଦଣ୍ଡ ଷଷ୍ଠରୁ ଦଶମ ପର୍ଯ୍ୟନ୍ତ ଏକ ବ୍ୟାପକ ପାଠ୍ୟକ୍ରମ ପ୍ରଦାନ କରେ...
                        </p>
                        <p class="fs-5 text-justify">
                            ନରେନ୍ଦ୍ରପୁରର ସ୍ପନ୍ଦନଶୀଳ ସାଂସ୍କୃତିକ ପରମ୍ପରା ଦ୍ୱାରା ଏହି ଅନୁଷ୍ଠାନ ସମୃଦ୍ଧ ହୋଇଛି...
                        </p>
                        <p class="fs-5 text-justify">
                            UGNB ଏହାର ସୁବର୍ଣ୍ଣ ଜୟନ୍ତୀ ପାଳନ କରୁଥିବାରୁ, ଆମେ ଶୃଙ୍ଖଳା, ସାଂସ୍କୃତିକ ସଚେତନତା ଏବଂ ନାଗରିକତାର ସର୍ବୋଚ୍ଚ ମାନଦଣ୍ଡକୁ ବଜାୟ ରଖି...
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Language Switcher
    document.getElementById("languageSwitcher").addEventListener("change", function () {
        var lang = this.value;
        if (lang === "or") {
            document.getElementById("content-en").style.display = "none";
            document.getElementById("content-or").style.display = "block";
        } else {
            document.getElementById("content-en").style.display = "block";
            document.getElementById("content-or").style.display = "none";
        }
    });
</script>
@endsection
