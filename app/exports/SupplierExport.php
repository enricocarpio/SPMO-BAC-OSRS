<?php
namespace App\Exports;

use App\Invoice;
use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SupplierExport implements FromView
{

    public function view(): View
    {
        return view('exports.supplier', [
            'suppliers' => Supplier::all()
        ]);
    }


}
?>
