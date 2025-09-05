@extends('website.layout')

@section('title', '🎓 Alumni Registration | UGNB')
<link rel="stylesheet" href="{{ asset('css/website/career.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

@section('content')
<!-- Alumni Registration Form -->
<div class="alumni-container">
    <div class="alumni-card">
        <h3 class="alumni-title">🎓 Alumni Registration</h3>

        <form id="alumniForm" method="POST" action="{{ route('alumni-registration') }}" enctype="multipart/form-data">
            @csrf

            <!-- Full Name -->
            <div class="mb-3">
                <label class="form-label fw-bold">Full Name *</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name">
                <div class="invalid-feedback">Full Name is required.</div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label fw-bold">Email *</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label fw-bold">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number">
                <div class="invalid-feedback">Phone number must be 10 digits.</div>
            </div>

            <!-- Passout Year -->
            <div class="mb-3">
                <label class="form-label fw-bold">Passout Year *</label>
                <input type="number" name="passout_year" id="passout_year" class="form-control" placeholder="Between 1973 to 2025" min="1973" max="{{ date('Y') }}">
                <div class="invalid-feedback">Passout Year is required.(1973–2025 as of now)</div>
            </div>

            <!-- Photo Upload -->
            <div class="mb-3">
                <label class="form-label fw-bold">Profile Photo (Passport Size) *</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/jpeg, image/png">

                <!-- Preview -->
                <div id="photoPreview" class="preview-box d-none mt-2">
                    <img id="previewImg" src="#" alt="Passport Preview">
                </div>

                <small class="text-muted d-block mt-2 form-instruction">
                    📌 <strong>Instructions: Upload a recent passport-size photo</strong><br>
                    ✔ JPG/PNG format only<br>
                    ✔ Face clearly visible<br>
                    ✔ Recommended size: <strong>3.5cm × 4.5cm</strong> (≈ <strong>300×400px</strong>)<br><br>

                    🖼️ <strong>If your photo is larger:</strong><br>
                    ➡ Crop it so only your head & shoulders are visible.<br>
                    ➡ Keep your face centered (~70–80% of the frame).<br>
                    ➡ Use free tools:
                    <a href="https://www.simpleimageresizer.com" target="_blank" rel="noopener noreferrer">Simple Image Resizer</a>,
                    <a href="https://www.iloveimg.com/crop-image" target="_blank" rel="noopener noreferrer">ILoveIMG Crop.</a><br>
                    ➡ Save as JPG/PNG before uploading.
                </small>


                <div class="invalid-feedback">Passport size photo is required (JPG/PNG only).</div>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-submit">💾 Save Alumni</button>
        </form>
        <div id="loaderContainer" class="loader-container" style="display: none;">
            <div class="loader"></div>
            <p style="text-align: center;">Processing your registration...</p>
        </div>
    </div>
</div>



<!-- CSS -->
<style>
    .alumni-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .alumni-card {
        width: 100%;
        max-width: 600px;
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .alumni-title {
        text-align: center;
        font-weight: 700;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 5px;
        display: block;
        color: #34495e;
    }

    .form-control {
        border-radius: 10px;
        padding: 10px 12px;
        border: 1px solid #ced4da;
        width: 100%;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 6px rgba(0, 123, 255, 0.4);
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        font-weight: bold;
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #0056b3, #003f7f);
    }

    .invalid-feedback {
        display: none;
        font-size: 0.9rem;
        color: red;
    }

    .is-invalid~.invalid-feedback {
        display: block;
    }

    /* Preview box */
    .preview-box {
        border: 1px dashed #bbb;
        border-radius: 8px;
        padding: 8px;
        max-width: 150px;
        background: #fafafa;
    }

    .preview-box img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    /* Instruction text */
    .form-instruction {
        font-size: 0.9rem;
        line-height: 1.5;
        color: #6c757d;
        /* muted look */
    }

    /* Responsive */
    @media (max-width: 768px) {
        .alumni-card {
            padding: 20px;
        }
    }

    @media (max-width: 576px) {
        .alumni-title {
            font-size: 1.2rem;
        }

        .btn-submit {
            font-size: 0.95rem;
        }

        /* Smaller instructions on mobile */
        .form-instruction {
            font-size: 0.75rem;
            line-height: 1.3;
        }
    }

    /* New CSS for loader */
    .loader-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 100px 0 140px 40px;
    }

    .loader {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        /* Blue color for the spinner */
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Utility class to hide elements */
    .d-none {
        display: none !important;
    }
</style>


<!-- JS Validation + Live Preview -->
<script>
    document.getElementById('alumniForm').addEventListener('submit', function(e) {
        // Stop default first
        // Get elements
        const form = document.getElementById('alumniForm');
        const loaderContainer = document.getElementById('loaderContainer');
        e.preventDefault();

        // ✅ Step 1: Name
        const name = document.getElementById('name');
        if (name.value.trim() === '') {
            name.classList.add('is-invalid');
            name.focus();
            return false; // stop here
        } else {
            name.classList.remove('is-invalid');
        }

        // ✅ Step 2: Email
        const email = document.getElementById('email');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email.value.trim() === '' || !emailPattern.test(email.value.trim())) {
            email.classList.add('is-invalid');
            email.focus();
            return false;
        } else {
            email.classList.remove('is-invalid');
        }

        // ✅ Step 3: Phone (optional but valid if filled)
        const phone = document.getElementById('phone');
        if (phone.value.trim() !== '') {
            const phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone.value.trim())) {
                phone.classList.add('is-invalid');
                phone.focus();
                return false;
            } else {
                phone.classList.remove('is-invalid');
            }
        } else {
            phone.classList.remove('is-invalid'); // clear if empty
        }

        // ✅ Step 4: Passout Year
        const passoutYear = document.getElementById('passout_year');
        const currentYear = new Date().getFullYear();

        if (passoutYear.value.trim() === '') {
            passoutYear.classList.add('is-invalid');
            passoutYear.focus();
            return false;
        } else if (
            isNaN(passoutYear.value) ||
            passoutYear.value < 1973 ||
            passoutYear.value > currentYear
        ) {
            passoutYear.classList.add('is-invalid');
            passoutYear.focus();
            return false;
        } else {
            passoutYear.classList.remove('is-invalid');
        }

        // ✅ Step 5: Photo
        const photo = document.getElementById('photo');
        if (photo.files.length === 0) {
            photo.classList.add('is-invalid');
            photo.focus();
            return false;
        } else {
            const allowedTypes = ['image/jpeg', 'image/png'];
            if (!allowedTypes.includes(photo.files[0].type)) {
                photo.classList.add('is-invalid');
                photo.focus();
                return false;
            } else {
                photo.classList.remove('is-invalid');
            }
        }

        // ✅ If all validations pass → submit form
        this.submit();
        // If validation passes, show loader
        form.style.display = 'none'; // Hide the form
        loaderContainer.style.display = 'block'; // Show the loader
    });

    // ✅ Live Photo Preview
    document.getElementById('photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file && ['image/jpeg', 'image/png'].includes(file.type)) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('photoPreview').classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>



@endsection
