<?php
  $citylist = '';
  $citypresent = false;
  $inputreload_output = '';
  $converted_output = '';

  if(empty($_GET['citylist']) == true || isset($_GET['citylist']) == false) {
    $citypresent = false;
  } else {
    $citypresent = true;
    $citylist = $_GET['citylist'];
  }

  if($citypresent == true) {
    $text = trim($citylist);
    $text = explode ("\n", $text);

    if(count($text) > 0) {

      for ($x = 0; $x < count($text); $x++) {
        $islast = false;
        $current_text = trim($text[$x]);
  
        if($x + 1 == count($text)) {
          $islast = true;
        }
  
        $inputreload_output .= $current_text . "\n";
  
        if($islast == true) {
          $converted_output .= $current_text;
        } else if($islast == false) {
          $str_withcolon = $current_text . ':';
          $converted_output .= $str_withcolon;
        }
      }

    }

  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSA City List Conversion Tool</title>
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <div class="eccent_appcontainer">
    <form class="eccent_form" enctype="application/x-www-form-urlencoded">
        <h2>SSA City List Conversion Tool</h2>
        <div class="eccent_form_inputContainer"><textarea class="citylist" name="citylist" placeholder="List Cities like: City, State"><?php echo $inputreload_output ?></textarea></div>
        <div class="eccent_form_inputContainer"><input class="submitopt" type="submit" value="Submit"></div>
        <div class="eccent_form_inputContainer">
          <h4>Output:</h4>
          <div><?php echo $converted_output ?></div>
        </div>
    </form>
    </div>
  </body>
</html>