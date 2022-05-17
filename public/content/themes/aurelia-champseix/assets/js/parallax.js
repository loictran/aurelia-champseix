const parallax = {
	posY: 0,
    s1: null,

    init: function() {
        window.addEventListener('scroll', parallax.monterImage);
    },
    monterImage: function() {
        parallax.s1 = document.getElementById('hero-home');
        parallax.posY = document.body.scrollTop || document.documentElement.scrollTop;

        parallax.s1.style.backgroundPositionY = - parallax.posY/3 +'px';

    },

};

document.addEventListener('DOMContentLoaded', parallax.init);