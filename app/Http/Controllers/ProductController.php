<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    public function downloadPdf()
    {
        $products = Product::all();
        $date = date('d-m-Y');
        $title = 'Listado de productos' . ' - ' . $date;
        $image = 'https://minio.watunt.lat/forcesgym/';
        $pdf = Pdf::loadView('product.report', compact('products', 'title', 'date'))
            ->setPaper('a4', 'landscape');
        return $pdf->stream($title . '.pdf');
    }
}
