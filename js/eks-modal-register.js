// Get the modal
let eksRegModal = document.getElementById("eks-reg-modal");

// Get the Modal Content
let eksRegModalBg = document.getElementById("eks-reg-modal-bg");

// Get the button that opens the modal
let openRegBtn = document.getElementById("modal-reg-btn");

// Get the <span> element that closes the modal
let closeRegBtn = document.getElementsByClassName("modal-reg-close")[0];

// When the user clicks the button, open the modal
openRegBtn.onclick = function () {
  //eksModal.style.display = "flex";
  eksRegModal.classList.add("modal-display", "animated", "fadeIn");
};

// When the user clicks on <span> (x), close the modal
closeRegBtn.onclick = function () {
  eksRegModal.classList.remove("modal-display", "animated", "fadeIn");
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == eksRegModalBg) {
    eksRegModal.classList.remove("modal-display", "animated", "fadeIn");

    console.log("Out");
  }
};