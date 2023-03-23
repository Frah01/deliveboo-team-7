import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteButtons = document.querySelectorAll('.confirm-delete-button[type="submit"');
deleteButtons.forEach((button) => {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        //Recupero il nome della pasta
        const modalTitle = button.getAttribute('data-title');
        //Recupero la modale 
        const modal = document.getElementById('delete-modal');
        //Creo nuova modale con metodi di bootsrap
        const bootsrtapModal = new bootstrap.Modal(modal);
        //Mostro la modale
        bootsrtapModal.show()
        //Aggiungo il nome della pasta nel segnaposto
        const modalContent = modal.querySelector('#modal-item-title');
        modalContent.textContent = modalTitle;
        //Recuepero il pulsante "cancella"
        const deleteButton = modal.querySelector('#confirm-delete');
        //Aggiungo eventlistener al pulsante per il "click"
        deleteButton.addEventListener('click', () => {
            button.parentElement.submit();
        })
    })
});
