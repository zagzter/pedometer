<!-- TITLE, BUTTON, SEARCH -->
<div class="row">
    <div class="col-12 col-md-5">
        <h4 class="card-title text-center text-md-left text-uppercase mb-0">Pedometer - Manage your Steps</h4>
    </div>
    <div class="col-12 col-md-3 text-center text-md-right">
        <?php if (!$today_step) : ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStepModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Today's Steps</button>
        <?php endif ;?>
    </div>
    <div class="col align-self-end">
        <div id="reportrange">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
    </div>
</div>
<!-- //TITLE, BUTTON, SEARCH -->

<hr>

<!-- CHARTBARS -->
<div class="row">
    <div class="col">
        <div id="chartbars" style="height:500px;"></div>
    </div>
</div>
<!-- //CHARTBARS -->

<!-- TOTAL STEPS -->
<div class="row justify-content-center align-items-center">
    <div class="total_steps p-3 mt-5 mb-2">
        <div class="row">
            <div class="col-3">
                <img src="<?php echo base_url('assets/img/steps.svg') ;?>">
            </div>
            <div class="col">
                <h3 class="text-left">Total Steps</h3>
                <span></span>
            </div>
        </div>
        
    </div>
</div>
<!-- //TOTAL STEPS -->

<?php if (!$today_step) : ?>
<!-- ADD STEPS MODAL -->
<div class="modal fade" id="addStepModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Today's Step</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('steps/create', array('id' => 'createStepForm')) ;?>
                <div class="form-group">
                    <?php echo form_input($step_input);?>
                </div>
                <?php echo form_close() ;?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php echo form_submit('submit', 'Save', 'class="btn btn-primary" form="createStepForm"');?>
            </div>
        </div>
    </div>
</div>
<!-- //ADD STEPS MODAL -->
<?php endif ;?>

<?php if (!$all_steps) : ?>
    <div id="demo-add"><a href="<?php echo base_url('demo/import') ;?>">Import Demo Content (Steps)</a></div>
<?php endif; ?>