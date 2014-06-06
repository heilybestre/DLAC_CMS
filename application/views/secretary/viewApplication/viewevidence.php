<div id='view_evidence' class="container">
    <br>
    <?php echo form_open(base_url() . 'viewapplication/evidence', array('class' => 'form-horizontal')); ?>


    <div class="row-fluid">

        <h3>Documentary Evidence</h3>
        <table id='evidence_table_doc' class="table table-striped table-bordered">
            <tr>
                <th></th>
                <th>Document Type</th>
                <th>Document Involved</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Description</th>
                <th>Purpose</th>
                <th>Date Issued</th>
                <th>Place of Issuance</th>
                <th>Date Received</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </table>

    </div>

    <div class="row-fluid">

        <h3>Object Evidence</h3>
        <table id='obj' class="table table-striped table-bordered">
            <tr>
                <th></th>
                <th>Object</th>
                <th>Status</th>
                <th>Description</th>
                <th>Purpose</th>
                <th>Where Found</th>
                <th>Date Retrieved</th>
                <th>Date Received</th>
            </tr>
        </table>
    </div>

    <div class="row-fluid">

        <h3>Testimonial Evidence</h3>
        <table id='obj' class="table table-striped table-bordered">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Contact Information</th>
                <th>Purpose</th>
                <th>Status</th>
                <th>Reason</th>
                <th>Remarks</th>
                <th>Narrative</th>
                <th>Presented to Court</th>
                <th>Proceeding</th>
            </tr>
        </table>

    </div>

    <?php echo form_close(); ?>

</div>