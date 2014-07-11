<div class="container">

    <?php echo form_open(base_url() . 'caseFolder/research', array('class' => 'form-horizontal')); ?>

    <div class="row tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#newResearch" data-toggle="tab">New</a></li>
            <?php foreach ($caseresearch as $row): ?>
                <li><a href="#currentResearch" data-toggle="tab" ><?php echo $row->caseName?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content" style="height:450px; overflow:scroll;">
            <div class="tab-pane active" id="newResearch">
                <?php $this->load->view('intern/research/newResearch'); ?>
            </div>
            <div class="tab-pane" id="currentResearch">
                <?php $this->load->view('intern/research/currentResearch'); ?>
            </div>
        </div>
    </div>

</div>