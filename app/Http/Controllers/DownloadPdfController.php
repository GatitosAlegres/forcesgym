<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Compra;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;


class DownloadPdfController extends Controller
{

    public function downloadSale(Sale $record)
    {
        $customer = new Party([
            //'name'          => $record->user->name,
            'name' => $record->clientes->nombre,
            'custom_fields' => [
            'Dirección' => $record->clientes->direccion,
            'Correo' => $record->clientes->email,
            'Teléfono' => $record->clientes->telefono,
            ],
        ]);

        $client = new Party([
            'name'          => 'Reto GYM',
            'address'       => 'Guadalupe - Perú',
            'custom_fields' => [
                'order number' => $record->id,
            ],
        ]);

        $items = [];

        foreach ($record->saleDetails as $saleDetail) {
            $item = new InvoiceItem();
            $item->title($saleDetail->product->name)
                ->pricePerUnit($saleDetail->product->sale_price)
                ->quantity($saleDetail->quantity);

            array_push($items, $item);
        }

        $notes = [
            'ForcesGym - Pacasmayo',
            'Donde los sueños se vuelven musculos',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('VENTA')
            ->series('BIG')
            ->status("CANCELADO")
            ->sequence(667)
            ->serialNumberFormat('V-' . $record->id . '-' . now()->format('Y-m-d'))
            ->seller($client)
            ->buyer($customer)
            ->date(now())
            ->dateFormat('d/m/Y')
            ->payUntilDays(0)
            ->currencySymbol('S/')
            ->currencyCode('PEN')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->nombre . ' ' . $customer->nombre)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('img/logo.png'))
            
            ->save('public');


        $link = $invoice->url();

        return $invoice->stream();
    }

    public function downloadPurchase(Compra $record)
    {
        $supplier = new Party([
            'name'          => $record->invoice->supplier->name,
            'phone'         => $record->invoice->supplier->phone,
            'address'       => $record->invoice->supplier->address,
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
