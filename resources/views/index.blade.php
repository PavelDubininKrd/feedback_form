<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Обратная связь</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.16.0/d3.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/upload.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
                <div class="lex-center position-ref full-height mr-3">
                    <h2>Обратная связь</h2>
                </div>
        </div>
    </nav>

    <main class="py-4">
    <div class="container">
        <div class="col-md-6 pl-0">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" id="ajax_form" action="" enctype="multipart/form-data">
                @csrf
                <div id="form-errors"></div>
                <div class="form-group">
                    <label>Фамилия</label>
                    <input type="text" class="form-control" name="surname" value="" required>
                </div>
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="form-control" name="name" value="" required>
                </div>
                <div class="form-group">
                    <label>Отчество</label>
                    <input type="text" class="form-control" name="patronymic" value="" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="" required>
                </div>
                <div class="form-group">
                    <label>Номер телефона</label>
                    <input type="tel" class="form-control" name="telephone_number" value="" required>
                </div>
                <div class="form-group">
                    <label>Тема</label>
                    <select class="form-control" name="topic_id">
                        @foreach($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Сообщение</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" value="" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Прикрепленный файл</label>
                    <input type="file" class="form-control-file" id="fileInput" name="file">
                </div>
                <button type="submit" id="btn" class="btn btn-primary">Отправить</button>

                <div id="result_form"></div>
            </form>
        </div>
    </div>
    </main>
</div>
</body>
</html>
