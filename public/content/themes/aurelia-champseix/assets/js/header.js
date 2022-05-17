const header = {

    mainHeader: null,
    windowWidth: null,
    scrollY: null,

    init: function() {
        header.mainHeader = document.querySelector('#header-site');
        header.windowWidth = window.innerWidth;
        window.addEventListener('scroll', header.animateHeader);

        
    },

    animateHeader: function () {
        header.scrollY = window.scrollY || window.pageYOffset || document.documentElement.scrollTop;

        //Display white background on scroll down (150px)
        if(header.scrollY > 150) {
            header.mainHeader.classList.add('header-display');
            //header.mainHeader.querySelector('.cta').style.padding = '.7em 1.4em'

        } else {
            header.mainHeader.classList.remove('header-display');
            //header.mainHeader.querySelector('.cta').removeAttribute('style');
        }
    },

};

document.addEventListener('DOMContentLoaded', header.init);