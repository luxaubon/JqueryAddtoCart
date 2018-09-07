
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="css/style.min.css">
	
	<link rel="stylesheet" href="css/etalage.css"> <!-- VIEW IMAGE--->
	<link rel="stylesheet" href="css/lightslider.css"><!-- ADD CART IMAGE--->
	<!-- JS -->
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	

</head>

<body>
    <!-- Main Nav -->
    <nav class="main-nav navbar navbar-expand-lg">
        <h2 class="sr-only">
            Main Navigation
        </h2>
        <div class="container">
			<div class="cart-item ml-auto">
				<div class="lzd-nav-cart">
					<a href="#">
						<span id="shopping-cart">CART</span>
					</a>
				</div>
			</div>
        </div>
    </nav>
<br>
        <div class="content-area">
            <div class="container">
                <article class="product-detail">
                    <div class="row item">
                        <div class="col-md-4">
                            <div class="slider-zone">
                                <div class="slide-pc">
                                    <ul id="etalage">
										<li>
											<img class="etalage_source_image" src="image/newish.jpg">
											<img class="etalage_thumb_image img-cart" src="image/newish.jpg"> <!-- รูปที่จะแสดง ให้วิ่งไปที่ตะกร้า Class นี้ img-cart-->
										</li>
										<li>
											<img class="etalage_source_image" src="image/newish.jpg">
											<img class="etalage_thumb_image" src="image/newish.jpg">
                                   		</li>	
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="short-desc">
                                <div class="row">
                                    <div class="col-sm-2">
                                        จำนวน
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="col-sm-4" style="padding-bottom: 10px">
                                            <div class="input-group" style="width: 115px;">
                                                <input type="number" id="amount" class="form-control" min="1" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button id="AddCar" class="btn btn-primary "><i class="fal fa-shopping-cart"></i> เพิ่มสินค้าลงรถเข็น</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    <!-- Optional JavaScript -->
        <script src="js/jquery.etalage.min.js"></script><!-- VIEW IMAGE--->
        <script src="js/lightslider.js"></script><!-- ADD CART IMAGE--->
        <script>
        $(document).ready(function () {
			$('#etalage').etalage({
				thumb_image_width: 320,
				thumb_image_height: 320,
				small_thumbs:6,
				source_image_width: 900,
				source_image_height: 1200,
				autoplay: false,
				show_hint: true,
			});
			$('#image-gallery').lightSlider({
				gallery: true,
				item: 1,
				thumbItem: 6,
				slideMargin: 0,
				speed: 500,
				loop: true,
				onSliderLoad: function () {
					$('#image-gallery').removeClass('cS-hidden');
				}
			});
			
			$("#AddCar").click(function(){
				var qty = $("#amount").val();
				var pid = $("#id").val();
				var price = $("#price").val();
				var vat = $("#vat").val();
				if(qty == 0 ){
					$("#amount").focus();
				}else{
						 var cart = $("#shopping-cart");
						 var imgtodrag = $("#AddCar").closest('.item').find(".img-cart").eq(0);

						 if (imgtodrag) {
							 var imgclone = imgtodrag.clone().offset({
								 top: imgtodrag.offset().top,
								 left: imgtodrag.offset().left
							 }).css({
								 opacity: "0.5",
								 position: "absolute",
								 height: "150px",
								 width: "150px",
								 "z-index": "100"
							 }).appendTo($("body")).animate({
									 top: cart.offset().top + 10,
									 left: cart.offset().left + 10,
									 width: 75,
									 height: 75
								 },
								 1000,
								 "easeInOutExpo"
							 );

							 imgclone.animate({
									 width: 0,
									 height: 0
								 },
								 function() {
									 $(this).detach();
								 }
							 );
						 }

					/*$.ajax({
						type : "POST",
						url : "data.php?action=insertCart",
						cache : false,
						data : {pid:pid,qty:qty,price:price,vat:vat},
						success : function(data){

						},
						error : function(){
							alert("ERROR");	
						}
					});	*/


					}

				});
			
        });
        </script>
</body>

</html>
