<?php

namespace App\Http\Controllers;

use App\Models\Kardex;
use App\Models\ProductRecordSheet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductRecordSheetController extends Controller
{
    public function downloadProductRecordSheet($record)
    {
        $prs = ProductRecordSheet::where('id', $record)->first();
        $date = date('d-m-Y', strtotime($prs->created_at));
        $kardexs = Kardex::where('product_record_sheet_id', $record)->get();
        $title = 'Hoja de registros de movimiento del producto ' . $prs->product->name;
        $pdf = Pdf::loadView('productRecordSheet.report', compact('prs', 'date', 'kardexs', 'title'))
            ->setPaper('a4', 'landscape');
        return $pdf->stream($title . '.pdf');
    }
}
