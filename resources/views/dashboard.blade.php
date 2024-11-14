<x-app-layout>
    <div class="flex justify-between items-center p-6">
        <button id="openModalButton" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none sm:px-6 sm:py-3 sm:text-lg">Добавить</button>
        <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold">Добавить продукт</h3>
                    <button id="closeModalButton" class="text-gray-400 hover:text-gray-600 focus:outline-none">&times;</button>
                </div>
                @include('windows.add-product')
            </div>
        </div>
    </div>

    <div class="overflow-x-auto max-w-6xl mx-auto">
        <table class="w-full table-auto border-collapse bg-white sm:text-sm lg:text-base rounded-lg shadow-md">
            <thead class="bg-gray-100">
            <tr>
                <th class="border-b p-4 text-left font-medium text-gray-600">Артикул</th>
                <th class="border-b p-4 text-left font-medium text-gray-600">Название</th>
                <th class="border-b p-4 text-left font-medium text-gray-600">Статус</th>
                <th class="border-b p-4 text-left font-medium text-gray-600">Атрибуты</th>
                <th class="border-b p-4 text-left font-medium text-gray-600">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="border-b p-4 text-gray-800">{{ $product->article }}</td>
                    <td class="border-b p-4 text-gray-800">{{ $product->name }}</td>
                    <td class="border-b p-4 text-gray-800">
                        {{ $product->status == 'available' ? 'Доступен' : 'Не доступен' }}
                    </td>
                    <td class="border-b p-4 text-gray-800">
                        <div class="flex flex-wrap gap-2">
                            @php
                                $attributes = json_decode($product->data, true);
                            @endphp
                            @if($attributes)
                                @foreach($attributes as $key => $value)
                                    <div class="px-3 py-2 border border-gray-300 rounded-lg">
                                        <span class="font-medium text-gray-700">{{ ucfirst($key) }}:</span>
                                        <span class="text-gray-600">{{ $value }}</span>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-gray-500">Нет данных</div>
                            @endif
                        </div>
                    </td>

                    <td class="border-b p-4 text-gray-800">
                        <div class="flex gap-2">
                            <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded hover:bg-gray-300"
                            data-id="{{$product->id}}" onclick="openViewModal(this)">Смотреть</button>
                            <div id="modalContainer"></div>
                            <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded hover:bg-gray-300">Редактировать</button>
                            <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded hover:bg-gray-300" onclick="confirm('Вы уверены, что хотите удалить?')">
                                <span class="text-lg">&#x2715;</span>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
