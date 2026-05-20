@props(['sort', 'status', 'statuses'])

<div class="mb-6 space-y-6">

    <!-- Сортировка -->
    <div class="flex flex-wrap items-center gap-2 text-sm">
        <span class="font-semibold text-heading">
            Сортировка по дате создания:
        </span>

        <a href="{{ route('report.index', ['sort' => 'desc', 'status' => $status]) }}"
           class="transition-colors duration-200
           {{ $sort === 'desc'
                ? 'text-brand font-semibold underline'
                : 'text-body hover:text-brand' }}">
            Сначала новые
        </a>

        <span class="text-neutral-300">|</span>

        <a href="{{ route('report.index', ['sort' => 'asc', 'status' => $status]) }}"
           class="transition-colors duration-200
           {{ $sort === 'asc'
                ? 'text-brand font-semibold underline'
                : 'text-body hover:text-brand' }}">
            Сначала старые
        </a>
    </div>

    <!-- Фильтрация -->
    <div>
        <p class="text-sm font-semibold text-heading mb-3">
            Фильтрация по статусу заявки
        </p>

        <ul class="flex flex-wrap gap-3 p-0 m-0 list-none">

            <!-- Все -->
            <li>
                <a href="{{ route('report.index', ['sort' => $sort]) }}"
                   class="inline-flex items-center justify-center
                   px-4 py-2 rounded-full border text-sm font-medium
                   transition-all duration-200
                   {{ empty($status)
                        ? 'bg-brand text-white border-brand shadow-sm'
                        : 'bg-white text-body border-default hover:bg-neutral-primary-soft hover:border-brand' }}">
                    Все
                </a>
            </li>

            <!-- Статусы -->
            @foreach($statuses as $item)
                <li>
                    <a href="{{ route('report.index', ['sort' => $sort, 'status' => $item->id]) }}"
                       class="inline-flex items-center justify-center
                       px-4 py-2 rounded-full border text-sm font-medium
                       transition-all duration-200
                       {{ $status == $item->id
                            ? 'bg-brand text-white border-brand shadow-sm'
                            : 'bg-white text-body border-default hover:bg-neutral-primary-soft hover:border-brand' }}">
                        {{ $item->name }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>

</div>