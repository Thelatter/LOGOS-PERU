/*ACTIVIDADES*/
var containerEl = document.querySelector('[data-ref="mixitup-container"]');

if (containerEl != null) {
    var mixer = mixitup(containerEl, {
        selectors: {
            target: '[data-ref~="mixitup-target"]'
        },
        load: {
          filter: '.cursos'
        },
        controls: {
            scope: 'local'
        },
        animation: {
            effects: 'fade translateZ(-100px)'
        }
    });

}

/*MULTIMEDIA*/
var containerEl2 = document.querySelector('[data-ref="mixitup-container2"]');

if (containerEl2 != null) {
    var mixer2 = mixitup(containerEl2, {
        selectors: {
            target: '[data-ref~="mixitup-target"]'
        },
        load: {
          filter: '.foto'
        },
        controls: {
            scope: 'local'
        }
    });   
}



