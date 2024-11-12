document.addEventListener("DOMContentLoaded", function() {
    window.addAttribute = function() {
        const container = document.getElementById('attributesContainer');

        const attributePair = document.createElement('div');
        attributePair.classList.add('flex', 'gap-2', 'mb-2', 'items-center');

        const keyInput = document.createElement('input');
        keyInput.setAttribute('type', 'text');
        keyInput.setAttribute('name', 'attributes[key][]');
        keyInput.setAttribute('placeholder', 'Название');
        keyInput.classList.add('p-2', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:border-blue-500');

        const valueInput = document.createElement('input');
        valueInput.setAttribute('type', 'text');
        valueInput.setAttribute('name', 'attributes[value][]');
        valueInput.setAttribute('placeholder', 'Значение');
        valueInput.classList.add('p-2', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:border-blue-500');

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('ml-2', 'text-red-500', 'hover:text-red-700');
        removeButton.textContent = 'Удалить';
        removeButton.onclick = function() {
            container.removeChild(attributePair);
        };

        attributePair.appendChild(keyInput);
        attributePair.appendChild(valueInput);
        attributePair.appendChild(removeButton);

        container.appendChild(attributePair);
    }

});


