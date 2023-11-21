 <!-- ======= Header ======= -->
 <section id="topbar" class="topbar d-flex align-items-center">
     <div class="container d-flex justify-content-center justify-content-md-between">
         <div class="contact-info d-flex align-items-center">
             <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">ร้านป้าต๊อย</a></i>
             <i class="bi bi-phone d-flex align-items-center ms-4"><span></span></i>
         </div>
         
     </div>
 </section><!-- End Top Bar -->
 <header id="header" class="header d-flex align-items-center">

     <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
         <a href="{{ url('/') }}" class="logo d-flex align-items-center">
             <!-- Uncomment the line below if you also wish to use an image logo -->
              
             <h1>Patoy<span>.</span></h1>
         </a>
         <nav id="navbar" class="navbar">
             <ul>
                <li><a href="#hero">หน้าแรก</a></li>
                <li><a href="#about">เกี่ยวกับเรา</a></li>
                <li><a href="#tester">สั่งอาหาร</a></li>
                <li><a href="#team">ติดต่อเรา</a></li>
                @if (Route::has('login'))
                    @auth
                        @role('User')
                            <li><a href="{{ url('/user/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-warning" style=" color: rgb(0, 0, 0);">สวัสดีคุณ
                                    <?php
                                        $id_youruser = auth()->user()->name;
                                        print_r($id_youruser);
                                    ?>
                                </a>
                            </li>
                            <li><a href="{{ url('/cart') }}"><button type="button" class="btn btn-secondary position-relative">
                                <i class="fa-regular fa-cart-shopping" style="font-size:15px;"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="rowcartdata">
                                        @php
                                            $id_user_datacount = auth()->user()->id;
                                            $sum_row_cart = DB::table('cart_item')
                                                ->join('shopping_session', 'cart_item.session_id', '=', 'shopping_session.id')
                                                ->where('shopping_session.status', 0)
                                                ->where('shopping_session.user_id', $id_user_datacount)
                                                ->selectRaw('SUM(cart_item.quantity) as total')
                                                ->first();
                                            $total = $sum_row_cart->total;

                                            print_r($total);   
                                        @endphp
                                    <span class="visually-hidden">unread messages</span>
                                    </span>
                                    </button></a>
                            <li>
                        @endrole
                        @role('admin')
                            <li><a href="{{ url('/admin') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-warning" style=" color: rgb(0, 0, 0);">สวัสดีคุณ
                                    <?php
                                        $id_youruser = auth()->user()->name;
                                        print_r($id_youruser);
                                    ?>
                                </a>
                            </li>
                        @endrole
                @else
                    <li><a href="{{ url('/buyer/login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ลงชื่อเข้าใช้</a></li>
                @if(Route::has('register'))
                    <li><a href="{{ url('/buyer/signup') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">สมัคร</a></li>
                @endif
                    @endauth
                @endif


            </ul>
         </nav><!-- .navbar -->

         <i class="mobile-nav-toggle mobile-nav-show fa-solid fa-list"></i>
         <i class="mobile-nav-toggle mobile-nav-hide d-none fa-sharp fa-solid fa-xmark"></i>

     </div>
 </header><!-- End Header -->
 <!-- End Header -->