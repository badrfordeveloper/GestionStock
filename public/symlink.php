<?php 

$linkName = '/home/websuspc/promo-shop-online.com/storage';

$target = '/home/websuspc/promo-shop-online.com/gestionstock/storage/app/public';

symlink($target, $linkName);

echo "success";

/*symlink('/public_html/ecom/storage/app/public', '/public_html/storage')
*/
 ?>