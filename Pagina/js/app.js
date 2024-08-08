let darkmode = document.querySelector('#darkmode');

if (localStorage.getItem('darkmode') === 'enabled') {
    document.body.classList.add('coloroscuro');
    darkmode.classList.replace('ri-moon-fill', 'ri-sun-line');
} else {
    document.body.classList.remove('coloroscuro');
    darkmode.classList.replace('ri-sun-line', 'ri-moon-fill');
}

darkmode.onclick = () => {
    if (darkmode.classList.contains('ri-moon-fill')) {
        darkmode.classList.replace('ri-moon-fill', 'ri-sun-line');
        document.body.classList.add('coloroscuro');
        localStorage.setItem('darkmode', 'enabled');
    } else {
        darkmode.classList.replace('ri-sun-line', 'ri-moon-fill');
        document.body.classList.remove('coloroscuro');
        localStorage.setItem('darkmode', 'disabled');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var buttons = document.querySelectorAll(".accordion-button");

    buttons.forEach(function (button) {
        button.addEventListener("click", function () {
            var content = this.nextElementSibling;

            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    });
});

document.addEventListener('scroll', function() {
    const img = document.querySelector('.main-img img');
    img.style.top = window.scrollY + 'px';
});
document.addEventListener("DOMContentLoaded", function() {
    var inputs = document.querySelectorAll(".usuario input");

    inputs.forEach(function(input) {
        if (input.value !== "") {
            input.classList.add("not-empty");
        }

        input.addEventListener("blur", function() {
            if (input.value !== "") {
                input.classList.add("not-empty");
            } else {
                input.classList.remove("not-empty");
            }
        });
    });
});

var togglePassword = document.getElementById("verPassword");
var passwordInput = document.querySelector("input[name='password']");

togglePassword.addEventListener("mouseover", function() {
    passwordInput.type = "text";
    togglePassword.classList.replace("ri-eye-off-fill", "ri-eye-fill");
});

togglePassword.addEventListener("mouseout", function() {
    passwordInput.type = "password";
    togglePassword.classList.replace("ri-eye-fill", "ri-eye-off-fill");
});


