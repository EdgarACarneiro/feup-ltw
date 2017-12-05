var masonry_item_class = document.getElementsByClassName('masonry-item');

var feed_container = document.getElementById('feed');

function modal() {
    if (this.style.position != "absolute") {
        this.parentElement.style.height = this.clientHeight.toString() + "px";
        this.style.position = "absolute";
        this.style.top = this.offsetTop;
        this.style.left = this.offsetLeft;
        this.style.transition = "0.5s";
        let translateX = ((feed_container.offsetWidth - 500) / 2 - this.offsetLeft);
        let translateY = (document.documentElement.scrollTop + 200 - this.offsetTop);
        this.style.transform = "translate(" +
            translateX.toString() + "px , " +
            translateY.toString() + "px )";
        this.style.width = "500px";
    } else {
        this.parentElement.style.height = "";
        this.style.position = "";
        this.style.width = "";
        this.style.transform = "";
    }
}

Array.from(masonry_item_class).forEach(function(element) {
    element.lastChild.addEventListener('click', modal);
});