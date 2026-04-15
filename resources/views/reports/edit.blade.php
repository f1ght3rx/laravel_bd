<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обновление заявления</title>
</head>
<body>
    <header>
        <div>
            <h1>НАРУШЕНИЙ.НЕТ</h1>
        </div>
    </header>
    <form action="{{route('reports.update', $report->id)}}" method="post">
        @csrf
        @method('put')
        <input type="text" name = "number" value="{{ $report->number }}" required>
        <br>
        <textarea rows="10" cols="50" name = "description" required>{{$report->description}}</textarea>
        <br>
        <button type="submit">Обновить заявление</button>
    </form>
</body>
</html>