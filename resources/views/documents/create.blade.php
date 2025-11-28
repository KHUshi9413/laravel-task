@extends('layouts.app')

@section('content')

<style>
body {
    background: #f0f2f7;
    font-family: "Poppins", sans-serif;
}

/* Center the card */
.doc-wrapper {
    min-height: 90vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px;
}

/* Card styling */
.doc-card {
    width: 100%;
    max-width: 600px;
    background: #ffffff;
    padding: 40px 30px;
    border-radius: 16px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.4s ease-in-out;
}

/* Header */
.doc-title {
    font-size: 28px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* Buttons */
.btn-main {
    background: #4f6bf0;
    color: #fff;
    padding: 12px 0;
    width: 100%;
    border-radius: 10px;
    font-weight: 600;
    border: none;
    margin-top: 20px;
}

.btn-main:hover {
    background: #3a53c7;
}

.btn-back {
    margin-top: 12px;
    background: #adb5bd;
    color: #fff;
    padding: 12px 0;
    width: 100%;
    border-radius: 10px;
    border: none;
}

.btn-back:hover {
    background: #8d959c;
}

/* File input group */
.custom-file-input {
    display: none;
}

.custom-file-label {
    display: block;
    background: #f7f9fc;
    padding: 15px;
    border-radius: 12px;
    border: 2px dashed #cfd3dc;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.custom-file-label:hover {
    background: #eef2ff;
    border-color: #4f6bf0;
}

.custom-file-label span {
    display: block;
    margin-top: 10px;
    color: #6c757d;
    font-size: 0.9rem;
}

/* Fade-in animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>

<div class="doc-wrapper">
    <div class="doc-card">

        <h2 class="doc-title">📁 Upload Document</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Custom File Input -->
            <label class="custom-file-label" for="document" id="file-label">
                <i class="bi bi-upload" style="font-size: 32px; color:#4f6bf0;"></i>
                <span id="file-name">Click to choose a file</span>
            </label>
            <input type="file" id="document" name="document" class="custom-file-input" required>

            <button type="submit" class="btn-main">Upload</button>
        </form>

      <a href="{{ route('documents.index') }}" class="btn btn-outline-secondary w-100 mt-2">
    ← Back
</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const fileInput = document.getElementById('document');
    const fileLabel = document.getElementById('file-label');
    const fileName = document.getElementById('file-name');

    fileLabel.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            fileName.textContent = fileInput.files[0].name;
        } else {
            fileName.textContent = "Click to choose a file";
        }
    });
</script>

@endsection
