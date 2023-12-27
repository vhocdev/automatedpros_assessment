$(document).ready(function() {
    // DataTable initialization
    $('#userTable').DataTable();

    // Function to submit form data with Ajax
    window.submitForm = function() {
        var formData = $('#registrationForm').serialize();

        $.ajax({
            url: '/api/register', // Replace with your server endpoint
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                // Clear form fields
                $('#registrationForm')[0].reset();

                // Add a new row to DataTable with the received data
                $('#userTable').DataTable().row.add([
                    response.name,
                    response.email
                ]).draw(false);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    };
});