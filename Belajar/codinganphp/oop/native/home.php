<?php
require ('koneksi.php');
// $email = $_GET['user_fullname'];
session_start();

if(!isset($_SESSION['id'])){
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];
?>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Selamat Datang <?php echo $sesName;?></h1>
    <table border='1'>
        <tr>
            <td>No</td>
            <td>Email</td>
            <td>Nama</td>
            <td>Action</td>
        </tr>
        <?php
            $query = "SELECT * FROM user_detail";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
            
            if($sesLvl == 1){
                $dis = "";
            } else{
                $dis = "disabled";
            }
            while($row = mysqli_fetch_array($result)){
                $userMail = $row['user_email'];
                $userName = $row['user_fullname'];
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $userMail; ?></td>   
            <td><?php echo $userName; ?></td>   
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">
                    <input type="button" value="edit"<?php echo $dis;?>></a>
                <a href="hapus.php?id=<?php echo $row['id']; ?>">
                    <input type="button" value="hapus"<?php echo $dis;?>></a>
            </td>      
        </tr>
        <?php
            $no++;
        }
        ?>
        </table>
        <p><a href="logout.php">Logout</p>   
</body>
</html>