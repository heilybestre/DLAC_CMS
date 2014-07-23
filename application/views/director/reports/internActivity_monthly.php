<html>
    <head>
        <title></title>
        <link href="<?= base_url() ?>assets/css/reports.css" rel="stylesheet">

    </head>
    <body>
        <br><br>
        
        <h5><b>Intern Name:</b> (Name)</h5>
        
        
    <center>
        <table class="table table-striped table-bordered datatable" id="dashboard-cases" data-provides="rowlink">
            <thead>
                <tr>
                    <th></th>
                    <th>Activity</th>
                </tr>
            </thead>   
            <tbody>
                    <tr>
                        <td>July 2</td>
                        <td>Uploaded a Document</td>
                    </tr>
            </tbody>
        </table>
    </center> <br>
    <div style="text-align: right;">
            <b>Total:</b>
            <?php echo $count->count; ?>
        </div>

</body>
</html>