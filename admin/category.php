<?php include('./header.php');
?>
<style>
    /* category page custom css */
    .container1 {
        padding: 20px;
    }

    .radius-15 {
        border-radius: 15px;
    }

    .btn-white-custom {
        background-color: #fff;
        border-color: #e7eaf3;
    }

    .d-grid {
        padding: 20px;
    }

    .bg-color-custom {
        background-color: #7eb1db !important;
    }

    /* end  */
</style>

<body>
    <?php include('./sidebar.php'); ?>

    <div class="main-content">
        <?php include('./navbar.php'); ?>

        <main>
            <div class="main">
                <div class="page-header">
                    <div class="content">
                        <h3>Admin &gt; <span class="highlight">Category page</span></h3>

                    </div>
                </div>

            </div>
            <!-- <section class="body"> -->
            <?php

            // error_reporting(E_ALL);
            // ini_set('display_errors', 1);


            include('../database/connection.php');

            if (isset($_POST['submit'])) {
                $category = $_POST['catname'];
                $upload_dir = "./assets/uploads/";

                if (!file_exists($upload_dir) && !mkdir($upload_dir, 0777, true)) {
                    echo "Failed to create upload directory.";
                    exit();
                }

                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $file_name = $_FILES['image']['name'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $file_size = $_FILES['image']['size'];
                    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                    $extensions = array("jpg", "jpeg", "png", "gif");

                    if (!in_array($file_ext, $extensions)) {
                        echo "Extension not allowed, please choose a JPG, JPEG, PNG, or GIF file.";
                        exit();
                    } elseif ($file_size > 2097152) {
                        echo "File size must be exactly or less than 2 MB";
                        exit();
                    }

                    $upload_path = $upload_dir . $file_name;
                    if (!move_uploaded_file($file_tmp, $upload_path)) {
                        echo "Error uploading file.";
                        exit();
                    }

                    $image = $upload_path;
                } else {
                    $image = null;
                }

                $stmt = mysqli_prepare($conn, "SELECT catname FROM category WHERE catname = ?");
                if (!$stmt) {
                    echo "Error preparing statement: " . mysqli_error($conn);
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "s", $category);
                if (!mysqli_stmt_execute($stmt)) {
                    echo "Error executing statement: " . mysqli_error($conn);
                    exit();
                }

                mysqli_stmt_store_result($stmt);
                $num_rows = mysqli_stmt_num_rows($stmt);
                mysqli_stmt_close($stmt);

                if ($num_rows > 0) {
                    echo "Category already exists";
                    exit();
                }

                $stmt = mysqli_prepare($conn, "INSERT INTO category (catname, imgpath) VALUES (?, ?)");
                if (!$stmt) {
                    echo "Error preparing statement: " . mysqli_error($conn);
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ss", $category, $image);
                if (!mysqli_stmt_execute($stmt)) {
                    echo "Error inserting record: " . mysqli_error($conn);
                    exit();
                }

                echo "Category added successfully";
            }

            $sql = "SELECT * FROM category";
            $fetchcatresult = mysqli_query($conn, $sql);

            if (isset($_POST['delete'])) {
                $categoryId = $_POST['categoryId'];
                $imgPath = $_POST['imgPath'];

                // Delete category from the database
                $deleteSql = "DELETE FROM category WHERE id = ?";
                $deleteStmt = mysqli_prepare($conn, $deleteSql);
                mysqli_stmt_bind_param($deleteStmt, "i", $categoryId);
                if (mysqli_stmt_execute($deleteStmt)) {
                    // Delete the uploaded image from the file system
                    if (!empty($imgPath) && file_exists($imgPath)) {
                        unlink($imgPath);
                    }
                    // echo "Category deleted successfully";
                } else {
                    echo "Error deleting category: " . mysqli_error($conn);
                }
            }

            ?>
            <div class="center-div">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="name" class="form-control" name="catname" id="category" aria-describedby="category"
                            placeholder="Enter  category">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>

                    <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                    <?php
                    while ($row = mysqli_fetch_assoc($fetchcatresult)): ?>

                        <div class="col container1">
                            <div class="card radius-15 bg-color-custom">
                                <div class="card-body text-center">
                                    <div class="p-4 radius-15">
                                        <img src="<?php echo $row['imgpath']; ?>" width="110" height="110"
                                            class="rounded-circle shadow p-1 bg-white" alt="">
                                        <h5 class="mb-0 mt-5 text-white">
                                            <?php echo $row['catname']; ?>
                                        </h5>
                                        <div class="d-grid">
                                            <form method="post" action="">
                                                <input type="hidden" name="categoryId" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="imgPath" value="<?php echo $row['imgpath']; ?>">
                                                <button type="submit" name="delete"
                                                    class="btn btn-white-custom radius-15">Delete Me</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php endwhile; ?>
                </div>

            </div>


            <!-- </section> -->
        </main>
    </div>
    <label for="sidebar" class="body-label" id="body-label"></label>
</body>

</html>
<!-- partial -->
<?php include('./footer.php'); ?>

</body>

</html>