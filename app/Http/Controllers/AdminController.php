<?php

namespace App\Http\Controllers;

use App\Http\Requests\settingsFormRequest;
use App\Http\Requests\SupplierEligibilityRequest;
use App\Http\Requests\SupplierFormRequest;
use App\Mail\SendMail;
use App\Models\User;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public $supplierRepo;
    public $businessTypes;
    public $eligibilityTypes;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepo = $supplierRepository;
        $this->businessTypes = config('global.businessTypes');
        $this->eligibilityTypes = config('global.eligibilityTypes');
    }
    
    public function index()
    {
        return view('admin.home');
    }

    public function processSupplier($id = false)
    {
        $supplier = ($id) ? $this->supplierRepo->findSupplierViaId($id) : null;
  
        return view('admin.processSupplier',[
            'supplier' => $supplier,
            'categories' => $this->supplierRepo->categories(),
            'business_types' => $this->businessTypes,

        ]);
    }

    public function processSupplierStore(SupplierFormRequest $request)
    {
        $supplier_id = $this->supplierRepo->process_supplier($request);
        return redirect()->route('admin.processEligibility',['id'=>$supplier_id]);
     }

     public function processEligibility($id)
     {
         return view('admin.processEligibility',[
             'supplier' => $this->supplierRepo->findSupplierViaId($id),
             'eligibilityTypes' => $this->eligibilityTypes,
             'eligibilities'=> $this->supplierRepo->getEligibilityData($id) ?? null,
         ]);
     }

     public function processEligibilityStore(SupplierEligibilityRequest $request,$id)
     {
         $this->supplierRepo->process_eligibility($request,$id,$this->eligibilityTypes);
         return redirect()->route('admin.profile',['id'=>$id]);
     }

     public function supplierProfile($id)
     {
         return view('admin.supplierProfile',[
            'supplier'=>$this->supplierRepo->findSupplierViaId($id),
            'eligibilities'=>$this->supplierRepo->getEligibilityData($id) ?? '',
         ]);
     }

     public function destroySupplier($id)
     {
         $this->supplierRepo->destroySupplier($id);
         return redirect()->route('admin.home');
     }

     public function notifySupplier($id)
     {
        $supplier = $this->supplierRepo->findSupplierViaId($id);
        Mail::to("$supplier->email")->send(new SendMail($supplier));
        return redirect()->route('admin.profile',['id'=>$id])->with('success','Successfully send notification');
     }

     public function settings()
     {
         $supplier =  (auth()->user()->supplier_id) ? $this->supplierRepo->findSupplierViaId(auth()->user()->supplier_id)  : User::find(auth()->user()->id);
         return view('admin.settings',[
             'supplier' => $supplier,
             'route' => 'admin.settingsStore'
         ]);
         
     }
 
     public function settingsStore(settingsFormRequest $request,$id)
     {
         $this->supplierRepo->updateSetting($request,$id);
 
         return redirect()->route('admin.settings')->with('success','Successfully updated profile');
     }

}
