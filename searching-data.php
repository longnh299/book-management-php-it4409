<?php include("header.php");
session_start(); ?>

<div class="container">
    <div class="card">
        <?php
        include "php/connection.php";
        $sql1 = "SELECT * FROM books";
        $run_sql1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_num_rows($run_sql1);
        ?>
        <h4>Book ( <?php echo  $row1; ?> )</h4>
        <!--Just for a moment is static-->
        <a href="add-data.php"><button class="btn btn-success">Add Book</button></a>
    </div>
</div>
<div class="container">
    <form action="">
        <input type="text" name="search" placeholder="Seach Here...." id="search" class="form-control">
        <button class="btn btn-success">search</button>
    </form>
</div>
<div class="container">
    <?php

    if (isset($_SESSION["success"])) {
    ?>
        <div class="alert-success">
            <h5><?php echo $_SESSION["success"]; ?></h5>
        </div>
    <?php
        unset($_SESSION["success"]);
    }
    ?>


    <div class="table-responsive">
        <?php

        include "php/connection.php";
        if (isset($_GET["search"])) {
            $search = $_GET["search"];
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }
            $limit = 3;
            $offset = ($page - 1) * $limit;
            $sql = "SELECT * FROM books WHERE id LIKE '%{$search}%' OR name LIKE '%{$search}%' ORDER BY id DESC LIMIT $offset,$limit";

            $run_sql = mysqli_query($conn, $sql);
            if (mysqli_num_rows($run_sql) > 0) {
        ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Book Name</th>
                            <th>Publisher</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($run_sql)) { ?>
                            <tr>
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["name"] ?></td>
                                <td><?php echo $row["publisher"] ?></td>
                                <td><?php echo $row["price"] ?></td>
                                <td><a href="/edit-data.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a></td>
                                <td><a href="/php/delete-data.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php }
            else{
                ?>
                <h1>Kh??ng t??m th???y s??ch</h1>
                <?php
            }
            }


            // to make pagination
            $sql1 = "SELECT * FROM books";
            $run_sql1 = mysqli_query($conn, $sql1);
            $total_record = mysqli_num_rows($run_sql1);
            $total_page = ceil($total_record / $limit);
            ?>
            <div class="container">
                <div class="pagination">
                <?php
                if ($page > 1) {
                    echo "<a href='index.php?page=" . ($page - 1) . "' class='btn btn-success'>Prev</a>";
                }
                for ($i = 1; $i < $total_page; $i++) {
                    if ($i == $page) {
                        $active = "active";
                    } else {
                        $active = "";
                    }

                    echo  "<a href='index.php?page=" . $i . "' class='btn btn-success {$active}'>{$i}</a>";
                }
                if ($i > $page) {
                    echo "<a href='index.php?page=" . ($page + 1) . "' class='btn btn-success'>Next</a>";
                }

                ?>
                </div>
            </div>
    </div>
</div>

<!-- 
<a href="" class="btn btn-success">1</a>
<a href="" class="btn btn-success">2</a>
<a href="" class="btn btn-success">3</a>
<a href="" class="btn btn-success">4</a> -->


<?php include "footer.php" ?>