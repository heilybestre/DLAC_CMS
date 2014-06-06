
<div style='background-color: white; margin-left: 200px; margin-right:200px; margin-top: 50px; margin-bottom: 50px; padding: 40px; border: 1px solid;' >

    <div class="article-content entry-content" style="margin: 10px auto 5px; outline: none; padding: 0px; clear: both; line-height: 1.4; text-align: justify; font-family: 'Helvetica Neue Light', HelveticaNeue-Light, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px;">&nbsp;
        <div style="margin: 0px; outline: none; padding:    0px; text-align: center;">REPUBLIC OF THE PHILIPPINES</div>

        <div style="margin: 0px; outline: none; padding: 0px; text-align: center;"><?php echo $forum->court ?></div>

        <div style="margin: 0px; outline: none; padding: 0px; text-align: center;">City of <?php
            foreach ($oneapp as $row) {
                echo $row->incidentPlace;
            }
            ?>
        </div>

        <div style="margin: 0px; outline: none; padding: 0px; text-align: center;">&nbsp;</div>
        <br />
        <?php
        foreach ($oneapp as $row) {
            echo "$row->cfirstName $row->cmiddleName $row->clastName";
        }
        ?>,
        <br />
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Plaintiff,<br />
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo 'Criminal Case Number: ' . $forum->court_caseNumber ?><br />
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;-VERSUS- <br>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br />
        <?php echo "$defendant->pfirstName $defendant->pmiddleName $defendant->plastName" ?>,<br />
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Defendant.<br />
        x----------------------------------------------------x<br />
        &nbsp;
        <div style="margin: 0px; outline: none; padding: 0px; text-align: center;"><strong>ENTRY OF APPEARANCE</strong></div>
        <br />
        THE BRANCH CLERK OF COURT<br />
        <?php echo $forum->court ?><br />
        City of <span style="font-family:helvetica neue light,helveticaneue-light,helvetica neue,helvetica,arial,sans-serif; font-size:14px">
            <?php
            foreach ($oneapp as $row) {
                echo $row->incidentPlace;
            }
            ?>
        </span><br />
        &nbsp;
        <div style="margin: 0px; outline: none; padding: 0px;">&nbsp; Please enter appearance of the undersigned as counsel for the plaintiff,
            <?php
            foreach ($oneapp as $row) {
                echo "$row->cfirstName $row->cmiddleName $row->clastName";
            }
            ?>
            , with his express conformity as indicated below, in this case. Henceforth, kindly address all pertinent notices to the undersigned at the address given below.
        </div>
        <br />
        &nbsp; RESPECTFULLY SUBMITTED.<br /><br />
        &nbsp; City of Manila, Philippines, <?php echo $datenow; ?>.<br />
        &nbsp;
        <div style="margin: 0px; outline: none; padding: 0px; text-align: right;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;DLSU Developmental Legal Advocacy Clinic</div>

        <div style="margin: 0px; outline: none; padding: 0px; text-align: right;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Counsel for the Plaintiff</div>

        <div style="margin: 0px; outline: none; padding: 0px; text-align: right;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2401 Taft Avenue,</div>

        <div style="margin: 0px; outline: none; padding: 0px; text-align: right;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Manila, Philippines</div>

        <div style="margin: 0px; outline: none; padding: 0px; text-align: right;">&nbsp;</div>

        <div style="margin: 0px; outline: none; padding: 0px; text-align: center;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; By:</div>
        <?php foreach ($lawyer as $row): ?>
            <div style="margin: 0px; outline: none; padding: 0px; text-align: right;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <?php echo "$row->firstName $row->middleName $row->lastName"; ?>
            </div>
            <div style="margin: 0px; outline: none; padding: 0px; text-align: right;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Roll No. <?php echo $row->attorneyRollNum ?></div>
            <div style="margin: 0px; outline: none; padding: 0px; text-align: right;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; MCLE No. <?php echo $row->MCLENum; ?>/1-3-12/Manila</div>
            <div style="margin: 0px; outline: none; padding: 0px; text-align: right;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;PTR No. <?php echo $row->PTRNum ?>/1-3-12/Manila</div>
        <?php endforeach; ?>
        <br />
        With conformity:<br />
        <?php
        foreach ($oneapp as $row) {
            echo "$row->cfirstName $row->cmiddleName $row->clastName";
        }
        ?>
        <br />
        <br />
        Copy furnished:<br />
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo "$counselDef->pfirstName $counselDef->pmiddleName $counselDef->plastName"; ?><br />
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Counsel for the Defendant<br />
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $counselDef->paddress; ?></div>
</div>
