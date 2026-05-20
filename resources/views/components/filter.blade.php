@props([
    'sort' => 'desc',
    'status' => null,
    'statuses' => collect(),
])

<div class="mb-6 space-y-5">

    <div class="bg-white border border-slate-200 rounded-xl px-4 py-3 shadow-sm">
        <div class="flex flex-wrap items-center gap-2 text-sm">
            <span class="font-semibold text-slate-700">Сортировка по дате создания:</span>

            <a href="{{ route('report.index', ['sort' => 'desc', 'status' => $status]) }}"
               class="px-3 py-1.5 rounded-md transition {{ $sort === 'desc' ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                Сначала новые
            </a>

            <span class="text-slate-300">|</span>

            <a href="{{ route('report.index', ['sort' => 'asc', 'status' => $status]) }}"
               class="px-3 py-1.5 rounded-md transition {{ $sort === 'asc' ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                Сначала старые
            </a>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl px-4 py-4 shadow-sm">
        <p class="text-sm font-semibold text-slate-700 mb-3">Фильтрация по статусу заявки</p>

        <ul class="flex flex-wrap gap-3 p-0 m-0 list-none">
            <li>
                <a href="{{ route('report.index', ['sort' => $sort]) }}"
                   class="inline-flex items-center justify-center px-5 py-2 rounded-full border text-sm font-medium transition {{ empty($status) ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-700 border-slate-300 hover:bg-slate-50 hover:border-slate-400' }}">
                    Все
                </a>
            </li>

            @foreach($statuses as $item)
                <li>
                    <a href="{{ route('report.index', ['sort' => $sort, 'status' => $item->id]) }}"
                       class="inline-flex items-center justify-center px-5 py-2 rounded-full border text-sm font-medium transition {{ (string)$status === (string)$item->id ? 'bg-blue-600 text-white border-blue-600' : 'bg-white text-slate-700 border-slate-300 hover:bg-slate-50 hover:border-slate-400' }}">
                        {{ $item->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
