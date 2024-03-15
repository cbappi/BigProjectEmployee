@extends('layout.app')
@section('content')

@include('components.Job.ByJobList')


    <script>
        (async () => {
            await ByCategory();

            $(".preloader").delay(90).fadeOut(100).addClass('loaded');

            await TopBrands();
        })()
    </script>
@endsection
