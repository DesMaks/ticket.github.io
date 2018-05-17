


$(function() {
    var selectedPlaces = [];
    var fullPrice = 0 ;

    function checkButton() {
        if (selectedPlaces.length)
            $('#buy').show();
        else
            $('#buy').hide();
    }


    $('.hall').on('click', '.hall-place', function() {
        if (!$(this).hasClass('bought')) {
            var row = $(this).data('row');
            var col = $(this).data('col');
            var price = $(this).data('price');

            if ($(this).hasClass('selected')) {
                fullPrice -= price;

                selectedPlaces.forEach(function(value, index, array) {
                    if (value.row == row && value.col == col) {
                        selectedPlaces.splice(index, 1);
                    }
                });

                $(this).removeClass('selected');
            } else {
                fullPrice += price;

                selectedPlaces.push({
                    row: row,
                    col: col,
                    price: price
                });

                $(this).addClass('selected');
            }

            checkButton();

            $('#full-price').text( fullPrice + " " + '₽');
        }
    });

    $('#buy').on('click', function() {
        if (selectedPlaces.length) {
            var href = $(this).data('href');
            var kid = $(this).data('kid');
            var price = $(this).data('price');

            var tempArray = [];
            var selectedPlacesStr = "";


            selectedPlaces.forEach(function(value, index) {
                tempArray.push();

                if (index == 0)
                    selectedPlacesStr += value.row + "," + value.col;
                else
                    selectedPlacesStr += ";" + value.row + "," + value.col
            });

            document.location.href = href + "?places=" + selectedPlacesStr + '&kid=' + kid + '&price=' +fullPrice;


        }
    });

    checkButton();
});

