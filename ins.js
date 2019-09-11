function inscription() {
  $.ajax({
    url: "http://localhost/Pizzeria_Mimo_Micka_Enes/inscription.php",
    data: {
      nom: $("#nom").val(),
      adresse: $("#adresse").val(),
      postal: $("#postal").val()
    },
    success: function(result) {
      document.location.href =
        "http://localhost/Pizzeria_Mimo_Micka_Enes/accueil.html";
    }
  });
}
