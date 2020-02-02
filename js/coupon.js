document.querySelector('.coupon-reveal').addEventListener("click", function () {
	let e = document.querySelector('.coupon');

	if (e.style.display === "flex") {
		e.style.display = "none";
	} else {
		e.style.display = "flex";
	}
});  
