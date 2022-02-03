<div style="background-color: #b7e9ff; width: 100%; margin-bottom: 20px; height: 80px">
        <a href="/" method="get" style="margin-left: 20px">Main page</a>
</div>

<x-app-layout>

    <x-slot name="header">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif
            @if(session()->has('warning'))
                <p class="alert alert-danger">{{session()->get('warning')}}</p>
            @endif
            @if($errors->any())
            <div class = "alert alert-error">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif
        <div class="card text-dark bg-light border-primary mb-3" style="width: 50%; position: inherit">
            <div class="card-body">
            <h2 class="card-title" style="color: #ff8dac">{{$bird->title}}</h2>
                <div>{{$bird->text}}</div>
                <div>{{$bird->image}}</div>
                <div>{{$bird->url}}</div>
                <div>{{$bird->active}}</div>
                <div>{{$bird->sort_order}}</div>
        </div>
            @if($bird->user)
            <div class="card-footer">{{$bird->user->name}}</div>
            @endif
        </div>
        @if($bird->user_id===Auth::id())
            <form action="/birds/{{$bird->id}}/edit" method="get">
                <button type="submit" class="btn btn-warning" style="margin-bottom: 10px">EDIT</button>
            </form>
            <form action="/birds/{{$bird->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
        @endif
    </x-slot>
</x-app-layout>


