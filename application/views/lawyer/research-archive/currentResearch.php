<div class="container">

    <div id="researchtab-current">

        <div class="row">
            <a href="<?php echo base_url() . 'cases/caseFolder/' . $currentresearch->caseID ?>" class="btn btn-primary pull-right">View Case Folder</a>

        </div>

        <div class="row">
            <table class="table table-striped table-bordered">
                <tr>
                    <td style="background-color:rgb(59, 177, 149)">
                <center><h5><b>ASSESSMENT</b></h5></center></td>
                </tr>
                <tr>
                    <td>
                        <b>Strategy</b>
                        <br><br>
                        <p><?php echo $currentresearch->strategy ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Strengths</b>
                        <br><br>
                        <p><?php echo $currentresearch->strength ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Weaknesses</b>
                        <br><br>
                        <p><?php echo $currentresearch->weakness ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Opportunities</b>
                        <br><br>
                        <p><?php echo $currentresearch->opportunity ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Threats</b>
                        <br><br>
                        <p><?php echo $currentresearch->threat ?></p>
                    </td>
                </tr>
            </table>
        </div><br>


        <div class="row">
            <table class="table table-striped table-bordered">
                <tr>
                    <td style="background-color:rgb(59, 177, 149)" colspan="3">
                <center><h5><b>FILES</b></h5></center></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
                <?php foreach ($files as $row): ?>
                    <tr>
                        <td><a href=<?php echo base_url() . "cases/downloadNow/$row->caseID/$row->documentID" ?>><?php echo $row->file_name ?></a></td>
                        <td><?php echo $row->file_size ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>

</div>