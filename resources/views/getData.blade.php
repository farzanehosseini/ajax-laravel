<head>

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<form id="form">
 {{Csrf_field()}}
    <input type="text" id="name" class="form-control">  

    <input type="file" class="form-control" id="pic" name="pic">

    <button class="btn btn-danger" type='submit' id="uploadButton">send</button>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.min.js">

</script>
<script>
  $(document).ready(function(){
 
/*
            $('#uploadButton').on('click', function(){
                var fileInput = $('#pic')[0];
                if(fileInput.files.length > 0) {
                    var fileName = fileInput.files[0].name;

                    $.ajax({
                        url: '{{ route("getData") }}',
                        type: 'POST',
                        data: {
                            filename: fileName,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert(response.message + ": " + response.filename);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    alert('Please select a file');
                }
            });
            */

            $('#form').on('submit', function(e) {
              e.preventDefault(); // Prevent default form submission

var formData = new FormData(this); // Create a FormData object with the form data
console.log(formData);
// Debugging: Check if the file is being added
var fileInput = $('#pic')[0].files[0]; 
if (!fileInput) {
    console.log('No file selected.');
    alert('No file selected.');
    return;
} else {
    console.log('File selected:', fileInput.name);
}

$.ajax({
    method: 'POST',
    url: '{{ route("getData") }}',
    data: formData,
    contentType: false, // Tell jQuery not to set contentType
    processData: false, // Tell jQuery not to process the data
    success: function(response) {
        alert('Upload successful');
        console.log(response.path); // Log the path to the uploaded file
    },
    error: function(xhr, status, error) {
        console.log(xhr.responseText);
        alert('Upload failed');
    }
});
    });
 
})
 
</script>

