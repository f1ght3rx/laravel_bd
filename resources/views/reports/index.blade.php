<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.NET</title>
</head>
<body>
    <h1>Список заявок</h1>
        <a href="{{url('reports/create')}}"><button>Создать заявку</button></a>
        @foreach ($reports as $report)
            <li>
                <strong>Номер автомобиля:</strong> {{ $report->number }}<br>
                <strong>Описание:</strong> {{ $report->description }}<br>
            </li>

            <div>
            <form method="POST" action="{{route('reports.destroy', $report->id)}}">
            @method('delete')
            @csrf
            <input type="submit" value="Удалить">
            </form>
            </div>
            <div>
            <a href="{{ url(route('reports.edit', $report->id)) }}">
            <button type="submit" value="Обновить"> Обновить </button></a>
            </div>    
        @endforeach
</body>
</html>