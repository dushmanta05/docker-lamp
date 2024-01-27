<html>

<head>
    <title>LAMP with Docker</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <h1>Yay! Welcome to Dockerized LAMP setup</h1>
        <?php
        $conn = mysqli_connect('db', 'root', 'root', "myDb");

        $query = 'SELECT * From Person';
        $result = mysqli_query($conn, $query);

        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
            </thead>

            <?php
            while ($value = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td>
                        <a href="#">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </td>
                <?php
                foreach ($value as $element) {
                    echo '<td>' . $element . '</td>';
                }

                echo '</tr>';
            }

            echo '</table>';
            $result->close();
            mysqli_close($conn);
                ?>
    </div>
</body>

</html>