document.addEventListener('DOMContentLoaded', function () {
    const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');
    const modal = document.getElementById('modal');

    if (openModalButton && closeModalButton && modal) {
        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    } else {
        console.log('Ошибка: Не удалось найти один или несколько элементов.');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const filterIcon = document.getElementById('statusFilterIcon');
    const dropdown = document.getElementById('statusDropdown');

    filterIcon.addEventListener('click', function () {
        dropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target) && e.target !== filterIcon) {
            dropdown.classList.add('hidden');
        }
    });
});