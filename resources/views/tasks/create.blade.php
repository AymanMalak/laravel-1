@extends('layouts.app')



@section('title')
   New Task
@endsection


<style>
    label{
        color: #aaa;
        font-weight: bold
    }
</style>


@section('content')

@include('inc.navbar')

<div class="p-3">

    <a href="{{route('auth.home')}}" class="btn btn-info">   {{ trans('sentence.Home')}}  </a>

    <form action="{{ route('tasks.store') }}" method="POST" class="my-1 p-3 bg-light">

        @csrf

        <h3 class="text-center py-2">   {{ trans('sentence.New Task Form')}}  </h3>

        @include('inc.errors')

        <div class="form-group">
            <label for="exampleInputEmail1">  {{ trans('sentence.Task Name')}} </label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1"> {{ trans('sentence.Description')}}</label>
            <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="" class="d-block">{{ trans('sentence.Status')}}</label>
            <input type="radio" name="status" class="" id="" value="opened"> {{ trans('sentence.opened')}}
            <br>
            <input type="radio" name="status" class="" id="" value="closed"> {{ trans('sentence.closed')}}
        </div>

        <select class="my-2 custom-select" name="user_id" id="">
            @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>

        <div class="form-group">
            <label for="" class="">{{ trans('sentence.Deadline')}} : </label>
            <input type="date" name="deadline" id="">
        </div>

        <button type="submit mb-3" class="btn btn-primary">{{ trans('sentence.Submit')}}</button>
    </form>
</div>

@endsection
