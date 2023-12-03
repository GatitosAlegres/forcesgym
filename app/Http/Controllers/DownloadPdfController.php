<?php

namespace App\Http\Controllers;

use App\Models\ProductRecordSheet;
use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Purchase;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

use function Termwind\style;



class DownloadPdfController extends Controller
{

    public function downloadSale(Sale $record)
    {

        $customer = new Party([
            //'name'          => $record->user->name,

            'name' => $record->customers->nombre,
            'doc' => $record->customers->dni,
            'custom_fields' => [
                'Dirección' => $record->customers->direccion,
                'Correo' => $record->customers->email,
                'Teléfono' => $record->customers->telefono,
            ],
        ]);

        $client = new Party([
            'name'          => 'Reto GYM',
            'Dirección'       => 'Guadalupe - Perú',
            'custom_fields' => [
                'número de orden' => $record->id,
                'vendedor' => $record->user->name,
            ],
        ]);





         // Verifica el tipo de documento y establece el prefijo correspondiente para el nombre del archivo PDF
        /*$documentType = $record->document_type;
        $documentPrefix = $documentType === 'Boleta' ? 'Boleta' : 'Factura';*/
         // Obtiene el tipo de documento y establece el prefijo para el código del documento
         $documentType = $record->code;
         $documentPrefix = strtoupper(substr($documentType, 0, 1));









        $items = [];




        foreach ($record->saleDetails as $saleDetail) {
            $item = new InvoiceItem();
            $item->title($saleDetail->product->name)
                ->pricePerUnit($saleDetail->product->sale_price)
                ->quantity($saleDetail->quantity);

            array_push($items, $item);
        }

        $notes = [
            'Gracias por comprar en Forces Gym, ',
            'Donde los sueños se vuelven músculos',
           // 'img/qrforces.jpeg', // Reemplaza 'ruta_de_la_imagen.jpg' con la ruta real de tu imagen
        ];

       // echo '<img src="' . $notes[2] . '" alt="Descripción de la imagen">'; // Cambia el índice según la posición de la ruta de la imagen en tu array

        $notes = implode("<br>", $notes);

        $invoice = Invoice::make($record->code)
            ->series('BIG')
            //->status("CANCELADO")
            ->sequence(667)
            ->serialNumberFormat('V-' . $record->id . '-' . now()->format('Y-m-d'))
            ->seller($client)
            ->buyer($customer)
            ->date(now())
            ->dateFormat('d/m/Y')
            //->payUntilDays(0)
            ->currencySymbol('S/')
            ->currencyCode('PEN')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($record->code) // Cambiado el nombre del documento
            ->addItems($items)
            //->notes($notes)

            //->logo(public_path('img/logo_forces.jpg'))
            ->logo(public_path('img/qrforces.jpeg'))
            ->save('public');


        $link = $invoice->url();

        return $invoice->stream();
    }

    public function downloadPurchase(Purchase $record)
    {
        $supplier = new Party([
            'name'          => $record->invoice->supplier->name,
            'phone'         => $record->invoice->supplier->phone,
            'address'       => $record->invoice->supplier->address,
            'doc'           => $record->invoice->supplier->doc,
            'custom_fields' => [],
        ]);

        $buyer = new Party([
            'name'          => 'Reto GYM',
            'address'       => 'Guadalupe - Perú',
        ]);

        $items = [];

        foreach ($record->detalles as $compraDetail) {
            $item = new InvoiceItem();
            $item->title($compraDetail->product->name)
                ->pricePerUnit($compraDetail->unit_price)
                ->quantity($compraDetail->quantity);

            array_push($items, $item);
        }

        $notes = [
            $record->observations,
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('COMPRA')
            ->series('BIG')
            ->status($record->status)
            ->sequence(667)
            ->serialNumberFormat($record->number)

            ->seller($supplier)
            ->buyer($buyer)
            ->date($record->created_at)
            ->dateFormat('d/m/Y')
            ->payUntilDays($this->diffDays($record->invoice->due_date, $record->invoice->updated_at))
            ->currencySymbol($record->currency == 'PEN' ? 'S/' : '$')
            ->currencyCode($record->currency)
            ->currencyFormat('{SYMBOL} {VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($record->number)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('img/logo.png'))
            ->save('public');

        $link = $invoice->url();

        return $invoice->stream();
    }

    private function diffDays($date1, $date2)
    {
        $date1 = Carbon::parse($date1);
        $date2 = Carbon::parse($date2);
        return $date1->diffInDays($date2);
    }
}
