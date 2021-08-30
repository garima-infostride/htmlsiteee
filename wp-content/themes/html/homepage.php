<?php /* Template Name: HomePage Html */ ?>
<?php get_header();?>
    <section class="cartTemplate mt-100">
      <div class="container"> 
        <div class="outerCircle"></div>       
        <div class="row">          
          <div class="col-md-24 col-lg-8">
            <div class="cartLeft">
              <div class="pageTitle mb-4">
                <h2>Your Cart</h2>
              </div>
              <div class="productListing">
                <ul>
                  <li>
                    <div class="itemImage"><img src="./images/product.png" alt="logo"/></div>
                    <div class="itemDesc">
                        <div class="itemDescTop">
                          <div class="productName">
                            <h3>MGear EDC Gadget Wallet 3.0 - </h3>
                            <p>Customizable wallet with accessories</p>
                          </div>
                          <div class="productPrice"> $50.00 </div>                        
                        </div>
                        <div class="itemDescBottom">
                             <div class="btnQuantity"> 
                               <label class="quantityLabel" for="">Quantity:</label>
                               <span class="quantityUnit">1</span>
                               <button type="button" class="btn btn-secondary rounded-0 me-2"><i class="fas fa-minus"></i></button>
                               <button type="button" class="btn btn-secondary rounded-0"><i class="fas fa-plus"></i></button>
                             </div>  
                             <div class="btnRemove mt-3"> <button type="button" class="btn btn-secondary rounded-0">Remove</button> </div>  
                        </div>                      
                    </div>
                  </li>
                  <li>
                    <div class="itemImage"><img src="./images/product.png" alt="logo"/></div>
                    <div class="itemDesc">
                        <div class="itemDescTop">
                          <div class="productName">
                            <h3>MGear EDC Gadget Wallet 3.0 - </h3>
                            <p>Customizable wallet with accessories</p>
                          </div>
                          <div class="productPrice"> $50.00 </div>                        
                        </div>
                        <div class="itemDescBottom">
                             <div class="btnQuantity"> 
                               <label class="quantityLabel" for="">Quantity:</label>
                               <span class="quantityUnit">1</span>
                               <button type="button" class="btn btn-secondary rounded-0 me-2"><i class="fas fa-minus"></i></button>
                               <button type="button" class="btn btn-secondary rounded-0"><i class="fas fa-plus"></i></button>
                             </div>  
                             <div class="btnRemove mt-3"> <button type="button" class="btn btn-secondary rounded-0">Remove</button> </div>  
                        </div>                      
                    </div>
                  </li>                  
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-24 col-lg-4">
            <div class="cartRight">
              <h3>Summary</h3>
              <div class="coupenCode mt-3 mb-3 text-end">
                <input type="text" class="form-control rounded-0" placeholder="Enter coupon code" />
                <button type="button" class="btn btn-danger mt-3 rounded-0">Apply</button>
              </div>
              <div class="priceSummery mt-5">
                <ul>
                  <li><p>Subtotal</p><span>$50.00</span></li>
                  <li><p>Estimated Shipping</p><span>$10.00</span></li>
                  <li><p>Tax</p><span>$5.00</span></li>
                  <li><p>TOTAL</p><span>$65.00</span></li>
                </ul>
              </div>
              <div class="checkoutBox text-center mt-70">
                <button type="button" class="btn btn-danger mt-2 rounded-0 text-uppercase">Checkout</button>
                <div class="separatorText text-uppercase mt-3 mb-3">or</div>
                <button type="button" class="btn btn-light mt-2 rounded-0"><img src="./images/paypal.png" alt="logo"/></button>
              </div>
            </div>
          </div>        
        </div>
      </div>
    </section>
    <?php get_footer();?>