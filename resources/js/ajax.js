import {displayErrors} from "./helpers.js";
import {transformFormdata} from "./helpers.js";

document.getElementById('recordForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    const formObject = transformFormdata(formData);

    fetch("/product/store", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            "Accept": "application/json",
            "Content-Type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify(formObject)
    })
        .then(response => response.json())
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                alert(data.message);
                document.getElementById('modal').classList.add('hidden');
                window.location.href = '/products';
            } else {
                    displayErrors(data.errors);
            }
        })
        .catch(error => console.error('Error:', error));
});
