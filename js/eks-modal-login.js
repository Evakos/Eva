// Get the modal
var eksModal = document.getElementById("eks-modal");

// Get the Modal Content
var eksModalBg = document.getElementById("eks-modal-bg");

// Get the button that opens the modal
var openBtn = document.getElementById("modal-btn");

// Get the <span> element that closes the modal
var closeBtn = document.getElementsByClassName("modal-close")[0];

// When the user clicks the button, open the modal
openBtn.onclick = function () {
  //eksModal.style.display = "flex";
  document.getElementById("modal_login_form").reset();
  document.getElementById("auth-msg").innerHTML = "";
  eksModal.classList.add("modal-display", "animated", "fadeIn");
};

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function () {
  eksModal.classList.remove("modal-display", "animated", "fadeIn");
};

// When the user clicks anywhere outside of the modal, close it



document.onclick = function (event) {

  if (event.target == eksModalBg) {
    eksModal.classList.remove("modal-display", "animated", "fadeIn");
    console.log("Out");
  }
};


function eks_login_auth() {
  document.getElementById("auth-msg").innerHTML = "";
  var http = new XMLHttpRequest();
  var url = '/wp-admin/admin-ajax.php';
  var email = document.querySelector('#username').value;
  var password = document.querySelector('#password').value;

  var params = 'action=eks_login_validation&email=' + email + '&password=' + password;

  http.open('POST', url, true);
  //http.setRequestHeader('Content-type', 'application/json');
  http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  http.send(params);
  // http.onload = function() {}
  http.onreadystatechange = function () {
    if (http.readyState == 4 && http.status == 200) {

      var loadingdiv = document.getElementById('loading');
      if (http.responseText == 'succ') {
        loadingdiv.style.display = "none";
        if (http.responseText == 'succ') {

          document.getElementById("auth-msg").appendChild(node);
          window.location = "/my-account/";
          //location.reload();
        } else {
          document.getElementById("auth-msg").innerHTML = http.responseText;

          var modal_login_btn = document.getElementById('modal_login_btn');
          loadingdiv.style.display = "none";
          modal_login_btn.innerHTML = "Log In";
          document.getElementById("modal_login_btn").disabled = false;
          document.getElementById("username").disabled = false;
          document.getElementById("password").disabled = false;
          document.getElementById("rememberme").disabled = false;
        }
      }
    }
  };
}



var node = document.createElement("div"); // Create a <div> node
var textnode = document.createTextNode("Login Successful"); // Create a text message node
node.appendChild(textnode); // Append the div to auth_msg
node.setAttribute("class", "eks-success animated bounceIn");


var form = document.getElementById("modal_login_form");
var modal_login = document.getElementById("modal_login_btn");
form.addEventListener("submit", function (event) {
  event.preventDefault();

  var modal_login_btn = document.getElementById('modal_login_btn');
  var loadingdiv = document.getElementById('loading');
  loadingdiv.style.display = "block";
  document.getElementById("modal_login_btn").disabled = true;
  document.getElementById("username").disabled = true;
  document.getElementById("password").disabled = true;
  document.getElementById("rememberme").disabled = true;
  modal_login_btn.innerHTML = '<span class="spinner"></span> Logging In';
  eks_login_auth();

});