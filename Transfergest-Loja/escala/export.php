<?PHP
require_once'connect.php';
  function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }
  $filename = "transfer-algarve" . date('dmY') . ".xls";
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
   $flag = false;
   $sel_sql = "SELECT * FROM excel ORDER BY data_servico,hrs ASC";
   $result = mysqli_query($conn, $sel_sql);
   if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
    if(!$flag) {
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, 'cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }}
  exit;
?>