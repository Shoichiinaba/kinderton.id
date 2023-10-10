<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
<script>
$(function() {
    // $(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    <?php if ($this->session->flashdata('error')) { ?>

    Toast.fire({
        type: 'error',
        title: '<?= $this->session->flashdata('error') ?>'
    })
    <?php } ?>

    <?php if ($this->session->flashdata('success')) { ?>

    Toast.fire({
        type: 'success',
        title: '<?= $this->session->flashdata('success') ?>'
    })
    <?php } ?>
});
</script>
<?php

$success    = $this->session->flashdata('success');
$error      = $this->session->flashdata('error');
$warning    = $this->session->flashdata('warning');

if ($success) {
    $alert_status   = 'alert-success';
    $status         = 'Success!';
    $message        = $success;
}

if ($error) {
    $alert_status   = 'alert-danger';
    $status         = 'Error!';
    $message        = $error;
}

if ($warning) {
    $alert_status   = 'alert-warning';
    $status         = 'Warning!';
    $message        = $warning;
}