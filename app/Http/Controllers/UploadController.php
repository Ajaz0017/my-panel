<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // $path = $request->file('file')->store('public');
        // $path = $request->file('file')->store('uploads', 'public');
    
        // return $path;

        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);

        return $filename;
    }
}
