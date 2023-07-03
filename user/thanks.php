<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../database/connection.php');

require '../mail/PHPMailer/src/PHPMailer.php';
require '../mail//PHPMailer/src/SMTP.php';
require '../mail//PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// echo "<pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email address entered by the user
    // $email = $_POST['email'];
    // $cart_data = unserialize($_POST['cart_data']);

    // $user_id = $_POST['user_id'];
    // $user_email = $_POST['user_email'];
    // $invoiceNumber = $_POST['invoiceNumber'];
    // $fullname = $_POST['user_name'];
    // $combined_address = $_POST['combined_address'];


    // Perform server-side validation and sanitization for each field
    $user_id = isset($_POST['user_id']) ? htmlentities($_POST['user_id']) : '';
    $user_email = isset($_POST['user_email']) ? htmlentities($_POST['user_email']) : '';
    $invoiceNumber = isset($_POST['invoiceNumber']) ? htmlentities($_POST['invoiceNumber']) : '';
    $fullname = isset($_POST['user_name']) ? htmlentities($_POST['user_name']) : '';
    $combined_address = isset($_POST['combined_address']) ? htmlentities($_POST['combined_address']) : '';

    // Deserialize and validate the cart data
    $cart_data = isset($_POST['cart_data']) ? unserialize($_POST['cart_data']) : array();


    // Function to check if invoice number exists
    function isInvoiceNumberExists($conn, $invoiceNumber)
    {
        $query = "SELECT invoice_id FROM orders WHERE invoice_id = '$invoiceNumber'";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result) > 0;
    }

    // Generate a random digit from 1 to 10
    function generateRandomDigit()
    {
        return rand(1, 10);
    }

    // Check if the invoice number already exists
    while (isInvoiceNumberExists($conn, $invoiceNumber)) {
        $invoiceNumber .= generateRandomDigit(); // Append a random digit to the invoice number
    }
    $cart_count = count($cart_data);

    $total = 0;
    foreach ($cart_data as $item) {


        if ($item['delivered'] === 'Not Delivered') {
            $quantity = $item['product_Quantity'];
            $rate = $item['product_rate'];
            $subtotal = $quantity * $rate;
            $total += $subtotal;
        }
    }

    $sub_total = number_format($total, 2);
    $total += 20;

    $cart_data = serialize($cart_data);
    $date = date("M. d, Y");
    // echo $date;
    $date_next = date("M. d, Y", strtotime("+5 days"));
    // echo $date_next;

    // echo "<pre>";
    // print_r($user_email);
    // print_r($combined_address);


    // print_r($fullname);
    // print_r($cart_data);
    // print_r($invoiceNumber);

    // die;
    // Instantiate PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Specify SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'parmar3259@gmail.com';
        $mail->Password = 'leughvmjolmgrlyo';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom('parmar3259@gmail.com', 'hardik parmar');
        $mail->addAddress($user_email);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        // $mail->Debugoutput = function ($str, $level) {

        //     echo "Debug level $level; message: $str";
        // };

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Your Purchase is Confirmed! Get Set to Unleash Your Style with Phulkari Eva!';


        // $mail->Body = 'This is a test email sent from PHPMailer.';

        // Embed the image in the email
        $mail->Body = '<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">

 <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">

 </div>

 <table border="0" cellpadding="0" cellspacing="0" width="100%">
   <tr>
     <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">

       <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
         <tr>
           <td align="center" height="6" style="background-image: linear-gradient(to right, #b91bAb, #5a3aa5); background-color: #b91bAb;" bgcolor="#b91bAb"></td>
         </tr>
       </table>
       <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
       <tr>
       <td align="center" valign="top" style="background-color: #23C467; font-size:0; padding: 35px 35px 0;" bgcolor="#23C467">
         <div class="align-center" style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
           <table class="align-center" align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
             <tr>
               <td align="left" height="48" valign="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size:48px; font-weight: 800; line-height: 48px;" class="mobile-center">
                 <h1 style="font-size: 0; line-height: 0; font-weight: 600;  margin: 0; color: #ffffff;"><span></span></h1>
               </td>
             </tr>
           </table>
         </div>
      
         <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
           <table align="right" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
             <tr>
               <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                 <table cellspacing="0" cellpadding="0" border="0" align="right">
                  
                 </table>
               </td>
             </tr>
           </table>
         </div>
       </td>
     </tr>
     
         <tr>
           <td align="center" style="padding: 0 15px 20px 15px; background-color: #ffffff;" bgcolor="#ffffff">
          
             <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
               <tr>
                 <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                   <img src="https://phulkarieva.live/user/assets/images/tickmark.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                   <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                             Thank You For Your Order!
                         </h2>
                 </td>
               </tr>
               <tr>
                 <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                   <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777; padding: 0 30px;">
                   Thank you for placing your order with us! We are thrilled to confirm your purchase and appreciate your business. Below, you will find the details of your order:
                   </p>
                 </td>
               </tr>
               <tr>
                 <td align="left" style="padding-top: 20px;">
                   <table cellspacing="0" cellpadding="0" border="0" width="100%">
                     <tr>
                       <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                         Invoice #
                       </td>
                       <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                         ' . $invoiceNumber . '
                       </td>
                     </tr>
                     <tr>
                       <td width="45%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                         Order Date
                       </td>
                       <td width="55%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 15px 10px 5px 10px;">
                       ' . $date . '
                       </td>
                     </tr>
                     <tr>
                       <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                         Customer
                       </td>
                       <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px 10px;">
                       ' . $fullname . '
                       </td>
                     </tr>
               
                     <tr>
                       <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 700; line-height: 24px; padding: 20px 10px 5px 10px;">
                         <span style="font-style: italic;">Purchased Item</span> (' . $cart_count . ')
                       </td>
                       <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 20px 10px 5px 10px;">
                       ₹' . $sub_total . '
                       </td>
                     </tr>
                     <tr>
                       <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                         Shipping + Handling
                       </td>
                       <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; line-height: 24px; padding: 5px 10px;">
                       ₹20.00
                       </td>
                     </tr>
                  
                   </table>
                 </td>
               </tr>
               <tr>
                 <td align="left" style="padding-top: 20px;">
                   <table cellspacing="0" cellpadding="0" border="0" width="100%">
                     <tr>
                       <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                         TOTAL
                       </td>
                       <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                       ₹' . $total .'.00
                       </td>
                     </tr>
                   </table>
                 </td>
               </tr>
             </table>
       
           </td>
         </tr>
         <tr>
           <td align="center" height="100%" valign="top" width="100%" style="padding: 0 15px 5px 15px; background-color: #ffffff;" bgcolor="#ffffff">
          
             <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
               <tr>
                 <td align="center" valign="top" style="font-size:0;">
                 
                   <div class="mw-50" style="display:inline-block; padding-bottom: 15px; vertical-align:top; width:100%;">

                     <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                       <tr>
                         <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 0 10px;">
                           <p style="font-weight: 800;">Delivery Address</p>
                           <p>  ' . $combined_address . '</p>
                         </td>
                       </tr>
                     </table>
                   </div>
            
                   <div class="mw-50" style="display:inline-block; padding-bottom: 15px; vertical-align:top; width:100%;">
                     <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                       <tr>
                         <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 0 10px;">
                           <p style="font-weight: 800;">Estimated Delivery Date</p>
                           <p>  ' . $date_next . ' </p>
                         </td>
                       </tr>
                     </table>
                   </div>
                
                 </td>
               </tr>
             </table>
    
           </td>
         </tr>      
         <tr>
           <td align="center" style="padding: 35px 35px 15px; background-color: #ffffff;" bgcolor="#ffffff">
         
           <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
  <tr>
    <td align="center" style="line-height: 0;">
      <img src="https://phulkarieva.live/user/assets/images/thankyou.png" width="200" height="200" style="display: block; border: 0px;" />
    </td>
  </tr>
</table>

            
           
           </td>
         </tr>
       </table>
       
     </td>
   </tr>
 </table>

</body> ';







        $sql = "INSERT INTO orders (user_id, user_email, invoice_id, cart_data, date) 
            VALUES ('$user_id', '$user_email', '$invoiceNumber', '$cart_data', NOW())";

        if (mysqli_query($conn, $sql)) {
            $deleteCartQuery = "DELETE FROM cartdata WHERE user_id = '$user_id'";
            if (mysqli_query($conn, $deleteCartQuery)) {

                $mail->send();
                echo "done";
            } else {
                echo "Error deleting cart data: " . mysqli_error($conn);
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo 'Error: ' . $mail->ErrorInfo;
    }
}










?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>phulkari eva - Contact</title>
    <?php
    include('./cssfiles.php');
    ?>
</head>

<body>



    <!-- Header -->
    <?php
    include('./navbar.php');
    ?>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Contact Us</h1>
            <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

    <!-- Start Map -->
    <div class="map-container">
        <div class="map-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.914598046272!2d73.31155001497917!3d28.019438082597473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb3ac7ae090d72971!2sPradeep%20Balaji%20Enterprises!5e0!3m2!1sen!2sin!4v1645428683381!5m2!1sen!2sin" width="100" height="100" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>



    <!-- End Map -->

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Name</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Subject</label>
                    <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Subject">
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Message</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Message" rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Let’s Talk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->

    <?php
    include('./footer.php');
    ?>
</body>

</html>