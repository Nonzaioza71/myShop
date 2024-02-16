function loadSuccess(toggle = true) {
    const bg_left = document.querySelector('#bg_left')
    const bg_right = document.querySelector('#bg_right')
    const loadBody = document.querySelector('#loadBody')
    loadBody.classList.remove('d-none')
    // const spinner = document.querySelector('#spinner')
    // const card = document.querySelector('#card')

    if (toggle) {
        bg_left.classList.remove('animate__fadeOutLeft')
        bg_left.classList.add('animate__fadeInLeft')

        bg_right.classList.remove('animate__fadeOutRight')
        bg_right.classList.add('animate__fadeInRight')

        bg_left.classList.remove('d-none')
        bg_right.classList.remove('d-none')

        document.querySelector('#loading_screen').classList.remove('d-none')

    } else {
        bg_left.classList.remove('animate__fadeInLeft')
        bg_left.classList.add('animate__fadeOutLeft')

        bg_right.classList.remove('animate__fadeInRight')
        bg_right.classList.add('animate__fadeOutRight')

        setTimeout(() => {
            bg_left.classList.add('d-none')
            bg_right.classList.add('d-none')
            document.querySelector('#loading_screen').classList.add('d-none')
        }, 500);
    }
}

function showLoading(url) {
    loadSuccess()
    setTimeout(() => {
        window.location.href = url
    }, 1000);
}


function loadTagA() {
    const all_a_tags = document.querySelectorAll("a")

    all_a_tags.forEach(item => {
        if (item.getAttribute("on-load")) {
            item.href = `javascript:showLoading('${item.href}');`
        }
    })
}

function loadTablist() {
    const all_tabllist = document.querySelectorAll(".tablist")

    all_tabllist.forEach(item => {
        const name = item.getAttribute('name')
        const param = item.getAttribute('param')
        if (name && param) {
            if (item.classList.contains('tablist')) {
                item.addEventListener("click", (e) => activeTablist(e.target))
            }
            item.classList.remove('tablist')
            if (name == getHashParam()[param]) {
                item.setAttribute('class', `${item.getAttribute('isTrue')} tablisted`)
            } else {
                item.setAttribute('class', `${item.getAttribute('def')} tablisted`)
            }
        }
    })
}

function activeTablist(self) {
    console.log(self);
    const all_tabllisted = document.querySelectorAll(".tablisted")
    all_tabllisted.forEach(item => {
        item.setAttribute('class', `${item.getAttribute('def')} tablisted`)
    })
    self.setAttribute('class', `${self.getAttribute('isTrue')} tablisted`)
}

function loadRoutes() {
    const routes = document.querySelectorAll('.route')
    routes.forEach(item => {
        const checkPath = item.getAttribute('path')
        item.classList.add('d-none')
        if (checkPath) {
            const path = checkPath
            if (path == getHashParam()[item.getAttribute('param')]) {
                item.classList.remove('d-none')
            }
        }
    });
    setTimeout(loadRoutes, 10);
}

function getHashParam() {
    const hash = window.location.hash.substr(1);

    const hashParam = hash.split('&').reduce(function (res, item) {
        const parts = item.split('=');
        res[parts[0]] = parts[1];
        return res;
    }, {});

    return hashParam
}

let defaultTransform = 0;

function goNext(e) {
    defaultTransform = defaultTransform - 398;
    // console.log(e.target.parentElement.getAttribute('control-slide'))
    let slider = document.querySelector(e.target.parentElement.getAttribute('control-slide'));
    if (slider) {
        if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
        slider.style.transform = "translateX(" + defaultTransform + "px)";
    } else {
        console.log('err', slider);
        setTimeout(() => goNext(e), 10)
    }
}

function goPrev(e) {
    // console.log(e.target.parentElement)
    let slider = document.querySelector(e.target.parentElement.getAttribute('control-slide'));
    if (slider) {
        if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
        else defaultTransform = defaultTransform + 398;
        slider.style.transform = "translateX(" + defaultTransform + "px)";
    } else {
        console.log('err', slider);
        setTimeout(() => goPrev(e), 10)
    }
}

const mybutton = document.getElementById("btn-back-to-top");

const scrollFunction = () => {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.classList.remove("hidden");
    } else {
        mybutton.classList.add("hidden");
    }
};
const backToTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
};

window.addEventListener("scroll", scrollFunction);


window.addEventListener("load", () => _init_())

// console.log('hello world')

function _init_() {
    loadTagA()
    loadRoutes()
    loadTablist()
}


function averageColor(imageElement) {

    // Create the canvas element
    let canvas
        = document.createElement('canvas'),

        // Get the 2D context of the canvas
        context
            = canvas.getContext &&
            canvas.getContext('2d'),
        imgData, width, height,
        length,

        // Define variables for storing
        // the individual red, blue and
        // green colors
        rgb = { r: 0, g: 0, b: 0 },

        // Define variable for the 
        // total number of colors
        count = 0;

    // Set the height and width equal
    // to that of the canvas and the image
    height = canvas.height =
        imageElement.naturalHeight ||
        imageElement.offsetHeight ||
        imageElement.height;
    width = canvas.width =
        imageElement.naturalWidth ||
        imageElement.offsetWidth ||
        imageElement.width;

    // Draw the image to the canvas
    context.drawImage(imageElement, 0, 0);

    // Get the data of the image
    imgData = context.getImageData(
        0, 0, width, height);

    // Get the length of image data object
    length = imgData.data.length;

    for (let i = 0; i < length; i += 4) {

        // Sum all values of red colour
        rgb.r += imgData.data[i];

        // Sum all values of green colour
        rgb.g += imgData.data[i + 1];

        // Sum all values of blue colour
        rgb.b += imgData.data[i + 2];

        // Increment the total number of
        // values of rgb colours
        count++;
    }

    // Find the average of red
    rgb.r
        = Math.floor(rgb.r / count);

    // Find the average of green
    rgb.g
        = Math.floor(rgb.g / count);

    // Find the average of blue
    rgb.b
        = Math.floor(rgb.b / count);

    return rgb;
}

// Function to set the background
// color of the second div as 
// calculated average color of image
let rgb;

// setTimeout(() => {
//     rgb = averageColor(
//         document.getElementById('img'));

//     // Select the element and set its
//     // background color
//     document
//         .getElementById("block")
//         .style.backgroundColor =
//         'rgb(' + rgb.r + ','
//         + rgb.g + ','
//         + rgb.b + ')';
// }, 500)



// function loadSimpleIcon() {
//     const elements = document.querySelectorAll('simple-icon')
//     if (elements.length > 0) {
//         elements.forEach((item, idx) => {
//             const iconEle = document.createElement('img')
//             iconEle.src = `https://cdn.simpleicons.org/${item.getAttribute('name')}/${item.getAttribute('color') || 'black'}`
//             const _classList = item.getAttribute('class')
//             if (_classList) {
//                 const allClass = _classList.split(' ')
//                 allClass.forEach((jtem, jdx) => {
//                     iconEle.classList.add(jtem)
//                 })
//             }
//             const _styleList = item.getAttribute('style')
//             if (_styleList) {
//                 iconEle.setAttribute('style', _styleList);
//             }
//             item.after(iconEle)
//             item.remove()
//         })
//     }
// }

function replaceUrlParam(url, paramName, paramValue) {
    if (paramValue == null) {
        paramValue = '';
    }
    var pattern = new RegExp('\\b(' + paramName + '=).*?(&|#|$)');
    if (url.search(pattern) >= 0) {
        return url.replace(pattern, '$1' + paramValue + '$2');
    }
    url = url.replace(/[?#]$/, '');
    return url + (url.indexOf('?') > 0 ? '&' : '?') + paramName + '=' + paramValue;
}

function formatNumber(n) {
    return (Math.round(n * 100) / 100).toLocaleString();
}
