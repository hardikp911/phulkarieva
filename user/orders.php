<!DOCTYPE html>
<html lang="en">

<head>
    <title>phulkari eva - Contact</title>
    <?php
    include('./cssfiles.php');
    include('./session.php');

    ?>
    <style type="text/css">
        .cart-item-thumb {
            display: block;
            width: 10rem
        }

        .cart-item-thumb>img {
            display: block;
            width: 100%
        }

        .product-card-title>a {
            color: #222;
        }

        .font-weight-semibold {
            font-weight: 600 !important;
        }

        .product-card-title {
            display: block;
            margin-bottom: .75rem;
            padding-bottom: .875rem;
            border-bottom: 1px dashed #e2e2e2;
            font-size: 1rem;
            font-weight: normal;
        }

        .text-muted {
            color: #888 !important;
        }

        .bg-secondary {
            background-color: #f7f7f7 !important;
        }

        .accordion .accordion-heading {
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: bold;
        }

        .font-weight-semibold {
            font-weight: 600 !important;
        }
    </style>
</head>

<body>



    <!-- Header -->
    <?php
    include('./navbar.php');
    ?>
    <!-- Close Header -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="container pb-5 mt-n2 mt-md-n3">
                <div class="row">
                <div class="col-xl-7 col-md-7 border">
                        <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary">
                            <span>Orders Not Delivered</span><a class="font-size-sm" href="./shop.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" style="width: 1rem; height: 1rem">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>Continue shopping</a>
                        </h2>


                        <?php


                        $sql = "SELECT * FROM orders WHERE user_id = '$user_id' AND user_email = '$email'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {


                            while ($row = mysqli_fetch_assoc($result)) {
                                $cart_data = unserialize($row['cart_data']);

                                $total_bill = $row['total_bill'];


                                // Iterate through each item in the cart_data array
                                foreach ($cart_data as $key => $item) {
                                    $img = $item['product_image_path'];
                                    $name = $item['product_name'];
                                    $color = $item['product_color'];
                                    $size = $item['product_size'];
                                    $delivered = $item['delivered'];

                                    $rate = number_format($item['product_rate'], 2);





                                    // Display the product information


                                    if ($delivered === "Not Delivered") {
                        ?>
                                        <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                                            <div class="media d-block d-sm-flex text-center text-sm-left">
                                                <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="<?php echo $img; ?>" alt="Product" /></a>
                                                <div class="media-body pt-3">
                                                    <h3 class="product-card-title font-weight-semibold border-0 pb-0">
                                                        <a href="#">
                                                            <?php echo $name; ?>
                                                        </a>
                                                    </h3>
                                                    <div class="font-size-sm">
                                                        <span class="text-muted mr-2">Size:</span>
                                                        <?php echo $size; ?>
                                                    </div>
                                                    <div class="font-size-sm">
                                                        <span class="text-muted mr-2">Color:</span>
                                                        <?php echo $color; ?>
                                                    </div>
                                                    


                                                </div>
                                            </div>
                                            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem">
                                                <div>
                                                <div class="font-size-lg text-primary pt-2">
                                                        $<?php echo $total_bill; ?>
                                                    </div>
                                                    <p>
                                                        <br>
                                                        <span class="badge bg-danger rounded-pill"><?php echo $delivered; ?></span>
                                                    </p>

                                                </div>
                                                <form action="delete_product_cart.php" method="POST">
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                    <input type="hidden" name="item_index" value="<?php echo $key; ?>">
                                                    <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>delete order
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                        <?php
                                    }
                                }
                            }
                        } else {
                            echo 'No rows found.';
                        }
                        ?>


                    </div>
                    
                
                    <div class="col-xl-5 col-md-5 ">
                        <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary">
                            <span>Orders Delivered</span>
                        </h2>


                        <?php
                        $sql = "SELECT * FROM orders WHERE user_id = '$user_id' AND user_email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $cart_data = unserialize($row['cart_data']);
                                // Iterate through each item in the cart_data array
                                foreach ($cart_data as $key => $item) {
                                    $img = $item['product_image_path'];
                                    $name = $item['product_name'];
                                    $color = $item['product_color'];
                                    $size = $item['product_size'];
                                    $delivered = $item['delivered'];
                                    $rate = number_format($item['product_rate'], 2);
                                    if ($delivered === "Delivered") {
                        ?>
                                        <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                                            <div class="media d-block d-sm-flex text-center text-sm-left">
                                                <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="<?php echo $img; ?>" alt="Product" /></a>
                                                <div class="media-body pt-3">
                                                    <h3 class="product-card-title font-weight-semibold border-0 pb-0">
                                                        <a href="#">
                                                            <?php echo $name; ?>
                                                        </a>
                                                    </h3>
                                                    <div class="font-size-sm">
                                                        <span class="text-muted mr-2">Size:</span>
                                                        <?php echo $size; ?>
                                                    </div>
                                                    <div class="font-size-sm">
                                                        <span class="text-muted mr-2">Color:</span>
                                                        <?php echo $color; ?>
                                                    </div>
                                                    <div class="font-size-lg text-primary pt-2">
                                                        $<?php echo $rate; ?>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem">
                                                <div>
                                                    <p><br>
                                                    <h3><span class="badge bg-primary rounded-pill"><?php echo $delivered; ?></span></p>
                                                    </h3>

                                                </div>

                                            </div>
                                        </div>
                        <?php
                                    }
                                }
                            }
                        } else {
                            echo 'No rows found.';
                        }
                        ?>


                    </div>


                </div>
            </div>
        </div>
    </div>
    <?php
    include('./footer.php');
    ?>
</body>

</html>