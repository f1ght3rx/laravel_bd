@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Административная панель
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-xl overflow-hidden">

                <!-- Заголовок -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Список заявлений
                    </h3>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Здесь можно просматривать заявления и менять статус новых.
                    </p>
                </div>

                <!-- Таблица -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                        <!-- Head -->
                        <thead class="bg-gray-50 dark:bg-gray-900/40">
                            <tr>

                                <!-- ФИО -->
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    ФИО
                                </th>

                                <!-- Фото -->
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    Фото
                                </th>

                                <!-- Текст -->
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    Текст заявления
                                </th>

                                <!-- Номер -->
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    Номер автомобиля
                                </th>

                                <!-- Статус -->
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    Статус
                                </th>

                            </tr>
                        </thead>

                        <!-- Body -->
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">

                            @forelse($reports as $report)

                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40 transition">

                                    <!-- ФИО -->
                                    <td class="px-6 py-4 align-top text-sm text-gray-900 dark:text-gray-100 whitespace-nowrap">
                                        {{ $report->user->name ?? 'Не указано' }}
                                    </td>

                                    <!-- Фото -->
                                    <td class="px-6 py-4 align-top">
                                        @isset($report->path_img)
                                            <img
                                                src="{{ Storage::url($report->path_img) }}"
                                                alt="Фото заявления"
                                                class="w-28 h-20 object-cover rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm"
                                            >
                                        @else
                                            <span class="text-sm text-gray-400">
                                                Нет фото
                                            </span>
                                        @endisset
                                    </td>

                                    <!-- Описание -->
                                    <td class="px-6 py-4 align-top text-sm text-gray-700 dark:text-gray-300 max-w-xl">
                                        <div class="line-clamp-3">
                                            {{ $report->description }}
                                        </div>
                                    </td>

                                    <!-- Номер -->
                                    <td class="px-6 py-4 align-top text-sm text-gray-900 dark:text-gray-100 whitespace-nowrap">
                                        {{ $report->number }}
                                    </td>

                                    <!-- Статус -->
                                    <td class="px-6 py-4 align-top">

                                        @if($report->status_id === 1)

                                            <form action="{{ route('reports.status.update', $report->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')

                                                <select
                                                    name="status_id"
                                                    onchange="this.form.submit()"
                                                    class="rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                                >
                                                    @foreach($statuses as $status)
                                                        <option
                                                            value="{{ $status->id }}"
                                                            {{ $status->id === $report->status_id ? 'selected' : '' }}
                                                        >
                                                            {{ $status->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>

                                        @else

                                            @php
                                                $isApproved = mb_strtolower($report->status->name ?? '') === 'подтверждено';
                                            @endphp

                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                                {{ $isApproved
                                                    ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-300'
                                                    : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-300' }}"
                                            >
                                                {{ $report->status->name }}
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500 dark:text-gray-400">
                                        Заявлений пока нет.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if(method_exists($reports, 'links'))
                    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
                        {{ $reports->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>