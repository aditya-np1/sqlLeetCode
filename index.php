 
  <?php
  echo "hello!";
  if (isset($_COOKIE["DeviceId"]) && !empty($_COOKIE["DeviceId"])) {
    echo "hello in if code!";
    echo $_COOKIE["DeviceId"];
    header('Location: dashKOboard.html');
    exit; // It's good practice to exit after a header redirect
  } else {
    echo "hello in else code!";

    header('Location: index.html');
  } 