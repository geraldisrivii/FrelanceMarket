function pagination(conteinerClass, namePage, count_elements, reserve, type) {
    let conteiner = document.querySelector(conteinerClass);
    // Global variables
    let next_height = 0;
    let index = 0;
    let height_object = 0;
    let curent_height = 0;
    let pageLimit = 0;
    fetch(`php/pagination.php?page=0&name=${namePage}&count=${count_elements}&type=${type}`).then(function (response) {
        return response.text();
    }).then(function (data) {
        pageLimit = parseInt(data.slice(0, 1))
        conteiner.innerHTML += data.slice(1, data.length);
        height_object = conteiner.clientHeight - parseInt(reserve);
        console.log(height_object);
    });
    window.addEventListener("scroll", function () {
        console.log(pageLimit);
        console.log(index);
        if(pageLimit > index + 1){
            curent_height = window.scrollY + this.document.documentElement.clientHeight;
            if (curent_height - height_object > next_height) {
                next_height = curent_height;
                index++;
                console.log(index);
                fetch(`php/pagination.php?page=${index}&name=${namePage}&count=${count_elements}&type=${type}`).then(function (response) {
                    return response.text();
                }).then(function (data) {
                    conteiner.innerHTML += data;
                });
            }
        }
    });
}

export default pagination;