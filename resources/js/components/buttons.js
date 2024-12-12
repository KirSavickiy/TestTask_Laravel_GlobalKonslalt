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
