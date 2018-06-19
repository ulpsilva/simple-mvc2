<?php include "views/header.php" ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Article Update</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php include "views/alert.php" ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Article update form
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <input type="hidden" name="id" class="form-control"
                                   value="<?php if (isset($this->article)) {
                                       echo $this->article->id;
                                   } ?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter article title"
                                       required value="<?php if (isset($this->article)) {
                                    echo $this->article->title;
                                } ?>">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <?php foreach ($this->categories as $category) { ?>
                                        <option value="<?php echo $category->id ?>"
                                            <?php if($category->id == $this->article->category_id) { echo "selected"; } ?>
                                        >
                                            <?php echo $category->name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="editor1" class="form-control" required name="content" rows="5"
                                ><?php if (isset($this->article)) {
                                        echo $this->article->content;
                                    }
                                    ?></textarea>
                            </div>
                            <a href="<?php echo URL . "article" ?>" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo URL . "article/delete/" . $this->article->id ?>"
                               class="btn btn-danger pull-right">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>