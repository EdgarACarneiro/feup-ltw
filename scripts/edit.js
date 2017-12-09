var list_items_display = document.getElementsByClassName('li-item-display');
var list_items_edit = document.getElementsByClassName('li-item-edit');

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function show(element) {
    element.style.display = 'block';
}

function hide(element) {
    element.style.display = 'none';
}

function switchToEdit() {
    hide(this);
    let inputNode = this.nextSibling.nextSibling;
    show(inputNode);
    inputNode.value = this.innerHTML;
    inputNode.focus();
}

function switchToDisplay() {
    hide(this);
    let displayNode = this.previousSibling.previousSibling;
    show(displayNode);
    displayNode.innerHTML = this.value;

    let itemId = this.parentNode.id.match(/@(\d+)/)[1];

    changeItemDescription(itemId, this.value);
}

function changeItemDescription(itemId, itemText) {
    let request = new XMLHttpRequest();
    request.onload = logRequestResponse;
    request.open("post", "action_change_item.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({item_id: itemId, description: itemText}));
}

function logRequestResponse() {
    console.log("Ajax request response:");
    console.log(JSON.parse(this.responseText));
}

Array.from(list_items_display).forEach(function(element) {
    element.onclick = switchToEdit.bind(element);
});

Array.from(list_items_edit).forEach(function(element) {
    element.onchange = switchToDisplay.bind(element);
});

// $("#display").click(function() {
//     $(this).hide();
//     $(this).siblings("#edit").show().val($(this).text()).focus();
//   });
  
//   $("#edit").focusout(function(){
//   $(this).hide();  $(this).siblings("#display").show().text($(this).val());
//   });