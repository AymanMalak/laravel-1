@extends('layouts.app')


@section('title')
    error page
@endsection

@section('content')

    <div class="alert alert-danger text-center my-5">
        {{ trans('sentence. you should be admin')}}
    </div>

    <a href="{{route('auth.home')}}" class="btn btn-primary">
        {{ trans('sentence.Home')}}

    </a>

@endsection
