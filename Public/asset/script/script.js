/*
EVENTS
PAGE
*/

const dialog = document.getElementsByClassName('confirmation_dialog')[0];
const xbutton = document.getElementsByTagName('i')[0];
const cancel = document.getElementById('cancel_button');
const confirm = document.getElementById('confirm_button');
const color = document.getElementById('clr_picker');
const myEvent = document.getElementsByClassName('event_page')[0];
const title = document.getElementsByClassName('event_title')[0];
const desc = document.getElementsByClassName('event_desc');
const empty = document.getElementById('empty');


xbutton.addEventListener('click', () => {
    dialog.style.display = "flex";
    dialog.style.backdropFilter = blur("8px");
});

cancel.addEventListener('click', () => {
    dialog.style.display = "none";
});

confirm.addEventListener("click", () => {
    dialog.style.display = "none";
    myEvent.style.display = "none";
    empty.style.display = "block";
})