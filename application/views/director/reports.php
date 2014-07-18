<div id="content" class="col-lg-10 col-sm-11"> 
    <div class="row">

        <div class="box">
            <div class="box-header">
                <h2>
                    <i class="icon-list"></i>Report
                </h2>
            </div>

            <div class="box-content">
                <br>
                <div>
                    <div class="col-sm-2 control-group">
                        <div class="controls">
                        </div>
                    </div>

                    <div class="col-sm-5 control-group">
                        <div class="controls">
                            <div class="form-inline"> 
                                <label class="radio" for="report-1"> <input type="radio" name="report" id="report-2" value="Monthly" onclick="location.href = 'javascript:toggleReportMonthly();';"> Monthly </label>
                                <label class="radio" for="report-1"> <input type="radio" name="report" id="report-3" value="Yearly" onclick="location.href = 'javascript:toggleReportYearly();';"> Annually </label>
                            </div>
                        </div>
                    </div>

                </div>

                <br><br>


                <!--MONTH -->
                <div id="reportsMonthly" style="display:none;">
                    <?php echo form_open(base_url() . 'report/monthly', array('class' => 'form-horizontal', 'target' => '_blank')); ?>

                    <div>
                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Type of Report:</b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-5 control-group">
                            <div class="controls">
                                <select class="form-control" name="sub"> 
                                    <option></option> 
                                    <option value="1">Active Cases Summary</option> 
                                    <option value="2">Closed Cases Summary</option> 
                                    <option value="3">Accepted Cases Summary</option> 
                                </select>
                            </div>
                        </div>

                    </div>

                    <br><br>

                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <center> <h5> <b>Month:</b> </h5> </center>
                        </div>
                    </div>

                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <select class="form-control" name="month"> 
                                <option></option> 
                                <option value="1">January</option> 
                                <option value="2">February</option>
                                <option value="3">March</option> 
                                <option value="4">April</option> 
                                <option value="5">May</option> 
                                <option value="6">June</option> 
                                <option value="7">July</option> 
                                <option value="8">August</option> 
                                <option value="9">September</option> 
                                <option value="10">October</option> 
                                <option value="11">November</option> 
                                <option value="12">December</option> 
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-1 control-group">
                        <div class="controls">
                            <center> <h5> <b>Year:</b> </h5> </center>
                        </div>
                    </div>

                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <select class="form-control" name="year"> 
                                <option></option>
                                <option value="2014">2014</option> 
                                <option value="2013">2013</option> 
                                <option value="2012">2012</option> 
                            </select>
                        </div>
                    </div>
                    <br><br>

                    <a href="" target="_blank">
                        <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left: 182px; width: 200px'), 'Generate'); ?>
                    </a>
                    <?php echo form_close(); ?>
                </div>

                <!--YEAR -->
                <div id="reportsYearly" style="display:none;">

                    <div>
                        <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Type of Report:</b> </h5> </center>
                            </div>
                        </div>

                        <div class="col-sm-5 control-group">
                            <div class="controls">
                                <select class="form-control" name="sub"> 
                                    <option></option> 
                                    <option value="1">Active Cases Summary</option> 
                                    <option value="2">Closed Cases Summary</option> 
                                    <option value="3">Accepted Cases Summary</option>
                                    <option value="4">Closed Cases Summary (Result)</option>
                                    <option value="5">Most Common Type of Offense</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <br><br>

                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <center> <h5> <b>Year:</b> </h5> </center>
                        </div>
                    </div>

                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <select class="form-control" name="sub"> 
                                <option></option> 
                                <option value="2014">2014</option> 
                                <option value="2013">2013</option> 
                                <option value="2012">2012</option> 
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <a href="<?php echo base_url() . "report/" ?>" target="_blank" class="btn btn-success" style="margin-left: 182px; width: 200px"> Generate</a>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

