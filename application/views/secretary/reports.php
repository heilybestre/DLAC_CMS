     <div id="content" class="col-lg-10 col-sm-11"> <div class="row">

        <div class="box"> <div class="box-header"> <h2><i class="icon-list"></i>Reports</h2> </div> <div class="box-content">

        <br>

        Type of Report: <select class="form-control" name="sub"> 
        <option></option> 
        <option>Open Cases</option> 
        <option></option> 
    </select>

    <br>

    <div class="form-inline"> 
        <label class="radio" for="report-1"> <input type="radio" name="report" id="report-1" value="Weekly"> Weekly </label> 
        <label class="radio" for="report-1"> <input type="radio" name="report" id="report-2" value="Monthly"> Monthly </label>
        <label class="radio" for="report-1"> <input type="radio" name="report" id="report-3" value="Yearly"> Yearly </label>
    </div>
    
    <br>

    <!--YEAR -->

    <div class="hide" style="width:100px;">
        Year
        <select class="form-control" name="sub"> 
            <option></option> 
            <option>2013</option> 
            <option>2012</option> 
        </select>
    </div>

    <br>

    <!--MONTH -->
    <div class="" style="width:100px;">
        Month
        <select class="form-control" name="sub"> 
            <option></option> 
            <option>January</option> 
            <option>February</option>
            <option>March</option>
            <option>April</option>
            <option>May</option>
            <option>June</option>
            <option>July</option>
            <option>August</option>
            <option>September</option>
            <option>October</option>
            <option>November</option>
            <option>December</option>
        </select>

        <br>

        Year
        <select class="form-control" name="sub"> 
            <option></option> 
            <option>2013</option> 
            <option>2012</option> 
        </select>
    </div>

    <br>

    <!--WEEK -->
    <div class="hide" style="width:100px;">

        Week
        <select class="form-control" name="sub"> 
            <option></option> 
            <option>1</option> 
            <option>2</option>
            <option>3</option>
            <option>4</option> 
        </select>

        Month
        <select class="form-control" name="sub"> 
            <option></option> 
            <option>January</option> 
            <option>February</option>
            <option>March</option>
            <option>April</option>
            <option>May</option>
            <option>June</option>
            <option>July</option>
            <option>August</option>
            <option>September</option>
            <option>October</option>
            <option>November</option>
            <option>December</option>
        </select>

        <br>

        Year
        <select class="form-control" name="sub"> 
            <option></option> 
            <option>2013</option> 
            <option>2012</option> 
        </select>
    </div>

    <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success'), 'Generate'); ?>

</div> </div>

</div> </div>

