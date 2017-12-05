var masonry_item_class = document.getElementsByClassName('masonry-item');

var feed_container = document.getElementById('feed');

function modal() {
    if (this.style.position != "absolute") {
        this.parentElement.style.height = this.clientHeight.toString() + "px";
        this.style.position = "absolute";
        this.style.top = this.offsetTop;
        this.style.left = this.offsetLeft;
        this.style.transition = "transform .5s ease-in-out";
        let translateX = ((feed_container.offsetWidth - 500) / 2 - this.offsetLeft);
        let translateY = (document.documentElement.scrollTop + 200 - this.offsetTop);
        this.style.transform = "translate(" +
            translateX.toString() + "px , " +
            translateY.toString() + "px )";
        this.style.width = "500px";
        document.getElementById('modal').style.zIndex = "5";
        document.getElementById('modal').style.opacity = "1";
    } else {
        document.getElementById('modal').style.opacity = "0";
        document.getElementById('modal').style.zIndex = "-1";
        this.parentElement.style.height = "";
        this.style.position = "";
        this.style.width = "";
        this.style.transform = "";
        this.style.transition = "";
    }
}

Array.from(masonry_item_class).forEach(function(element) {
    element.lastChild.addEventListener('click', modal);
});