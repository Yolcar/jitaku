$(document).ready(function() {
    $('#products').pinterest_grid({
        no_columns: 4,
        padding_x: 10,
        padding_y: 10,
        margin_bottom: 50,
        single_column_breakpoint: 700
    });

    $(".btn-update-item").on('click', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var href = $(this).data('href');
      var quantity = $("#product_" + id).val();

      window.location.href = href + "/" + quantity;
    });

    $("[type='number']").keypress(function (evt) {
      evt.preventDefault();
    });

    $(document).keydown(function(e){
      var elid = $(document.activeElement).is('input[type="number"]:focus');
        if(e.keyCode === 8 && elid){
          return false;
        };
    });
});
