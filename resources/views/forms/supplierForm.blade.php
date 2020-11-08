<div class="row">  
 <div class="offset-3  py-2">
    <form method="POST" action="{{ route('admin.processSupplierStore',['id'=>$supplier->id ?? null]) }}">
        @csrf
        <div class="form-group">
          <label for="name" class="col-sm-3 col-form-label">Name</label>
          <div class="float-right mr-3" style="color:red;">
            <small>{{$errors->first('name')}}</small>
          </div>
          <div class="col-sm-12">
            <input type="text" class="form-control form-control-sm " id="name" name="name" placeholder="Name" value="{!! ($supplier) ? $supplier->name : old('name') !!}">
          </div>
       
        </div>

        <div class="form-group">
            <label for="address" class="col-sm-3 col-form-label">Address</label>
            <div class="float-right mr-3" style="color:red;">
                <small>{{$errors->first('address')}}</small>
              </div>
            <div class="col-sm-12">
              <textarea type="text" class="form-control form-control-sm" id="address" name="address" placeholder="Address"> {!! ($supplier) ? $supplier->address : old('address') !!}</textarea>
            </div>
          </div>
          
          <div class="form-group">
            <label for="owner" class="col-sm-3 col-form-label">Owner</label>
            <div class="float-right mr-3" style="color:red;">
                <small>{{$errors->first('owner')}}</small>
              </div>
            <div class="col-sm-12">
              <input type="text" class="form-control form-control-sm" id="owner" name="owner" placeholder="Owner" value="{!! ($supplier) ? $supplier->owner : old('owner') !!}">
            </div>
          </div>
      
          <div class="form-group">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="float-right mr-3" style="color:red;">
                <small>{{$errors->first('email')}}</small>
              </div>
            <div class="col-sm-12">
              <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Email" value="{!! ($supplier) ? $supplier->email : old('email') !!}">
            </div>
          </div>
    
          <div class="form-group">
            <label for="sales_representative" class="col-sm-4 col-form-label">Sale Representative</label>
            <div class="float-right mr-3" style="color:red;">
                <small>{{$errors->first('sales_representative')}}</small>
              </div>
            <div class="col-sm-12">
              <input type="text" class="form-control form-control-sm" id="sale_representative" name="sales_representative" placeholder="Sale Representative" value="{!! ($supplier) ? $supplier->sales_representative : old('sales_representative') !!}">
            </div>
          </div>

          <div class="form-group">
            <label for="contact_number" class="col-sm-3 col-form-label">Contact Number</label>
            <div class="float-right mr-3" style="color:red;">
                <small>{{$errors->first('contact_number')}}</small>
              </div>
            <div class="col-sm-12">
              <input type="text" class="form-control form-control-sm" id="contact_number" name="contact_number" placeholder="Contact Number" value="{!! ($supplier) ? $supplier->contact_number : old('contact_number') !!}">
            </div>
          </div>

          <div class="form-group">
            <label for="bir_tin_number" class="col-sm-3 col-form-label">BIR TIN #</label>
            <div class="float-right mr-3" style="color:red;">
                <small>{{$errors->first('bir_tin_number')}}</small>
              </div>
            <div class="col-sm-12">
              <input type="text" class="form-control form-control-sm" id="bir_tin_number" name="bir_tin_number" placeholder="BIR TIN #" value="{!! ($supplier) ? $supplier->bir_tin_number : old('bir_tin_number') !!}">
            </div>
          </div>

            

          <div class="form-group">
            <label for="bir_tin_numbere" class="col-sm-3 col-form-label">Line of Business</label>
            <div class="float-right mr-3" style="color:red;">
                <small>{{$errors->first('categories')}}</small>
              </div>  
            <div class="col-sm-12">
                <select class="selectpicker categories"  multiple data-live-search="true" name="categories[]">
                    @foreach($categories as $category)
                    <option vvalue="{{$category->category_name}}"   >{{$category->category_name}}</option>
                    @endforeach
                  </select>
            </div>
          </div>
        

          <div class="form-group">
            <label for="business_type" class="col-sm-3 col-form-label">Business Type </label>
            <div class="float-right mr-3" style="color:red;">
                <small>{{$errors->first('business_type')}}</small>
              </div>
            <div class="col-sm-12">
            
                <select class="form-control form-control-sm" name="business_type" >
                    <option></option>
                    @foreach($business_types  as  $v )
                    <option value="{{$v}}" @if($supplier->business_type ?? old('business_type') == $v) selected="true" @endif>{{$v}}</option>
                    @endforeach
                    </select>
            </div>
          </div>


        <div class="form-group  float-right">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Next<span class="fa fa-arrow-right ml-2"></span> </button>
          </div>
        </div>
      </form>
    </div>
     
</div>


@section('styles')

 
<style>
    .bootstrap-select:not([class*="col-"]):not([class*="form-control form-control-sm"]):not(.input-group-btn) {
        width:570px!important;
        max-width: 100%;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endsection

@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@if(($supplier) ? $supplier->name : old('categories'))
<script type="text/javascript">
 $(document).ready(function()
 {
    
    @foreach(($supplier) ? explode(',',$supplier->categories) : old('categories')  as $k => $category)
        $(".categories option[vvalue='{{$category}}']").prop('selected',true);
    @endforeach
 
});
 </script>
 @endif
@endsection