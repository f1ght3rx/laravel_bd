<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Создание заявления
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-700">
                <div class="p-6 text-black/60 dark:text-white/60">
                    <form action="{{ route('reports.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="number" class="block text-sm font-medium mb-1">
                                Номер авто
                            </label>
                            <input
                                id="number"
                                type="text"
                                name="number"
                                value="{{ old('number') }}"
                                placeholder="номер авто"
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 focus:border-indigo-500 focus:ring-indigo-500"
                                required
                            >
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium mb-1">
                                Описание нарушения
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                rows="7"
                                placeholder="описание нарушения"
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 focus:border-indigo-500 focus:ring-indigo-500"
                                required
                            >{{ old('description') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 transition"
                        >
                            Создать заявление
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
