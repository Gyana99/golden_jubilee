@extends('website.layout')

@section('title', '📖 Add Magazine')

@section('content')
<style>
    /* ===== Magazine Section ===== */
    .magazine-section {
        padding: 3rem 1rem;
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

    /* Header */
    .magazine-card h4 {
        font-size: 1.6rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1.5rem;
        background: linear-gradient(90deg, #a94438, #d66d5c);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Form Labels */
    .magazine-card .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
    }

    /* Inputs */
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
        border-color: #a94438;
        box-shadow: 0 0 8px rgba(169, 68, 56, 0.2);
    }

    /* Textarea */
    .magazine-card textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* Submit Button */
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

    /* Responsive */
    @media (max-width: 768px) {
        .magazine-card {
            padding: 1.5rem;
        }

        .magazine-card h4 {
            font-size: 1.3rem;
        }

        .magazine-card .btn-success {
            font-size: 1rem;
            padding: 0.65rem 1.5rem;
        }
    }
</style>


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9 col-sm-12">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-gradient text-center rounded-top-4">
                    <h4 class="mb-0 fw-bold">📖 Add Magazine</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('add-magazines') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control form-control-lg rounded-3 shadow-sm @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" placeholder="Enter magazine title" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Alumni ID -->
                        <div class="mb-4">
                            <label for="alumni_id" class="form-label fw-semibold">Alumni</label>
                            <select name="alumni_id" id="alumni_id"
                                class="form-select form-select-lg rounded-3 shadow-sm @error('alumni_id') is-invalid @enderror" required>
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
                            <label for="type" class="form-label fw-semibold">Type</label>
                            <select name="type" id="type"
                                class="form-select form-select-lg rounded-3 shadow-sm" required onchange="toggleFields()">
                                <option value="">-- Select Type --</option>
                                <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>🖼️ Image</option>
                                <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>📝 Text</option>
                            </select>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4" id="imageField" style="display:none;">
                            <label for="image" class="form-label fw-semibold">Upload Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control form-control-lg rounded-3 shadow-sm @error('image') is-invalid @enderror"
                                accept="image/*">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Allowed: JPG, PNG (max 2MB)</small>
                        </div>

                        <!-- Description -->
                        <div class="mb-4" id="descriptionField" style="display:none;">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea name="details" id="details"
                                class="form-control form-control-lg rounded-3 shadow-sm @error('details') is-invalid @enderror"
                                rows="5" placeholder="Write your magazine content here...">{{ old('details') }}</textarea>
                            @error('details')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-success px-5 shadow-sm rounded-3 btn-submit">
                                ✅ Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function toggleFields() {
        const type = document.getElementById('type').value;
        document.getElementById('imageField').style.display = (type === 'image') ? 'block' : 'none';
        document.getElementById('descriptionField').style.display = (type === 'text') ? 'block' : 'none';
    }
    document.addEventListener('DOMContentLoaded', toggleFields);
</script>

@endsection