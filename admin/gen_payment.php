<?php
require('../Receipt/vendor/autoload.php');
include "../include/dbconnect.php";
extract($_POST);
$query = "SELECT * FROM `payment` WHERE (added_on BETWEEN '$minDate' and '$maxDate')";
$res = mysqli_query($connect, $query);
// echo $id;
if (mysqli_num_rows($res) > 0) {
    $html='<style>
                    .heading{
                        font-size:24px; 
                        text-align:center;
                        margin-top:32px;
                        font-weight:bold;
                    }
                    .table{
                        margin-top:32px;
                        position: absolute;
                        left:50%;
                        transform:translateX(-50%);
                    }
                    th,td{
                        padding:6px 10px;
                        font-size:18px;
                        text-align:left;
                    }
                </style>
                <div class="heading">In2Goods users report</div>
                <table border=1 class="table">
                <tr>
                    <th width=100>User name</th>
                    <th width=80>Amount</th>
                    <th width=100>Car name</th>
                    <th width=100>Payment id</th>
                    <th width=100>Date of payment</th>
                    <th width=100>Payment status</th>
                </tr>';
                while($row=mysqli_fetch_array($res)){
                    $html.='<tr>
                                <td width=120>'.$row['name'].'</td>
                                <td width=240>'.$row['amount'].'</td>
                                <td width=120>'.$row['car_name'].'</td>
                                <td width=120>'.$row['payment_id'].'</td>
                                <td width=120>'.$row['added_on'].'</td>
                                <td width=120>'.$row['payment_status'].'</td>
                            </tr>';
                }
                $html.='</table>';
                //echo $html;
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $file = 'Payment_Report_' . time() . '.pdf';
            $mpdf->Output($file, 'D');
} else {
    $html = "Data not found";
}

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