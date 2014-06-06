<div id='evidence_form' class="container">
    <br>

    <div class="row">

        <div class="box">
            <div class="box-header">
                <h2><i class="icon-list"></i>Documentary Evidence</h2>
            </div>
            <div class="box-content">
                <table id='evidence_table_doc' class="table table-striped table-bordered span10">
                    <thead>
                        <tr>
                            <th width="5%"></th>
                            <th width="30%">Document Involved</th>
                            <th width="10%">Status</th>
                            <th width="30%">Purpose</th>
                            <th width="10%">Date Received</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($evidencedoc as $row) : ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $row->dinvolved; ?> </td>
                                <td> <?php echo $row->dstatus; ?> </td>
                                <td> <?php echo $row->dpurpose; ?> </td>
                                <td> <?php echo $row->ddateReceived; ?> </td>
                                <?php $i++; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
            </div>
        </div>

    </div>

    <br>
    <div class="row">

        <div class="box">
            <div class="box-header">
                <h2><i class="icon-list"></i>Object Evidence</h2>
            </div>
            <div class="box-content">
                <table id='evidence_table_obj' class="table table-striped table-bordered span10">
                    <thead>
                        <tr>
                            <th width="5%"></th>
                            <th width="30%">Object</th>
                            <th width="10%">Status</th>
                            <th width="30%">Purpose</th>
                            <th width="10%">Date Received</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($evidenceobj as $row) : ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $row->oobject; ?> </td>
                                <td> <?php echo $row->ostatus; ?> </td>
                                <td> <?php echo $row->opurpose; ?> </td>
                                <td> <?php echo $row->odateReceived; ?> </td>
                                <?php $i++; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <br>

    <div class="row">

        <div class="box">
            <div class="box-header">
                <h2><i class="icon-list"></i>Testimonial Evidence</h2>
            </div>
            <div class="box-content">
                <table id='evidence_table_tes' class="table table-striped table-bordered span10">
                    <thead>
                        <tr>
                            <th width="5%"></th>
                            <th width="30%">Name</th>
                            <th width="20%">Contact Information</th>
                            <th width="15%">Purpose</th>
                            <th width="10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($evidencetes as $row) : ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $row->tpersonTestified; ?> </td>
                                <td> <?php echo $row->tcontactInfo; ?> </td>
                                <td> <?php echo $row->tpurpose; ?> </td>
                                <td> <?php echo $row->tstatus; ?> </td>
                                <?php $i++; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
