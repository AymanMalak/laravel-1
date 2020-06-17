


@if($errors->any())

    @foreach($errors->all() as $err)
        <div class="alert alert-danger">
            <p class="p-0 m-0"> {{$err}} </p>
        </div>
    @endforeach

@endif
