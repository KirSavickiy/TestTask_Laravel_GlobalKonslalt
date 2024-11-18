import { displayErrors } from "./helpers.js";
import { transformFormdata } from "./helpers.js";

document.body.addEventListener('click', function (e) {
    if (e.target && e.target.matches('button[id="submit"]')) {
        e.preventDefault();
        console.log('Кнопка нажата:', e.target);

        const productId = e.target.getAttribute('data-product-id');
        console.log('ID продукта:', productId);

        const form = document.getElementById('updateForm');
        const formData = new FormData(form);
        const formObject = transformFormdata(formData);

        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            console.error('CSRF-токен не найден');
            return;
        }

        fetch(`/product/update/${productId}`, {
            method: "PUT",
            headers: {
                "X-CSRF-TOKEN": csrfToken.getAttribute('content'),
                "Accept": "application/json",
                "Content-Type": "application/json; charset=UTF-8"
            },
            body: JSON.stringify(formObject)
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    document.getElementById('updateModalProduct').classList.add('hidden');
                } else {
                    displayErrors(data.errors);
                }
            })
            .catch(error => console.error('Error:', error));
    }
});
