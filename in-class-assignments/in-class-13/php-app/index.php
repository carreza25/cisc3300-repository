<?php   
    require_once 'require.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP App</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <h1><?php echo $required1; ?></h1>
    <button id="getDataButton">Click Me</button>
    <div id="result"></div>

    <script>
        $(document).ready(function() {
            $('#getDataButton').click(function() {
                $.get('data.php', function(data) {
                    $('#result').text(data.message);
                });
            });
        });
    </script>
</body>
</html>
