function login () {
  // (A) GET EMAIL + PASSWORD
  var data = new FormData(document.getElementById("login-form"));

  // (B) AJAX REQUEST
  // Change "dummy.php" to your own server-side script
  // Change location.href = "home.html"; to your own home page after login
  fetch("dummy.php", { method:"POST", body:data })
  .then(res => res.text())
  .then(txt => {
    if (txt == "OK") { location.href = "home.html"; }
    else { alert(txt); }
  });
  return false;
}