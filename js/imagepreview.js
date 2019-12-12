function preview_image(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('picturepreview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function SubmitFormData() {
    var likes = $(".likes").val();
    var id = $(".id").val();

    $.post("lib/test_like.php", { likes: likes, id: id},
        function(data) {
            $('#results').html(data);
            $('.myForm')[0].reset();
        });
}
