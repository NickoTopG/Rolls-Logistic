let deleteTrigger = document.querySelectorAll('#delete-trigger');

let deletePrompt = document.getElementById('delete-prompt');
let darkenBody = document.getElementById('darken-body');
let deleteButton = document.getElementById('delete-button');
let cancelButton = document.getElementById('cancel-button');

deleteTrigger.forEach(function(trigger) {
    trigger.addEventListener('click', function() {
        toggleRemovePrompt();
    });
});

document.addEventListener('click', function(event) {
    const target = event.target;

    if (target === darkenBody || target === cancelButton || target === deleteButton) {
        toggleRemovePrompt();
    }
});

function toggleRemovePrompt() {
    if (deletePrompt.style.display === 'flex') {
        deletePrompt.style.display = 'none';
        darkenBody.style.display = 'none';
    } else {
        deletePrompt.style.display = 'flex';
        darkenBody.style.display = 'flex';
    }
}
