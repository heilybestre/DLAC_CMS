<div id='evidence_form' class="container">
    <br>

    <div class="row">

        <div class="box">
            <div class="box-header">
                <h2><i class="icon-list"></i>Documentary Evidence</h2>
            </div>
            <div class="box-content">
                <table id='evidence_table_doc' class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th width="30%">Document Involved</th>
                            <th width="10%">Status</th>
                            <th width="30%">Purpose</th>
                            <th width="10%">Date Received</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($evidencedoc as $row) : ?>
                        <tr>
                            <td> <?= $row->dname ?> </td>
                            <td> <?= $row->dstatus ?> </td>
                            <td> <?= $row->dpurpose ?> </td>
                            <td> <?= $row->ddateReceived ?> </td>
                        </tr><?php endforeach; ?>
                    </tbody>
                </table> 
                </div
            </div>

        </div>

        <br>
        <div class="row">

            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Object Evidence</h2>
                </div>
                <div class="box-content">
                    <table id='evidence_table_obj' class="table table-striped table-bordered datatable span10">
                        <thead>
                            <tr>
                                <th width="30%">Object</th>
                                <th width="10%">Status</th>
                                <th width="10%">Date Received</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evidenceobj as $row) : ?>
                            <tr>
                                <td> <?= $row->oobject ?> </td>
                                <td> <?= $row->ostatus ?> </td>
                                <td> <?= $row->odateReceived ?> </td>
                            </tr><?php endforeach; ?>
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
                    <table id='evidence_table_tes' class="table table-striped table-bordered datatable span10">
                        <thead>
                            <tr>
                                <th width="30%">Name</th>
                                <th width="15%">Purpose</th>
                                <th width="10%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evidencetes as $row) : ?>
                            <tr>
                                <td> <?= "$row->firstname $row->lastname" ?> </td>
                                <td> <?= $row->tpurpose ?> </td>
                                <td> <?= $row->tstatus ?> </td>
                            </tr><?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
