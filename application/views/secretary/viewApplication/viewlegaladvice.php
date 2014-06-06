<div id='view_actiontaken' class="container">

    <?php echo form_open(base_url() . 'viewapplication/legaladvice', array('class' => 'form-horizontal')); ?>

    <div class="row-fluid">
        <br>

        <!-- Textarea -->
        <div class="control-group">
            <label class="control-label" for="adviceGiven">Advice Given by the Intern</label>
            <div class="controls">                     
                <label class="control-label1">(advice)</label>		
            </div>
        </div>

    </div>
    <br>
    <div class = "row-fluid">

        <!-- Textarea -->
        <div class="control-group">
            <label class="control-label" for="notes">Notes</label>
            <div class="controls">   
                <label class="control-label1">(notes)</label>                  
            </div>
        </div>

        <!-- Button
        <div class="control-group">
                <label class="control-label" for="submit"></label>
                <div class="controls">
        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-primary'), 'Next'); ?>
                </div>
        </div>
        -->
    </div> <br>

    <div class="row-fluid">


        <div class="span4">

            <div class="control-group">
                <label class="control-label" for="notes">Other Interviewers</label>
                <div class="controls">
                    <label class="control-label1">Jal Laylo, David Guetta </label> 

                </div>
            </div>
        </div>

    </div>


    <?php echo form_close(); ?>

</div>

