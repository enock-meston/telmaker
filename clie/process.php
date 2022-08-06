<?php 
session_start();
include '../include/condig.php';
    if(isset($_GET['status']))
    {
        //* check payment status
        if($_GET['status'] == 'cancelled')
        {
            // echo 'YOu cancel the payment';
            header('Location: index.php');
        }
        elseif($_GET['status'] == 'successful')
        {
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Authorization: Bearer FLWSECK-23ca881eed1bd2653f22e8c382fb4d85-X"
                ),
              ));
              
              $response = curl_exec($curl);
              
              curl_close($curl);
              
              $res = json_decode($response);
              if($res->status)
              {
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;
                $email = $res->data->customer->email;
                $username = $res->data->customer->name;
                if ($amountPaid == $amountToPay) {
                    $queryCharge= mysqli_query($con,"INSERT INTO `chargetransactiontbl`(`amount`, `client_email`, `client_username`) 
                    VALUES ('$amountPaid','$email','$username')");
                }
                ?>
<!-- html code -->

<?php

?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload with Progress Bar | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <header>Audio Uploading</header>
        <form action="#">
            <input class="file-input" type="file" accept=".mp3" name="file" hidden>
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Browse Audio to Upload</p>
        </form>
        <section class="progress-area"></section>
        <section class="uploaded-area"></section>

        <a href="uplSec.php" class="btn btn-primary">Next</a>
    </div>

    <script src="script.js"></script>

</body>

</html>


<?php 
   } 
?>


<!-- html code -->
<?php
                }
                else
                {
                    echo 'Fraud transactio detected';
                }
              }
              else
              {
                  echo 'Can not process payment';
              }
        
    
?>