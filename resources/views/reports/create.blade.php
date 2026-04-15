<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создание заявления</title>
</head>
<body>
    <header>
        <div>
            <h1>НАРУШЕНИЙ.НЕТ</h1>
        </div>
    </header>
    <form action="{{route('reports.store')}}" method="post">
        @csrf
        <input type="text" name = "number" placeholder="номер авто">
        <br>
        <textarea rows="10" cols="50" name = "description" placeholder="описание нарушения"></textarea>
        <br>
        <button type="submit">Создать заявление</button>
    </form>
</body>
</html>