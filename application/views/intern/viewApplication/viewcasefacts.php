<div id='casefacts_form' class="container">

    <div class="row">
        <div class="col-sm-6 control-group"></div>
        <div class="col-sm-4 control-group">
            <div class="controls" style='text-align:right;'>
                <h5> <b>Interview Date : <?php echo date('F j, Y', strtotime($case->appDateSubmitted)); ?></b></h5>
            </div>
        </div>
        <div class="col-sm-2 control-group">
            <div class="controls">
                <div class="input-group date">
                    <h5> <?php echo ''; ?></h5>
                </div>
            </div>
        </div>
        <br><br>

        <div class="col-sm-4" style='margin-left:40px;'>
            <div class="col-sm-3 control-group">
                <div class="controls">
                    <h5> <b> Client Name </b> </h5>
                </div>
            </div>
            <div class="col-sm-8 control-group">
                <div class="controls">
                    <?php $index = 0; ?>
                    <?php foreach ($clientlist as $client) { ?>
                        <?php if ($index > 0) { ?>
                            <h5><?php echo ", $client->firstname $client->lastname" ?></h5>
                        <?php } else { ?>
                            <h5><?php echo "$client->firstname $client->lastname" ?></h5>
                        <?php } ?>
                        <?php $index++; ?>
                    <?php } ?>
                </div>
            </div> 

            <br><br><br>

            <div class="col-sm-3 control-group">
                <div class="controls">
                    <h5> <b> Stage</b></h5>
                </div>
            </div>
            <div class="col-sm-8 control-group">
                <div class="controls">
                    <h5><?php echo $case->stageName ?></h5>
                </div>
            </div>    
            <br> <br>


            <div class="col-sm-3 control-group">
                <div class="controls">
                    <h5> <b> Client Type </b></h5> 
                </div>
            </div>
            <div class="col-sm-8 control-group">
                <div class="controls">
                    <h5><?php echo $clientlist[0]->typeName; ?></h5>
                </div>
            </div>
            <br><br>


            <div class="col-sm-3 control-group">
                <div class="controls">
                    <h5> <b> Forum </b> </h5>
                </div>
            </div>
            <div class="col-sm-8 control-group">
                <div class="controls">
                    <?php
                    if ($casecourt != null) {
                        foreach ($casecourt as $row) {
                            echo "<h5> $row->court </h5>";
                        }
                    } else
                        echo '-';
                    ?>
                </div>
            </div>
            <br> <br>


            <div class="col-sm-3 control-group">
                <div class="controls">
                    <h5> <b> Case No. </b></h5>
                </div>
            </div>
            <div class="col-sm-8 control-group">
                <div class="controls">
                    <?php
                    if ($casecourt != null) {
                        foreach ($casecourt as $row) {
                            echo "<h5> $row->casenumber </h5>";
                        }
                    } else
                        echo '-';
                    ?>
                </div>
            </div>
            <br><br>


            <div class="col-sm-3 control-group">
                <div class="controls">
                    <h5> <b> Opposing Party </b> </h5> 
                </div>
            </div>

            <div class="col-sm-8 control-group">
                <div class="controls">
                    <?php $index = 0; ?>
                    <?php foreach ($opposinglist as $opposing) { ?>
                        <?php if ($index > 0) { ?>
                            <h5> <?php echo ", $opposing->firstname $opposing->lastname" ?></h5>
                        <?php } else { ?>
                            <h5> <?php echo "$opposing->firstname $opposing->lastname" ?></h5>
                        <?php } ?>
                        <?php $index++; ?>
                    <?php } ?>
                </div>
            </div>

            <br><br><br><br>

            <div class="col-sm-5 control-group">
                <div class="controls">
                    <h7><u>INCIDENT DETAILS</u></h7>
                </div>
            </div>

            <br>

            <div class="col-sm-5 control-group">
                <div class="controls">
                    <h5> <b> Place of Incident</b> </h5> 
                </div>
            </div>

            <div class="col-sm-6 control-group">
                <div class="controls">
                    <h5>
                        <?php if ($case->appIncidentPlace != null || $case->appIncidentPlace != '') echo $case->appIncidentPlace . ', '; ?>
                        <?php echo $case->appIncidentCity ?>
                    </h5>
                </div>
            </div>

            <br><br><br>


            <div class="col-sm-5 control-group">
                <div class="controls">
                    <h5> <b> Date of Incident </b></h5> 
                </div>
            </div>

            <div class="col-sm-6 control-group">
                <div class="controls">
                    <h5><?php echo $case->appIncidentDate; ?></h5>
                </div>
            </div>

            <br><br>

            <div class="col-sm-5 control-group">
                <div class="controls">
                    <h5> <b> Time of Incident </b> </h5> 
                </div>
            </div>

            <div class="col-sm-6 control-group">
                <div class="controls">
                    <h5><?php echo $case->appIncidentTime; ?></h5>
                </div>
            </div>

            <br><br><br><br>

            <div class="col-sm-4 control-group">
                <div class="controls">
                    <h7><u>OFFENSE</u></h7>
                </div>
            </div>

            <br>

            <div id='offensetablediv'>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th></th>
                        <th>Offense</th>
                        <th>Offense Stage</th>
                    </tr>
                    <?php
                    $count = 1;
                    foreach ($caseoffense as $row) :
                        ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $row->offenseName ?></td>
                            <td><?php echo $row->stage ?></td>
                        </tr>
                        <?php
                        $count++;
                    endforeach;
                    ?>
                </table>

            </div>
        </div>

        <div class="col-sm-6">

            <div class="col-sm-2 control-group">
                <div class="controls">
                    <h5> <b> Title </b> </h5> 
                </div>
            </div>

            <div class="col-sm-9 control-group">
                <div class="controls">
                    <h5><?php echo $case->caseName ?></h5>
                </div>
            </div>

            <br> <br>

            <div class="col-sm-2 control-group">
                <div class="controls">
                    <h5> <b> Narrative </b></h5> 
                </div>
            </div>

            <div class="col-sm-9 control-group">
                <div class="controls">
                    <div class="well" style="height:500px; overflow:scroll;"><h5 style="line-height:20px;"><?php echo $case->appNarrative; ?></h5></div>
                </div>
            </div>

            <br> <br>

        </div>

    </div>

</div>

