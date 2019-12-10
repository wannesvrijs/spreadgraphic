    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('profielfoto');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }