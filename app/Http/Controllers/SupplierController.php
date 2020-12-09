<?php

namespace App\Http\Controllers;

use App\Http\Requests\settingsFormRequest;
use App\Http\Requests\UploadFileRequest;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplierRepo;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepo = $supplierRepository;
    }

    public function index()
    {
        return view('supplier.home',[
            'supplier' => $this->supplierRepo->findSupplierViaId(auth()->user()->supplier_id),
            'eligibilities'=>$this->supplierRepo->getEligibilityData(auth()->user()->supplier_id) ?? '',
        ]);
    }

    public function settings()
    {
        return view('supplier.settings',[
            'supplier' =>  $this->supplierRepo->findSupplierViaId(auth()->user()->supplier_id),
            'route' => 'supplier.settingsStore'
        ]);

    }

    public function settingsStore(settingsFormRequest $request,$id)
    {
        $this->supplierRepo->updateSetting($request,$id);

        return redirect()->route('supplier.settings')->with('success','Successfully updated profile');
    }

    public function uploadRequirement()
    {
        return view('supplier.upload_file');
    }

    public function uploadRequirementStore(UploadFileRequest $request)
    {
        $this->supplierRepo->uploadFileSupplier($request);
        return redirect()->route('supplier.home');
    }
}
