@extends('layouts.app')

@section('title')
    Home
@endsection


@section('content')

    @include('inc.navbar')

    <div style="height: 500px"  class="header d-flex justify-content-center flex-column align-items-center header">
        <h1>
            {{ trans('sentence.welcome')}}
            {{ Auth::user()->name }}
        </h1>
        @if( Auth::user()->role == 'admin')
                <a class="nav-link" href="{{route('auth.makeadmin')}}">
                    {{ trans('sentence.Create')}}
                    {{ trans('sentence.new admin')}}
                </a>
        @endif
        <div class="d-block">
            @auth
                @if( Auth::user()->role == 'admin')
                    {{ trans('sentence.Show')}}  {{ trans('sentence.your tasks')}}  :
                    <a  href="{{route('tasks.index')}}" class="btn btn-primary"> {{ trans('sentence.Show')}} </a >
                @endif
                @if( Auth::user()->role == 'user')
                    {{ trans('sentence.Show')}}  {{ trans('sentence.your tasks from admins')}} :
                    <a  href="{{route('tasks.index')}}" class="btn btn-primary"> {{ trans('sentence.Show')}} </a >
                @endif
            @endauth
        </div>
    </div>

@endsection




