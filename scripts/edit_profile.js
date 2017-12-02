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

    //Adding Save changes button
    let save_btn = document.createElement("button");
    save_btn.setAttribute('type', "button");
    save_btn.setAttribute('class', "btn save-changes");
    save_btn.setAttribute('onclick', ""); //TODO ADD FUNCTION

    let save_icon = document.createElement("i");
    save_icon.setAttribute('class', "fa fa-floppy-o");

    let btn_label = document.createTextNode(" Save!");

    save_icon.appendChild(btn_label);
    save_btn.appendChild(save_icon);
    profile_container.appendChild(save_btn);
    

    //Eliminating edit-button
    profile_container.removeChild(document.getElementsByClassName("edit-profile")[0]);
}

function changeToView() {

    //fazer reload da pagina aqui?

    /**
     *     //Edition elements
    echo '<form action="update_img.php" class="image-uploader" 
            method="post" enctype="multipart/form-data">';
    echo '<input type="file" name="file">';
    echo '</form>';
    echo '<textarea>' . $about . '</textarea>';
    echo '<button type="button" class="btn save-changes">
            <i class="fa fa-floppy-o" onclick=>  Save</i></button>';
    echo '</section>';
     */
}