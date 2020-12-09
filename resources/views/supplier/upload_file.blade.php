@extends('layouts.supplier')
@section('content')
    <div class="col-md-12 col-sm-12 mt-3 px-4 py-4">
        <form enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <div class="float-right">{{$errors->first('document_file')}}</div>
                <label for="document_file">Upload document:</label>
                <input type="file" class="form-control" id="document_file" name="document_file">
            </div>
             <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $('#document_file').on('change', function() {
                var size = this.files[0].size; // this is in bytes

                if(size > 3000000) // in bytes > mb
                {
                    alert('File  must be 3MB and below');
                    $(this).val('');
                }
            })
        });
    </script>


@endsection
