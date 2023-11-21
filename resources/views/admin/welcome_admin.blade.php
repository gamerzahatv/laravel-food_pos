<!-- partial -->
<x-app-layout>
    <div class="content-wrapper">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="background-color: #191c24;;">
                        <h4 class="card-title">กำลังอัปเดตโปรเจค</h4>
                        <canvas id="transaction-history" class="transaction-chart"></canvas>
                        <div class="bg-gray-dark  py-3 px-4 px-md-3 px-xl-4  mt-3">
                            <div class="text-md-center text-xl-left">

                                <div class="row">
                                    <div class="col ">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success w-7 h-7 mb-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p>เสร็จสิ้น</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-warning w-7 h-7 mb-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p>กำลังดำเนินการ</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-danger w-7 h-7 mb-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p>ยังไม่ได้ทำ</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                            
                        
                        <div class=" text-xl-left">
                                
                                <ul class="text-xl-left">
                                    <li class="text-success">-ระบบ หน้าเว็บ User</li>
                                    <li class="text-success">-ระบบ สั่งสินค้า</li>
                                    <li class="text-success">-ระบบ Sort สินค้า</li>
                                    <li class="text-success">-ระบบ สินค้ายอดนิยม</li>
                                    <li class="text-success">-ระบบ Register</li>
                                    <li class="text-success">-ระบบ Login Logout</li>
                                    <li class="text-success">-ระบบ Auth</li>
                                    <li class="text-success">-ระบบ แก้ไขจำนวนสินค้าในตะกร้า</li>
                                    <li class="text-success">-ระบบ คิดราคาสินค้าในตะกร้า</li>
                                    <li class="text-success">-ระบบ ลบสินค้าในตะกร้า</li>
                                    <li class="text-success">-ระบบ ชำระเงิน</li>
                                    <li class="text-success">-ระบบ ประวัตสั่งซื้อ</li>
                                    <li class="text-success">-ระบบ เปลี่ยนชื่อ</li>
                                    <li class="text-success">-ระบบ เปลี่ยน email</li>
                                    <li class="text-success">-ระบบ เปลี่ยนรหัสผ่าน</li>
                                    <li class="text-success">-ระบบ ออกระบบเครื่องอื่น</li>
                                    <li class="text-success">-ระบบ ลบบัญชีตัวเอง</li>
                                    <li class="text-success">-ระบบ รูปaccount</li>
                                    <li class="text-success">-ระบบ dashboard</li>
                                    
                                    


                                </ul>

                            </div>
                            <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                <ul>
                                    <li class="text-success">-ระบบ multi login</li>
                                    <li class="text-success">-ระบบ จัดการคลังสินค้า</li>
                                    <li class="text-success">-ระบบ จัดการบัญชี user</li>
                                    <li class="text-success">-ระบบ ประวัติสั่งซื้อ</li>
                                    <li class="text-success">-ระบบ Middleware</li>
                                    <li class="text-warning">-ระบบ ที่อยู่</li>
                                    <li class="text-warning">-ระบบ พิมพ์ใบเสร็จ</li>
                                    <li class="text-danger">-ระบบ on-off สินค้า</li>
                                    <li class="text-danger">-ระบบ search</li>
                                    <li class="text-danger">-ระบบ วิเคราะห์สินค้า</li>
                                    <li class="text-danger">-ระบบ stock สินค้า</li>
                                    <li class="text-danger">-ระบบ Promotion</li>
                                    <li class="text-danger">-ระบบ ดูสถิติสินค้า</li>
                                    <li class="text-danger">-ระบบ กำไรขาดทุน</li>
                                    <li class="text-danger">-ระบบ qrpayment</li>
                                    <li class="text-danger">-ระบบ creaditpayment</li>
                                    <li class="text-danger">-ระบบ Linealertmessage</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="background-color: #191c24;;">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">จัดการ</h4>
                            <p class="text-muted mb-1">แถบเมนู</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    <a href="{{ url('/admin/adminproduct') }}">
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-primary">
                                                    <i class="mdi mdi-store-cog"></i>
                                                </div>
                                            </div>

                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">จัดการคลังสินค้า</h6>
                                                    <p class="text-muted mb-0">สร้าง-แก้ไข-ลบ คลังสินค้า</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/admin/adminuser') }}">
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-info">
                                                    <i class="mdi mdi-account-circle"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">จัดการบัญชีผู้ใช้</h6>
                                                    <p class="text-muted mb-0">ดูข้อมูล-ลบ-ปรับยศ บัญชีผู้ใช้</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/admin/orderhistory') }}">
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-danger">
                                                    <i class="mdi mdi-cart"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">ดูประวัติสั่งซื้อ</h6>
                                                    <p class="text-muted mb-0">ดูประวัติสั่งซื้อทั้งหมด</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body" style="background-color: #191c24;;">
                        <h5>ออเดอร์ทั้งหมดในวันนี้</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{$date_now_order}} ออเดอร์</h2>

                                </div>

                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-file-document-multiple-outline text-primary ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body" style="background-color: #191c24;;">
                        <h5>รวมบัญชีลูกค้าทั้งหมด</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{$count_user}} บัญชี</h2>

                                </div>

                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-account-supervisor text-danger ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body" style="background-color: #191c24;;">
                        <h5>ยอดชำระทั้งหมดในวันนี้</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $total_now[0]->result }} บาท</h2>

                                </div>

                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-cash-multiple text-success ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body" style="background-color: #191c24;;">
                        <h4 class="card-title">อันดับสินค้าขายดี 10 อันดับ</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </th>
                                        <th> รูปสินค้า </th>
                                        <th class="text-center"> ชื่อสินค้า </th>
                                        <th class="text-center"> ราคา </th>
                                        <th class="text-center"> ประเภท </th>
                                        <th class="text-center"> รวมจำนวนซื้อทั้งหมด </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($top_products as $product)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ $product->product_image }}" class="rounded  aligns-items-center" style="height:80px; width:80px" />
                                        </td>
                                        <td class="text-center"> {{ $product->product_name }} </td>
                                        <td class="text-center"> {{ $product->product_price }}</td>
                                        <td class="text-center"> {{ $product->product_type }}</td>
                                        <td class="text-center"> {{ $product->total_quantity }} </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>
    <!-- main-panel ends -->

    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="src/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- <script src="
    https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js
    "></script>-->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="src/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</x-app-layout>