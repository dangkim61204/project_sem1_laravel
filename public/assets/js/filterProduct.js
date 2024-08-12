$(document).ready(function() {
    $('#filterPrice').on('click', function() {
        let rangePrice = $('#filter-price-range').html() // lấy giá trị ở thẻ span
        $('#valueFilter').val(rangePrice) // thực hiện gán giá trị vào thẻ input trong form cần submit
        $('#submitForm').submit() // thực hiện submit form
    })
})