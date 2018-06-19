<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Article Creation</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Article creation form
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter article title"
                                       required value="<?php if (isset($_POST['title'])) {
                                    echo $_POST['title'];
                                } ?>">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    <?php foreach ($this->categories as $category) { ?>
                                        <option value="<?php echo $category->id ?>"
                                            <?php if(isset($_POST['title']) && $category->id == $_POST['category_id']) { echo "selected"; } ?>
                                        >
                                            <?php echo $category->name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="editor1" class="form-control" required name="content" rows="5"
                                    ><?php if (isset($_POST['content'])) {
                                        echo $_POST['content'];
                                    }
                                    ?></textarea>
                            </div>
                            <a href="<?php echo URL . "article" ?>" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>