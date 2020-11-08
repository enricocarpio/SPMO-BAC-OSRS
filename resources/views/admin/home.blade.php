@extends('layouts.admin')
@section('content')
<div class="col-md-12 col-sm-12 mt-3 px-4">
    <a class="btn btn-primary btn-sm mt-3" href="{{ route('admin.processSupplier') }}">
        + Add new Supplier
    </a>
    <livewire:supplier-list />
</div>
@endsection