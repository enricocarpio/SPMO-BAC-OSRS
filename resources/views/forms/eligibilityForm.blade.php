<div class="row">  
    <div class="offset-2  py-2 mt-3">
        @if($supplier->document_file)
        <a href="{{ route('admin.downloadFile',['id'=>$supplier->id]) }}">Download file</a>
        @endif
        @if(auth()->user())
        <div class="text-center"><h6>Step <b>2</b> / 2 - Supplier Eligibiltiy</h6></div>
        @endif
    <form method="POST" class="mt-3" action="{{ route('admin.processEligibilityStore',['id'=>$supplier->id]) }}">
        @csrf
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th>Permit Type</th>
                <th>Registration #</th>
                <th>Issue Date</th>
                <th>Expiration Date</th>

            </tr>
        </thead>
        <tbody>     
                @foreach($eligibilityTypes as $v => $type)
                <tr>
                    <td>{{$v}}</td>
                    <td>
                        @if($type != 'omnibus_')
                        <input type="text" class="form-control form-control-sm  @if($errors->has($type.'number')) is-invalid  @endif border-top-0 border-right-0 border-left-0" name="{{$type}}number" 
                        value="{!! ($eligibilities) ? $eligibilities[$v]['number']  :  old($type.'number') !!}"
                        style="border-radius:0px;">
                        @endif
                    </td>
                    <td>
                        <input type="date" class="form-control form-control-sm  border-top-0 border-right-0 border-left-0  @if($errors->has($type.'date_issue')) is-invalid  @endif"   name="{{$type}}date_issue" 
                        value="{!! ($eligibilities) ? $eligibilities[$v]['date_issue']  :  old($type.'date_issue') !!}"
                         style="border-radius:0px;">
                    </td>
                    <td>
                        @if($type != 'bir_cor_')
                        <input type="date" class="form-control form-control-sm  border-top-0 border-right-0 border-left-0  @if($errors->has($type.'date_expiration')) is-invalid  @endif"  name="{{$type}}date_expiration" 
                        value="{!! ($eligibilities) ? $eligibilities[$v]['date_expiration']  :  old($type.'date_expiration') !!}"
                         style="border-radius:0px;">
                         @endif
                    </td>
                </tr>
                @endforeach
        </tbody>

    </table>
    <div class="form-group float-left">
        <a  class="btn btn-secondary"  href="{{ route('admin.processSupplier',['id'=>$supplier->id]) }}">
            <span class="fa fa-arrow-left mr-2"></span>Previous</a>
    </div>
    <div class="form-group float-right">
        <button type="submit" class="btn btn-primary">Next<span class="fa fa-arrow-right ml-2"></span></button>
    </div>
</form>
</div>
</div>