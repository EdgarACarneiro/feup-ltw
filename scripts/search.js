import { hide } from './utils.js';

function showSearchResult() {
    let searchQuery = this.value;
    let nodesArray = [].slice.call(getAllTaskNodes());

    nodesArray.forEach(taskNode => {
        if (isMatch(searchQuery, taskNode)) {
            taskNode.style.display = "";
        } else {
            hide(taskNode);
        }
    });
}

function getTitle(taskNode) {
    return taskNode.querySelector('.todo__title span').innerHTML;
}

function isMatch(query, taskNode) {
    let title = getTitle(taskNode).toLowerCase();
    return title.indexOf(query) !== -1;
}

function getAllTaskNodes() {
    return document.querySelectorAll('#tasks-list > .masonry-item');
}

window.addEventListener('load', function() {
    var search_bar = document.getElementById('search-bar');
    search_bar.onkeyup = showSearchResult.bind(search_bar);
});