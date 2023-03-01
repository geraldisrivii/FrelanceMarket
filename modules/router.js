import pagination from "./pagination.js";
let page = document.createElement("main");
// Why xmlHttpPost is the best way to do this? Because it's the only way send data to server in sync mode.
let xmlHttpPost = value => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/router.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            page.innerHTML = xhr.responseText;
            /* if (window.location.href.slice(window.location.href.indexOf('#') + 1) == 'projects') {
                pagination('.review-box', 'projects', 20, 100);
            } */
        }
    }
    xhr.send(`action=${value}`);
}
window.addEventListener("load", function () {
    let url = window.location.href;
    if (url == 'http://' + window.location.hostname + '/') {
        console.log(url);
        xmlHttpPost('landing')
    }
    else {
        console.log(url.slice(url.indexOf('#') + 1));
        xmlHttpPost(url.slice(url.indexOf('#') + 1))
    }
})

document.body.appendChild(page);

// Registering the event listener
window.addEventListener('hashchange', (e) => {
    xmlHttpPost(e.newURL.slice(e.newURL.indexOf('#') + 1))
})

