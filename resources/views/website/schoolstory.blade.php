@extends('website.layout')

@section('title', 'Home | MyWebsite')

{{-- Custom CSS --}}
<style>
    /* Title Styling */
    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #0d6efd;
        text-align: center;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .page-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: #0d6efd;
        margin: 0.5rem auto 0;
        border-radius: 2px;
    }

    /* Card Styling */
    .history-card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        background: #fff;
    }

    /* Paragraphs */
    .history-content p {
        text-align: justify;
        line-height: 1.8;
        margin-bottom: 1rem;
        font-size: 1.05rem;
    }

    /* Responsive Tweaks */
    @media (max-width: 768px) {
        .page-title {
            font-size: 1.6rem;
        }

        .history-content p {
            font-size: 1rem;
        }
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-11 col-12">
            <!-- Custom Language Switcher -->
            <div class="d-flex justify-content-end mb-4">
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle rounded-pill px-4 shadow-sm"
                        type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        🌐 English
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow rounded-3" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="#" onclick="switchLanguage('en')">🌐 English</a></li>
                        <li><a class="dropdown-item" href="#" onclick="switchLanguage('or')">🅾️ ଓଡିଆ</a></li>
                    </ul>
                </div>
            </div>



            <!-- Card -->
            <div class="card history-card p-4 p-md-5">

                <!-- English Content -->
                <div id="content-en" class="history-content">
                    <h2 class="page-title">School History</h2>
                    <p>
                        Utkalmani Gopabandhu Nodal Bidyapitha (UGNB), established in 1973 in the historic village of Narendrapur, carries forward a rich educational legacy dating back to 1896. For generations, UGNB has played a pivotal role in cultivating knowledgeable, disciplined, and socially responsible individuals.
                    </p>
                    <p>
                        Our school is deeply connected to Narendrapur, a village renowned for its sacred Shiv Lingas and harmonious cultural diversity. This unique setting allows us to embody a philosophy that blends academic excellence with strong community values.
                    </p>
                    <p>
                        From its inception through community-led funding to its current status of a Government School, UGNB has consistently pursued a forward-thinking vision. We have continually expanded our facilities and enhanced our educational offerings while maintaining a close bond with the local community. Our faculty provides a nurturing yet disciplined environment where every student can thrive.
                    </p>
                    <p>
                        UGNB delivers a comprehensive curriculum from standard 6  to 10, striking a balance between rigorous academic instruction and active participation in extracurricular activities. Our teachers are recognized for their ability to instill core values of responsibility, respect, and citizenship.
                    </p>
                    <p>
                        The institution is further enriched by Narendrapur's vibrant cultural traditions. Annual celebrations like Makar Sankranti and Pana Sankranti inspire student engagement and foster immense community pride, creating a spirit of unity and shared heritage that enhances the educational journey.
                    </p>
                    <p>
                        As UGNB commemorates its Golden Jubilee, we remain steadfast in our mission to provide quality education while upholding the highest standards of discipline, cultural awareness, and civic responsibility. We continue to be a beacon of inspiration in the locality, preparing students to excel and contribute meaningfully to society, all while honoring a proud legacy of academic and social excellence.
                    </p>
                </div>

                <!-- Odia Content -->
                <div id="content-or" class="history-content" style="display:none;">
                    <h2 class="page-title">ଆମ ବିଦ୍ୟାଳୟର ଇତିହାସ</h2>
                    <p>
                        ଉତ୍କଳମଣି ଗୋପବନ୍ଧୁ ନୋଡାଲ ବିଦ୍ୟାପୀଠ (UGNB), ୧୯୭୩ ମସିହାରେ ଐତିହାସିକ ନରେନ୍ଦ୍ରପୁର ଗ୍ରାମରେ ପ୍ରତିଷ୍ଠିତ ଏକ ଉଚ୍ଚ ବିଦ୍ୟାଳୟ। ଏହି ଗ୍ରାମରେ ୧୮୯୬ ମସିହାରେ ଏକ ପ୍ରାଥମିକ ବିଦ୍ୟାଳୟ ପ୍ରତିଷ୍ଠା ହୋଇଥିଲା। ‌ସେ ସମୟର ଶିକ୍ଷା କ୍ରାନ୍ତି ଓ ଐତିହ୍ୟକୁ ଉତ୍ତରାଧିକାର ସୂତ୍ରରେ ଆପଣେଇ ଏ ଉଚ୍ଚ ବିଦ୍ୟାଳୟ ଆଗକୁ ବଢିଛି। ପିଢ଼ି ପରେ ପିଢ଼ି ଧରି, ଏହି ବିଦ୍ୟାଳୟଟି ମେଧାବୀ, ଶୃଙ୍ଖଳିତ ଏବଂ ସାମାଜିକ ଦାୟିତ୍ୱବାନ ବ୍ୟକ୍ତିମାନଙ୍କୁ ସୃଷ୍ଟି କରିବାରେ ଏକ ଗୁରୁତ୍ୱପୂର୍ଣ୍ଣ ଭୂମିକା ଗ୍ରହଣ କରିଆସିଛି।

                    </p>
                    <p>
                        ଏହି ସ୍କୁଲ, ପବିତ୍ର ଶିବ ଲିଙ୍ଗର ଗାଁ, ନରେନ୍ଦ୍ରପୁରର ଆଧ୍ୟାତ୍ମିକ ଓ ସାଂସ୍କୃତିକ ବିବିଧତା ସହିତ ଗଭୀର ଭାବେ ଜଡ଼ିତ। ଶିକ୍ଷାନୁଷ୍ଠାନ ଓ ଗାଁ ର ଏହି ବିଶେଷ ଆବେଗିକ ସମ୍ପର୍କ ଆମ ଶୈକ୍ଷିକ ଉତ୍କର୍ଷତାକୁ ଗାଁ ର ସୁସ୍ଥ ସାମ୍ପ୍ରଦାୟିକ ମୂଲ୍ୟବୋଧ ସହିତ ସମ୍ମିଶ୍ରଣ କରିବାରେ ସକ୍ଷମ ହୋଇଛି।

                    </p>
                    <p>
                       ସ୍ଥାନୀୟ ଜନସମୁଦାୟ ପ୍ରଦତ୍ତ ପାଣ୍ଠି ଓ ବିଦ୍ୟାଳୟ ପରିଚାଳନା ଠାରୁ ବର୍ତ୍ତମାନର ସରକାରୀ ପରିଚାଳନା ସ୍ଥିତି ପର୍ଯ୍ୟନ୍ତ, UGNB ନିରନ୍ତର ଏକ ଭବିଷ୍ୟତ ଚିନ୍ତାଧାରା ଅନୁସରଣ କରିଆସିଛି। ଉପଲବ୍ଧ ସୁବିଧାଗୁଡ଼ିର ବିସ୍ତାର ହୋଇଛି ଏବଂ ସ୍ଥାନୀୟ ଜନତା ସହିତ ଏକ ଉତ୍ତମ ସମ୍ପର୍କ ବଜାୟ ରଖି ଶିକ୍ଷାଦାନ ବ୍ୟବସ୍ଥା ଅଧିକ ରୁଦ୍ଧିମନ୍ତ ହୋଇପାରିଛି। ଶିକ୍ଷକମାନେ ଶିକ୍ଷାଦାନ ପାଇଁ ଏକ ଉନ୍ନତ ଓ ଶୃଙ୍ଖଳିତ ପରିବେଶ ସୃଷ୍ଟି କରିଛନ୍ତି ଯେଉଁଠାରେ ପ୍ରତ୍ୟେକ ଅଧ୍ୟାୟୀ ଏକ ଉତ୍ତମ ସମାଜର କଳ୍ପନା କରିପାରୁଛି।

                    </p>
                    <p>
                        ଏହି ସ୍କୁଲ ଷଷ୍ଠରୁ ଦଶମ ପର୍ଯ୍ୟନ୍ତ ପାଠ୍ୟକ୍ରମ ପ୍ରଦାନ କରିଆସୁଛି, ଯାହା ପାଠ୍ୟ ବ୍ୟବସ୍ଥା ଓ ପାଠ୍ୟକ୍ରମ ବହିର୍ଭୁତ କାର୍ଯ୍ୟକଳାପ ସହିତ ସକ୍ରିୟ ସନ୍ତୁଳନ ରଖିଆସିଛି। ଶିକ୍ଷକମାନେ ବିଦ୍ୟାର୍ଥୀମାନଙ୍କ ଭିତରେ ଦାୟିତ୍ୱବୋଧ, ସମ୍ମାନ ଏବଂ ନାଗରିକତାର ମୈାଳିକ ମୂଲ୍ୟବୋଧ ସ୍ଥାପନ କରିବାରେ ସକ୍ଷମ ହୋଇଛନ୍ତି।

                    </p>
                    <p>
                        ନରେନ୍ଦରପୁରର ସ୍ପନ୍ଦିତ ସାଂସ୍କୃତିକ ପରମ୍ପରା ଦ୍ୱାରା ଏହି ଅନୁଷ୍ଠାନ ଆହୁରି ସମୃଦ୍ଧ ହୋଇଛି। ମକର ସଂକ୍ରାନ୍ତି ଏବଂ ପଣା ସଂକ୍ରାନ୍ତି ପରି ବାର୍ଷିକ ସାଂସ୍କୃତିକ ଉତ୍ସବରେ ବିଦ୍ୟାର୍ଥୀମାନେ ସାମିଲ୍ ହେବା ଏବଂ ବିଶାଳ ସାମୁଦାୟିକ ଗର୍ବକୁ ପ୍ରୋତ୍ସାହିତ କରିବା, ଏକତା ଏବଂ ସହଭାଗୀ ଐତିହ୍ୟର ଭାବନା ସୃଷ୍ଟି କରିବାରେ ଅଧ୍ୟୟନର ଯାତ୍ରା ରୁଦ୍ଧିମନ୍ତ ହୋଇଛି।

                    </p>
                    <p>
                        UGNB ଏହାର ସୁବର୍ଣ୍ଣ ଜୟନ୍ତୀ ପାଳନ କରୁଥିବାରୁ, ସର୍ବୋପରି ଶୃଙ୍ଖଳା, ସାଂସ୍କୃତିକ ସଚେତନତା ଏବଂ ନାଗରିକ ଦାୟିତ୍ୱର ସର୍ବୋଚ୍ଚ ମାନଦଣ୍ଡକୁ ବଜାୟ ରଖି ଗୁଣାତ୍ମକ ଶିକ୍ଷା ପ୍ରଦାନ କରିବା ପାଇଁ ଦୃଢ ସଙ୍କଳ୍ପରେ ବ୍ରତୀ ଅଛି। 

                    </p>
                    <p>
                        ସ୍ଥାନୀୟ ଅଞ୍ଚଳରେ ଏହା ପ୍ରେରଣାର ଏକ ଆଲୋକବର୍ତ୍ତିକା ହୋଇ ରହୁ, ଛାତ୍ରଛାତ୍ରୀମାନଙ୍କୁ ଉତ୍କର୍ଷତା ହାସଲ କରିବା ଏବଂ ସମାଜରେ ଅର୍ଥପୂର୍ଣ୍ଣ ଯୋଗଦାନ ଦେବା ପାଇଁ ପ୍ରସ୍ତୁତ କରୁ, ଏବଂ ସାମାଜିକ ଉତ୍କର୍ଷତାର ଏକ ଗର୍ବିତ ଐତିହ୍ୟକୁ ଆଗକୁ ନେଉ ଏହାହିଁ କାମନା।

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function switchLanguage(lang) {
        if (lang === "or") {
            document.getElementById("content-en").style.display = "none";
            document.getElementById("content-or").style.display = "block";
            document.getElementById("languageDropdown").innerHTML = "🅾️ ଓଡିଆ";
        } else {
            document.getElementById("content-en").style.display = "block";
            document.getElementById("content-or").style.display = "none";
            document.getElementById("languageDropdown").innerHTML = "🌐 English";
        }
    }
</script>
@endsection