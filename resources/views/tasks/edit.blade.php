@extends('layouts.app')


@section('title')
   Edit Task
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

        <a href="{{route('auth.home')}}" class="btn btn-info mb-3"> {{ trans('sentence.Home')}} </a>

        <form action="{{ route('tasks.update',$task->id) }}" method="POST" class="p-3 bg-light">

            @csrf
            @include('inc.errors')

            <h3 class="text-center"> {{ trans('sentence.Edit Form')}} </h3>

            <div class="form-group">
                <label for="exampleInputEmail1"> {{ trans('sentence.Task Name')}} </label>
                <input type="text" name="name" value="{{$task->name}}" class="form-control" id="exampleInputEmail1">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{ trans('sentence.Description')}}</label>
                <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="4">{{$task->desc}}</textarea>
            </div>

            <div class="form-group">
                <label for="" class="d-block">status</label>
                <input type="radio" name="status" class="" id="" class="" value="opened" {{ $task->status == 'opened' ? 'checked' : '' }}> {{ trans('sentence.opened')}}
                <br>
                <input type="radio" name="status" class="" id="" class="" value="closed" {{ $task->status == 'closed' ? 'checked' : '' }}> {{ trans('sentence.closed')}}
            </div>

            <select class="my-2 custom-select" name="user_id" >
                @foreach($users as $user)
                    <option {{$user->id == $task->user_id ? 'selected' : ''}} value="{{$user->id}}"  >
                            {{$user->name}}
                        </option>
                @endforeach
            </select>


            <div class="form-group">
                <label for="" class="">{{ trans('sentence.Deadline')}} : </label> {{$task->deadline}}
                <br>
                <label for="">{{ trans('sentence.Edit')}} {{ trans('sentence.Deadline')}} : </label>
                <input type="date" name="deadline"  value="{{$task->deadline}}" id="">
            </div>

            <button type="submit mb-3" class="btn btn-primary">{{ trans('sentence.Submit')}}</button>
        </form>
    </div>

@endsection
