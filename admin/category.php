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
    <?php include('./sidebar.php');  ?>

    <div class="main-content">
        <?php include('./navbar.php');  ?>

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

include('../database/connection.php');

            if (isset($_POST['submit'])) {
                $category = $_POST['catname'];
                // Specify the directory where the uploaded file should be saved
                $upload_dir = "./assets/uploads/";
                // Check if the directory exists and create it if it doesn't
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }      
                // Check if an image was uploaded
                if (isset($_FILES['image'])) {
                    $file_name = $_FILES['image']['name'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $file_size = $_FILES['image']['size'];
                    $file_type = $_FILES['image']['type'];
                    $file_parts = explode('.', $file_name);
                    $file_ext = strtolower(end($file_parts)); 
                    $extensions = array("jpg", "jpeg", "png", "gif");

                    if (in_array($file_ext, $extensions) === false) {
                        echo "Extension not allowed, please choose a JPG, JPEG, PNG, or GIF file.";
                        exit();
                    }

                    if ($file_size > 2097152) {
                        echo "File size must be exactly or less than 2 MB";
                        exit();
                    }

                    // Save the uploaded file to the specified directory
                    $upload_path = $upload_dir . $file_name;
                  

                    if (move_uploaded_file($file_tmp, $upload_path)) {
                        $image = $upload_path;
                    } else {
                        echo "Error uploading file.";
                        exit();
                    }
                } else {
                    $image = null;
                }
                // Check if category already exists in database
                $stmt = mysqli_prepare($conn, "SELECT catname FROM category WHERE catname = ?");
                mysqli_stmt_bind_param($stmt, "s", $category);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $num_rows = mysqli_stmt_num_rows($stmt);
                mysqli_stmt_close($stmt);

                if ($num_rows > 0) {
                    $message = "Category already exists";
                } else {
                    // Insert category and image into database using prepared statement
                    $stmt = mysqli_prepare($conn, "INSERT INTO category (catname, imgpath) VALUES (?, ?)");
                    mysqli_stmt_bind_param($stmt, "ss", $category, $image);
                    if (mysqli_stmt_execute($stmt)) {
                        $message = "Category added successfully";
                    } else {
                        $message = "Error inserting record: " . mysqli_error($conn);
                    }
                }
            }

            ?>
            <div class="center-div">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="name" class="form-control" name="catname" id="category" aria-describedby="category" placeholder="Enter  category">
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
        include('../database/connection.php');
        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_assoc($result)) :?>

                    <div class="col container1">
                        <div class="card radius-15 bg-color-custom">
                            <div class="card-body text-center">
                                <div class="p-4 radius-15">
                                <img src="<?php echo $row['imgpath']; ?>" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt="">
                                    <h5 class="mb-0 mt-5 text-white"><?php echo $row['catname']; ?></h5>
                                    <div class="d-grid">
                                        <a href="#" class="btn btn-white-custom radius-15">Delete Me</a>
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
<?php include('./footer.php');  ?>

</body>

</html>