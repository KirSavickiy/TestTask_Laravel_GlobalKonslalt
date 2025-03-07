<div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-6">
        <div class="flex justify-between items-center">
            <h3 class="text-xl font-semibold">Добавить продукт</h3>
            <button id="closeModalButton" class="text-gray-400 hover:text-gray-600 focus:outline-none">&times;</button>
        </div>
        <form id="recordForm" class="mt-4">
            @csrf
            <input type="hidden" name="id" id="recordId">

            <div class="mb-4">
                <label for="recordArticle" class="block text-sm font-medium text-gray-700">Артикул</label>
                <input type="text" name="article" id="recordArticle" required
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <span id="article_error" class="error text-red-500 text-sm mt-1 block"></span>
            </div>

            <div class="mb-4">
                <label for="recordName" class="block text-sm font-medium text-gray-700">Название</label>
                <input type="text" name="name" id="recordName" required
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                <span id="name_error" class="error text-red-500 text-sm mt-1 block"></span>
            </div>

            <!-- Статус -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Статус</label>
                <div class="flex items-center mt-2">
                    <input type="radio" id="available" name="status" value="available"
                        class="mr-2 text-blue-500 focus:ring-blue-500">
                    <label for="available" class="mr-8 text-gray-700">Доступен</label>

                    <input type="radio" id="unavailable" name="status" value="unavailable"
                        class="mr-2 text-blue-500 focus:ring-blue-500">
                    <label for="unavailable" class="text-gray-700">Не доступен</label>
                </div>
                <span id="status_error" class="error text-red-500 text-sm mt-1 block"></span>
            </div>

            <!-- Атрибуты -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Атрибуты</label>
                <div id="attributesContainer" class="max-h-64 overflow-y-auto pr-2 space-y-2"></div>
                <button type="button" onclick="addAttribute()"
                    class="mt-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">+ Добавить
                    атрибут</button>
            </div>

            <!-- Кнопка отправки -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Добавить</button>
            </div>
        </form>
    </div>
</div>