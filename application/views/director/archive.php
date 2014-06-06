<div id="content" class="col-lg-10 col-sm-11">
    <!-- CASE FOLDER -->
    <!-- start: Content -->
    <div class="row">

        <div class="col-lg-12">

            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Closed Cases</h2>
                </div>
                <div class="box-content">

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active" id="ongoing">
                            <br/>
                            <table class="table table-striped table-bordered bootstrap-datatable datatable" data-provides="rowlink">
                                <thead>
                                    <tr>
                                        <th width="10%">Case No.</th>
                                        <th width="30%">Title</th>
                                        <th width="20%">Date Closed</th>
                                        <th width="20%">Supervising Lawyer</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    <?php foreach ($archives as $row) : ?>
                                        <tr>
                                            <td><a href="cases/caseFolder/<?php echo $row->caseID ?>"> <?php echo $row->caseNum ?></a></td>
                                            <td><?php echo '<tabletitle>' . $row->caseName . '</tabletitle><br><tabledesc>' . $row->caseDesc . '</tabledesc>' ?></td>
                                            <td><?php echo $row->dateClosed ?></td>
                                            <td><?php echo $row->firstname . ' ' . $row->lastname ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>