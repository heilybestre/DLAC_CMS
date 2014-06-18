<div id="content" class="col-lg-10 col-sm-11">

    <!-- start: Content -->

    <div class="row">
        
        <div class="col-lg-5">
                <div class="box">
                    <div class="box-header">
                        <h2><i class="icon-list"></i>Pre-Evaluate the Application</h2>
                    </div>
                    <div class="box-content">
                    <div class="row">
                    <br>
                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <center> <h5> Offense </h5> </center>
                        </div>
                    </div>

                     <div class="col-sm-9 control-group">
                            <div class="controls">
                                <div class="controls">
                                    <select id="preEvalOffense" name="preEvalOffense" class="chosen-select" tabindex="8">
                                        <?php foreach ($offenses as $off): ?>
                                            <option value="<?php echo $off->offenseID ?>"><?php echo $off->offenseName ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div id="approve">
                    <div class="alert alert-success">
                        <i class="icon-ok"></i> The clinic can provide legal aid to this type of case.
                        <br><br>
                        <h2><b>Available Lawyers</b></h2>
                         <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Specialized Lawyers</th>
                                    <th>Other Available Lawyers</th>
                                </tr>
                            </thead>   
                            <tbody>
                               <tr>
                                    <td>Diane Mallari</td>
                                    <td>Patricia Perez</td>
                               </tr>
                        </tbody>
                        </table>
                    </div>
                    </div>

                    <div id="reject">
                    <div class="alert alert-danger">
                        <i class="icon-remove"></i> The clinic cannot provide legal aid to this type of case.
                      
                    </div>
                    </div>

                    <div id="neutral">
                    <div class="alert alert-warning">
                        <i class="icon-remove"></i> The clinic can provide legal aid to this type of case. But there is NO AVAILABLE
                        lawyer as of this moment.
                       
                    </div>
                    </div>

                    </div>
                </div>
            </div>
        
        <div class="col-lg-7">
            <div class="box">
                <div class="box-header">
                    <h2><i class="icon-list"></i>Applications</h2>
                </div>
                <div class="box-content">
                    <br/>
                    <table id="applicationstable" class="table table-striped table-bordered" data-provides="rowlink">
                        <thead>
                            <tr>
                                <th>Application Number</th>
                                <th>Application Title</th>
                                <th>Date Submitted</th>
                                <th>Submitted By</th>
                                <th>Status</th>
                            </tr>
                        </thead>   
                        <tbody>
                            <?php foreach ($applications as $row) : ?>
                                <tr>
                                    <td><a href="view/<?php echo $row->caseID ?>"> <?php echo $row->caseNum ?></a></td>
                                    <td><?php echo $row->caseName ?></td>
                                    <td class="center"><?php echo $row->appDateSubmitted ?></td>
                                    <td class="center"><?php echo "$row->firstname $row->lastname" ?></td>
                                    <td class="center"><?php echo $row->statusName ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
