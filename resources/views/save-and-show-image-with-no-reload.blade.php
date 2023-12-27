<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax image Form</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

    <form id="imageForm" enctype="multipart/form-data">
        <label for="image">Image:</label>
        <input type="file" id="file" name="file" accept="image/*" onchange="previewImage(event)">

        <button type="button" onclick="saveImage()">Submit</button>
    </form>

    <img id="imagePreview" src="" alt="Preview" style="max-width: 300px; display: none;">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {

            window.previewImage = function(event) {
                var input = event.target;
                var reader = new FileReader();

                reader.onload = function(){
                    var dataURL = reader.result;
                    $('#imagePreview').attr('src', dataURL);
                    $('#imagePreview').css('display', 'block');
                };

                reader.readAsDataURL(input.files[0]);
            }

            window.saveImage = function() {
                var formData = new FormData($('#imageForm')[0]);
                $.ajax({
                    url: '/save-image',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                    },
                    error: function(error) {

                    }
                });
            };
        });    
    </script>
</body>
</html>

<!-- Check github.com/vhocdev for more info -->