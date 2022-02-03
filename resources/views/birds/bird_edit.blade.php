<div style="background-color: #b7e9ff; width: 100%; margin-bottom: 20px; height: 80px">
    <a href="/" method="get" style="margin-left: 20px">Main page</a>
</div>
<x-app-layout>
    <x-slot name="header">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form enctype="multipart/form-data" class="row g-3 needs-validation"  action="/birds/{{$bird->id}}" method="post">
    @csrf
    @method('put')
    <div >
        <div class="col-md-16" style="padding-left: 0">
            <label for="validationDefault01" class="form-label">Название</label>
            <input type="text" class="form-control" required name="title" value="{{$bird->title}}">
        </div>
        <div class="col-md-16">
            <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" required name="text" rows="3">{{$bird->text}}</textarea>
        </div>
        <div class="col-md-16" style="padding-left: 0">
            <label for="validationDefault01" class="form-label">Ссылка на фото</label>
            <input type="text" class="form-control" required name="image" value="{{$bird->image}}">
        </div>

        <div style="margin-top: 10px; padding-left: 0" class="col-md-10">
            <button class="btn btn-primary" type="submit">UPDATE</button>
        </div>
    </div>
</form>
    </x-slot>
</x-app-layout>
