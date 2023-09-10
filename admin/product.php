<?php include('./header.php');  ?>
<style type="text/css">
  .project-list-table {
    border-collapse: separate;
    border-spacing: 0 12px
  }

  .project-list-table tr {
    background-color: #fff
  }

  .table-nowrap td,
  .table-nowrap th {
    white-space: nowrap;
  }

  .table-borderless>:not(caption)>*>* {
    border-bottom-width: 0;
  }

  .table>:not(caption)>*>* {
    padding: 0.75rem 0.75rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
  }

  .avatar-sm {
    height: 8rem;
    width: 8rem;
  }

  .rounded-circle {
    border-radius: 50% !important;
  }

  .me-2 {
    margin-right: 0.5rem !important;
  }

  img,
  svg {
    vertical-align: middle;
  }

  a {
    color: #3b76e1;
    text-decoration: none;
  }

  .badge-soft-danger {
    color: #f56e6e !important;
    background-color: rgba(245, 110, 110, .1);
  }

  .badge-soft-success {
    color: #63ad6f !important;
    background-color: rgba(99, 173, 111, .1);
  }

  .badge-soft-primary {
    color: #3b76e1 !important;
    background-color: rgba(59, 118, 225, .1);
  }

  .badge-soft-info {
    color: #57c9eb !important;
    background-color: rgba(87, 201, 235, .1);
  }

  .avatar-title {
    align-items: center;
    background-color: #3b76e1;
    color: #fff;
    display: flex;
    font-weight: 500;
    height: 100%;
    justify-content: center;
    width: 100%;
  }

  .bg-soft-primary {
    background-color: rgba(59, 118, 225, .25) !important;
  }
</style>

<body>
  <?php include('./sidebar.php');  ?>

  <div class="main-content">
    <?php include('./navbar.php');  ?>

    <main>
      <div class="main">
        <div class="page-header">
          <div class="content">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <h3>Admin &gt; <span class="highlight">Product's page</span></h3>
              <a href="./insertProduct.php" class="btn btn-primary">Insert Item</a>
            </div>
          </div>
        </div>




      </div>
      <section class="body">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class>
                <div class="table-responsive">
                  <?php

                  include('../database/connection.php');
                  $sql = "SELECT * FROM products";
                  $fetchproductresult = mysqli_query($conn, $sql);

                  // if (isset($_POST['Delete'])) {
                  //   $categoryId = $_POST['product_id'];
                  //   $imgPath = $_POST['product_image_Path'];

                  //   // Delete category from the database
                  //   $deleteSql = "DELETE FROM products WHERE product_id = ?";
                  //   $deleteStmt = mysqli_prepare($conn, $deleteSql);
                  //   mysqli_stmt_bind_param($deleteStmt, "i", $categoryId);

                  //   if (mysqli_stmt_execute($deleteStmt)) {
                  //     // Delete the uploaded image from the file system
                  //     if (file_exists($imgPath)) {
                  //       unlink($imgPath);
                  //     }
                  //     // echo "Category deleted successfully";
                  //     // Refresh the page after successful deletion
                  //     // Redirect to the same page without the POST data
                  //   } else {
                  //     echo "Error deleting category.";
                  //   }
                  // }


                  ?>

                  <?php
                  // Assuming you have a database connection established

                  if (mysqli_num_rows($fetchproductresult) == 0) {
                    echo "<h1>No products to display</h1>";
                  } else {
                  ?>
                    <div class="table-responsive">
                      <table class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product Size</th>
                            <th scope="col">Product Rate</th>
                            <th scope="col">Product Color</th>
                            <th scope="col">Product Description</th>
                            <th scope="col" style="width: 200px;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($row = mysqli_fetch_assoc($fetchproductresult)) {
                            $content = $row['product_description'];
                            $words = explode(' ', $content); // Split the content into an array of words
                            $lines = array_chunk($words, 7);
                            $image = $row['product_image_path'];
                            if ($row['upload_through'] == 'json') {
                              // Extract the file ID using regular expressions
                              $pattern = '/\/d\/(.*?)\//';
                              preg_match($pattern, $image, $matches);
                              if (isset($matches[1])) {
                                $fileId = $matches[1];
                                $image = 'https://drive.google.com/uc?id=' . $fileId;
                              }
                            }
                          ?>
                            <tr>
                              <td><span class="badge badge-soft-success mb-0"><?= $row['product_name'] ?></span></td>
                              <td><img src="<?= $image ?>" alt="<?= $row['product_name'] ?>" class="avatar-sm rounded-circle me-2"></td>
                              <td><span class="badge badge-soft-success mb-0"><?= $row['product_size'] ?></span></td>
                              <td style="width: 100px;"><?= $row['product_rate'] ?></td>
                              <td style="width: 100px;"><?= $row['product_color'] ?></td>
                              <td>
                                <?php
                                foreach ($lines as $line) {
                                  echo implode(' ', $line) . "<br>"; // Output each line of words separated by a space and followed by a line break
                                }
                                ?>
                              </td>
                              <td>
                                <ul class="list-inline mb-0">
                                  <li class="list-inline-item">
                                    <form action="edit_product.php" method="post">
                                      <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                                      <button type="submit" class="btn btn-link text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="bx bx-pencil font-size-18"></i>
                                      </button>
                                    </form>
                                  </li>
                                  <li class="list-inline-item">
                                    <form action="delete_product.php" method="post" class="delete-product-form">
                                      <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                                      <input type="hidden" name="product_image_path" value="<?= $row['product_image_path'] ?>">
                                      <button type="button" class="btn btn-link text-danger delete-product-button" data-bs-toggle="tooltip" data-bs-placement="top" name="Delete">
                                        <i class="bx bx-trash-alt font-size-18"></i>
                                      </button>
                                    </form>
                                  </li>
                                </ul>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>

          </div>

        </div>
      </section>
    </main>
  </div>
  <label for="sidebar" class="body-label" id="body-label"></label>
</body>

</html>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->



<!-- partial -->
<?php include('./footer.php');  ?>

<script>
    // Assuming you're using jQuery for simplicity
    $(document).ready(function () {
        $(".delete-product-button").click(function () {
            if (confirm('Are you sure you want to delete this product?')) {
                var form = $(this).closest("form");
                var formData = form.serialize();

                $.ajax({
                    url: form.attr("action"),
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            // Product deleted successfully, update the UI here
                            form.closest("tr").remove();
                        } else {
                            alert("Deletion failed: " + response.error);
                        }
                    },
                    error: function () {
                        alert("An error occurred during deletion.");
                    }
                });
            }
        });
    });
</script>
</body>

</html>