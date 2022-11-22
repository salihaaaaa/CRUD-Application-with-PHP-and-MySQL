<?php 
include 'connectdb.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// If records exist in database
if ($result->num_rows > 0) { ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    <body>
        <?php include 'navbar.php';?>
        <div class="container">
            <form class="d-flex mb-3" role="search" method="post" action="search.php">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php 
                        while ($row = $result->fetch_assoc()) {?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>                       
                        <?php } ?>         
                </tbody>
            </table>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
    </html>

<?php } else { ?>
            <div class="alert alert-secondary">
                <?php echo 'No record created'; ?>
            </div>
        <?php } ?>