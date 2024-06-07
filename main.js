let search = document.querySelector('.search-box');

document.querySelector('#search-icon').onclick = () => {
    search.classList.toggle('active');
}



let navbar = document.querySelector('.navbar');

document.querySelector('#menu-icon').onclick = () => {
    navbar.classList.toggle('active');
}

function openPopup(popupId) {
    var popup = document.getElementById(popupId);
    popup.style.display = 'block'; // Tampilkan pop-up
}



function closePopup() {
    var popups = document.querySelectorAll('.popup-container');
    popups.forEach(function(popup) {
        popup.style.display = 'none'; // Sembunyikan semua pop-up
    });
}


document.getElementById("registrationForm").onsubmit = function(event) {
    var emailInput = document.getElementById("email").value;
    var emailRegex = /\S+@\S+\.\S+/;

    if (!emailRegex.test(emailInput)) {
        document.getElementById("emailError").innerHTML = "Email harus mengandung simbol '@'";
        event.preventDefault(); // Hindari pengiriman form jika email tidak valid
        return false;
    } else {
        document.getElementById("emailError").innerHTML = "";
    }

    var passwordInput = document.getElementById("password").value;
    var passwordRegex = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/;

    if (!passwordRegex.test(passwordInput)) {
        document.getElementById("passwordError").innerHTML = "Password harus terdiri dari huruf dan angka";
        event.preventDefault(); // Hindari pengiriman form jika password tidak valid
        return false;
    } else {
        document.getElementById("passwordError").innerHTML = "";
    }

    return true; // Izinkan pengiriman form jika email dan password valid
};

document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.navbar a');

    window.addEventListener('scroll', () => {
        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= sectionTop - sectionHeight / 3) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(current)) {
                link.classList.add('active');
            }
        });
    });
});
