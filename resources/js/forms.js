document.addEventListener("DOMContentLoaded", function() {let attributeIndex = 0;

    window.addAttribute = function() {
        const container = document.getElementById('attributesContainer');

        const attributePair = document.createElement('div');
        attributePair.classList.add('flex', 'flex-col', 'mb-4');

        const keyInput = document.createElement('input');
        keyInput.setAttribute('type', 'text');
        keyInput.setAttribute('name', `attributes.${attributeIndex}.key`);
        keyInput.setAttribute('placeholder', 'Название');
        keyInput.classList.add('p-2', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:border-blue-500');

        const valueInput = document.createElement('input');
        valueInput.setAttribute('type', 'text');
        valueInput.setAttribute('name', `attributes.${attributeIndex}.value`);
        valueInput.setAttribute('placeholder', 'Значение');
        valueInput.classList.add('p-2', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:border-blue-500');

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('ml-2', 'text-red-500', 'hover:text-red-700');
        removeButton.innerHTML = '❌';
        removeButton.onclick = function() {
            container.removeChild(attributePair);
        };

        const attributeError = document.createElement('span');
        attributeError.id = `attributes.${attributeIndex}_error`;
        attributeError.classList.add('error', 'text-red-500', 'text-sm', 'block', 'mt-1');
        
        attributePair.appendChild(keyInput);
        attributePair.appendChild(valueInput);
        attributePair.appendChild(removeButton);
        attributePair.appendChild(attributeError);

        container.appendChild(attributePair);

        attributeIndex++;
    }
});