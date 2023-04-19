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
<?php echo MinifyTemplate(__DIR__ . '/template/navbar.php'); ?><?php echo MinifyTemplate(__DIR__ . '/template/navbar.php'); ?>
    <main class="page hire-me-page">
        <section data-aos="fade-up" class="portfolio-block hire-me">
            <div class="container">
                <div class="heading">
                    <h2 data-bs-hover-animate="pulse">BALANCE TOPUP</h2>
                </div>
                <form name="payment" method="post" action="" data-aos="flip-left" data-aos-duration="800">
                    <div class="form-group">
                        <label><b>Payment Method</b><br></label>
                        <select class="form-control" id="x-method">
                        </select>
                    </div>
                    <div class="form-group" id="TopupManual"></div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><b id="PaymentInputType">Amount</b></label>
                                <input class="form-control" type="number" name="x-number" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" min="1000" max="1000000" autocomplete="new-password" placeholder="Enter topup amount" required>
                            </div>
                            <input type="hidden" name="x-method" id="x-method-hide" hidden></input>
                            <div class="col-md-6 button"><button class="btn btn-primary btn-block" type="submit">Submit</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
<?php echo MinifyTemplate(__DIR__ . '/template/footer.php'); ?>
</body>
</html>