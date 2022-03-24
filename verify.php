<?php
    // require_once 'config/db.php';
    $conn = new mysqli('localhost', 'root', '', 'pageant') or die('Failed to connect to MySQLi'. $conn->connect_error);
    $ref = $_GET['reference'];
    $user_id = (int)$_GET['id'];

    // if (count($_GET) < 2) {
    //     header('location: ./');
    // }

    if (!$ref && $user_id < 1) {
        header('location: ./');
    }

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurldecode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_1732dccd2629ac0c249bf65a583a28fb671b0c3b",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $result = json_decode($response);
    if ($result->data->status == 'success') {
        $sql = "select vote_count from contestants where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->bind_result($vote_count);
        $stmt->fetch();
        $stmt->close();

        $vote_count = $vote_count + 1;
        $sql = "UPDATE `contestants` SET `vote_count` = ? WHERE `contestants`.`id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $vote_count, $user_id);
        if ($stmt->execute()) {
          header('location: ./');
          // echo "<script>alert('Voted')</script>";
        }
        
    }
  }
?>