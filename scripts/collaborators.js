Array.from(document.getElementsByClassName('masonry-item')).forEach(element => {
    let nav_info = element.firstElementChild.children['info-nav'];
    Array.from(element.getElementsByClassName('todo')).forEach(elem => {

        let userId = elem.id.substring(0, elem.id.indexOf('@'));

        if (userId.length > 0) {
            Array.from(nav_info.children).forEach(user => {
                if (user.id == userId) {
                    elem.onmouseover = function() {
                        user.classList.add('active');
                    };
                    elem.onmouseout = function() {
                        user.classList.remove('active');
                    };
                }
            });
        }
    });
});