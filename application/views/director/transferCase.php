
<div id="content" class="col-lg-10 col-sm-11">

    <div class="row">

        <div class="box">
            <div class="box-header">
                <h2><i class="icon-exchange"></i>Transfer Case</h2>
            </div>
            <form action="<?php echo base_url() ?>cases/replaceInterns" method="post">
                <div class="box-content">


                    <br>

                    <table class="table table-condensed well table-bordered" id="tbl-caseTransfer">
                        <tr>
                            <th>Case Title</th>
                            <td><?php echo $case->caseName ?></td>
                        </tr>
                        <tr>
                            <th>Current Stage</th>
                            <td><?php echo $case->stageName ?></td>
                        </tr>
                        <tr>
                            <th>Difficulty Level</th>
                            <td><?php echo $case->difficultyLevel ?></td>
                        </tr>
                        <tr>
                            <th>Supervising Lawyer</th>
                            <td>
                                <?php $count = 1 ?>
                                <?php foreach ($caselawyers as $row): ?>
                                <?php
                                if ($count > 1) {
                                    echo ' ,';
                                }
                                ?>
                                <img style="height: 20px" src="<?php echo base_url() . $row->image ?>">
                                <?php echo "$row->firstname $row->lastname"; ?>
                                <?php $count++ ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </table>
                <br>

                <table class="table table-bordered" id="tbl-caseTransfer">
                    <tr style="background-color:lightgreen">
                        <td colspan="3"><p>Choose intern to replace by clicking the checkbox beside it. And then, choose a new intern through the dropdown.</p></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Existing Intern <i>Case difficulty (Case load)</i> </th>
                        <th>New Intern <i>Case difficulty (Case load)</i> </th>
                    </tr>
                    <?php foreach ($transferees as $old) : ?>
                    <tr>
                        <td align="center">
                            <input type= 'checkbox' class= 'case' name= 'old[]' value= '<?php echo $old->personID ?>'/>
                        </td>
                        <td>				
                            <h5>
                                <?php echo "$old->firstname $old->lastname  " ?>
                                <?php $count=0; ?>
                                <?php foreach ($interns as $intern): ?>
                                <?php if($old->personID == $intern->personID){ ?>
                                <i><?php echo substr($intern->difficultyLevel, 0, 3) . " ($intern->caseload)" ?></i>
                                <?php } ?>
                                <?php $count++; endforeach; ?>
                            </h5>
                        </td>
                        <td>
                            <select id="transferNewIntern" name="old<?php echo $old->personID ?>" class="form-control">
                                <?php foreach ($nontransferees as $new) : ?>
                                <option value=<?php echo $new->personID ?>>
                                    <?php echo "$new->firstname $new->lastname" ?>
                                    <?php $count=0; ?>
                                    <?php foreach ($interns as $intern): ?>
                                    <?php if($new->personID == $intern->personID){ ?>
                                    <i><?php echo substr($intern->difficultyLevel, 0, 3) . " ($intern->caseload)" ?></i>
                                    <?php } ?>
                                    <?php $count++; endforeach; ?>
                                </option>
                            <?php endforeach; ?>
                        </select> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="row pull-right" style='margin-right:20px;'>
            <input type="hidden" name="cid" value="<?php echo $case->caseID ?>">


            <input type="submit" class="btn btn-success" value="Transfer Case">
            <a href="<?php echo base_url() ?>cases/caseFolder/<?= $case->caseID ?>" class="btn btn-danger">Cancel</a>
        </div>

        <br><br><br><br>
    </div>
</form>
</div>



</div>

</div>