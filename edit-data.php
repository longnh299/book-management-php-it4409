<?php include "header.php" ?>


<div class="container">
    <div class="row">
        <div class="form">
            <div class="form-header">
                <h1>Update Data</h1>
            </div>
            <?php

            include "php/connection.php";

            if (isset($_GET["id"])) {

                $id = $_GET["id"];

                $sql = "SELECT * FROM books WHERE id={$id}";
                $run_sql = mysqli_query($conn, $sql);
                if (mysqli_num_rows($run_sql) > 0) {
                    while ($row = mysqli_fetch_assoc($run_sql)) {

            ?>
                        <div class="form-body">
                            <?php

                            if (isset($_SESSION["error"])) {
                            ?>
                                <div class="alert-danger">
                                    <h5><?php echo $_SESSION["error"]; ?></h5>
                                </div>
                            <?php
                                unset($_SESSION["error"]);
                            }

                            ?>
                            <form action="php/update-data.php" method="POST">
                                <div class="form-group">
                                    <label for="">Enter name</label>
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id" id="id" class="form-control">
                                    <input type="text" value="<?php echo $row['name'] ?>" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Publisher</label>
                                    <input type="text" value="<?php echo $row['publisher'] ?>" name="publisher" id="publisher" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Price</label>
                                    <input type="text" value="<?php echo $row['price'] ?>" name="price" id="price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
            <?php

                    }
                }
            }


            ?>

        </div>
    </div>
</div>


<?php include "footer.php" ?>