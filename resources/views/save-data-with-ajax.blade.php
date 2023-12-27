<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Form</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

    <form id="ajaxForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="button" onclick="submitForm()">Submit</button>
    </form>

    <table id="userTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
            window.submitForm = function() {
                var formData = $('#ajaxForm').serialize();
                var name = $('#name').val();
                var email = $('#email').val();
                $.ajax({
                    url: '/api/register',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        $('#ajaxForm')[0].reset();

                        $('#userTable').DataTable().row.add([
                            response.name,
                            response.email
                        ]).draw(false);
                    },
                    error: function(error) {
                        $('#ajaxForm')[0].reset();

                        $('#userTable').DataTable().row.add([
                            name,
                            email
                        ]).draw(false);
                    }
                });
            };
        });    
    </script>
</body>
</html>