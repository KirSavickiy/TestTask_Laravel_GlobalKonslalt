<x-app-layout>
    <div class="flex justify-between items-center p-6">
        <button id="openModalButton" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none sm:px-6 sm:py-3 sm:text-lg">Добавить</button>
        @include('windows.add-product')
    </div>

    <div class="overflow-x-auto max-w-6xl mx-auto">
        <table class="w-full table-auto border-collapse bg-white sm:text-sm lg:text-base rounded-lg shadow-md min-h-[200px]">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border-b p-4 text-left font-medium text-gray-600">Артикул</th>
                    <th class="border-b p-4 text-left font-medium text-gray-600">Название</th>
                    <th class="border-b p-4 text-left font-medium text-gray-600 relative">
                        <div class="inline-block relative">
                            <span class="cursor-pointer text-gray-600 hover:text-gray-800" id="statusFilterIcon">Статус▼</span>
                            <div id="statusDropdown" class="hidden absolute bg-white border border-gray-300 rounded shadow-lg mt-2 z-10 left-0 w-40">
                                <a href="{{ route('dashboard', ['status' => 'available']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Доступен</a>
                                <a href="{{ route('dashboard', ['status' => 'unavailable']) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Не доступен</a>
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Сбросить</a>
                            </div>
                        </div>
                    </th>
                    <th class="border-b p-4 text-left font-medium text-gray-600">Атрибуты</th>
                    <th class="border-b p-4 text-left font-medium text-gray-600">Действия</th>
                </tr>
            </thead>
            <tbody>
                @if($products->isEmpty())
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Нет данных для отображения</td>
                    </tr>
                @else
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
                                    <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded hover:bg-gray-300"
                                        data-id="{{$product->id}}" data-attributes="{{$product->data}}" onclick="openUpdateModal(this)"> Редактировать</button>
                                    <div id="modalUpdateContainer"></div>
                                    <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-gray-200 text-gray-700 px-3 py-1 rounded hover:bg-gray-300">
                                            <span class="text-lg">&#x2715;</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div>
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>
