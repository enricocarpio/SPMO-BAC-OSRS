<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierEligibility extends Model
{
    use HasFactory;

    protected $fillable = ['supplier_id','permit_type','registration_number','issue_date','expiration_date','permit_title'];
}
