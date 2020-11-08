<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierList extends Component
{
    use WithPagination;
    public $search;
    public $status;

    public $select_file = ['id','name','address','email','contact_number','status','categories'];

    public function render()
    {
        return view('livewire.supplier-list',[
            'suppliers' => $this->getSuppliers(),
        ]);
    }

    public function getSuppliers()
    {
        $query = Supplier::select($this->select_file);
 
        if($this->search)
        {
            $search_field = '%'.$this->search.'%';
            $query->where(function($q) use ($search_field)
            {
                $q->where('name','like',$search_field)
                    ->orWhere('categories','like',$search_field);
            });
        }

        if($this->status) $query->where('status',$this->status);
        
        return $query->paginate(config('global.totalPagination'));
    }

    public function updateSupplier($supplierId,$status)
    { 
 
        if($status == '1') $route = 'admin.processEligibility';
        else $route = 'admin.profile';
       
        return redirect()->route($route,['id'=>$supplierId]);
    }

}
