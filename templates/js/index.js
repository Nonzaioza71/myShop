function _init_() {
    loadTagA()
    loadRoutes()
    loadTablist()
}

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
    console.log(e.target.parentElement.getAttribute('control-slide'))
    var slider = document.querySelector(e.target.parentElement.getAttribute('control-slide'));
    if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
document.querySelectorAll('#next').forEach(item => item.addEventListener("click", goNext))

function goPrev(e) {
    console.log(e.target.parentElement)
    var slider = document.querySelector(e.target.parentElement.getAttribute('control-slide'));
    if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
    else defaultTransform = defaultTransform + 398;
    slider.style.transform = "translateX(" + defaultTransform + "px)";
}
document.querySelectorAll('#prev').forEach(item => item.addEventListener("click", goPrev))

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
mybutton.addEventListener("click", backToTop);

window.addEventListener("scroll", scrollFunction);


window.addEventListener("load", () => _init_())

console.log('hello world')