@extends('layouts.admin')
@section('content')
 
@include('forms.supplierForm',['categories'=>$categories])
@endsection