const selectEl = document.getElementById('select');
const registrationImage = document.getElementById('evil-img');
const textToChange = document.getElementById('text-to-change');
const labels = document.querySelectorAll('label');
const options = document.querySelectorAll('option');
const button = document.querySelector('.form-submit-button');


selectEl.addEventListener('change', function() {

switch(true) {
    case this.value === 'miss' : registrationImage.src = "./Assets/girl 1.png";
    registrationImage.style.opacity = "1";
    break;
    case this.value === 'mr_scd' : registrationImage.src = "./Assets/mrsuicide 1.png";
    registrationImage.style.opacity = "1";
    break;
    case this.value === 'dr_kill' : registrationImage.src = "./Assets/drkill 1.png";
    registrationImage.style.opacity = "0.99";
    break;
    case this.value === 'dr_vader' : registrationImage.src = "./Assets/vader 1.png";
    registrationImage.style.opacity = "0.99";
    default: break; 
}

})

// edit it in future
/*function setSneakyRicardo (elem) {
    registrationImage.src = "./Assets/Ricardo.png";
    registrationImage.style.transform = "scale(-1,1)";
    textToChange.innerText = "запису на танці";
    labels[2].innerText = "Хореограф";
    options[elem.selectedIndex].innerText = "Рікардо Мілос";
    document.body.style.backgroundImage = "url(./Assets/DiscoHall.jpg)"
}*/

var isClicked = false;

button.addEventListener('click', function() {
    console.log(this.className);
    //this.classList.toggle('form-submit-button');
    
    if (isClicked) {
        isClicked = false;
        this.style.color="rgb(255, 0, 0)"

    } else {
        this.style.color="rgb(0,0,0)";
        isClicked = true;
    }
})
