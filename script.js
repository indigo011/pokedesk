let avatar = document.getElementById("avatar");
let avatar_name = document.getElementById("avatar-name");

avatar.addEventListener("input", ()=> {
    if (avatar.files.length) {
        let filename = avatar.files[0].name;
        avatar_name.style.display = "block";
        avatar_name.innerHTML = filename;
    }
})