<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Редактирование заявления
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-xl p-6 sm:p-8">
                <form action="{{ route('reports.update', $report->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="number" class="block text-sm font-medium text-black/60 dark:text-white/60">
                            Номер авто
                        </label>
                        <input
                            id="number"
                            type="text"
                            name="number"
                            value="{{ old('number', $report->number) }}"
                            required
                            class="mt-1 block w-full rounded-md border-slate-300 text-black/70 dark:text-white/70 placeholder:text-black/40 dark:placeholder:text-white/40 focus:border-blue-500 focus:ring-blue-500"
                        >
                        @error('number')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-black/60 dark:text-white/60">
                            Описание нарушения
                        </label>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            required
                            class="mt-1 block w-full rounded-md border-slate-300 text-black/70 dark:text-white/70 placeholder:text-black/40 dark:placeholder:text-white/40 focus:border-blue-500 focus:ring-blue-500"
                        >{{ old('description', $report->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-2">
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition"
                        >
                            Обновить заявление
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
