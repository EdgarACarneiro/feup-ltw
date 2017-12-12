function showSearchResult() {
    let searchQuery = this.value;
    if (searchQuery.trim().length == 0) {
        showAllTaskNodes();
    }
    // LOOP through all tasknodes and hide if not matched

    console.log('Searched for:');    
    console.log(searchQuery);
}

function getTitle(taskNode) {
    return "title"; // TODO
}

function isMatch(query, taskNode) {
    let title = getTitle(taskNode);

    return query.indexOf(title) !== -1;
}

function showAllTaskNodes() {
    // TODO
}

window.addEventListener('load', function() {
    var search_bar = document.getElementById('search-bar');
    search_bar.onkeyup = showSearchResult.bind(search_bar);
});