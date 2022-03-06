function validasi_input(form){
    if (form.username.value == ""){
    alert("Username masih kosong!");
    form.username.focus();
    return (false);
    }
   return (true);
   }
   