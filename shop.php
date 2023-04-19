<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

require_once(__DIR__ . '/include/Core.php'); 
require_once(__DIR__ . '/include/Config.php');
require_once(__DIR__ . '/include/PDOQuery.php');

?>
<!DOCTYPE html>
<html><head>
<?php echo MinifyTemplate(__DIR__ . '/template/header.php'); ?>
</head><body>
<?php echo MinifyTemplate(__DIR__ . '/template/navbar.php'); ?>
    <main class="page projects-page">
        <section data-aos="fade-up" class="portfolio-block projects-cards" style="padding:0px;">
            <div class="container" data-aos="flip-right" data-aos-duration="800" style="padding:100px 16px;">
                <div class="heading">
                    <h2 style="margin-top:0px;">Shop</h2>
                </div>
                <div class="row"><?php
                    $q = Query('SELECT * FROM products');
                    $result = $q->fetchAll();
                    foreach($result as $row) {
                        $product_id = $row['id'];
                        $product_name = $row['name'];
                        $product_desc = $row['description'];
                        $product_img = $row['image'];
                        $product_price = $row['price'];
                        $product_help = $row['help'];
                        $product_patt = $row['pattern'];
                        
                        $button_text = '??';
                        $stock_text = '??';
                        $q = Query('SELECT count(*) FROM stock WHERE type = :id AND owner = ""', array(':id'=>$product_id));
                        $result = $q->fetchColumn();
                        if ($result > 0) {
                            $stock_text = $result.' in Stock';
                        }else{
                            $stock_text = 'Out of stock';
                        }
                        
                        echo <<<EOD
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0"><a href="#"><img src="$product_img" alt="$product_name" style="height:245px"; class="card-img-top scale-on-hover"></a>
                            <div class="card-body">
                                <h6><a href="#">$product_name</a></h6>
                                <p class="text-muted card-text">IDR $product_price / $stock_text</p><button class="btn btn-primary" onclick="PurchaseModal($product_id)" type="button">Purchase</button></div>
                        </div>
                    </div>
EOD;
                    }
                ?></div>
            </div>
        </section>
    </main>
<?php echo MinifyTemplate(__DIR__ . '/template/footer.php'); ?>
<div id="modalContainer"></div>
</body>
</html>