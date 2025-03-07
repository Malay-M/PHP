let checkbox = document.querySelector("#checkbox");
let pass1 = document.getElementById("pass");
let pass2 = document.getElementById("cpass");

let submit = document.getElementById("submit");

checkbox.addEventListener("change", function() {

    if(this.checked) {
        pass1.type = "text";
        pass2.type = "text";

    } else {
        pass1.type = "password";
        pass2.type = "password";

    }
});


let match = document.querySelector(".match");
match.hidden = true;
let check = () => {

        if (pass1.value == pass2.value) {
            match.hidden = true;
            submit.disabled = false;
        } else {
            match.hidden = false;
            submit.disabled = true;
        }
    
};