@extends('website.layout')

@section('title', '📖 Add Magazine')

@section('content')
<style>
    /* ===== Magazine Section ===== */
    .magazine-section {
        background: #fdfdfd;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .magazine-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        max-width: 650px;
        width: 100%;
        padding: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .magazine-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.15);
    }

    .magazine-card h4 {
        text-align: center;
        font-weight: 700;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    .magazine-card .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
    }

    .magazine-card .form-control,
    .magazine-card .form-select {
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        border: 1px solid #ddd;
        transition: all 0.2s ease-in-out;
    }

    .magazine-card .form-control:focus,
    .magazine-card .form-select:focus {
        border-color: #1a1716ff;
        box-shadow: 0 0 8px rgba(169, 68, 56, 0.2);
    }

    .magazine-card textarea {
        resize: vertical;
        min-height: 120px;
    }

    .magazine-card .btn-success {
        background: linear-gradient(90deg, #28a745, #34d058);
        border: none;
        padding: 0.75rem 2rem;
        font-weight: 600;
        font-size: 1.1rem;
        border-radius: 12px;
        transition: all 0.25s ease;
    }

    .magazine-card .btn-success:hover {
        background: linear-gradient(90deg, #218838, #2ebd50);
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(40, 167, 69, 0.3);
    }

    /* Loader Overlay */
    #loaderOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.85);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Force Select2 to look like Bootstrap form-control-lg */
    .select2-container--default .select2-selection--single {
        height: 52px !important;
        /* same as .form-control-lg */
        border: 1px solid #ddd !important;
        border-radius: 12px !important;
        padding: 0.75rem 1rem !important;
        font-size: 1rem !important;
        line-height: 1.5 !important;
        background-color: #fff !important;
        display: flex !important;
        align-items: center !important;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05) !important;
        transition: all 0.2s ease-in-out;
    }

    /* Text inside */
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #333 !important;
        font-weight: 500 !important;
        line-height: 1.5rem !important;
        padding-left: 0 !important;
    }

    /* Dropdown arrow */
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
        right: 12px !important;
    }

    /* Focus effect like Bootstrap */
    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #1a1716ff !important;
        box-shadow: 0 0 8px rgba(169, 68, 56, 0.25) !important;
    }

    /* Dropdown menu */
    .select2-dropdown {
        border-radius: 12px !important;
        border: 1px solid #ddd !important;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1) !important;
        background: #fff !important;
        overflow: hidden !important;
    }

    /* Options */
    .select2-results__option {
        padding: 0.6rem 1rem !important;
        font-size: 0.95rem !important;
        cursor: pointer !important;
    }

    .select2-results__option--highlighted[aria-selected] {
        background: linear-gradient(90deg, #a94438, #d66d5c) !important;
        color: #fff !important;
    }

    /* Placeholder */
    .select2-selection__placeholder {
        color: #1b1616ff !important;
        font-style: italic !important;
    }
</style>

<!-- Loader Overlay (Hidden by Default) -->
<div id="loaderOverlay" style="
    display: none;
    position: fixed;
    top:0; left:0; width:100%; height:100%;
    background: rgba(255,255,255,0.85);
    z-index: 9999;
    justify-content:center;
    align-items:center;
">
    <div class="spinner-border text-success" role="status" style="width:3rem;height:3rem;">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<!-- Magazine Section -->
<section class="magazine-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9 col-sm-12">
                <div class="magazine-card">
                    <h4>📖 Add Magazine</h4>
                    <form action="{{ route('add-magazines') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control form-control-lg @error('title') is-invalid @enderror"
                                placeholder="Enter magazine title" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Alumni ID -->
                        <div class="mb-4">
                            <label for="alumni_id" class="form-label fw-semibold">Alumni</label>
                            <select name="alumni_id" id="alumni_id"
                                class="form-select form-select-lg @error('alumni_id') is-invalid @enderror"
                                required>
                                <option value="">-- Select Alumni --</option>
                                @foreach($alumni as $alum)
                                <option value="{{ $alum->id }}" {{ old('alumni_id') == $alum->id ? 'selected' : '' }}>
                                    {{ $alum->name }} ({{ $alum->passout_year }})
                                </option>
                                @endforeach
                            </select>
                            @error('alumni_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div class="mb-4">
                            <label for="type" class="form-label fw-semibold ">Type</label>
                            <select name="type" id="type"
                                class="form-select form-select-lg @error('type') is-invalid @enderror"
                                required onchange="toggleFields()">
                                <option value="">-- Select Type --</option>
                                <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>Image And Document</option>
                                <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4" id="imageField" style="display:none;">
                            <label for="image" class="form-label fw-semibold">Upload File</label>
                            <input type="file" name="image" id="image"
                                class="form-control form-control-lg @error('image') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.pdf,.docx">
                            <small class="text-muted">Allowed: JPG, PNG, PDF, DOCX (max 2MB)</small>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4" id="descriptionField" style="display:none;">
                            <label for="details" class="form-label fw-semibold">Description</label>
                            <textarea name="details" id="details"
                                class="form-control form-control-lg @error('details') is-invalid @enderror"
                                rows="5" placeholder="Write your magazine content here...">{{ old('details') }}</textarea>
                            @error('details')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-success px-5">✅ Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery + Select2 + SweetAlert -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#alumni_id').select2({
            placeholder: "Search Alumni by Name",
            allowClear: true,
            width: '100%'
        });
    });

    function toggleFields() {
        const type = document.getElementById('type').value;
        document.getElementById('imageField').style.display = (type === 'image') ? 'block' : 'none';
        document.getElementById('descriptionField').style.display = (type === 'text') ? 'block' : 'none';
    }
    document.addEventListener('DOMContentLoaded', toggleFields);

    // Frontend Validation + Loader
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector(".needs-validation");

        form.addEventListener("submit", function(event) {
            event.preventDefault();
            let valid = true;

            form.querySelectorAll(".frontend-error").forEach(e => e.remove());
            form.querySelectorAll(".is-invalid").forEach(e => e.classList.remove("is-invalid"));

            const title = document.getElementById("title");
            if (!title.value.trim()) {
                showError(title, "Title is required.");
                valid = false;
            }

            const alumni = document.getElementById("alumni_id");
            if (!alumni.value.trim()) {
                showError(alumni, "Please select an alumni.");
                valid = false;
            }

            const type = document.getElementById("type");
            if (!type.value.trim()) {
                showError(type, "Please select a type.");
                valid = false;
            }

            if (type.value === "text") {
                const desc = document.getElementById("details");
                if (!desc.value.trim()) {
                    showError(desc, "Description is required for text type.");
                    valid = false;
                }
            }

            if (type.value === "image") {
                const image = document.getElementById("image");
                if (image.files.length === 0) {
                    showError(image, "Please upload a file (JPG, PNG, PDF, DOCX).");
                    valid = false;
                } else {
                    const file = image.files[0];
                    const allowedTypes = ["image/jpeg", "image/png", "application/pdf",
                        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                    ];
                    if (!allowedTypes.includes(file.type)) {
                        showError(image, "Only JPG, PNG, PDF, or DOCX files are allowed.");
                        valid = false;
                    }
                    if (file.size > 2 * 1024 * 1024) {
                        showError(image, "File size must not exceed 2MB.");
                        valid = false;
                    }
                }
            }

            if (valid) {
                document.getElementById("loaderOverlay").style.display = "flex"; // show loader
                form.submit();
            }
        });

        function showError(input, message) {
            input.classList.add("is-invalid");
            const error = document.createElement("div");
            error.className = "invalid-feedback frontend-error";
            error.textContent = message;
            input.parentNode.appendChild(error);
        }
    });
</script>

@if(session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#28a745'
        });
    });
</script>
@endif

@endsection
