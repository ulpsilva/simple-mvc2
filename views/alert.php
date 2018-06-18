<div class="row">
    <div class="col-lg-6">
        <?php if (Session::checkFlash("error")) { ?>
            <div class="alert alert-danger">
                <?php echo Session::getFlash("error") ?>
            </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <?php if (isset($this->error)) { ?>
            <div class="alert alert-danger">
                <?php echo $this->error ?>
            </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <?php if (Session::checkFlash("warning")) { ?>
            <div class="alert alert-warning">
                <?php echo Session::getFlash("warning") ?>
            </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <?php if (isset($this->warning)) { ?>
            <div class="alert alert-warning">
                <?php echo $this->warning ?>
            </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <?php if (Session::checkFlash("success")) { ?>
            <div class="alert alert-success">
                <?php echo Session::getFlash("success") ?>
            </div>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <?php if (isset($this->success)) { ?>
            <div class="alert alert-success">
                <?php echo $this->success ?>
            </div>
        <?php } ?>
    </div>
</div>