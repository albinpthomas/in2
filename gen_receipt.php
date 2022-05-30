<?php
require_once __DIR__ . '/Receipt/vendor/autoload.php';
include "./include/dbconnect.php";
$res = mysqli_query($connect, "SELECT * FROM payment ORDER BY `id` DESC LIMIT 1");
$data = mysqli_fetch_assoc($res);
$id = $data['id'];
// echo $id;
if (mysqli_num_rows($res) > 0) {
    $html = '<style>.tble{border:1px solid black;border-width:1;}.hd{font-size:20px;font-weight:800;text-align:center;}</style><p class="hd">Receipt - In2Goods</p><p>Order Date: ' . $data['added_on'] . '</p><table class="tble">';
    $html .= '<tr><style>.tdata{border:1px solid black;padding:6px 16px;}</style><td class="tdata">Transaction Id</td><td class="tdata">Customer Name</td><td class="tdata">Car Name</td><td class="tdata">Amount</td><td class="tdata">Payment Status</td></tr>';
    // while ($row=mysqli_fetch_array($res)){
    // $spid = $row['id'];
    // $spid = $data['productId'];
    // $pt = mysqli_query($con, "SELECT * FROM products WHERE id=$spid");
    // $ndata = mysqli_fetch_assoc($pt);
    $html .= '<tr><td class="tdata">' . $data['payment_id'] . '</td><td class="tdata">' . $data['name'] . '</td><td class="tdata">' . $data['car_name'] . '</td><td class="tdata">' . $data['amount'] . '</td><td class="tdata">' . $data['payment_status'] . '</td></tr>';
    // }
    $html .= '</table>';
} else {
    $html = "Data not found";
}
echo $html;
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = 'Receipt_' . time() . '.pdf';
$mpdf->Output($file, 'D');
?>


<!-- $mpdf = new \Mpdf\Mpdf();
$data = '';
$data .= '<div class="card">
    <h1>Waste Management</h1>';
    $data .= '<div class="crntdate">
        <h4>BILL</h4>
    </div>';
    $data .= '<p> Email :' . $email.'</p>';
    $data .= '<p> description :Advance Payment</p>';
    $data .= '<p> Amount :' . $amount.'</p>';
    $data .= '<p> Date and time :' . $date.'</p>
</div>';
$mpdf->WriteHTML($data);
$mpdf->Output('idcard.pdf','D');
?> -->