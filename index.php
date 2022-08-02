<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>PHP CRUD with Ajax, Jquery, Bootstrap5, SweetAlert2</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <form action="operations/insert.php" method="post">
                        <div class="card-body">
                            <div class="card-title">
                                <h2>Add New Pokemon</h2>
                            </div>
                            <?php include 'pages/component/form.php'; ?>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-dark" name="submit" value="Insert">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Skill</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Update At</th>
                            <th scope="col" colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'config/database.php';
                            $b = new database();
                            $b->select("pokemon","*");
                            $result = $b->sql;
                        ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['skill']; ?></td>
                                <td><?php echo $row['created']; ?></td>
                                <td><?php echo $row['updated']; ?></td>
                                <td>
                                    <a href="pages/view.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-success btn-sm w-100">View</a>
                                </td>
                                <td>
                                    <a href="pages/edit.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-primary btn-sm w-100">Edit</a>
                                </td>
                                <td>
                                    <a href="" type="button"  data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-target="#myModal" id="btn_delete" class="btn btn-danger btn-sm w-100">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/sweetalert2@11.js"></script>
    <script>
        $(function() {
            $("#btn_delete").click(function(e) {
                e.preventDefault();
                var pokemon_id = $(this).data('id');

                Swal.fire({
                    icon: "warning",
                    title: "Are you sure?",
                    text: "You are about to delete this pokemon.",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : "operations/delete.php",
                            type : "POST",
                            data : {id: pokemon_id},
                            success : function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: "Pokemon deleted!",
                                    confirmButtonText: 'Close'
                                }).then(function() {
                                    window.location = "index.php";
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>