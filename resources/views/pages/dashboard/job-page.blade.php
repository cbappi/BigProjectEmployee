@extends('layout.sidenav-layout-employee')
@section('content')
    @include('components.job.job-list')
    @include('components.job.job-delete')
    @include('components.job.job-create')
    @include('components.job.job-update')
@endsection
