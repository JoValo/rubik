      var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 250,
        'tolerance': 70,
        'side': 'right'
      });
      document.querySelector('.toggle-button').addEventListener('click', function() {
        slideout.toggle();
      });

      $(document).on("click", ".myModal", function () {
       var myBookId = $(this).data('id');
       $(".modal-body #myModal").html( myBookId );
     });