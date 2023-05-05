<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
// copia vera e propria non una shallow copy
$filter_hotels = $hotels;

// quest'uno e' l1 di value all'interno di option
if (isset($_GET['parking']) && $_GET['parking'] === '1') {
    $temp_hotel = [];
    foreach ($filter_hotels as $hotels) {
        if ($hotels['parking']) {
            $temp_hotel[] = $hotels;
        }
    }
    $filter_hotels = $temp_hotel;
}

if (isset($_GET['vote']) && $_GET['vote'] !== "") {
    $temp_hotels = [];
    foreach ($filter_hotels as $hotel) {
        if ($hotel['vote'] >= $_GET['vote']) {
            $temp_hotel[] = $hotel;
        }
    }
    $filter_hotels = $temp_hotel;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Php-Hotel</title>
</head>

<body>

    <div class="container mt-4">


        <form action="index.php" method="GET">
            <select class="form-select mb-3" aria-label="Default select example" name="parking">
                <option selected>filter by parkig space</option>
                <option value="1">avaible</option>
            </select>

            <label for="vote">Stars</label>
            <input type="number" name="vote" class="form-control" id="vote" max="5" min="1" value="<?php echo ($_GET['vote']) ?? '' ?>">

            <button type="submit" class="btn btn-dark mt-4">Filter</button>
            <button type="reset" class="btn btn-dark mt-4">Cancel</button>
        </form>


        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Parking Spot</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($filter_hotels as $key => $details) { ?>


                    <tr>
                        <th scope="row"><?php echo $key; ?></th>
                        <td><?php echo $details["name"]; ?></td>
                        <td><?php echo $details["description"]; ?></td>
                        <td><?php echo $details["vote"]; ?></td>
                        <td><?php echo $details["parking"] ? 'yes' : 'no'; ?></td>
                        <td><?php echo $details["distance_to_center"]; ?></td>
                    </tr>


                <?php } ?>
            </tbody>
        </table>

    </div>


</body>

</html>