<div class="clearfix"></div>
</body>

<!-- INTERN FOOTER -->
<footer>
    <p>
        <span style="text-align:left;float:left">&copy; 2013 TEAM HIGH</a></span>
    </p>
</footer>

<script src="<?= base_url() ?>assets/js/jquery-2.0.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>   

<!-- page scripts -->

<script src="<?= base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.cookie.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="assets/js/excanvas.min.js"></script><![endif]-->
<script src="<?= base_url() ?>assets/js/jquery.flot.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.flot.pie.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.flot.stack.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.flot.resize.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.flot.time.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.autosize.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.placeholder.min.js"></script>

<script src="<?= base_url() ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-colorpicker.min.js"></script>
<!--<script src="<?= base_url() ?>assets/js/jquery-loader.js"></script>-->
<script src="<?= base_url() ?>assets/js/fullcalendar.js"></script>
<script src="<?= base_url() ?>assets/js/gcal.js"></script>

<!-- theme scripts -->
<script src="<?= base_url() ?>assets/js/custom.min.js"></script>
<script src="<?= base_url() ?>assets/js/core.min.js"></script>

<!-- inline scripts related to this page -->
<script src="<?= base_url() ?>assets/js/pages/index.js"></script>
<script src="<?= base_url() ?>assets/js/pages/table.js"></script>

<!-- end: JavaScript-->


<script type="text/javascript" src="<?= base_url() ?>assets/js/pages/widgets.js"></script>

<script src="<?= base_url() ?>assets/js/holder/holder.js"></script>
<script src="<?= base_url() ?>assets/js/google-code-prettify/prettify.js"></script>
<script src="<?= base_url() ?>assets/js/application.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-rowlink.js"></script>
<script src="<?= base_url() ?>assets/js/hide-show.js"></script>

<script src="<?= base_url() ?>assets/js/chosen.jquery.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/chosen.proto.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/prism.js" type="text/javascript"></script>


<!-- CUSTOM JAVASCRIPT ------------------------------------------------------>
<script type='text/javascript'>

    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {allow_single_deselect: true},
        '.chosen-select-no-single': {disable_search_threshold: 10},
        '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'}
    };
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

//customized datatables
    $(document).ready(function() {

        $(".addpersonbtn").click(function(event) {
            alert(event.target.id);
        });


        $('.popover-orig').popover({
            html: true,
            title: function() {
                return $("#popover-orig-head").html();
            },
            content: function() {
                return $("#popover-orig-content").html();
            }
//

=======
        
        $(".addpersonbtn").click(function(event){
            alert(event.target.id);
        });
      
      
        $('.popover-orig').popover({ 
        html : true,
        title: function() {
          return $("#popover-orig-head").html();
        },
        content: function() {
          return $("#popover-orig-content").html();
        }
