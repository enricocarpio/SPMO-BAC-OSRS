
    <div class="row mt-5  px-2 py-3">

        @if(Auth::user()->supplier_id && Auth::user()->photo_path)
        <div class="col-md-1">
            <img src="{{ asset('images/'.auth()->user()->photo_path) }}" class="img-thumbnail float-right"/>
        </div>
        @endif

        <div class="@if(!Auth::user()->supplier_id) col-md-12 @elseif(!Auth::user()->photo_path) col-md-12  @else col-md-11 @endif" >
            @if(!Auth::user()->supplier_id)
            <span class="float-right">
                <a class="btn btn-success btn-sm" href="{{ route('admin.processSupplier',['id'=>$supplier->id]) }}">
                    <span class="fa fa-edit"></span> Edit
                </a>

                <a class="btn btn-primary btn-sm" href="{{ route('admin.notifySupplier',['id'=>$supplier->id]) }}">
                    <span class="fa fa-envelope"></span> Notify
                </a>

                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to remove this supplier?')" href="{{ route('admin.destroySupplier',['id'=>$supplier->id]) }}">
                    <span class="fa fa-trash"></span> Delete
                </a>
            </span>
            @endif
            <h2>{{$supplier->name}}</h2>
            <p>{{$supplier->description}}</p>

            <div class="card">
                <div class="card-header bg-success" style="color:white">
                    <span class="fa fa-info-circle"></span>
                    {{ __('Information') }}
                </div>

                <div class="card-body">
                  <p>Company name: <b>{{$supplier->name}}</b></p>
                  <p>Company address: <b>{{$supplier->address}}</b></p>
                  <p>Contact number: <b>{{$supplier->contact_number}}</b></p>
                  <p>BIR TIN number: <b>{{$supplier->bir_tin_number}}</b></p>
                  <p>Line of Business: <b>{{$supplier->categories}}.</b></p>
                  <p>Registered Owner: <b>{{$supplier->owner}}</b></p>
                  <p>Email Address: <b>{{$supplier->email}}</b></p>
                  <p>Authorized Person: <b>{{$supplier->sales_representative}}</b></p>
                  <p>Date of Application: <b>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $supplier->created_at)->format('F d, Y')}}</b></p>
                  @if($supplier->document_file)
                  <p>Document submitted: <a href="{{ route('admin.downloadFile',['id'=>$supplier->id]) }}">{{$supplier->document_file}}</a></p>
                  @endif
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header bg-success" style="color:white">

                    <span class="fa fa-info-circle"></span>
                    {{ __('Eligibilities') }}
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Permit / Registration #</th></th><th>Issue Date</th><th>Expiration date</th><th>Expiration Counts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($eligibilities as $title => $eligibility)
                                <tr>
                                    <td>{{$title}}: <b>{{$eligibility['number']}}</b></td>
                                    <td>{{$eligibility['date_issue']}}</td>
                                    <td>{{$eligibility['date_expiration']}}</td>
                                    <td>
                                         @if($title != 'BIR COR')
                                            {{ \Carbon\Carbon::createFromDate($eligibility['date_expiration'])->diffForHumans()}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
