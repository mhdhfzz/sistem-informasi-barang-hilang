// Navbar Fixed
window.onscroll = function () {
	const header = document.querySelector("header");
	const fixedNav = header.offsetTop;
	const toTop = document.querySelector("#to-top");

	if (window.pageYOffset > fixedNav) {
		header.classList.add("navbar-fixed");
		toTop.classList.remove("hidden");
		toTop.classList.add("flex");
	} else {
		header.classList.remove("navbar-fixed");
		toTop.classList.remove("flex");
		toTop.classList.add("hidden");
	}
};

// Hamburger
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
	hamburger.classList.toggle("hamburger-active");
	navMenu.classList.toggle("hidden");
});

// Klik di luar hamburger
window.addEventListener("click", function (e) {
	if (e.target != hamburger && e.target != navMenu) {
		hamburger.classList.remove("hamburger-active");
		navMenu.classList.add("hidden");
	}
});

// Darkmode toggle
const darkToggle = document.querySelector("#dark-toggle");
const html = document.querySelector("html");

darkToggle.addEventListener("click", function () {
	if (darkToggle.checked) {
		html.classList.add("dark");
		localStorage.theme = "dark";
	} else {
		html.classList.remove("dark");
		localStorage.theme = "light";
	}
});

// pindahkan posisi toggle sesuai mode
if (localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
	darkToggle.checked = true;
} else {
	darkToggle.checked = false;
}

// FAQ Akordeon
const accordionItems = document.querySelectorAll(".accordion-item");

accordionItems.forEach((item) => {
	const header = item.querySelector(".accordion-header");
	const content = item.querySelector(".accordion-content");

	header.addEventListener("click", () => {
		// close other items
		accordionItems.forEach((otherItem) => {
			if (otherItem !== item && otherItem.classList.contains("active")) {
				otherItem.classList.remove("active");
				otherItem.querySelector(".accordion-content").style.height = 0;
			}
		});

		item.classList.toggle("active");

		if (item.classList.contains("active")) {
			content.style.height = `${content.scrollHeight}px`;
		} else {
			content.style.height = 0;
		}
	});
});

// Uploud Gambar
document.getElementById("fileImg").onchange = function () {
	document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

	document.getElementById("cancel").style.display = "block";
	document.getElementById("confirm").style.display = "block";

	document.getElementById("upload").style.display = "none";
};

var userImage = document.getElementById("image").src;
document.getElementById("cancel").onclick = function () {
	document.getElementById("image").src = userImage; // Back to previous image

	document.getElementById("cancel").style.display = "none";
	document.getElementById("confirm").style.display = "none";

	document.getElementById("upload").style.display = "block";
};
