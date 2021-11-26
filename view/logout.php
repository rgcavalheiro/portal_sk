<?php


session_destroy();

?>
<script type="text/javascript">
        

    php_variables = <?php echo json_encode($variables_to_view['js_variables']) ?>;        
    window.location.href = php_variables.base_url + "?u=login";

</script>