<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierFormRequest;
use App\Repositories\SupplierRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $supplierRepo;
    public $businessTypes;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SupplierRepository $supplierRepository)
    {
       $this->supplierRepo = $supplierRepository;
       $this->businessTypes = config('global.businessTypes');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function becomeSupplier()
    {
        return view('page/become-supplier',[
            'supplier' => null,
            'categories'=> $this->supplierRepo->categories(),
            'business_types' => $this->businessTypes,
        ]);
    }

    public function becomeSupplierStore(SupplierFormRequest $request)
    {
        $this->supplierRepo->process_supplier($request);
        return redirect('/become-supplier')->with('status','Successfully created initital data please wait for the administrator to contact you'); 
    }

    public function whiteList()                                             
    {
        return view('page/white-list');
    }                               

    public function about()
    {
        return view('page/about');
    }
   
    public function contact()
    {
        return view('page/contact');
    }

    public function home()
    {
        return view('page/home');
    }
}
