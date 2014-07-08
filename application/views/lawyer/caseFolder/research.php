<div class="container">

    <?php echo form_open(base_url() . 'caseFolder/research', array('class' => 'form-horizontal')); ?>

    <div class="row tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#newResearch" data-toggle="tab">New</a></li>

            <?php foreach ($caseresearch as $row): ?>
                <li><a href="#currentResearch<?php echo $row->caseID ?>" data-toggle="tab" ><?php echo $row->caseName ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content" style="height:400px; overflow:scroll ! important;">
            <div class="tab-pane active" id="newResearch">
                <?php $this->load->view('intern/research/newResearch'); ?>
            </div>
            <?php foreach ($caseresearch as $row): ?>
                <div class="tab-pane" id="currentResearch<?php echo $row->caseID ?>">
                    <?php $data['currentresearch'] = $row ?>
                    <?php $data['files'] = $this->Case_model->select_casedocuments($row->caseID, 2) ?>
                    <?php $this->load->view('intern/research/currentResearch', $data); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>