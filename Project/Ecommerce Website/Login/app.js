let checkbox = document.querySelector("#show");
let show = document.getElementById("password")

checkbox.addEventListener('change', function() {
    if(this.checked) {
        show.type = "text";
    } else {
        show.type = "password";
    }
});