/* Fill the heart icon */
function addtofav(e){
    var favbtn = e.children[0];
    favbtn.classList.toggle('fa-solid');
    if (favbtn.classList.contains('fa-solid')) {
        favbtn.style.color = "#39A2DB";
    } else {
        favbtn.style.color = "#073944";
    }
}
/* Fill the heart icon */

function ff(){
    alert("hi");
}

/* Increment and decrement quantity */
var incButton = document.getElementsByClassName('inc');
var decButton = document.getElementsByClassName('dec');
for (var i=0; i<incButton.length; i++){
    var button = incButton[i];
    button.addEventListener('click', function(event){
        var btnClicked = event.target;
        var input = btnClicked.parentElement.children[1];
        var inputValue = input.value;
        var newValue = parseInt(inputValue) + 1;
        input.value = newValue;
    })
}
for (var i=0; i<decButton.length; i++){
    var button = decButton[i];
    button.addEventListener('click', function(event){
        var btnClicked = event.target;
        var input = btnClicked.parentElement.children[1];
        var inputValue = input.value;
        var newValue = parseInt(inputValue) - 1;
        if (newValue >= 0) {
            input.value = newValue;
        }
    })
}
/* Increment and decrement quantity */

/* Scale out and scale in event */
const container = document.querySelector('#product-cards');
const products = container.querySelectorAll('.card');

Array.from(products).forEach(function(product){
    product.addEventListener('mouseenter', scaleOut);
    product.addEventListener('mouseleave', scaleIn);
});
function scaleOut(e){
    e.target.style.transform = `scale(1.05)`;
    e.target.style.transition = `0.7s`;
}
function scaleIn(e){
    e.target.style.transform = `scale(1)`;
    e.target.style.transition = `0.7s`;
}
/* Scale out and scale in event */