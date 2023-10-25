
class Search {
    // 1. Describe and create/initiate our object
    constructor() {
        this.resultsDiv = document.getElementById('search__results');
        this.openBtn = document.querySelector('.search-btn');
        this.closeBtn = document.querySelector('.search-hide');
        this.searchOverlay = document.querySelector('.search_overlay');
        this.searchField = document.getElementById('search_input');

        this.activeElement = document.activeElement;

        this.events();
        this.showOverlay = false;
        this.loaderVisible = false;
        this.previousValue;
        this.typingTimer;
    }


    // 2. Events
    events() {
        this.openBtn.addEventListener('click', this.openOverlay.bind(this));
        this.closeBtn.addEventListener('click', this.closeOverlay.bind(this));

        document.addEventListener('keydown', this.keyPressDispatcher.bind(this));
        this.searchField.addEventListener('keyup', this.typingLogic.bind(this))
    }


    // 3. Methods (function, action)
    typingLogic(e) {
        if (this.searchField.value != this.previousValue) {
            clearTimeout(this.typingTimer);

            if (this.searchField.value) {
                if (!this.loaderVisible) {
                    this.resultsDiv.innerHTML = `<h1><span class='icon-spin6'></span></h1>`;
                    this.loaderVisible = true;
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
            } else {
                this.resultsDiv.innerHTML = '';
                this.loaderVisible = false;
            }
        }
        this.previousValue = this.searchField.value;
    }

    getResults() {
        this.resultsDiv.innerHTML = `
        <h1>Here will real search results</h1>
        `


        this.loaderVisible = false;
    }

    keyPressDispatcher(e) {
        if (document.activeElement.tagName != 'INPUT' && document.activeElement.tagName != 'TEXTAREA') {
            e.keyCode === 83 && !this.showOverlay ? this.openOverlay() : null;
        }
        e.keyCode === 27 && this.showOverlay ? this.closeOverlay() : null;
    }

    openOverlay() {
        this.searchOverlay.classList.add('show-box');
        document.body.classList.add('no-scroll');
        this.showOverlay = true;

    }

    closeOverlay() {
        this.searchOverlay.classList.remove('show-box');
        document.body.classList.remove('no-scroll');
        this.showOverlay = false;

    }
}


var search = new Search(); 