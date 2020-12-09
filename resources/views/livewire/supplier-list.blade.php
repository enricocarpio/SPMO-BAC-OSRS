 <div class="bg-white px-3 py-3"">

    <div class="row py-3">
        <div class="col-md-4">
            <label for="search">Search</label>
            <input type="text" class="form-control form-control-sm" wire:model.debounce.500ms="search" id="search"/>
        </div>


        @if(auth()->user())
        <div class="col-md-3 offset-5">
            <select class="form-control form-control-sm"  wire:model="status" >
                <option></option>
                <option value="1">Not Completed</option>
                <option value="2">Completed</option>
            </select>
        </div>
        @endif

    </div>
    <div class="row">
        <div class="col-md-12 py-3">
        @if(count($suppliers) > 0)
        <table class="table table-bordered table-sm  table-hover @guest shadow-lg @endguest" style="table-layout: fixed">
            <thead>
                @if(auth()->user())
                <tr>
                    <th class="py-2">Company Name</th>
                    <th class="py-2">Company Address</th>
                    <th class="py-2">Status</th>
                </tr>
                @else

                <tr>
                    <th class="px-4 pt-4 pb-3">Name</th>
                    <th class="px-4 pt-4 pb-3">Address</th>
                    <th class="px-4 pt-4 pb-3">Email Address</th>
                    <th class="px-4 pt-4 pb-3">Contact No</th>

                    <th class="px-4 pt-4 pb-3">Business</th>
                </tr>
                @endif
            </thead>

            <tbody>
            @foreach($suppliers as $supplier)
            @if(auth()->user())

                <tr  wire:click="updateSupplier({{$supplier->id}},{{$supplier->status}})" style="cursor:pointer">
                    <td class="py-2">{{$supplier->name}}</td>
                    <td class="py-2">{{$supplier->address}}</td>
                    <td class="py-2">{{$supplier->status == 1 ? 'Not Completed' : 'Completed'}}</td>
                </tr>
                @else
                <tr>
                    <td class="border-t px-4 py-3 flex items-center focus:text-indigo-500">
                        {{$supplier->name}}
                    </td>


                    <td class="border-t  px-4 py-3">
                        {{$supplier->address}}
                    </td>



                    <td class="border-t  px-4 py-3">
                        {{$supplier->email}}
                    </td>

                    <td class="border-t  px-4 py-3">
                        {{$supplier->contact_number}}
                    </td>



                    <td class="border-t  px-4 py-3">
                        {{$supplier->categories}}
                    </td>

                </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-danger">

                @if($search && !$status)

                        No result found for '{{$search}}'
                        @elseif($search && $status)
                        No result found for '{{$search}}' with status "<b>{{$status == '2' ? 'Completed' : 'Not Completed'}}</b>"
                        @elseif(!$search && $status)
                        No status found  with "<b>{{$status == '2' ? 'Completed' : 'Not Completed'}}</b>"
                        @else
                        No supplier found
                 @endif

        </div>
        @endif
        </div>
        <div class="px-2 py-3">
            <div class="px-2 py-3">
                {!! $suppliers->links() !!}
            </div>
        </div>
    </div>
</div>
