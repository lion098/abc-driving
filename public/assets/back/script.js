$('.delete').click(function (e) {
    e.preventDefault();
    if (confirm('Are you sure you want to delete this item?')) {
        $(this).parent('form').submit();
    }
});

$("#image").change(function () {
    let reader = new FileReader();

    $("#imgPreview").html('');

    reader.onload = function(e) {
        $("#imgPreview").append('<div class="col-3 mt-3"><img src="'+ e.target.result +'" class="img-fluid" /></div>');
    };

    reader.readAsDataURL(this.files[0]);
});

CKEDITOR.replace('description');

$('#from_time, #to_time').timepicker({
    minTime: '6:00am',
    maxTime: '7:00pm',
});
