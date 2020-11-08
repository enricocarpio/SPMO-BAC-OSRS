
    <div class="row px-2 py-3"> 
        @if(Auth::user()->supplier_id && Auth::user()->photo_path)
        <div class="col-md-3 offset-1" >
            <img src="{{ asset('images/'.auth()->user()->photo_path) }}" class="img-thumbnail float-right"/>
        </div>
        @endif
        <div class="col-md-6 @if(!Auth::user()->photo_path) offset-3 @endif">
           
    
       <h3>Supplier Information</h3>
       
       @if($errors->any())
       <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
           </ul>
       </div>
       @endif
      <form class="mt-4"  method="POST" action="{{ route($route,['id'=>$supplier->id]) }}" enctype="multipart/form-data" >
        @csrf
 
        @if(auth()->user()->supplier_id)
        <div class="form-group row">
           
            <label for="staticEmail" class="col-sm-4 col-form-label">Logo</label>
            <div class="col-sm-8">
              
              <input type="file" class="form-control form-control-sm" placeholder="Enter email" id="email" name="photo" />
            </div>
          
          </div>

          @endif
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control form-control-sm" placeholder="Enter email" id="email" name="email" value="{{ $supplier->email }}">
          </div>
        </div>

        @if(auth()->user()->supplier_id)

        <div class="form-group row">
          <label for="address" class="col-sm-4 col-form-label">Company Address</label>
          <div class="col-sm-8">
            <textarea  class="form-control form-control-sm" placeholder="Enter company address" id="address" name="address">{{ $supplier->address }} </textarea>
          </div>
        </div>

        <div class="form-group row">
            <label for="sales_representative" class="col-sm-4 col-form-label">Sales Representative</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" placeholder="Enter sales representative" id="sales_representative" name="sales_representative" value="{{ $supplier->sales_representative }}">
            </div>
          </div>
          

        <div class="form-group row">
            <label for="contact_number" class="col-sm-4 col-form-label">Contact Number</label>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-sm" placeholder="Enter contact number" id="company Number" name="contact_number" value="{{ $supplier->contact_number }}">
            </div>
          </div>

          @endif
          <div class="form-group row">
           
            <label for="password" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
              
              <input type="password" class="form-control form-control-sm" placeholder="Password" id="password" name="password" />
            </div>
          
          </div>


          <div class="form-group row">
           
            <div class="col-sm-8 offset-4">
                 <button class="btn btn-success">Update</button>
            </div>
          </div>

      </form>

    </div>
    
 
</div>
<hr />
 
</div>