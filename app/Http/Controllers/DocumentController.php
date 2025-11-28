<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
{
    $documents = TaskDocument::latest()->get();
    return view('documents.index', compact('documents'));
}

public function create()
{
    return view('documents.create');
}

public function store(Request $request)
{
    $request->validate([
        'document' => 'required|mimes:pdf,doc,docx,jpg,png|max:2048'
    ]);

    $file = $request->file('document');
    $filename = time() . '_' . $file->getClientOriginalName();

    // Store in public disk
    $filepath = $file->storeAs('documents', $filename, 'public');
  
  

    // Save to DB
    TaskDocument::create([
        'filename' => $filename,
        'filepath' => $filepath
    ]);

    return redirect()->route('documents.index')->with('success', 'Document uploaded successfully!');
}


public function download(TaskDocument $document)
{   

    return Storage::disk('public')->download($document->filepath);

    
}


}
