let header = document.getElementById("header");
let buttonLogout = document.getElementById("buttonLogout");
let containerSignIn = document.getElementById("containerSignIn");
let containerSignUp = document.getElementById("containerSignUp");
let textUsername = document.getElementById("textUsername");
let textPassword = document.getElementById("textPassword");
let showContent = document.getElementById("showContent");

header.textContent = "Created Account :";
buttonLogout.style.display = "none";
containerSignUp.style.display = "none";
textUsername.style.display = "none";
textPassword.style.display = "none";
showContent.style.display = "none";

function SignUp() {
  containerSignIn.style.display = "none";
  containerSignUp.style.display = "block";
}
function SignIn() {
  containerSignUp.style.display = "none";
  containerSignIn.style.display = "block";
}
function termscheck() {
  terms.checked = true;
}
// sign-up
function Register() {
  let UsernameSignUp = document.getElementById("UsernameSignUp");
  let passwordSignUp = document.getElementById("passwordSignUp");
  let repeatPasswordSignUp = document.getElementById("repeatPasswordSignUp");
  let inputNewUsername = document.getElementById("inputNewUsername");
  let inputNewPassword = document.getElementById("inputNewPassword");

  if (passwordSignUp.value == repeatPasswordSignUp.value) {
    if (UsernameSignUp.value && passwordSignUp.value && terms.checked == true) {
      alert("Akun Berhasil Dibuat, Silahkan Login");
      inputNewUsername.textContent = UsernameSignUp.value;
      inputNewPassword.textContent = passwordSignUp.value;
      textUsername.style.display = "block";
      textPassword.style.display = "block";
      localStorage.setItem("newAccount", inputNewUsername.textContent);
      localStorage.setItem("newPassword", inputNewPassword.textContent);
      location.reload();
      return;
    }
  }
  if (UsernameSignUp.value == "" || passwordSignUp.value == "" || repeatPasswordSignUp.value == "") {
    alert("Tolong Masukan Nama Dan Passwordnya Cuy");
  } else if (passwordSignUp.value !== repeatPasswordSignUp.value) {
    alert("Lihat Lagi Passwordnya Cuy");
  } else if (terms.checked == false) {
    alert("Udah Ceklis Cuy?");
  }
}

if (localStorage.getItem("newAccount")) {
  inputNewUsername.textContent = localStorage.getItem("newAccount");
  inputNewPassword.textContent = localStorage.getItem("newPassword");
  textUsername.style.display = "block";
  textPassword.style.display = "block";
}

// Sign-In
function buttonSubmit() {
  let listAkun = document.getElementById("listAkun");
  let UsernameSignIn = document.getElementById("UsernameSignIn");
  let passwordSignIn = document.getElementById("passwordSignIn");
  localStorage.setItem("username", UsernameSignIn.value);

  if (UsernameSignIn.value == "AkunAdmin" && passwordSignIn.value == "Admin") {
    localStorage.setItem("role", "admin");
    buttonLogout.style.display = "block";
    header.textContent = "Admin's Account";
    listAkun.style.display = "none";
    containerSignIn.style.display = "none";
    containerSignUp.style.display = "none";
    showContent.textContent = "Anda Masuk Sebagai Akun Admin";
    showContent.style.display = "block";
  } else if (UsernameSignIn.value == "AkunBasic1" && passwordSignIn.value == "Basic1") {
    localStorage.setItem("role", "basic");
    buttonLogout.style.display = "block";
    header.textContent = "Basic's Account";
    listAkun.style.display = "none";
    containerSignIn.style.display = "none";
    containerSignUp.style.display = "none";
    showContent.textContent = "Anda Masuk Sebagai Akun Basic1";
    showContent.style.display = "block";
  } else if (UsernameSignIn.value == "AkunBasic2" && passwordSignIn.value == "Basic2") {
    localStorage.setItem("role", "basic");
    buttonLogout.style.display = "block";
    header.textContent = "Basic's Account";
    listAkun.style.display = "none";
    containerSignIn.style.display = "none";
    containerSignUp.style.display = "none";
    showContent.textContent = "Anda Masuk Sebagai Akun Basic2";
    showContent.style.display = "block";
  } else if (UsernameSignIn.value == localStorage.getItem("newAccount") && passwordSignIn.value == localStorage.getItem("newPassword")) {
    localStorage.setItem("role", "your");
    buttonLogout.style.display = "block";
    header.textContent = "Your's Account";
    listAkun.style.display = "none";
    containerSignIn.style.display = "none";
    containerSignUp.style.display = "none";
    showContent.textContent = "Terima Kasih Telah Membuat Akun Baru";
    showContent.style.display = "block";
  } else if (UsernameSignIn.value == "" || passwordSignIn.value == "") {
    alert("Tolong Masukan Nama Dan Passwordnya Cuy");
  } else {
    alert("Error Cuy");
  }
}

if (localStorage.getItem("username")) {
  buttonLogout.style.display = "block";
  listAkun.style.display = "none";
  containerSignIn.style.display = "none";
  containerSignUp.style.display = "none";
  if (localStorage.getItem("role") == "admin") {
    header.textContent = "Admin's Account";
    showContent.textContent = '"Anda Masuk Sebagai Akun Admin"';
    showContent.style.display = "block";
  } else if (localStorage.getItem("role") == "your") {
    header.textContent = "Your's Account";
    showContent.textContent = '"Terima Kasih Telah Membuat Akun Baru"';
    showContent.style.display = "block";
  } else if (localStorage.getItem("role") == "basic") {
    header.textContent = "Basic's Account";
    if (UsernameSignIn.value == "AkunBasic1") {
      showContent.textContent = "Anda Masuk Sebagai Akun Basic1";
      showContent.style.display = "block";
    }
    if (UsernameSignIn.value == "AkunBasic2") {
      showContent.textContent = "Anda Masuk Sebagai Akun Basic2";
      showContent.style.display = "block";
    }
  }
}

// logout
function logout() {
  localStorage.clear();
  location.reload();
}
