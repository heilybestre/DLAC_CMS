</body>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?= base_url() ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-2.0.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-transition.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-alert.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-modal.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-dropdown.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-scrollspy.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-tab.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-tooltip.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-popover.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-button.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-collapse.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-carousel.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-typeahead.js"></script>

<script src="<?= base_url() ?>assets/js/qunit.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-loader.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-backstretch.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.backstretch.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.backstretch.min.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>

<script>
  $.backstretch([
    "<?= base_url() ?>assets/img/02.png",
    "<?= base_url() ?>assets/img/01.png",
    "<?= base_url() ?>assets/img/03.png"
  ], {
    fade: 750,
    duration: 4000
  });
</script>

<script type='text/javascript'>
  $(document).ready(function() {
    $('#loginForm').bootstrapValidator({
      message: 'This value is not valid',
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        username: {
          message: 'The username is not valid',
          validators: {
            notEmpty: {
              message: 'The username is required and cannot be empty'
            },
            stringLength: {
              min: 6,
              max: 30,
              message: 'The username must be more than 6 and less than 30 characters long'
            },
            regexp: {
              regexp: /^[a-zA-Z0-9_]+$/,
              message: 'The username can only consist of alphabetical, number and underscore'
            }
          }
        },
        password: {
          validators: {
            notEmpty: {
              message: 'The password is required and cannot be empty'
            },
            different: {
              field: 'username',
              message: 'The password cannot be the same as username'
            },
            stringLength: {
              min: 6,
              message: 'The password must have at least 6 characters'
            }
          }
        }
      }
    });
  });
</script>

</html>