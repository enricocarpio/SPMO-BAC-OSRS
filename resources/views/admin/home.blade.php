@extends('layouts.admin')
@section('content')
<div class="col-md-12 col-sm-12 mt-3 px-4">
    <div class="px-3">
    <a class="btn btn-primary btn-sm mt-3" href="{{ route('admin.processSupplier') }}">
        + Add new Supplier
    </a>
    </div>
    <livewire:supplier-list />
</div>
@endsection
