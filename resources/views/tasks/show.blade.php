@extends('layouts.app')

@section('title')
    show by id
@endsection


<style>
   h4{
       color: #09c;
       font-weight: bold;
       padding: 0 5px
   }
</style>


@section('content')

    @include('inc.navbar')

    @foreach($tasks as $task)
        <div class="container">
            <div class="card bg-light d-flex flex-column px-5 py-3 my-5">
                <h1 class="text-center">  Task Details  </h1>
                <hr>
                {{--  <h3 class="text-info">Task id :</h3>
                <p>  {{$task->id}}  </p>  --}}
                <div class="d-flex">
                    <h3 class="text-info"> {{ trans('sentence.Task Name')}} :  </h3>
                    <h4>  {{$task->name}}  </h4>
                </div>
                <div class="d-flex">
                    <h3 class="text-info"> {{ trans('sentence.Task Description')}} : </h3>
                    <h4>   {{$task->desc}}  </h4>
                </div>
                <div class="d-flex">
                    <h3 class="text-info">  {{ trans("sentence.Task's User")}} : </h3>
                    <h4>  {{$task->user->name}}  </h4>
                </div>
                <div class="d-flex">
                    <h3 class="text-info">{{ trans("sentence.Task Status")}} : </h3>
                    <h4>  {{$task->status}} </h4>
                </div>
                <div class="d-flex">
                    <h3 class="text-info">{{ trans("sentence.Task Deadline")}} : </h3>
                    <h4>  {{$task->deadline}} </h4>
                </div>
            </div>
        </div>
    @endforeach
@endsection
