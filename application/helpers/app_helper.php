<?php
function alert_success($title){
    $ci =& get_instance();
    return $ci->session->set_flashdata("pesan","
    <script>
    $(document).ready(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          icon: 'success',
          title: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$title."'
        })
    });
    
    </script>");
}
function alert_error($title){
    $ci =& get_instance();
    return $ci->session->set_flashdata("pesan","
    <script>
    $(document).ready(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
          icon: 'error',
          title: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$title."'
        })
    });
    </script>");
}




function alert_info($title){
    $ci =& get_instance();
    return $ci->session->set_flashdata("pesan","
    <script>
    $(document).ready(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.success('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$title."')
    });
    
    </script>");
}

function alert_warning($title){
    $ci =& get_instance();
    return $ci->session->set_flashdata("pesan","
    <script>
    $(document).ready(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.warning('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$title."')
    });
    
    </script>");
}

function alert_delete($title){
    $ci =& get_instance();
    return $ci->session->set_flashdata("pesan","
    <script>
    $(document).ready(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        toastr.info('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$title."')
    });
    
    </script>");
}
?> 