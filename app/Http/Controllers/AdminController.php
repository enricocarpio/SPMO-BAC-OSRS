<?php

namespace App\Http\Controllers;

use App\Exports\SupplierExport;
use App\Http\Requests\settingsFormRequest;
use App\Http\Requests\SupplierEligibilityRequest;
use App\Http\Requests\SupplierFormRequest;
use App\Mail\SendMail;
use App\Models\Supplier;
use App\Models\User;
use App\Repositories\SupplierRepository;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Maatwebsite\Excel\Facades\Excel;

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

     public function downloadFile($id){

        $supplier = $this->supplierRepo->findSupplierViaId($id);
        $file = public_path()."/file/".$supplier->document_file;
        $headers = array('Content-Type: application/zip',);
        return FacadesResponse::download($file, $supplier->document_file ,$headers);
    }

    public function downloadFileViaUploaded($id){

        $supplier = $this->supplierRepo->findSupplierFileViaId($id);
        $file = public_path()."/file/".$supplier->filename;
        $headers = array('Content-Type: application/zip',);
        return FacadesResponse::download($file, $supplier->document_file ,$headers);
    }


    public function report($type)
    {
        if(!$type) return;
        if($type == 'excel') return Excel::download(new SupplierExport, 'supplier-list.xlsx');
        else if($type =='pdf')
        {
            $pdf = PDF::loadView('exports.supplier-pdf',['suppliers' => Supplier::get()])->setPaper('a2', 'landscape');
            return $pdf->download('supplier-list.pdf');
        }
    }

    public function uploadFiles()
    {
        return view('admin.uploadFiles');
    }
}
