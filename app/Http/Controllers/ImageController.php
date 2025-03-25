<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'crop_data' => 'required'
        ]);

        $image = $request->file('image');
        $cropData = json_decode($request->input('crop_data'), true); // Crop Data from frontend

        // Image को पढ़ें और Crop करें
        $img = Image::make($image);

        if ($cropData) {
            $img->crop((int) $cropData['width'], (int) $cropData['height'], (int) $cropData['x'], (int) $cropData['y']);
        }

        // इमेज को सेव करें
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('uploads/' . $fileName);
        $img->save($path);

        return back()->with('success', 'Image uploaded successfully!')->with('image', $fileName);
    }
}
