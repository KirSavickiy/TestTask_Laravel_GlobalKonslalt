export function displayErrors(errors, update = false) {
    if (!errors) return;
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
        } else if (fieldName[0] === 'attributesUpdate' && fieldName.length === 2) {
            const attributeIndex = fieldName[1];
            const errorElementId = `attributesUpdate.${attributeIndex}_error`;

            const errorElement = document.getElementById(errorElementId);
            if (errorElement) {
                errorElement.textContent = messages[0];
            }
        } else {

            const errorElementId = update ? `${field}_update_error` : `${field}_error`;
            const errorElement = document.getElementById(errorElementId);

            if (errorElement) {
                errorElement.textContent = messages[0];
            }
        }
    }
}
export function transformFormdata(formData) {
    const formObject = {};
    if (!formData) return formObject;

    formData.forEach((value, key) => {
        if ((key.startsWith('attributes.')) || (key.startsWith('attributesUpdate.'))) {
            const attributeKey = key.match(/(attributes|attributesUpdate)\.(\d+)\.(key|value)/);
            if (attributeKey) {
                const group = attributeKey[1];
                const index = attributeKey[2];
                const field = attributeKey[3];

                if (!formObject[group]) {
                    formObject[group] = [];
                }

                if (!formObject[group][index]) {
                    formObject[group][index] = {};
                }

                formObject[group][index][field] = value;
            }
        } else {
            formObject[key] = value;
        }
    });
    return formObject;
}

