<?php
$msg = "";
$msg_class = "";
$conn = mysqli_connect("localhost", "root", "", "img-upload");
if (isset($_POST['save_profile'])) {
  // for the database
  $bio = stripslashes($_POST['bio']);
  $originalFileName = basename($_FILES["profileImage"]["name"]);
  $profileImageName = time() . '-' . $originalFileName;
  // For image upload
  $target_dir = "images/";
  $target_file = $target_dir . $profileImageName; // This will be the new unique filename

  // VALIDATION
  // validate image size. Size is calculated in Bytes
  if ($_FILES['profileImage']['size'] > 1000000) {
    $msg = "Image size should not be greater than 1Mb";
    $msg_class = "alert-danger";
  } else {
    // Check if a file with the same original name already exists
    // Construct a pattern to search for: images/*-originalfilename.ext

    // Escape glob special characters in the original filename
    $globSafeOriginalFileName = "";
    for ($i = 0; $i < strlen($originalFileName); $i++) {
      $char = $originalFileName[$i];
      if ($char === '*' || $char === '?' || $char === '[' || $char === ']') {
        $globSafeOriginalFileName .= '[' . $char . ']'; // Use [char] to match literal special char
      } else {
        $globSafeOriginalFileName .= $char;
      }
    }
    $pattern = $target_dir . '*-' . $globSafeOriginalFileName;

    if (!empty(glob($pattern))) {
      $msg = "File dengan nama '" . htmlspecialchars($originalFileName) . "' sudah ada.";
      $msg_class = "alert-danger";
    }
  }
  // Upload image only if no errors
  if ($msg_class !== "alert-danger") {
    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
      $sql = "INSERT INTO users SET profile_image='$profileImageName', bio='$bio'";
      if (mysqli_query($conn, $sql)) {
        $msg = "Image uploaded and saved in the Database";
        $msg_class = "alert-success";
      } else {
        $msg = "There was an error in the database: " . mysqli_error($conn);
        $msg_class = "alert-danger";
      }
    } else {
      $msg = "There was an error uploading the file";
      $msg_class = "alert-danger";
    }
  }
}
