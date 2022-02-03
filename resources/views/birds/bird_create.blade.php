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
        <form enctype="multipart/form-data"   action="/birds" method="post">
            @csrf
            <div >
                <div class="col-md-16" style="padding-left: 0">
                    <label for="validationDefault01" class="form-label">Название</label>
                    <input type="text" class="form-control" required name="title" >
                </div>
                <div class="col-md-16">
                    <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1"  name="text" rows="3"></textarea>
                </div>
                <div class="col-md-16" style="padding-left: 0">
                    <label for="validationDefault01" class="form-label">Ссылка на фото</label>
                    <input type="text" class="form-control" required name="image" >
                </div>
                <div class="col-md-16" style="padding-left: 0">
                    <label for="validationDefault01" class="form-label">Ссылка</label>
                    <input type="text" class="form-control" required name="url" >
                </div>
                <div class="col-md-16" style="padding-left: 0">
                    <label for="validationDefault01" class="form-label">Активность</label>
                    <input type="text" class="form-control" required name="active" >
                </div>
                <div class="col-md-16" style="padding-left: 0">
                    <label for="validationDefault01" class="form-label">Номер</label>
                    <input type="text" class="form-control" required name="sort_order" >
                </div>
                <div style="margin-top: 10px; padding-left: 0" class="col-md-10">
                    <button class="btn btn-primary" type="submit">Отправить</button>
                </div>
            </div>
        </form>

        <script>
            var simplemde = new SimpleMDE({ element: document.getElementById("exampleFormControlTextarea1") });
            console.log(document.getElementById("exampleFormControlTextarea1"));
        </script>
    </x-slot>
</x-app-layout>

