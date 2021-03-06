﻿<?php
 /**
  * This template is used to print a single field in a view. It is not
  * actually used in default Views, as this is registered as a theme
  * function which has better performance. For single overrides, the
  * template is perfectly okay.
  *
  * Variables available:
  * - $view: The view object
  * - $field: The field handler object that can process the input
  * - $row: The raw SQL result that can be used
  * - $output: The processed output that will normally be used.
  *
  * When fetching output from the $row, this construct should be used:
  * $data = $row->{$field->field_alias}
  *
  * The above will guarantee that you'll always get the correct data,
  * regardless of any changes in the aliasing that might happen if
  * the view is modified.
  */
?>
<?php 
/*print '<pre>';
print_r($row->node_data_field_depoimento_imagem_field_depoimento_imagem_data);
print '</pre>'; */
print "<img width='45px' height='45px' src='". $output ."'></img>";
//print $output; 
?>
<script language="javascript">
  $(document).ready(function(){
    jQuery('.pager-previous a').click(function(){
      jQuery('.field-content p').html('Carregando depoimento anterior...');
    });

    jQuery('.pager-next a').click(function(){
      jQuery('.field-content p').html('Carregando próximo depoimento...');
    });
  });
</script>