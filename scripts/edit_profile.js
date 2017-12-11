import { encodeForAjax, logServerResponse, createItemNode, createTaskNode } from './ajax_commons.js';

function changeToEdition() {

    let profile_container = document.getElementsByClassName("profile-container")[0];

    //Eliminating h4
    let info_container = document.getElementsByClassName("username-info")[0];
    let aboutText = document.querySelector(".username-info h4");
    info_container.removeChild(aboutText);

    //Adding textarea
    let texteditor = document.createElement("textarea");
    let userAbout = document.createTextNode(aboutText.textContent);
    texteditor.appendChild(userAbout);
    info_container.appendChild(texteditor);

    //Adding upload button
    let upload_form = document.createElement("form");
    upload_form.setAttribute('action', "update_img.php");
    upload_form.setAttribute('class', "image-uploader");
    upload_form.setAttribute('method', "post");
    upload_form.setAttribute('ecntype', "multipart/form-data");

    let input_file = document.createElement("input");
    input_file.setAttribute('type', "file");
    input_file.setAttribute('name', "file");
    upload_form.appendChild(input_file);
    profile_container.appendChild(upload_form);

    //Eliminating edit-button
	profile_container.removeChild(document.getElementsByClassName("edit-profile")[0]);
	
	//onclick.stopPropagation();
	console.log(event);
	event.stopPropagation();

    //Adding Save changes button
    let save_btn = document.createElement("button");
    save_btn.setAttribute('type', "button");
	save_btn.setAttribute('class', "btn save-changes");
	save_btn.onclick = saveChanges.bind(save_btn);

    let save_btn_content = document.createElement("span");

    let save_icon = document.createElement("i");
    save_icon.setAttribute('class', "fa fa-floppy-o");

    let btn_label = document.createTextNode("Save!");

    save_btn_content.appendChild(save_icon);
    save_btn_content.appendChild(btn_label);
    save_btn.appendChild(save_btn_content);
	profile_container.appendChild(save_btn);
}

function saveChanges() {
	let aboutText = document.getElementsByTagName("textarea")[0].value;
	changeCurrUserAbout(aboutText);

	return false;
}

function changeCurrUserAbout(aboutText) {

	let request = new XMLHttpRequest();
	//request.onload = console.log(this.responseText);
	request.open("post", "action_save_profile.php", true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	request.send(encodeForAjax({ about: aboutText }));

	changeToView();
}

function changeToView() {

	let profile_container = document.getElementsByClassName("profile-container")[0];
	
	//Eliminating h4
	let info_container = document.getElementsByClassName("username-info")[0];
	let edited_text = document.getElementsByTagName("textarea")[0];
	info_container.removeChild(edited_text);
	console.log(edited_text);

	//Adding about_text
	let aboutText = document.createElement("h4");
	let userAbout = document.createTextNode(edited_text.value);
	console.log(userAbout);
	aboutText.appendChild(userAbout);
	info_container.appendChild(aboutText);

	//Deleting upload button
	profile_container.removeChild(document.getElementsByClassName("image-uploader")[0]);

	//Eliminating save changes button
	profile_container.removeChild(document.getElementsByClassName("save-changes")[0]);

	//Adding Edit button
	let edit_btn = document.createElement("button");
	edit_btn.setAttribute('type', "button");
	edit_btn.setAttribute('class', "btn edit-profile");
	edit_btn.onclick = changeToEdition.bind(edit_btn);

	let edit_btn_content = document.createElement("span");

	let edit_icon = document.createElement("i");
	edit_icon.setAttribute('class', "fa fa-pencil");

	let btn_label = document.createTextNode("Edit Profile");

	edit_btn_content.appendChild(edit_icon);
	edit_btn_content.appendChild(btn_label);
	edit_btn.appendChild(edit_btn_content);
	profile_container.appendChild(edit_btn);
}

window.addEventListener('load', function() {
    var edit_btn = document.getElementsByClassName("edit-profile")[0];
    edit_btn.onclick = changeToEdition.bind(edit_btn);
});