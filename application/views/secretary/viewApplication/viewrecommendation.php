<div id='view_recommendation' class="container">
    <br>

    <?php echo form_open(base_url() . 'viewapplication/recommendation', array('class' => 'form-horizontal')); ?>

    <!-- Form Name -->
    <h4>Intern's Recommendation for the Director</h4>
    <hr width='450px'>

    <br>

    <!-- Multiple Radios -->
    <div class="control-group">
        <label class="control-label" for="recommendedFor">Recommended for</label>
        <div class="controls">
            <label class="control-label1">Approval</label>  
        </div>
    </div>

    <!-- Textarea -->
    <div class="control-group">
        <label class="control-label" for="recommendation">Rationale</label>
        <div class="controls">  
            <label class="control-label1">(rationale)</label>                   
        </div>
    </div>


    <?php echo form_close(); ?>


</div>
