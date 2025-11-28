@extends('layouts.app')

@section('content')
<style>
    body { background-color: #eef1f4; }

    .doc-container {
        min-height: 92vh;
        display: flex;
        justify-content: center;
        padding: 40px 20px;
    }

    .doc-card {
        width: 100%;
        max-width: 850px;
        background: #fff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
    }

    .title {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 25px;
        text-align: center;
    }

    .doc-item {
        background: #f2f3f5;
        padding: 14px;
        border-radius: 10px;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-left: 5px solid #0d6efd;
    }

    .btn-upload {
        margin-bottom: 25px;
    }
</style>

<div class="doc-container">
    <div class="doc-card">

        <div class="title">📄 Documents List</div>

        <a href="{{ route('documents.create') }}" class="btn btn-primary btn-upload w-100">+ Upload New Document</a>

        @forelse ($documents as $doc)
            <div class="doc-item">
                <strong>{{ $doc->filename }}</strong>
                <a href="{{ route('documents.download', $doc) }}" class="btn btn-success btn-sm">Download</a>
            </div>
        @empty
            <p class="text-muted">No documents uploaded yet.</p>
        @endforelse

    </div>
</div>

@endsection
