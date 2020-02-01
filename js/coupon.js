document.querySelector('.coupon-reveal').addEventListener("click", function () {
	let e = document.querySelector('.coupon');

	if (e.style.display === "none") {
		e.style.display = "block";
	} else {
		e.style.display = "none";
	}
});  
