<?php
$d = new DateTime( 'NOW', new DateTimeZone('Europe/Brussels') );

$d->sub( new DateInterval('P7D'));
print $d->format('Y-m-d H:i:s') . "<br>";