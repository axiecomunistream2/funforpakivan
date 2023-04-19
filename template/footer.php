<?php
return <<<EOD
<!-- Footer -->
<footer data-aos="fade-up" class="page-footer" style="background-repeat:no-repeat;padding:0px;height:650px;">
    <section data-aos="fade-up" data-aos-duration="1000" class="portfolio-block mobile-app gradient" style="background-size:auto;background-repeat:no-repeat;">
        <div class="container align-items-center">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-3 offset-lg-2">
                    <div data-bs-hover-animate="pulse" class="portfolio-phone-mockup">
                        <div class="phone-screen" style="background-image:url(&quot;assets/img/minekie.png&quot;);background-repeat:round;background-size:auto;"></div>
                        <div class="home-button"></div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 text text-dark" data-aos="flip-up" data-aos-duration="800">
                    <h3><br><strong>What is Fun?</strong><br></h3>
                    <p>Fun is the best shop for Blox Fruits account. We provide high quality account and 100% safe.<br></p>
                </div>
            </div>
        </div>
    </section>
    <div class="container" data-aos="zoom-in-up" data-aos-duration="1000" style="padding:50px 15px;height:160px;">
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <div class="links"><a href="index.php">Home</a><a href="shop.php">Shop</a></div>
        <div class="social-icons"><a href="https://www.facebook.com/MinekieShop2"><i class="fab fa-instagram"></i></a>
        <!--a href="#"><i class="icon ion-ios-contact"></i></a-->
        <a href="https://m.me/MinekieShop2"><i class="fab fa-discord"></i></a></div>
    </div>
</footer>
<script type="text/javascript">
var ddData = [
    {
        text: "  Wallet  ",
        value: "tw",
        selected: false,
        description: "  โอนเงินผ่านแอพพลิเคชั่นทรูมันนี่วอเล็ท  ",
        imageSrc: "assets/img/payment/wallet.png"
    },
    {
        text: "  TrueMoney  ",
        value: "tm",
        selected: false,
        description: "  บัตรเงินสดทรูมันนี่  ",
        imageSrc: "assets/img/payment/truemoney.png"
    }
];
$('#x-method').ddslick({
    data: ddData,
    width: 300,
    imagePosition: "left",
    selectText: "โปรดเลือกช่องทางการชำระเงิน",
    onSelected: function (data) {
        PaymentMethodChange(data);
        $('#x-method-hide').val(data.selectedData.value);
    }
});
</script>
EOD;
?>