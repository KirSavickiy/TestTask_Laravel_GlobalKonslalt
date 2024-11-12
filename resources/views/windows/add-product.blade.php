<form id="recordForm" class="mt-4">
    @csrf
    <input type="hidden" name="id" id="recordId">

    <div class="mb-4">
        <label for="recordArticle" class="block text-sm font-medium text-gray-700">Артикул</label>
        <input type="text" name="article" id="recordArticle" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label for="recordName" class="block text-sm font-medium text-gray-700">Название</label>
        <input type="text" name="name" id="recordName" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Статус</label>
        <div class="flex items-center mt-2">
            <input type="radio" id="available" name="status" value="available" class="mr-2 text-blue-500 focus:ring-blue-500">
            <label for="available" class="mr-8 text-gray-700">Доступен</label>

            <input type="radio" id="unavailable" name="status" value="unavailable" class="mr-2 text-blue-500 focus:ring-blue-500">
            <label for="not_available" class="text-gray-700">Не доступен</label>
        </div>
    </div>

    <!-- Блок для атрибутов -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Атрибуты</label>
        <div id="attributesContainer"></div>
        <button type="button" onclick="addAttribute()" class="mt-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">+ Добавить атрибут</button>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Добавить</button>
    </div>
</form>


