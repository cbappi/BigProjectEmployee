@extends('layout.sidenav-layout')
@section('content')
    @include('components.company.company-list')
    @include('components.company.company-delete')
    @include('components.company.company-create')
    @include('components.company.company-update')
@endsection
