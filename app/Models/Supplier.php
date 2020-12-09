<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['status','name','address','email','owner','sales_representative','contact_number','bir_tin_number','categories','business_type','description','document_file','isTemp'];


    public function eligibilities()
    {
        return $this->hasMany('App\Models\SupplierEligibility');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','id','supplier_id');
    }

    public function supplierfiles()
    {
        return $this->hasMany('App\Models\SupplierFile','supplier_id','id');
    }
}
