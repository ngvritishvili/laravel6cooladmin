// resp_menu
const toggler_item = document.querySelector(".toggler_item");
const resp_menu = document.querySelector(".resp_menu");
const toggler_menu = document.getElementById('menu');

resp_menu.addEventListener('click', function(){
    toggler_item.classList.toggle('open');
    toggler_menu.classList.toggle('resp_toggler_menu');
})

// sliders
var swiper = new Swiper('.main_slider_container', {
    pagination: {
        clickable: true,
        el: '.swiper-pagination',
    },
});

var swiper = new Swiper('.partners_slider_container', {
    slidesPerView: 5,
    spaceBetween: 30,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        // when window width is <= 767px
        767: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        // when window width is <= 991px
        991: {
            slidesPerView: 2,
        },
        // when window width is <= 1200px
        1200: {
            slidesPerView: 3,
        },
        // when window width is <= 1600px
        1600: {
            slidesPerView: 4,
        },
        // when window width is <= 1600px
        1900: {
            slidesPerView: 5,
        }
    }
});

// sub category
const sub_category = document.querySelectorAll('.sub_category');
const sub_category_content = document.getElementsByClassName('sub_category_content');

for(let i=0; i<sub_category.length; i++){
    sub_category[i].addEventListener('click', function(){
        sub_category[i].classList.toggle('show_sub_category')
    })
}

// filters categories
filterSelection("category")
function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("catalog_item");
    if (c == "category") c = "";
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
}

function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
}

function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

// category image popup
let catalog_img = document.querySelectorAll('.catalog_img');
let category_popup = document.querySelector('.category_popup');
let close = document.querySelector('.close');

for(let i=0; i<catalog_img.length; i++){
    catalog_img[i].addEventListener('click', function(){
        category_popup.classList.toggle('show_category');
    })
}

// close popup
// close.addEventListener('click', function(event) {
//   category_popup.style.display = "none";
// }
window.onclick = function(event) {
    if (event.target == category_popup) {
        category_popup.style.display = "none";
    }
}

// popup slider




//contact form validation
const send = document.querySelector('.send');
let email = document.querySelector('.email');
let name= document.querySelector('.name');
let message = document.querySelector('.message');
var  statusElm = document.querySelector('.status');

// send.addEventListener('click', function(event) {
//     if(email.length >5 && email.includes('@') && email.includes('.')) {
//         statusElm.append('<div>Email is valid</div>')
//     } else {
//         event.preventDefault();
//         statusElm.append('<div>Email is not valid</div>')
//     }
//
//     if(name.length >= 2) {
//         statusElm.append('<div>Subject is valid</div>')
//     } else {
//         event.preventDefault();
//         statusElm.append('<div>Subject is not valid</div>')
//     }
//
//     if(message.length >= 10) {
//         statusElm.append('<div>Message is valid</div')
//     }else {
//         event.preventDefault();
//         statusElm.append('<div>Message is not valid</div')
//     }
//
// })
