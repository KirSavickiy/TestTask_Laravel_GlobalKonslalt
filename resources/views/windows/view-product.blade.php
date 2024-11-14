    <div id="viewModalProduct" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-6">
            <div class="flex justify-between items-center border-b pb-4 mb-4">

                <h3 class="text-2xl font-semibold text-gray-800">{{ $product->name }}</h3>
                <div class="flex items-center gap-2">
                    <!-- Кнопка закрытия в правом верхнем углу -->
                    <button id="closeModalButton" class="absolute top-2 right-2 p-2 text-gray-400 hover:text-gray-800" onclick="closeModal()" title="Закрыть" style="font-size: 24px; background: none; border: none; cursor: pointer;">
                        ✖ <!-- Символ крестика -->
                    </button>

                    <!-- Кнопка редактирования -->
                    <a href="#" class="text-blue-500 hover:text-blue-700" title="Редактировать">
                        <!-- Используем иконку Font Awesome (или SVG-иконку) -->
                        <i class="fas fa-edit text-xl"></i> <!-- Font Awesome -->
                    </a>
                </div>
            </div>

            <!-- Контент карточки -->
            <div class="space-y-4">
                <!-- Артикул -->
                <div class="text-gray-600">
                    <span class="font-medium text-gray-700">Артикул:</span> {{ $product->article }}
                </div>

                <!-- Название -->
                <div class="text-gray-600">
                    <span class="font-medium text-gray-700">Название:</span> {{ $product->name }}
                </div>

                <!-- Статус -->
                <div class="text-gray-600">
                    <span class="font-medium text-gray-700">Статус:</span>
                    {{ $product->status == 'available' ? 'Доступен' : 'Не доступен' }}
                </div>

                <!-- Атрибуты -->
                <div class="text-gray-600">
                    <span class="font-medium text-gray-700">Атрибуты:</span>
                    <div class="space-y-2">
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
                </div>
            </div>
        </div>
    </div>
