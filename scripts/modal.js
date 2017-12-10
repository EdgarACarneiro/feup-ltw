var masonry_item_class = document.getElementsByClassName('masonry-item');

var feed_container = document.getElementById('feed');

var opened_Model;

function openModal() {
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
    document.getElementById('modal').addEventListener("click", closeModal);
    this.removeEventListener("click", openModal);
    opened_Model = this;
}

function closeModal() {
    if (opened_Model != null) {
        document.getElementById('modal').style.opacity = "0";
        document.getElementById('modal').style.zIndex = "-1";
        opened_Model.parentElement.style.height = "";
        opened_Model.style.position = "";
        opened_Model.style.width = "";
        opened_Model.style.transform = "";
        opened_Model.style.transition = "";
        opened_Model.addEventListener("click", openModal);
        opened_Model = null;
    }
}

window.addEventListener('load', function() {
    Array.from(masonry_item_class).forEach(function(element) {
        if (window.innerWidth > 768) {
            element.lastChild.addEventListener('click', openModal);
        }
    });
});
