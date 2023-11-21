    <!-- Header-->
    <header class=" py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center ">
                <div class="container">
                    <div class="d-flex justify-content-center align-items-center mt-5"> <button class="btn btn-dark">OUR CATEGORIES</button> </div>
                    <div class="d-flex justify-content-center mt-3"> <span class="text text-center">Finding Best Products Now<br> in Your Fingertips</span> </div>
                    <div class="row mt-2 g-4">
                        <div class="col-md-3">
                            <div class="card p-1">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="flex-column lh-1 imagename"> <span>กับข้าว</span> </div>
                                    <div> <img src="assets/img/buyer/side_dish.webp" height="100" width="100" /> </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-3">
                            <div class="card p-2tr5">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="flex-column lh-1 imagename"> <span>เมนูเส้น</span></div>
                                    <div> <img src="assets/img/buyer/Noodle.jpg" height="100" width="100" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-2">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="flex-column lh-1 imagename"> <span>มังสวิรัติ,เจ</span> </div>
                                    <div> <img src="assets/img/buyer/vegan.jpg" height="100" width="100" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-2">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="flex-column lh-1 imagename"> <span>ข้าวผัด</span></div>
                                    <div> <img src=" assets/img/buyer/rice.jpg" height="100" width="100" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-2">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="flex-column lh-1 imagename"> <span>อิ่นๆ</span> </div>
                                    <div> <img src="assets/img/buyer/foods.jpg" height="100" width="100" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-2">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="flex-column lh-1 imagename"> <span>สแน็คบ๊อก</span> </div>
                                    <div> <img src="assets/img/buyer/snackbox.jpg" height="100" width="100" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-2">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="flex-column lh-1 imagename"> <span>ของทานเล่น</span></div>
                                    <div> <img src=" assets/img/buyer/sweetfoods.jpg" height="100" width="100" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-2">
                                <a href="{{ route('drink') }}"
                                    <div class="d-flex justify-content-between align-items-center p-2">
                                        <div class="flex-column lh-1 imagename"> <span>เครื่องดื่ม</span></div>
                                        <div> <img src="assets/img/buyer/drinks.png" height="100" width="100" /> </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($data as $itemsidedish)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{$itemsidedish->product_image}}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <input type="hidden" id="{{$itemsidedish->product_id}}">
                                <h5 class="fw-bolder">{{$itemsidedish->product_name}}</h5>
                                <!-- Product price-->
                                {{$itemsidedish->product_price}}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Special Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- ======= Our Team Section ======= -->
<section id="team" class="team">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>ผู้พัฒนา</h2>
            <p> ทดลองทำเว็บด้วยเฟรมเวิค lavarel กับหลังบ้าน php </p>
        </div>

        <div class="row gy-4 justify-content-center">

            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="member">
                    <img src="home_assets/ohm.jpg" class="img-fluid" alt="">

                    <h4 style="color: rgb(255, 255, 255);">โอม</h4>
                    <span>Marketing</span>
                    <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="member">
                    <img src="home_assets/mon.jpg" class="img-fluid" alt="">

                    <h4 style="color: rgb(255, 255, 255);">นาย มงคล นามะวงค์</h4>
                    <span>Marketing</span>
                    <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="member">
                    <img src="home_assets/flok.jpg" class="img-fluid" alt="">
                    <h4 style="color: rgb(255, 255, 255);">โฟค</h4>
                    <span>Content</span>
                    <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div><!-- End Team Member -->
        </div>

    </div>
</section><!-- End Our Team Section -->