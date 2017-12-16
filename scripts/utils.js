export function encodeForAjax(data) {
    return Object.keys(data).map(function(k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

export function logServerResponse() {
    console.log("Server Response:");
    console.log(JSON.parse(this.responseText));
}

export function show(element) {
    element.style.display = 'block';
}

export function hide(element) {
    element.style.display = 'none';
}

/**
 * @deprecated sync requests
 */
export function getCurrentUser() {
    let request = new XMLHttpRequest();
    let username;
    request.onload = function() {
        username = JSON.parse(this.responseText);
    }
    request.open("post", "./actions/action_get_username.php", false); // false -> not async
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(); // TODO change to Promise ?

    return username;
}

export function getElementsByXPath(xpath, context = document) {
  let nodes = [];
  let query = document.evaluate(xpath, context,
      null, XPathResult.ORDERED_NODE_SNAPSHOT_TYPE, null);
  for (let i = 0, length=query.snapshotLength; i<length; ++i) {
    nodes.push(query.snapshotItem(i));
  }
  return nodes;
}