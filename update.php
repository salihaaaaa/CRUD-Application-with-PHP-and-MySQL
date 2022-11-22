<?php 
include "connectdb.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $user_id = $_POST['user_id'];
        $email = $_POST['email'];

        $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$user_id'"; 
        $result = $conn->query($sql); 

        if ($result) {
            echo "Record updated successfully.";
            header('location: view.php');
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    } 

    if (isset($_GET['id'])) {
        $user_id = $_GET['id']; 
        $sql = "SELECT * FROM users WHERE id='$user_id'";
        $result = $conn->query($sql); 

        if ($result->num_rows > 0) {        
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $email = $row['email'];
                $id = $row['id'];
            } ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            </head>
            <body>
                <?php include 'navbar.php'; ?>
                <div class="container">
                    <h3>Update users</h3>
                    <form method="post" action="update.php">
                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"  value="<?php echo $email; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
            </body>
            </html>

        <?php
        } 
    } ?>