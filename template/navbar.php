<?php

$data = <<<EOD
<!-- Navbar -->
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient" data-aos="fade-down" data-aos-duration="800">
    <div class="container"><a class="brandlogo" href="#"><img src="https://cdn.discordapp.com/attachments/726492000869810276/1097908721616695427/logo_transparent.png" width="84" height="55" alt=""></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" data-aos="fade" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link text-muted" href="index.php"><i class="fas fa-home"></i>&nbsp;HOME</a></li>
EOD;
                if (isset($_SESSION['username'])) {
                    $data .= '<li class="nav-item" role="presentation"><a class="nav-link text-muted" href="shop.php"><i class="fas fa-shopping-basket"></i>&nbsp;SHOP</a></li>';
                    $q = Query('SELECT coins FROM clients where username = :user', array(':user'=>$_SESSION['username']));
                    $point = $q->fetchColumn();
                    $data .= '<li class="nav-item" role="presentation"><a class="nav-link text-muted" href="topup.php"><i class="fas fa-credit-card"></i>&nbsp;TOPUP</a></li>';
                    $data .= '<li class="nav-item" role="presentation"><a class="nav-link text-muted" href="history.php"><i class="fas fa-history"></i>&nbsp;HISTORY</a></li>';
                    $q = Query('SELECT type FROM clients where username = :user', array(':user'=>$_SESSION['username']));
                    $status = $q->fetchColumn();
                    if ($status == 'manager') {
                        $data .= '<li class="nav-item" role="presentation"><a class="nav-link text-muted" href="backend.php"><i class="fas fa-tachometer-alt"></i>&nbsp;1337</a></li>';
                    }
                }
                
                if (!isset($_SESSION['username'])) {
                    $data .= '<li class="nav-item" role="presentation"><a class="nav-link text-muted" href="login.php"><i class="far fa-user"></i>&nbsp;LOGIN</a></li>';
                    $data .= '<li class="nav-item" role="presentation"><a class="nav-link text-muted" href="register.php"><i class="fas fa-user-plus"></i>&nbsp;REGISTER</a></li>';
                }else{
                    $data .= '<li class="nav-item" role="presentation"><a class="nav-link text-muted" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;LOGOUT</a></li>';
                    $data .= '<li class="nav-item" role="presentation"><span class="nav-link"><span class="badge badge-light noselect"><i class="fas fa-coins"></i>&nbsp;Balance: IDR '.$point.'</span></span></li>';
                }
$data .= <<<EOD
            </ul>
        </div>
    </div>
</nav>
EOD;

return $data;

?>