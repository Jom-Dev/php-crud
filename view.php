<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <title>Show</title>
    <style>
        .hed h1{
            padding-top: 20px;
            padding-bottom: 25px;
        }
        .form{
            margin-top: 50px;
        }
        .table{
            margin-top: 50px;
        }
    </style>
</head>
<body class="stretched">
    <div class="col-md-12 hed">
        <center>
        <h1>View Data</h1>
        </center>
    </div>
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <a href="index.php" type="button" class="btn btn-primary">Back</a></td>
                        <table class="table table-dark">
                            <?php
                                include 'database.php';

                                $id = $_GET['id'];
                                $db = new database();
                                $db->select("pokemon","*","id='$id'");
                                $result = $db->sql;

                                $row = mysqli_fetch_assoc($result);
                             ?>
                          <tbody>
                                <tr>
                                    <th>Id</th>
                                    <td><?php echo $row['id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo $row['name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Skill</th>
                                    <td><?php echo $row['skill']; ?></td>
                                </tr>
                                <tr>
                                    <th>Created Time & Date</th>
                                    <td><?php echo $row['created']; ?></td>
                                </tr>
                                <tr>
                                    <th>Updated Time & Date</th>
                                    <td><?php echo $row['updated']; ?></td>
                                </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>