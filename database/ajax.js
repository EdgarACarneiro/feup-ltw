function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function addItemToTask(id) {
    let request = new XMLHttpRequest();
    let logError = ev => console.error("Ajax request error");

    request.addEventListener("error", logError);
    request.addEventListener("abort", logError);
    


    console.log("Add item to task " + id);
    return false; // preventing event from bubbling up
}

function showSearchResult(value) {
    console.log("Searching for: " + value);
}