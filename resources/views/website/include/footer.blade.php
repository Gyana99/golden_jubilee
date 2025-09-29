<footer class="footer-section text-light py-4">
    <div class="container text-center">
        <!-- Social Links -->
        <div class="mb-3">
            <a href="#" class="social-link me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-link me-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
        </div>

        <!-- Visitor Counter -->
        <p id="visitorCount" class="mb-1 fw-bold"></p>

        <!-- Footer Text -->
        <p class="mb-0 small">
            &copy; {{ date('Y') }} U.G. ବିଦ୍ୟାପୀଠ, ନରେନ୍ଦ୍ରପୁର. All rights reserved.
        </p>
    </div>
</footer>

<style>
    .footer-section {
        background: linear-gradient(to right, #24cdcd, #1e90ff);
    }

    .social-link {
        color: #fff;
        font-size: 1.5rem;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .social-link:hover {
        color: yellow;
        transform: scale(1.2);
    }

    #visitorCount {
        color: #fff;
        font-size: 16px;
    }
</style>
<script>
    $(document).ready(function() {
        // Check localStorage
        let alreadyVisited = localStorage.getItem("visitedUGBidyapith");

        let visitType = alreadyVisited ? 2 : 1; // if visited → only count, else → insert

        $.ajax({
            url: AJAXURL + "/countVisits",
            method: "POST",
            data: {
                id: visitType,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function(response) {
                if (response.status === 200) {
                    $("#visitorCount").text("👥 Total Visits : " + response.count);

                    // If first time, set localStorage
                    if (!alreadyVisited) {
                        localStorage.setItem("visitedUGBidyapith", "yes");
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });
</script>
