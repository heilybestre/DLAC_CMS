
<div id="content" class="col-lg-12 col-sm-11">

    <div class="col-lg-2"></div>

    <div class="row">

        <div class="box col-lg-6">
            <?php echo form_open(base_url() . "cases/caseFolder/$case->caseID", array('class' => 'form-horizontal')); ?>
            <div class="box-header">
                <h2><i class="icon-folder-open-alt"></i>Case Opening</h2>
            </div>
            <div class="box-content box-content-openCase">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong> You successfully assigned a supervising lawyer and interns to the case.
                </div>

                <div class="well" style="padding:10px; background-color:white;">
                    <h2><u>Case Details</u></h2>
                    <h5><b>Case Title:</b> <?php echo $case->caseName ?></h5>
                    <h5><b>Offense:</b> <?php foreach($caseoffense as $off) {echo "$off->offense $off->stage";}?></h5>
                    <h5><b>Current Stage:</b> <?php echo $case->stageName ?></h5>                
                    <h5><b>Assigned Lawyer:</b> <?php foreach($lawyers as $lawyer) {echo "$lawyer->firstname $lawyer->lastname";}?></h5>
                    <h5><b>Assigned Interns:</b> <?php foreach($interns as $intern) {echo "$intern->firstname $intern->lastname ";}?></h5>
                    <h5><b>Difficulty Level:</b> </h5>
                </div>

<!--                 <div class="well" style="padding:10px; background-color:white;">
                    <h5>To complete the case opening stage, please rate the DIFFICULTY LEVEL of this case.</h5>
                    *10 = Most Difficult <br>
                    *This can still be changed by the assigned supervising lawyer after. <br><br>

                    <div style="margin-left:130px;">

                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-0', 'value' => '1')); ?> &nbsp;
                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-1', 'value' => '2')); ?> &nbsp;
                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-2', 'value' => '3')); ?> &nbsp;
                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-3', 'value' => '4')); ?> &nbsp;
                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-4', 'value' => '5', 'checked' => TRUE)); ?> &nbsp;
                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-5', 'value' => '6')); ?> &nbsp;
                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-6', 'value' => '7')); ?> &nbsp;
                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-7', 'value' => '8')); ?> &nbsp;
                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-8', 'value' => '9')); ?> &nbsp;
                        <?php echo form_radio(array('name' => 'difficultyLevel', 'id' => 'difficultyLevel-9', 'value' => '10')); ?> &nbsp;

                        <br>
                        1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;&nbsp;&nbsp;6
                        &nbsp;&nbsp;&nbsp;&nbsp;7&nbsp;&nbsp;&nbsp;&nbsp;8&nbsp;&nbsp;&nbsp;&nbsp;9&nbsp;&nbsp;&nbsp;&nbsp;10

                        <select class="hide form-control" style="width:100px;">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select> 
                    </div>

                </div> -->

                <br>
                <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success pull-right'), 'Open Case'); ?>
                
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>