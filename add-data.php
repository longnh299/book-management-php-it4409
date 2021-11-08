<?php include "header.php" ?>


<div class="container">
    <div class="row">
        <div class="form">
            <div class="form-header">
                <h1>Add Book</h1>
            </div>
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
                <form action="php/insert-data.php" method="POST">
                    <div class="form-group">
                        <label for="">Enter ID</label>
                        <input type="text" name="id" id="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Publisher</label>
                        <input type="text" name="publisher" id="publisher" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Price</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php include "footer.php" ?>