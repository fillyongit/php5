<?php
function setExpires($expires) {
	header('Expires: '.gmdate('D, d M Y H:i:s', time()+$expires).'GMT');
}



setExpires(10);
echo ( 'This page will self destruct in 10 seconds<br />' );
echo ( 'The GMT is now '.gmdate('H:i:s').'<br />' );
echo ( '<a href="'.$_SERVER['PHP_SELF'].'">View Again</a><br />' );

echo '<hr />';
$d = gmdate('D, d M Y H:i:s', time());
echo $d;
$time = strtotime($d);
echo '<br />';
echo date('D, d M Y H:i:s', $time);

// Freshness directives:
// - Expires
// - Cache-Control: [max-age=(seconds) , must-revalidate, proxy-revalidate, no-cache, no-store, s-maxage=(seconds), public, private]

// Validation directives:
// - Last-Modified/If-Modified-Since
// - ETag/If-None-Match