<?php

$file = 'email.txt';

$current = file_get_contents($file);

// Append new content to file with $current .= $string and \n to jump line

file_put_contents ($file, $current);
?>
