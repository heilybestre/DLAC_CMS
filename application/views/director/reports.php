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
                                <center> <h5> <b>Type of Report:</b> </h5> </center>
                            </div>
                    </div>

                    <div class="col-sm-5 control-group">
                        <div class="controls">
                            <select class="form-control" name="sub"> 
                                <option></option> 
                                <option>Opened Cases</option> 
                            </select>
                        </div>
                    </div>

                </div>

                <br><br>

                <div>
                    <div class="col-sm-2 control-group">
                            <div class="controls">
                            </div>
                    </div>

                    <div class="col-sm-5 control-group">
                        <div class="controls">
                            <div class="form-inline"> 
                                <label class="radio" for="report-1"> <input type="radio" name="report" id="report-2" value="Monthly" onclick="location.href = 'javascript:toggleReportMonthly();';"> Monthly </label>
                                <label class="radio" for="report-1"> <input type="radio" name="report" id="report-3" value="Yearly" onclick="location.href = 'javascript:toggleReportYearly();';"> Yearly </label>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <br><br>

                <!--MONTH -->
                <div id="reportsMonthly" style="display:none;">

                    <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Month:</b> </h5> </center>
                            </div>
                    </div>

                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <select class="form-control" name="sub"> 
                                <option></option> 
                                <option>January</option> 
                                <option>February</option>
                                <option>March</option> 
                            </select>
                        </div>
                    </div>

                   <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Year:</b> </h5> </center>
                            </div>
                    </div>

                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <select class="form-control" name="sub"> 
                                <option></option> 
                                <option>2013</option> 
                                <option>2012</option> 
                            </select>
                        </div>
                    </div>

                    <br><br>
                </div>

                <!--YEAR -->

                <div id="reportsYearly" style="display:none;">

                    <div class="col-sm-2 control-group">
                            <div class="controls">
                                <center> <h5> <b>Year:</b> </h5> </center>
                            </div>
                    </div>

                    <div class="col-sm-2 control-group">
                        <div class="controls">
                            <select class="form-control" name="sub"> 
                                <option></option> 
                                <option>2013</option> 
                                <option>2012</option> 
                            </select>
                        </div>
                    </div>
                    <br><BR>
                </div>
                
<!--                 <a href="report/viewpdf" >Save as pdf file</a><br>
                <a href="report/viewdoc" >Save as doc file</a><br> -->
                <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success', 'style'=>"margin-left: 200px; width:200px"), 'Generate'); ?>
                <br>
                <div class="">
                    {iframe}
                </div>
            </div>
<!--             <div class="box">

                <div class="box-header">

                </div>

                <div class="box-content">
                    <h1>START NG UPLOAD</h1>
                    <?php echo $error; ?>

                    <?php echo form_open_multipart('report/uploadme'); ?>

                    <input id='uploadid' type="file" name="userfile[]" multiple='' />

                    <br /><br />

                    <input type="submit" value="Attach" />

                    </form>


                    <h4>
                        mga uploaded
                    </h4>

                    <?php echo $multi; ?>
                </div>
            </div> -->
        </div>
    </div>
</div>

