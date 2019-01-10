<?php
/**
*   Escapes HTML for output
*
*
*/
session_start();

function escape($html){
  return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
 ?>
