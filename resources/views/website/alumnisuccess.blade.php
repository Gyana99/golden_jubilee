@extends('website.layout')

@section('title', '✅ Registration Successful')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Updated styling for the success card */
    .success-container {
        /* This already centers the card horizontally */
        display: flex;
        justify-content: center;
        align-items: center; /* Ensures vertical centering on the page */
        padding: 20px;
        min-height: 80vh; /* Use a minimum height to make vertical centering visible */
    }
    .alumni-card {
        width: 100%;
        max-width: 600px;
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        
        /* This is the key change for inner content centering */
        display: flex; 
        flex-direction: column;
        justify-content: center; /* Centers content vertically within the card */
        align-items: center;    /* Centers content horizontally within the card */
    }
    .success-card {
        width: 100%;
        background: #e9f5e9;
        padding: 25px;
        border-radius: 15px;
        border: 1px solid #c8e6c9;
        text-align: center;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        
        /* Ensures inner content is centered */
        display: flex; 
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .success-icon {
        color: #28a745;
        font-size: 3rem;
        margin-bottom: 20px;
    }
    .success-card h4 {
        color: #1e7e34;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .success-card p {
        font-size: 1rem;
        color: #333;
        margin-bottom: 5px;
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
        transition: background-color 0.3s ease;
    }
    .redirect-btn:hover {
        background-color: #0056b3;
    }
    .redirect-text {
        font-size: 0.9rem;
        color: #6c757d;
        margin-top: 15px;
    }
    /* Responsive styles for smaller screens */
    @media (max-width: 768px) {
        .success-card {
            padding: 20px;
        }
        .success-icon {
            font-size: 2.5rem;
        }
        .success-card h4 {
            font-size: 1.25rem;
        }
        .success-card p {
            font-size: 0.9rem;
        }
    }
</style>

@section('content')
<div class="alumni-container">
    <div class="alumni-card">
        @if(session('alumniId'))
            <div class="success-card">
                <i class="fas fa-check-circle success-icon"></i>
                <h4 class="mb-3">Registration Successful!</h4>
                <p>Hello, <strong>{{ session('name') }}</strong>.</p>
                <p>Your Alumni ID is: <strong>{{ session('alumniId') }}</strong></p>
                <p>Please check your email for a confirmation message.</p>

                <button class="redirect-btn" onclick="redirectToRegistration()">Go to Registration Page</button>
                <p class="redirect-text">You will be redirected in <span id="countdown">30</span> seconds...</p>
            </div>
        @else
            <script>window.location = "{{ route('alumni-registration') }}";</script>
        @endif
    </div>
</div>

<script>
    // JavaScript for countdown and redirect
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