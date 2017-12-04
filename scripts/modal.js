var masonry_item_class = document.getElementsByClassName('masonry-item');

function modal() {
    if (!this.classList.contains('modal')) {
        this.parentElement.style.height = this.clientHeight.toString() + "px";
        this.classList.add('modal');
    } else {
        this.classList.remove('modal');
        this.parentElement.style.height = "";
    }
}

Array.from(masonry_item_class).forEach(function(element) {
    element.lastChild.addEventListener('click', modal);
});