function previewFile()
{
    var preview = document.querySelector('#image_preview');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.addEventListener("load", function() {
        preview.src = reader.result;
    }, false);
    if(file)
    {
        reader.readAsDataURL(file);
        console.log(file);
        console.log(preview);
        console.log(file);
    }
}


