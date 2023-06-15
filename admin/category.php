<?php include('./header.php');  ?>

<body>
    <?php include('./sidebar.php');  ?>

    <div class="main-content">
        <?php include('./navbar.php');  ?>

        <main>
            <div class="main">
                <div class="page-header">
                    <div class="content">
                        <h1>PAGENAME</h1>
                    </div>
                </div>

            </div>
            <section class="body">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <form>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="name" class="form-control" name="category_name" id="category" aria-describedby="category" placeholder="Enter  category">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" name="file"  id="formFile">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </section>
        </main>
    </div>
    <label for="sidebar" class="body-label" id="body-label"></label>
</body>

</html>
<!-- partial -->
<?php include('./footer.php');  ?>

</body>

</html>