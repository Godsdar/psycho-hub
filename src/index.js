import 'normalize.css';
import './fonts.scss';
import './main.scss';

import anime from 'animejs';

const heartAnimation = anime({
	targets: 'svg',
	duration: 2000,
	translateX: '500',
	scale: 1.5,
});

const burgerFrame = function (element) {
	const that = this;
	return function () {
		let width = parseFloat(element.style.width);
		if (+width >= 200) {
			clearInterval(that);
			return;
		}

		let step = 5;
		element.style.width = width + step + "px";
	};
};

const burgerMenuAppear = function (burger) {
	let id = null;

	const menu = burger.parentElement;
	console.log(menu.width);

	burger.style.marginTop = "-16px";

	id = setInterval(burgerFrame(menu), 10);
	if (+parseFloat(menu.style.width) > 100) {
		clearInterval(id);
		return;
	}
};

const burgerOnClick = function (event) {
	const burger = event.target.closest(".burger-menu");
	burgerMenuAppear(burger);
};

const frame = function (comment) {
	return function () {
		let opac = comment.style.opacity;
		let step = +opac - 0.02;
		comment.style.opacity = step + "";
		if (opac == 0.02)
			comment.style.display = "none";
	};
};

const deleteAnimation = function (comment) {
	let id = null;
	comment.style.display = "block";
	comment.style.opacity = "1";

	if (+comment.style.opacity <= 0) {
		clearInterval(id);
		comment.style.display = "none";
		return;
	}
	id = setInterval(frame(comment), 10);
};

const onClick = function (event) {
	const comment = event.target.closest(".comment");
	const xhttp = new XMLHttpRequest();

	xhttp.onload = function () {
		deleteAnimation(comment);
	};

	xhttp.open("GET", `../src/backend/comment-delete.php?identifier=${+comment.id}`, true);
	xhttp.send();
};

const commentsSection = document.querySelector(".comments-section");
commentsSection.addEventListener("click", onClick);

const burger = document.querySelector(".burger-menu");
burger.addEventListener("click", burgerOnClick);