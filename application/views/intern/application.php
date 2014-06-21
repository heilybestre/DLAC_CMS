<div id="content" class="col-lg-10 col-sm-11">

    <!-- start: Content -->
    <!--     <div class="row">
            <div class="col-lg-12">
                <a class ="btn btn-medium btn-success pull-right" style='margin-bottom: 10px' href="createApplication">
                    <i class="icon-plus-sign"></i>&nbsp;Create Application</a>
            </div>
        </div> -->

    <div class="row">

            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Pending Applications</h2>
                </div>
                <div class="box-content">
                    <br/>
                    <table class="table table-striped table-bordered" id="applicationstable" data-provides="rowlink">
                        <thead>
                            <tr>
                                <th>Application Number</th>
                                <th>Application Title</th>
                                <th>Date Submitted</th>
                                <th>Submitted By</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($applications as $row) : ?>
                                <tr>
                                    <td><a href="view/<?php echo $row->caseID ?>"> <?php echo $row->caseNum ?></a></td>
                                    <td><?php echo $row->caseName ?></td>
                                    <td class="center"><?php echo $row->appDateSubmitted ?></td>
                                    <td class="center"><?php echo "$row->firstname $row->lastname" ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
</div>
