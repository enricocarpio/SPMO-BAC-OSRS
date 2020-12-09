<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierFile extends Model
{
    protected $guarded = array();
    use HasFactory;

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id','id');
    }


}
