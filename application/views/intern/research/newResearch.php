<div class="container">
    <br>
    <div class="row">
        <h2>Similar Cases</h2>
    </div>
    <?php
    if ($researchlist == 'empty') {
        echo '<h4>There are no similar cases found.</h4>';
    } else {
        ?>

        <?php foreach ($researchlist as $row): ?>
            <div id="researchtab-new" class="well" style="padding-bottom:5px;">
                <div class="row">
                    <h3><b><?php echo $row->caseName ?></b>
                        <a class ="btn btn-success pull-right" style='margin-top: -10px' href="<?php echo base_url() . 'cases/addResearch/' . $case->caseID . '/' . $row->caseID ?>">
                            <i class="icon-plus"></i> Add to Research</a>
                    </h3>
                </div><br>
                <h5>
                    <b>Offense:</b> <?php foreach ($caseoffense as $off) : ?>
                        <label class="label label-danger">
                            <?php echo "$off->offenseName ($off->stage)" ?>
                        </label>
                    <?php endforeach; ?>

                    <br><b>Date Closed:</b> <?php echo $row->dateClosed ?>
                </h5>


                <div class="row">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>
                                <b>Strategy</b>
                                <br><br>
                                <p><?php echo $row->strategy ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Strengths</b>
                                <br><br>
                                <p><?php echo $row->strength ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Weaknesses</b>
                                <br><br>
                                <p><?php echo $row->weakness ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Opportunities</b>
                                <br><br>
                                <p><?php echo $row->opportunity ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Threats</b>
                                <br><br>
                                <p><?php echo $row->threat ?></p>
                            </td>
                        </tr>
                    </table>
                </div><br><br>
            </div>
        <?php endforeach; ?>
    <?php } ?>

</div>