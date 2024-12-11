
document.addEventListener("DOMContentLoaded", function() {
    let index = 0;

    window.addAttribute = function (name = false, value = false, update = false) {
        const container = document.getElementById(update ? 'attributesUpdateContainer' : 'attributesContainer');
        if (!container) {
            console.error("Контейнер не найден");
            return;
        }
        const attributePair = document.createElement('div');
        attributePair.classList.add('flex', 'flex-col', 'mb-4');

        const keyInput = document.createElement('input');
        keyInput.type = 'text';
        keyInput.name = update ? `attributesUpdate.${index}.key` : `attributes.${index}.key`;
        keyInput.placeholder = 'Название';
        keyInput.classList.add('p-2', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:border-blue-500');
        if (name) keyInput.value = name;

        const valueInput = document.createElement('input');
        valueInput.type = 'text';
        valueInput.name = update ? `attributesUpdate.${index}.value` : `attributes.${index}.value`;
        valueInput.placeholder = 'Значение';
        valueInput.classList.add('p-2', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:border-blue-500');
        if (value) valueInput.value = value;

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('ml-2', 'text-red-500', 'hover:text-red-700');
        removeButton.innerHTML = '❌';
        removeButton.onclick = function () {
            container.removeChild(attributePair);
        };

        const attributeError = document.createElement('span');
        attributeError.id = update ? `attributesUpdate.${index}_error` : `attributes.${index}_error`;
        attributeError.classList.add('error', 'text-red-500', 'text-sm', 'block', 'mt-1');

        attributePair.appendChild(keyInput);
        attributePair.appendChild(valueInput);
        attributePair.appendChild(removeButton);
        attributePair.appendChild(attributeError);

        container.appendChild(attributePair);

        index++;
    }


    
    window.openViewModal = function (button) {
        const productId = button.getAttribute('data-id')

        fetch(`/product/${productId}`, {
            method: 'GET',
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                "Accept": "application/json",
                "Content-Type": "application/json; charset=UTF-8"
            },
        })
            .then(response => response.text())
            .then(html => {
                const modalContainer = document.getElementById('modalContainer');
                modalContainer.innerHTML = html;

                document.getElementById('viewModalProduct').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Ошибка загрузки данных продукта:', error);
            });
    }
    window.closeModal = function () {
        document.getElementById('viewModalProduct').classList.add('hidden');
    }

    window.openUpdateModal = function (button) {
        const productId = button.getAttribute('data-id');
        const attributes = button.getAttribute('data-attributes');
        const parsedAttributes = JSON.parse(attributes);

        console.log(attributes);
        fetch(`/product/edit/${productId}`, {
            method: 'GET',
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                "Accept": "application/json",
                "Content-Type": "application/json; charset=UTF-8"
            },
        })
            .then(response => response.text())
            .then(html => {
                const modalContainer = document.getElementById('modalUpdateContainer');
                modalContainer.innerHTML = html;
                document.getElementById('updateModalProduct').classList.remove('hidden');
                for (const [name, value] of Object.entries(parsedAttributes)) {
                    addAttribute(name, value, true);
                }
                
            })
            .catch(error => {
                console.error('Ошибка загрузки данных продукта:', error);
            });

    }

    window.closeUpdateModal = function () {
        document.getElementById('updateModalProduct').classList.add('hidden');
    }

    window.removeDiv = function (divId) {
        const element = document.getElementById(divId);
        if (element) {
            element.remove();
        }
    }

});
