<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>I-COUNT CKD</title>
    <style>
body{
	margin:0;
	color:#6a6f8c;
	background:#c8c8c8;
	font:600 16px/18px 'Open Sans',sans-serif;
}
#NAMA_LINE{
	background:#868688;
	color:#0b1131;
	font:600 16px/18px 'Open Sans',sans-serif;
}
.plan{
	width: 50px;
	text-align: center;
	background: none;
	border: none;
	font-size: 0.9em;
    font-family: sans-serif;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:700px;
	position:relative;
	background: url('yamaha R15.png') no-repeat center;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:10px 30px 10px 30px;
	background:rgba(40,57,101,.9);
}

.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}

.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}


.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}

.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:#1161ee;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.hr{
	height:0.1px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}

.styled-table {

    display:block;
    
    padding:30px;
    margin-top:50px;
    margin-left:10px;
    width:100px;
    height:180px;
    overflow:auto;

         
	width:100%;
	margin: auto;
	max-width:525px;
	min-height:30px;
	position:relative;
	
    border-collapse: collapse;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
	background:transparent;
    
    color:white;
}
.styled-table thead tr {
    background-color: #078b3a;
    color: #ffffff;
    text-align: center;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
	text-align: center;
}





    </style>

</head>
<body>  
     
    

    <div class="login-wrap">
    <div class="login-html">
<form action="" method="post">
<center>
    <h1 style="color:white;">I-COUNT CKD</h1>
<h2 style="font-size:15px;font-family: verdana;" id="jam"></h2>


</center>
    <div class="login-form">
    <div class="group">

                      
                        <!-- <label for="user" class="label">SEQ <br> -->
                            <!-- <select id="NAMA_LINE" type="text" name="seq" class="input" required tabIndex="1" autofocus > -->
                            <?php 
error_reporting(0);
if(isset($_POST['proses'])){
    $nama1 = $_POST['line'];
    $total_plan = $_POST['total_plan'];
    $tgl    =date("Y-m-d");
    
}


include "koneksi.php"; 
$data1= $_POST['model'];
$data2= $_POST['plan_case'];
$result = mysqli_query($koneksi, "select * from tb_input_seq"); 
$jsArray = "var prdName = new Array();\n"; 

echo  '<h6>Pilihan Model<h/6> : <select name="prdId" style="font-size:10px;"  onchange="changeValue(this.value)">'; 
echo '<option>. . . .</option>'; 
while ($row = mysqli_fetch_array($result)) { 
 echo '<option value="' . $row['model'] . '">' . $row['model'] .  '</option>'; 
 $jsArray .= "prdName['" . $row['model'] . "'] = {desc:'".addslashes($row['plan_case'])."',model:'".addslashes($row['model'])."'};\n"; 
// $jsArray .= "prdName['" . $row['kode'] . "'] = {miez:'" . addslashes($row['nama']) . "',de:'".addslashes($row['jk'])."',hard:'".addslashes($row['alamat'])."'};\n"; 
} 
echo '</select>'; 
?>

<?php

include "koneksi.php";
$sql = mysqli_query($koneksi,"SELECT count(casemark) AS jumlah1 FROM tb_data_seq WHERE line = '$nama1' AND tanggal = '$tgl' ");

while ($row =  mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
 $jumlah = $row['jumlah1'] +1 ;
?>
<?php
}
?>

<?php
$mulai="07:00:00"; //jam dalam format STRING
date_default_timezone_set('Asia/Jakarta');
 $selesai=date("H:i:s"); //jam dalam format DATE real itme

$mulai_time=(is_string($mulai)?strtotime($mulai):$mulai);// memaksa mebentuk format time untuk string
$selesai_time=(is_string($selesai)?strtotime($selesai):$selesai);

$detik=$selesai_time-$mulai_time; //hitung selisih dalam detik
 $menit=floor($detik/60); //hiutng menit
$sisa_detik=$detik%$menit; //hitung sisa detik
 " Mulai  : $mulai
";
 " Selesai: $selesai
";
" Waktu : $detik  detik=$menit  menit.$sisa_detik detik ";
?>
<!-- menghitung plan now  -->
<?php
 $plan_noww=$menit/(480/$total_plan);
?>
<!-- menghitung balance -->
<?php 
 $balances = ($jumlah-$plan_noww);
?>


    <form method="POST" action="">
    

        
    <h1 style="position:relative;"><select name="line" ></h1>
        <option value="<?= $nama1 ?>"><?= $nama1 ?></option>
        <option value="FRAME">FRAME</option>
        <option value="CKD_Line1">CKD_Line1</option>
        <option value="CKD_Line2">CKD_Line2</option>
        <option value="CKD_Line3">CKD_Line3</option>
        <option value="CKD_Line4">CKD_Line4</option>
        <option value="CKD_Line5">CKD_Line5</option>
        <option value="CKD_Line6">CKD_Line6</option>
        <option value="CKD_Line7">CKD_Line7</option>
        <option value="CKD_Line8">CKD_Line8</option>
        <option value="CKD_Line9">CKD_Line9</option>
        <option value="CKD_Line10">CKD_Line10</option>
        <option value="CKD_Line11">CKD_Line11</option>
        <option value="CKD_Line12">CKD_Line12</option>
        <option value="CKD_Line13">CKD_Line13</option>
        <option value="CKD_Line14">CKD_Line14</option>
        <option value="CKD_Line15">CKD_Line15</option>
        <option value="CKD_Line16">CKD_Line16</option>
        <option value="CKD_Line17">CKD_Line17</option>
        <option value="CKD_Line18">CKD_Line18</option>
        <option value="WHEEL_Line1">WHEEL_Line1</option>
        <option value="WHEEL_Line2">WHEEL_Line2</option>
        <option value="WHEEL_Line3">WHEEL_Line3</option>
        <option value="BP_Line1">BP_Line1</option>
        <option value="BP_Line2">BP_Line2</option>
        <option value="BP_Line3">BP_Line3</option>
        <option value="BP_Line4">BP_Line4</option>
        <option value="BP_Line5">BP_Line5</option>
        <option value="BP_Line6">BP_Line6</option>
        <option value="BP_Line7">BP_Line7</option>
        <option value="BP_Line8">BP_Line8</option>
        <option value="BP_Line9">BP_Line9</option>
        <option value="CP_Line1">CP_Line1</option>
        <option value="CP_Line2">CP_Line2</option>
        <option value="CP_Line3">CP_Line3</option>
        <option value="BIG_ENGINE">BIG_ENGINE</option>
        <option value="PACKING_ENGINE">PACKING_ENGINE</option>
        <option value="PACKING_CKD">PACKING_CKD</option>


    </select>     


    <table border="0">






<tr><td><h2 style="color:white;position:relative;font-size:12px;">CASEMARK : </td><td><input style="border-radius:5px;text-align:center;background-color:transparent;color:white;" type="text" name="casemark" placeholder="input here" required tabIndex="1" autofocus /></h2></td></tr>
<tr><td><h2 style="color:white;position:relative;font-size:12px;" class="lot">MODEL : </td><td><input style="border-radius:5px;text-align:center;background-color:transparent;color:white;" type="text" name="model" id="model"   value="<?= $data1 ?>" /></h2></td></tr>
<tr><td><h2 style="color:white;position:relative;font-size:12px;" class="plan-total">PLAN CASE : </td><td><input style="border-radius:5px;text-align:center;background-color:transparent;color:white;" type="text" name="plan_case" id="plan_case"  value="<?= $data2 ?>"/></h2></td></tr>
<tr><td><h2 style="color:white;position:relative;font-size:12px;" class="">Urgent : </td><td><input style="border-radius:5px;text-align:center;background-color:transparent;color:white;" type="text" name="urgent" id="urgent"   /></h2></td></tr>


<tr><td><h2 style="color:white;font-size:10px;position:relative;bottom:165px;left:284px;" class="">Total Plan : </h2></td></tr>
<td><input style="border-radius:5px;text-align:center;background-color:transparent;color:white;position:relative;bottom:192px;left:280px;width:90px;height:70px;font-size:30px;" type="text" name="total_plan" required tabIndex="2" placeholder=". . ." value="<?= $total_plan ?>" />
<tr><td><h2 style="color:white;font-size:10px;position:relative;bottom:273px;left:384px;" class="">Plan Now : </h2></td></tr>
<td><input style="border-radius:5px;text-align:center;background-color:transparent;color:white;position:relative;bottom:300px;left:380px;width:90px;height:70px;font-size:30px;" type="text" name="plan_now" value="<?= floor($plan_noww) ?>"  />
<tr><td><h2 style="color:white;font-size:10px;position:relative;bottom:293px;left:285px;">Actual : </h2></td></tr>
<td><input style="border-radius:5px;text-align:center;background-color:transparent;color:white;position:relative;bottom:319px;left:280px;width:90px;height:70px;font-size:30px;" type="text" name="actual"  value="<?=  $jumlah ?>" />
<tr><td><h2 style="color:white;font-size:10px;position:relative;bottom:400px;left:384px;">Balance : </h2></td></tr>
<td><input style="border-radius:5px;text-align:center;background-color:transparent;color:white;position:relative;bottom:426px;left:380px;width:90px;height:70px;font-size:30px;" type="text" name="balance"  value="<?=  ceil($balances) ?>" />
<tr><td><h6 style="color:white;position:relative;bottom:640px;left:-2px;font-size:10px;" class="seq">Line .. </b></h6></td></tr>

</table>
<!-- lot = prod_name // plan-total = prod_dec  -->

<div>
<input style="position:relative;bottom:445px;" type="submit" class="button" name="proses" value="INPUT">
</div>
<script type="text/javascript"> 
<?php echo $jsArray; ?>
function changeValue(id){
document.getElementById('model').value = prdName[id].model;
document.getElementById('plan_case').value = prdName[id].desc;
};
</script>
</form>


                            <!-- </select> -->

                        <!-- </label> -->
                        <script>  
                            function Enternama(event){  // fungsi saat tombol enter  
                                if(event.keyCode == 13 || event.which == 13){  
                                document.getElementById('').focus();  
                                }   
                            }  
                           
                        </script>
                        
                    </div>
                    
                    <!-- <div class="group">
                        <label for="pass" class="label">Model</label>
                        <input id="user" type="text" name="model" class="input" required tabIndex="2">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Plan Case</label>
                        <input id="user" type="text" name="plan_case" class="input" required tabIndex="3">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Casemark</label>
                        <input id="user" type="text" name="casemark" class="input" required tabIndex="4">
                    </div> -->
                    
                    <!-- <div class="group">
                        <input type="submit" class="button" name="proses" value="INPUT">
                    </div> -->
                   <BR>
                   
                    <?php
                    include "koneksi.php";
                                       
                    if (isset($_POST['proses'])) {
                        
                        $set_jam = '60'; 
                        $set_menit = '04'; ///untuk setting selisih 4 menit 
                        $waktu_indonesia = time() + (60 * 60 * 7) ;
                        $waktu_yamaha = time() + (60 * 60 * -1) + (60 * 120) ;
                        $tanggal_yamaha_def = gmdate('Y-m-d', $waktu_yamaha);
                        $jam_ori = gmdate('H:i:s', $waktu_indonesia);
                        $jam_oriw = gmdate('H:i', $waktu_indonesia);
                        $tanggal_ori = gmdate('Y-m-d', $waktu_indonesia);
                        $nama_tahun = gmdate('Y', $waktu_indonesia);
                        $hari=gmdate('D', $waktu_indonesia);
                        $nama_bulan = gmdate('M-Y', $waktu_indonesia);
                        $nama_tgl = gmdate('d-m-y', $waktu_indonesia);
                        $nama_hari=gmdate('D', $waktu_indonesia);
                        $tanggal_home=gmdate(', d/m/Y  H:i:s', $waktu_indonesia);
                        $bulan_nama2 = gmdate('M', $waktu_indonesia);


                        $casemark = $_POST['casemark'];
                        $line = $_POST['line'];
                        $model = $_POST['model'];
                        $plan_case = $_POST['plan_case'];
                        $urgent = $_POST['urgent'];
                        
                        
                        $update = mysqli_query($koneksi,"INSERT INTO tb_data_seq SET casemark='$casemark',tanggal ='$tanggal_ori',line='$line',model='$model',plan_case='$plan_case',urgent='$urgent'");
                     }
                    ?>



                    
                  
<?php
include "koneksi.php";
$line = $_POST['line'];
$total_plan = $row['total_plan'];
    $plan_now = $row['plan_now'];
    $actual = $row['actual'];
    $balance = $row['balance'];
    

   if (isset($_POST['proses'])) {
     $total_plan = $_POST['total_plan'];
     $plan_now = $_POST['plan_now'];
     $actual = $_POST['actual']+1;
     $balance = $_POST['balance']+1;
     
     
     $update = mysqli_query($koneksi,"UPDATE tb_dashboard SET total_plan='$total_plan',plan_now='$plan_now',actual='$actual',balance='$balance' WHERE line = '$line' ");
  }
  ?>


<?php
include "koneksi.php";
$line = $_POST['line'];
$total_plan = $row['total_plan'];
    $plan_now = $row['plan_now'];
    $actual = $row['actual'];
    $balance = $row['balance'];
    

   if (isset($_POST['proses'])) {
    $set_jam = '60'; 
    $set_menit = '04'; ///untuk setting selisih 4 menit 
    $waktu_indonesia = time() + (60 * 60 * 7) ;
    $waktu_yamaha = time() + (60 * 60 * -1) + (60 * 120) ;
    $tanggal_yamaha_def = gmdate('Y-m-d', $waktu_yamaha);
    $jam_ori = gmdate('H:i:s', $waktu_indonesia);
    $jam_oriw = gmdate('H:i', $waktu_indonesia);
    $tanggal_ori = gmdate('Y-m-d', $waktu_indonesia);
    $nama_tahun = gmdate('Y', $waktu_indonesia);
    $hari=gmdate('D', $waktu_indonesia);
    $nama_bulan = gmdate('M-Y', $waktu_indonesia);
    $nama_tgl = gmdate('d-m-y', $waktu_indonesia);
    $nama_hari=gmdate('D', $waktu_indonesia);
    $tanggal_home=gmdate(', d/m/Y  H:i:s', $waktu_indonesia);
    $bulan_nama2 = gmdate('M', $waktu_indonesia);


     $total_plan = $_POST['total_plan'];
     $plan_now = $_POST['plan_now'];
     $actual = $_POST['actual']+1;
     $balance = $_POST['balance']+1;
     
     
     $inserting = mysqli_query($koneksi,"INSERT INTO tb_dashboard_all SET total_plan='$total_plan',plan_now ='$plan_now',actual='$actual',balance='$balance',line='$line',tanggal='$tanggal_ori'");
  }
  ?>

           <div style="position:relative;bottom:540px;" class="hr"></div>
                    <div class="group">
                        <label style="position:relative;bottom:580px;" for="pass" class="label">Production Result</label>
                
                    </div>
                   
                    <table style="position:relative;bottom:580px;" class="styled-table" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Model</th>                               
                                <!-- <th>Casemark</th> -->
                                <th>Plan Case</th>
                                <th>Line</th>

                            </tr>
                        </thead>
                        <?php
                            include "koneksi.php";
                            $tgl=date("Y-m-d");
                            $no=1;
                            $ambildata = mysqli_query($koneksi,"SELECT * FROM tb_data_seq where tanggal='$tgl'");
                                while($tampil = mysqli_fetch_array($ambildata)){
                                ?>
                               
                                <tr>
                                        <!-- <td>$no</td> -->
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $tampil['model']; ?></td>
                                       
                                        <td><?php echo $tampil['plan_case']; ?></td>
                                        <td><?php echo $tampil['line']; ?></td>
                                    </tr>
                                <?php    
                            }
                        ?>                      
                    </table>                     
                </div>
                </div> 
        </div>
    </div>
</form>

<script type="text/javascript">
 window.onload = function() { jam(); }

function jam() {
 var e = document.getElementById('jam'),
 d = new Date(), h, m, s;
 h = d.getHours();
 m = set(d.getMinutes());
 s = set(d.getSeconds());

 e.innerHTML = h +':'+ m +':'+ s;

 setTimeout('jam()', 1000);
}

function set(e) {
 e = e < 10 ? '0'+ e : e;
 return e;
}
$(document).on('keypress', 'input,select', function (e) {
    if (e.which == 13) {
        e.preventDefault();
        var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
        console.log($next.length);
        if (!$next.length) {
       $next = $('[tabIndex=1]');        }
        $next.focus() .click();
    }
});

    </script>

<form method="post">
<!-- <a  style="position:relative;top:-570px;margin-left:910px;border-radius:5px;background-color:white;color:black;" href="hapusdata.php">. clear .</a>  -->
<!-- <img style="width:40px;height:40px;position:relative;bottom:610px;left:950px;" src="d.png" href="hapussatu.php"> -->
<a href="test.php"><img src="d.png" style="width:30px; height:30px;position:relative;bottom:600px;left:950px;"></a>

</form>
</body>
</html>

