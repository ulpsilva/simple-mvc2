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
                        Article list
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($this->articles as $article) { ?>
                                    <tr>
                                        <td><?php echo $article->id ?></td>
                                        <td><?php echo $article->title ?></td>
                                        <td><?php echo $article->category_id ?></td>
                                        <td><a href="<?php echo URL . "article/show/" . $article->id ?>"><span
                                                        class="fa fa-search"></span></a> &nbsp; <a
                                                    href="<?php echo URL . "article/edit/" . $article->id ?>"><span
                                                        class="fa fa-edit"></span></a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>