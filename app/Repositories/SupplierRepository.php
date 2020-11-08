<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\SupplierEligibility;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
class SupplierRepository
{
    public $step_1 = 1;

    public function categories()
    {
        return Category::get();
    }

    public function process_supplier($request)
    {     
        $fileName = null;

        if(isset($request->document_file) && !empty($request->document_file))
        {
            $fileName = time().'.'.$request->document_file->extension();  
            $request->document_file->move(public_path('file'), $fileName);
        }

        $supplier = Supplier::updateORCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'address' => $request->address,
                'owner' => $request->owner,
                'email' => $request->email,
                'sales_representative' => $request->sales_representative,
                'contact_number' => $request->contact_number,
                'bir_tin_number' => $request->bir_tin_number,
                'categories' => implode(',',$request['categories']),
                'document_file' => ($fileName == null) ? null : $fileName,
                'business_type' => $request->business_type,
                'status' => $this->step_1,
               
            ]);
 
        return $supplier->id;
    }

    public function process_eligibility($request,$id,$eligilities)
    {
         $this->manipulate_eligibility($request,$id,$eligilities);
    }
    
     public function manipulate_eligibility($request,$id,$eligibities)
    {
        $array_to_save = array();
    
        $supplier = Supplier::findOrFail($id);
         
        if($supplier) SupplierEligibility::where('supplier_id',$id)->delete();
  
        foreach($eligibities as $title => $type)
        {
            $registration = $type.'number';
            $issue_date = $type.'date_issue';
            $expiration_date = $type.'date_expiration';

               
            
            $array_to_save = [
                'supplier_id' =>  $id,
                'permit_title' => $title,
                'permit_type' => $type,
                'registration_number' => $request->$registration,
                'issue_date'    => $request->$issue_date,
                'expiration_date' => $request->$expiration_date,
            ];
             
            SupplierEligibility::create($array_to_save);
         
        } 

        $supplier->status = 2;
        $supplier->save();
      
    }
     
 

    public function getSupplierEligibilities($id)
    {
      return  SupplierEligibility::where(['supplier_id'=>$id]);
    }

    public function findSupplierViaId($id)
    {
        return Supplier::findOrFail($id);
    }
    
    
    public function getEligibilityData($id)
    {
       $eligibilities = array();
       $query = SupplierEligibility::where('supplier_id',$id)->get();
       if(!$query) return null;

       foreach($query as $k => $v)
       {
           $eligibilities[$v->permit_title]['number'] = $v->registration_number;
           $eligibilities[$v->permit_title]['date_issue']          = $v->issue_date;
           $eligibilities[$v->permit_title]['date_expiration']     = $v->expiration_date;
       }
       return $eligibilities;
    }

     

    public function getProfileInfo()
    {
        if(!auth()->user()->supplier_id) return null;
        return Supplier::find(auth()->user()->supplier_id);
    }

    public function getProfileInfoEligibilities()
    {
        if(!auth()->user()->supplier_id) return null;
        return SupplierEligibility::where('supplier_id',auth()->user()->supplier_id)->get();
    }

    public function category_save($request)
    {
         Category::updateOrCreate(
            ['id' => $request->id],
            [
            'category_name' => $request->category_name,
            ]
        );
    }

    public function getCategoryViaId($id)
    {
        return Category::findOrFail($id);
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }

    public function destroySupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        if($supplier->document_file) {
            $file_path = public_path('file/'.$supplier->document_file);
            if(File::exists($file_path))
            {
                File::delete($file_path);
            }
        }

        if($supplier->user->photo_path)
        {
            $image_path = public_path('images/'.$supplier->user->photo_path);
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
        }
        

        $supplier->delete();
    }

    public function updateSetting($request,$id)
    {


        //save only user
        $updateUser =  User::find(auth()->user()->id);
        $updateUser->email = $request->email;
        if(!empty($request->password)) $updateUser->password = Hash::make($request->password);
 
        //save only supplier
        if(auth()->user()->supplier_id)
        {

            $updateSupplier = Supplier::find(auth()->user()->supplier_id);
            $updateSupplier->email = $request->email;
            $updateSupplier->address = $request->address;
            $updateSupplier->contact_number = $request->contact_number;
            $updateSupplier->sales_representative = $request->sales_representative;



            if(!empty($request->photo))
            { 
                if(auth()->user()->photo_path)
                {
                    $image_path = public_path('images/'.auth()->user()->photo_path);
                    if(File::exists($image_path))
                    {
                        File::delete($image_path);
                    }
                }
                $imageName = time().auth()->user()->id.'.'.$request->photo->extension();
                $request->photo->move(public_path('images'), $imageName);
                $updateUser->photo_path = $imageName;
                
            }
    
            $updateSupplier->save();
        }
        $updateUser->save();        
    }
}