
document.addEventListener("DOMContentLoaded", function() {
    let attributeIndex = 0;
    let index = 0;

    window.addAttribute = function () {
        const container = document.getElementById('attributesContainer'); //Must be Refactoring

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
        removeButton.onclick = function () {
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

    window.addUpdateAttribute = function () {

        const container = document.getElementById('attributesUpdateContainer');//Must be Refactoring
        console.log(index)

        const attributePair = document.createElement('div');
        attributePair.classList.add('flex', 'flex-col', 'mb-4');

        const keyInput = document.createElement('input');
        keyInput.setAttribute('type', 'text');
        keyInput.setAttribute('name', `attributes.${index}.key`);
        keyInput.setAttribute('placeholder', 'Название');
        keyInput.classList.add('p-2', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:border-blue-500');

        const valueInput = document.createElement('input');
        valueInput.setAttribute('type', 'text');
        valueInput.setAttribute('name', `attributes.${index}.value`);
        valueInput.setAttribute('placeholder', 'Значение');
        valueInput.classList.add('p-2', 'border', 'border-gray-300', 'rounded-md', 'focus:outline-none', 'focus:border-blue-500');

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('ml-2', 'text-red-500', 'hover:text-red-700');
        removeButton.innerHTML = '❌';
        removeButton.onclick = function () {
            container.removeChild(attributePair);
        };

        const attributeError = document.createElement('span');
        attributeError.id = `attributes.${index}_error`;
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
        const productId = button.getAttribute('data-id')
        index = button.getAttribute('data-attributes')
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
