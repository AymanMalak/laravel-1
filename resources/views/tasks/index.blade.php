@extends('layouts.app')

@section('title')
    All Tasks
@endsection

<style>
    .container{
        width: 100% !important;
    }
</style>


@section('content')

    @include('inc.navbar')

    <div class="d-flex justify-content-between align-items-first  p-0 py-3">
        <h3>   {{ Auth::user()->name }}  {{ trans('sentence.Tasks')}}    </h3>
        <a class="btn btn-primary" href="{{ route('tasks.create') }}">   {{ trans('sentence.New Task')}}</a>
    </div>

    <table class="table display table-bordered my-2" id="table_id" data-order='[[ 1, "asc" ]]' data-page-length='25' >
        <thead>
            <tr >
                <th class="">  {{ trans('sentence.Name')}}</th>
                <th class="">  {{ trans('sentence.Description')}}</th>
                <th class="">  {{ trans('sentence.Status')}}</th>
                <th class="">  {{ trans('sentence.Deadline')}}</th>
                {{--  <th class="">  Task from </th>  --}}
                <th class="">  {{ trans('sentence.Assigned to')}}</th>
                <th class="">  {{ trans('sentence.Accessability')}} </th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr class="">
                    <td class="">{{$task->name}}</td>
                    <td class="">{{$task->desc}}</td>
                    @if($task->status == 'opened')
                        <td class="alert font-weight-bold  alert-success text-success">
                            {{$task->status}}
                        </td>
                    @else
                        <td class="alert font-weight-bold  alert-danger text-danger ">
                            {{$task->status}}
                        </td>
                    @endif
                    <td class="">{{$task->deadline}}</td>
                    {{--  <td class="">
                    @if( Auth::user() )
                        <b> {{ Auth::user()->name }} </b>
                    @endif
                    </td>  --}}
                    <td class="">{{$task->user->name}}</td>
                    <td class="">
                        @auth
                            @if( Auth::user()->role == 'admin')
                                <div class="form-group">
                                    <a href="{{ route('tasks.show',$task->id) }}" class="btn btn-secondary mr-auto"> {{ trans('sentence.Show')}} </a>
                                    <a href="{{ route('tasks.edit',$task->id) }}" class="btn btn-primary mr-auto"> {{ trans('sentence.Edit')}} </a>
                                    <a href="{{ route('tasks.destroy',$task->id) }}" class="btn btn-danger mr-auto"> {{ trans('sentence.Delete')}} </a>
                                </div>
                            @endif
                            @if( Auth::user()->role == 'user')
                                <div class="form-group">
                                    <a href="{{ route('tasks.show',$task->id) }}" class="btn btn-secondary mr-auto"> {{ trans('sentence.Show')}} </a>
                                    {{--  <a href="{{ route('tasks.edit',$task->id) }}" class="btn btn-primary mr-auto"> {{ trans('sentence.Edit')}} </a>  --}}
                                    {{--  <a href="{{ route('tasks.destroy',$task->id) }}" class="btn btn-danger mr-auto"> {{ trans('sentence.Delete')}} </a>  --}}
                                </div>
                            @endif
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

