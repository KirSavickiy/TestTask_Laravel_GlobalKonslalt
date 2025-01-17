document.addEventListener('DOMContentLoaded', function () {
    const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');
    const modal = document.getElementById('modal');
    const filterIcon = document.getElementById('statusFilterIcon'); 

    if (openModalButton && closeModalButton && modal && filterIcon) {

        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
            filterIcon.classList.add('inactive'); 
            filterIcon.style.display = 'none'; /
        });

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
            filterIcon.classList.remove('inactive'); 
            filterIcon.style.display = ''; 
        });
    } else {
        console.log('Ошибка: Не удалось найти один или несколько элементов.');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const filterIcon = document.getElementById('statusFilterIcon');
    const dropdown = document.getElementById('statusDropdown');

    filterIcon.addEventListener('click', function () {
        if (!filterIcon.classList.contains('inactive')) { 
            dropdown.classList.toggle('hidden');
        }
    });
    
    document.addEventListener('click', function (e) {
        if (!dropdown.contains(e.target) && e.target !== filterIcon) {
            dropdown.classList.add('hidden');
        }
    });
});
