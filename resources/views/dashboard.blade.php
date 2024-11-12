<x-app-layout>
    <div class="flex justify-end items-center p-6">
        <button id="openModalButton" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Добавить
        </button>
        <!-- Modal Window -->
        <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold">Добавить продукт</h3>
                    <button id="closeModalButton" class="text-gray-400 hover:text-gray-600">&times;</button>
                </div>
                @include('windows.add-product')
            </div>
        </div>
    </div>
    <div>
        <!-- Таблица для отображения списка продуктов -->
        <table class="w-full border-collapse bg-gray-50">
            <thead class="bg-blue-100">
            <tr>
                <th class="border-b-2 p-4 text-left font-medium text-gray-700">Артикул</th>
                <th class="border-b-2 p-4 text-left font-medium text-gray-700">Название</th>
                <th class="border-b-2 p-4 text-left font-medium text-gray-700">Статус</th>
                <th class="border-b-2 p-4 text-left font-medium text-gray-700">Атрибуты</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="hover:bg-gray-100">
                    <td class="border-b p-4 text-gray-800">{{ $product->article }}</td>
                    <td class="border-b p-4 text-gray-800">{{ $product->name }}</td>
                    <td class="border-b p-4 text-gray-800">
                        {{ $product->status == 'available' ? 'Доступен' : 'Не доступен' }}
                    </td>
                    <td class="border-b p-4 text-gray-800">
                        @php
                            $attributes = json_decode($product->data, true);
                        @endphp

                        @if($attributes)
                            @foreach($attributes as $key => $value)
                                {{ ucfirst($key) }}: {{ $value }}<br>
                            @endforeach
                        @else
                            Нет данных
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
