<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public static function redirectToPDFViewer(string $file_path)
    {
        redirect()->away(asset('storage/' . $file_path));
        return null;
    }
}
