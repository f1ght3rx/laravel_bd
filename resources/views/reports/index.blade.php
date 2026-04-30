<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.NET</title>
</head>
<body>
    <h1>Список заявок</h1>
    <div>
    <span>Сортировка по дате создания: </span>
    <a href="{{ route('report.index', ['sort' => 'desc', 'status' => $status]) }}">
        сначала новые
    </a>
    <a href="{{ route('report.index', ['sort' => 'asc', 'status' => $status]) }}">
        сначала старые
    </a>
</div>
<div>
    <p>Фильтрация по статусу заявки</p>
    <ul>
        @foreach($statuses as $status)
            <li>
                <a href="{{route('report.index', ['sort' => $sort, 'status' => $status->id])}}">
                    {{$status->name}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
        <a href="{{url('reports/create')}}"><button>Создать заявку</button></a>
        @foreach ($reports as $report)
            <li>
                <strong>Номер автомобиля:</strong> {{ $report->number }}<br>
                <strong>Описание:</strong> {{ $report->description }}<br>
                <strong>Создан:</strong> {{ $report->created_at }}<br>
                <strong>Статус:</strong> {{ $report->status->name }}<br>
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
        {{ $reports->links() }}
</body>
</html>