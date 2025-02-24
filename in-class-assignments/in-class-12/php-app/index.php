<?php

if ($_SERVER['REQUEST_URI'] == '/html') {
  echo '
      <div>
        <b>HTML content</b>
      </div>
      ';
} else if ($_SERVER['REQUEST_URI'] == '/json') {
  $json = ['cat'];

  echo json_encode($json);
}

?>