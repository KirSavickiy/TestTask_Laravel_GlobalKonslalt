export function displayErrors(errors) {

    const errorElements = document.querySelectorAll('.error');
    errorElements.forEach(element => element.textContent = '');

    for (const [field, messages] of Object.entries(errors)) {
        const fieldName = field.split('.');

        if (fieldName[0] === 'attributes' && fieldName.length === 2) {
            const attributeIndex = fieldName[1];

            const errorElementId = `attributes.${attributeIndex}_error`;

            const errorElement = document.getElementById(errorElementId);
            if (errorElement) {
                errorElement.textContent = messages[0];
            }
        } else {
            const errorElement = document.getElementById(`${field}_error`);
            if (errorElement) {
                errorElement.textContent = messages[0];
            }
        }
    }
}

export function transformFormdata(formData){

    const formObject = {};
    formData.forEach((value, key) => {
        if (key.startsWith('attributes.')) {
            const attributeKey = key.match(/attributes\.(\d+)\.(key|value)/);
            if (attributeKey) {
                const index = attributeKey[1];
                const type = attributeKey[2];
                if (!formObject.attributes) formObject.attributes = [];
                if (!formObject.attributes[index]) formObject.attributes[index] = {};
                formObject.attributes[index][type] = value;
            }
        } else {
            formObject[key] = value;
        }
    });
    return  formObject;
}
