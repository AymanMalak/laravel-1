@extends('layouts.app')

@section('title')
    login
@endsection
@section('content')
@include('inc.navbar')

@auth
    @if( Auth::user()->role == 'admin')
        <a class="btn btn-info font-weight-bold my-3" href="{{route('auth.home')}}">  {{ trans('sentence.Home')}}  </a>
    @endif
@endauth
<div class="text-center text-primary py-5">
    <h2>
        {{ trans('sentence.Form')}}
         {{ trans('sentence.Login')}}
    </h2>
</div>

<form action="{{ route('auth.dologin') }}" method="POST" >
    @csrf
    @include('inc.errors')

    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder=" {{ trans('sentence.email')}} " id="">
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="password" placeholder=" {{ trans('sentence.password')}} " id="">
    </div>

    <button type="submit" class="btn btn-primary"> {{ trans('sentence.Submit')}} </button>
</form>


@endsection
