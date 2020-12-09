<div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Supplier</th>
                <th>Submitted date</th>
                <th>Filename</th>
            </tr>
        </thead>
    @foreach($list as $data)
        <tr>
            <td>{{$data->supplier->name}}</td><td>{{$data->created_at}}</td>
            <td><a href="{{ route('admin.downloadFileViaUploaded',['id'=>$data->id]) }}">{{$data->filename}}</a></td>
        </tr>
    @endforeach
    </table>

</div>
