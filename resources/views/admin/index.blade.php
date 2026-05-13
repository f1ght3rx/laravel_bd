<x-app-layout>
<div style="text-align: center;"><h1><strong>Административная панель</strong></h1></div>

<table>
    <thead>
        <tr>
            <th>ФИО</th>
            <th>Текст заявления</th>
            <th>Номер автомобиля</th>
            <th>Статус</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->user->name ?? 'Не указано' }}</td>
                <td>{{ $report->description }}</td>
                <td>{{ $report->number }}</td>
                <td>
                    @if($report->status_id === 1)
                        <form class="status-form" action="{{ route('reports.status.update', $report->id) }}" method="POST">
                            @method('patch')
                            @csrf
                            <select name="status_id" id="status_id">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $status->id === $report->status_id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    @else
                        <strong>{{ $report->status->name }}</strong>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</x-app-layout>