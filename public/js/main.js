 // Siirry muuta-sivulle
 $(document).on('click', '.muokkaa-linkki', function(){

    var id = $(this).attr('muokkaa-linkki');

    bootbox.confirm({
      message: "<h4>Oletko varma?</h4>",
      buttons: {
        confirm: {
          label: '<i class="far fa-check"></i>Kyllä',
          className: 'btn-danger'
        },
        cancel: {
          label: '<iclass="far fa-times"></i>En',
          className: 'btn-primary'
        }
      },
      callback: function(result) {
        // Painettiinko Kyllä-painiketta?
        if(result==true) {
          // Kyllä painettiin, joten siirrytään muuta-sivulle
          var url = "/linkki/muokkaa/" + id;
          $(location).attr('href', url);
        }
      }
    });
  });

  //siirry poista-sivulle
$(document).on('click', '.poista-linkki', function(){

var id = $(this).attr('poista-linkki');

bootbox.confirm({
message: "<h4>Oletko varma?</h4>",
buttons: {
confirm: {
  label: '<i class="far fa-check"></i>Kyllä',
  className: 'btn-danger'
},
cancel: {
  label: '<iclass="far fa-times"></i>En',
  className: 'btn-primary'
}
},
callback: function(result) {
// Painettiinko Kyllä-painiketta?
if(result==true) {
  // Kyllä painettiin, joten siirrytään poista-sivulle
  var url = "/linkki/poista/" + id;
  $(location).attr('href', url);
}
}
});
return false;
});