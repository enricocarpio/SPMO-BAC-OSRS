<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use App\Models\SupplierFile;
use Livewire\Component;
use Livewire\WithPagination;

class FileList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $status;





    public function list()
    {
        $query = SupplierFile::with(['supplier' => function($q){
                if($this->search) $q->where('name','like','%'.$this->search.'%');
        }]);

        $query->orderBy('created_at','desc');
        return $query->paginate(config('global.totalPagination'));
    }

    public function updateSupplier($supplierId,$status)
    {

        if($status == '1') $route = 'admin.processEligibility';
        else $route = 'admin.profile';

        return redirect()->route($route,['id'=>$supplierId]);
    }

    public function render()
    {
        return view('livewire.file-list',[
            'list' =>  $this->list(),
        ]);
    }
}
