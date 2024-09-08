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

var burgerAnime = anime({
	targets: '.menu',
	duration: 300,
	width: 170,
	easing: 'easeInOutSine',
	autoplay: false,
	complete: (anim) => {
		anim.reverse();
	}
});

const burgerAnim = anime({
	targets: '.menu',
	duration: 300,
	autoplay: false,
	complete: (anim) => {
		anim.reverse();
	}
});

const burgerTransformation = function () {
	const bars = document.querySelectorAll('.bar');
	if (bars[0].classList.contains('bar-animation'))
		for (let bar of bars)
			bar.classList.remove('bar-animation');
	else
		for (let bar of bars)
			bar.classList.add('bar-animation');
}

const burgerFrame = function (element, step, flag) {
	const that = this;
	return function () {
		const width = +parseFloat(window.getComputedStyle(element).width);
		element.style.width = width + step + "px";
	};
};

const burgerMenuAppear = function (burger) {
	let id = null;

	const menu = burger.parentElement;
	const width = window.getComputedStyle(menu).width;
	let step;

	if (+ParseInt(width) > 0)
		step = 5;
	else
		step = -5;

	burger.style.marginTop = "-16px";
	let flag = false;

	id = setInterval(burgerFrame(menu, step, flag), 10);

	if (+parseFloat(menu.style.width) > 100 && step > 0 || +parseFloat(menu.style.width) <= 0 && step < 0) {
		clearInterval(id);
		console.log('inside');
	} 
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
	if (!event.target.classList.contains("comment-delete-button")) return;

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
burger.addEventListener("click", burgerAnime.play);
burger.addEventListener("click", burgerTransformation);