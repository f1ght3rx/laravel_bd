@props(['sort', 'status'])
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
