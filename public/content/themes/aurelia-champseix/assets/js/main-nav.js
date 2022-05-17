const nav = {

    btnNavMobile: null,
    wHeight: 0,
	wWidth: 0,
	navSite1: 0,

    init: function() {
        
        nav.wHeight = window.innerHeight || document.body.clientHeight;
	    nav.wWidth = window.innerWidth || document.body.clientWidth;
        nav.btnNavMobile = document.querySelector('#nav-icon');   
        nav.navSite1 = document.querySelector('#nav-site-1');

        nav.btnNavMobile.addEventListener('click', nav.animationBouton);
        nav.btnNavMobile.addEventListener('click', nav.openHideNav1);
        window.addEventListener('resize', nav.resizeWindow);

    },
    
    resizeWindow: function(e) {
        nav.wHeight = window.innerHeight || document.body.clientHeight;
	    nav.wWidth = window.innerWidth || document.body.clientWidth;
        nav.btnNavMobile = document.querySelector('#nav-icon');   
        nav.navSite1 = document.querySelector('#nav-site-1');

        if(nav.wWidth >= 992) {
            nav.navSite1.classList.remove('transition-nav');
        }
        if(nav.wWidth >= 992 && nav.navSite1.classList.contains('nav-site-1-open')) {
            nav.btnNavMobile.classList.toggle('open');
            nav.navSite1.classList.remove('nav-site-1-open');
        }
        if(nav.wWidth<992) {
            nav.navSite1.classList.remove('transition-nav');
        }

    },

    openHideNav1: function(e) {
        nav.navSite1.classList.toggle('nav-site-1-open');
	    nav.navSite1.classList.add('transition-nav');
    },

    animationBouton: function(e) {
        nav.btnNavMobile.classList.toggle('open');
    }

};

document.addEventListener('DOMContentLoaded', nav.init);