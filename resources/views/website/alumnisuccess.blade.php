@extends('website.layout')

@section('title', '✅ Registration Status')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .success-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        min-height: 80vh;
    }

    .success-card {
        width: 100%;
        max-width: 600px;
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .success-icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }

    .success-card h4 {
        font-weight: 600;
        margin-bottom: 15px;
    }

    .alumni-details p {
        font-size: 1rem;
        margin: 5px 0;
        color: #333;
    }

    .alumni-photo img {
        margin-top: 15px;
        max-width: 150px;
        border-radius: 8px;
        border: 2px solid #ddd;
    }

    .redirect-btn {
        margin-top: 20px;
        padding: 10px 25px;
        font-size: 1rem;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }

    .redirect-btn:hover {
        background-color: #0056b3;
    }

    .alumni-details {
        margin-top: 15px;
        width: 100%;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 12px;
        border-bottom: 1px solid #e5e5e5;
    }

    .detail-label {
        font-weight: 600;
        color: #444;
    }

    .detail-value {
        color: #222;
        text-align: right;
        word-break: break-word;
    }

    .alumni-details {
        margin-top: 15px;
        width: 100%;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
        background: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 15px;
        border-bottom: 1px solid #e5e5e5;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
        color: #444;
    }

    .detail-value {
        color: #222;
        text-align: right;
        word-break: break-word;
    }

    .redirect-text {
        margin-top: 15px;
        text-align: center;
        color: #6c757d;
        font-size: 0.95rem;
    }
    /* ✅ Responsive Design */
@media (max-width: 768px) {
    .success-card {
        padding: 20px;
    }
    .success-icon {
        font-size: 2.2rem;
    }
    .success-card h4 {
        font-size: 1.2rem;
    }
    .alumni-details {
        max-width: 100%;
        font-size: 0.9rem;
    }
    .detail-row {
        padding: 8px 10px;
        flex-direction: column;
        align-items: flex-start;
    }
    .detail-label,
    .detail-value {
        display: block;
        text-align: left;
        width: 100%;
    }
    .redirect-btn {
        width: 100%;
        padding: 12px;
        font-size: 1rem;
    }
    .alumni-photo img {
        max-width: 100px;
    }
}

@media (max-width: 480px) {
    .success-card {
        padding: 15px;
    }
    .success-icon {
        font-size: 1.8rem;
    }
    .success-card h4 {
        font-size: 1rem;
    }
    .redirect-text {
        font-size: 0.85rem;
    }
}

</style>

@section('content')
<div class="success-container">
    <div class="success-card">
        @if(session('alumniId'))
        @if(session('status') == 'new')
        <i class="fas fa-check-circle success-icon" style="color: #28a745;"></i>
        <h4>🎉 Registration Successful!</h4>
        <p>Welcome, <strong>{{ session('name') }}</strong>. You are now part of our Alumni family.</p>
        @else
        <i class="fas fa-info-circle success-icon" style="color: #ffc107;"></i>
        <h4>⚠ Already Registered</h4>
        <p>Hello <strong>{{ session('name') }}</strong>, your details are already in our records.</p>
        @endif

        <div class="alumni-details">
            <div class="detail-row">
                <span class="detail-label">Alumni ID:</span>
                <span class="detail-value">{{ session('alumniId') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Email:</span>
                <span class="detail-value">{{ session('email') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Passout Year:</span>
                <span class="detail-value">{{ session('year') }}</span>
            </div>
        </div>


        @if(session('photo'))
        <div class="alumni-photo">
            <img src="{{ asset('storage/alumniphoto/' . session('photo')) }}" alt="Alumni Photo">
        </div>
        @endif

        <button class="redirect-btn" onclick="redirectToForm()">🔙 Back to Registration</button>
        <p class="redirect-text">
            ⏳ You will be redirected in <span id="countdown">30</span> seconds...
        </p>
        @else
        <script>
            window.location = "{{ route('alumni-registration') }}";
        </script>
        @endif
    </div>
</div>

<script>
    function redirectToForm() {
        window.location.href = "{{ route('alumni-registration') }}";
    }

    let countdownElement = document.getElementById('countdown');
    let seconds = 30;

    function redirectToRegistration() {
        window.location.href = "{{ route('alumni-registration') }}";
    }

    const countdownInterval = setInterval(() => {
        seconds--;
        countdownElement.textContent = seconds;

        if (seconds <= 0) {
            clearInterval(countdownInterval);
            redirectToRegistration();
        }
    }, 1000);
</script>
@endsection
