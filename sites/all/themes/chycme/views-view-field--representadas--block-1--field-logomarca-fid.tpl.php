<?php
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

<div class="representada-box representada-<?php print $row->nid; ?>">
<?php 
$query = db_query("SELECT nid FROM {content_type_product} WHERE field_produto_representada_nid = '". $row->nid ."' and field_produto_home_value = 1 LIMIT 4");
while ($produtos = db_fetch_array($query)) {
  $product_node = node_load($produtos['nid']);
  ?>
  <a href="<?php 
								if ($user->uid) { 
								  $url = url('produtos'); 
								} else {
								  $url = url('user/register');
								}
								print $url; ?>" class="product-box product-<?php print $product_node->nid; ?>">
	  <div>
		<div class='product-image'><img src="<?php print $product_node->field_image_cache[0]['filepath']; ?>"></img></div>
		<div class='product-title'><?php print $product_node->title; ?></div>
		<div class='product-price'><?php //print uc_price($product_node->sell_price); ?></div>
	  </div>
  </a>
  <?php
}
?>
</div>


