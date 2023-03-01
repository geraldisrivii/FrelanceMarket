// Get elements
let button_gamburger = document.querySelector(".nav-bar__gamburger");
let checkbox = document.querySelector(".nav-bar__checkbox");
let nav_menu = document.querySelector(".nav-menu");
let nav_list = document.querySelector(".nav-list");
let nav_menu_list = nav_menu.firstElementChild
// Create elements 
let list_element = nav_list.firstElementChild.cloneNode(true)
console.log(list_element)
// Actions
for (const element of nav_list.children) {
    let list_element = element.cloneNode(true)
    nav_menu_list.appendChild(list_element)
}
button_gamburger.addEventListener("click", () => {
    if(checkbox.checked == true){
        nav_menu.style.width = "100%";
        nav_menu.style.opacity = "1";
        nav_menu.style.visibility = "visible";
    } 
    else{
        nav_menu.style.opacity = "0";
        nav_menu.style.width = "0%"; 
        nav_menu.style.visibility = "hidden";
    } 
})