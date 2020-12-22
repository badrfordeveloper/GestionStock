<?php 

$linkName = '/home/websuspc/promo-shop-online.com/public/storage';

$target = '/home/websuspc/promo-shop-online.com/storage/app/public';

symlink($target, $linkName);

echo "success";

/*symlink('/public_html/ecom/storage/app/public', '/public_html/storage')
*/
 ?>