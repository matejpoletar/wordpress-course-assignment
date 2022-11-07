import throttle from 'lodash/throttle';
import debounce from 'lodash/debounce';

class RevealOnScroll {
	constructor() {
		this.itemsToReveal = document.querySelectorAll('.image__img');
		this.browserHeight = window.innerHeight;
		this.hideInitially();
		this.scrollThrottle = throttle(this.calculateCallback, 200).bind(this);
		this.events();
		console.log(window.scrollY);
		console.log(this.browserHeight); this.itemsToReveal.forEach( element => {console.log(element.offsetTop)});
	}

	calculateCallback() {
		this.itemsToReveal.forEach( element => {
			if(element.isRevealed === false){
				this.calculateIfScrolledTo(element);
			}
		})
	}

	events() {
		window.addEventListener('scroll', this.scrollThrottle);
		window.addEventListener('resize', debounce(() => {
			this.browserHeight = window.innerHeight;
		}, 300));
	}

	calculateIfScrolledTo(element) {
		if(window.scrollY + this.browserHeight > element.offsetTop){
			let scrollPercent = element.getBoundingClientRect().y / this.browserHeight;
			if (scrollPercent <  .75) {
				element.classList.add('image__img--is-visible');
				element.isRevealed = true;
				if(element.isLastItem) {
					window.removeEventListener('scroll', this.scrollThrottle);
				}
			}
		}
	}

	hideInitially() {
			this.itemsToReveal.forEach(element => {
				if(element.offsetTop > this.browserHeight){
					element.isRevealed = false;
				} else {
					element.isRevealed = true;
					element.classList.add('image__img--is-visible');
				}
			});
			this.itemsToReveal[this.itemsToReveal.length - 1].isLastItem = true;
		}
	
}

export default RevealOnScroll;