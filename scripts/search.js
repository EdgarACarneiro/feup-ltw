import { show, hide } from './utils.js';

function showSearchResult() {
    let searchQuery = this.value;
    let nodesArray = [].slice.call(getAllTaskNodes());    
    if (searchQuery.trim().length == 0) {
        showAllNodes(nodesArray);
    }

    nodesArray.forEach(taskNode => {
        if (isMatch(searchQuery, taskNode)) {
            show(taskNode);
        } else {
            hide(taskNode);
        }
    });

    console.log('Searched for:');    
    console.log(searchQuery);
}

function getTitle(taskNode) {
    return taskNode.querySelector('.todo__title span').innerHTML;
}

function isMatch(query, taskNode) {
    let title = getTitle(taskNode).toLowerCase();
    return title.indexOf(query) !== -1;
}

function showAllNodes(nodesArray) {
    nodesArray.forEach(element => {
        hide(element);
    });
}

function getAllTaskNodes() {
    return document.querySelectorAll('#tasks-list > .masonry-item');
}

window.addEventListener('load', function() {
    var search_bar = document.getElementById('search-bar');
    search_bar.onkeyup = showSearchResult.bind(search_bar);
});