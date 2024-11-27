@if ($paginator->hasPages())
    <nav class="flex items-center justify-between mt-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-500 bg-gray-200 border border-gray-300 rounded cursor-not-allowed">
                Предыдущая
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-white bg-gray-800 border border-gray-300 rounded hover:bg-gray-600">
                Предыдущая
            </a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-4 py-2 mx-1 text-gray-500 bg-gray-200 border border-gray-300 rounded">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 mx-1 text-white bg-blue-500 border border-gray-300 rounded">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 mx-1 text-gray-800 bg-white border border-gray-300 rounded hover:bg-gray-100">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-white bg-gray-800 border border-gray-300 rounded hover:bg-gray-600">
                Следующая
            </a>
        @else
            <span class="px-4 py-2 text-gray-500 bg-gray-200 border border-gray-300 rounded cursor-not-allowed">
                Следующая
            </span>
        @endif
    </nav>
@endif
