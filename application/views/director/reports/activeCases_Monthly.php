<html>
    <head>
        <title>Active Cases</title>
        <link href="<?= base_url() ?>assets/css/reports.css" rel="stylesheet">

    </head>
    <body>
        <br><br>
        <div class="pull-left">
            <b>Total:</b>
            <?php echo $count->count; ?>
        </div>
        <br><br>
    <center>
        <table class="table table-striped table-bordered datatable" id="dashboard-cases" data-provides="rowlink">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Title</th>
                    <th>(Life) Span</th>
                    <th>Offense</th>
                    <th>Supervising Lawyer</th>
                </tr>
            </thead>   
            <tbody>
                <?php foreach ($case as $row): ?>
                    <tr>
                        <td>
                            <?php
                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $row->appDateSubmitted);
                            echo $date->format("d");
                            ?>
                        </td>
                        <td><?php echo $row->caseName; ?></td>
                        <td><?php echo $row->lifespan . ' days'; ?></td>
                        <td>
                            <?php
                            $offenses = explode(",", $row->offense);
                            if ($offenses != NULL) {
                                $offensename = '';
                                for ($index = 0; $index < count($offenses); $index++) {
                                    if ($index > 0) {
                                        echo $offensename . ', ' . $this->Case_model->select_stroffense($offenses[$index])->offenseName;
                                    } else {
                                        echo $offensename . $this->Case_model->select_stroffense($offenses[$index])->offenseName;
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo "$row->firstname $row->lastname" ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table> 
    </center>
</body>
</html>