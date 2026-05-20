<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>НАРУШЕНИЙ.NET</title>
    @Vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen p-6">

    <x-app-layout>
        <x-filter :sort=$sort :status=$status></x-filter>
        
        <div class="mb-6">
            <a href="{{url('reports/create')}}">
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                    Создать заявку
                </button>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($reports as $report)
            <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm flex flex-col justify-between relative min-h-[280px]">
                <div>
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-red-500 font-bold text-lg">
                            {{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y h:i');}}
                        </span>
                        <div class="flex items-center gap-3 text-slate-700">
                            <a href="{{ route('reports.edit', $report->id) }}" class="hover:text-blue-600 transition-colors" title="Редактировать">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('reports.destroy', $report->id) }}" class="inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="hover:text-red-600 transition-colors align-middle" title="Удалить">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <h5 class="text-xl font-bold text-slate-900 mb-3 break-words">
                        {{ $report->number }}
                    </h5>
                    <p class="text-slate-700 text-base leading-relaxed break-words whitespace-normal mb-6">
                        {{ $report->description }}
                    </p>
                </div>
                <div class="text-base font-medium text-slate-900 mt-auto pt-4 border-t border-slate-50">
                    Статус заявления: 
                    <x-status :type="$report->status->id">
                        {{ $report->status->name }}
                    </x-status>
                </div>
            </div> 
        @endforeach
        </div>
        <div class="mt-6">
            {{ $reports->links() }}
        </div>

    </x-app-layout>
</body>
</html>
