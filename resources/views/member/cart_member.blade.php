<x-app-layout>
    <section class="h-100 h-custom " >
        <div class="container h-100 py-5" >
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <section class="intro py-2">
                        <div class="mask d-flex align-items-center h-100">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="card shadow-2-strong">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-bordered ">
                                                        <thead style="background:#e6c6c6; ">
                                                            <tr class="text-center">
                                        
                                                                <th scope="col">รูปสินค้า</th>
                                                                <th scope="col">ชื่อสินค้า
                                                                </th>
                                                                <th scope="col">ราคาต่อหน่วย
                                                                </th>
                                                                
                                                                <th scope="col">จำนวน</th>
                                                                <th scope="col">ประเภทสินค้า</th>
                                                                <th scope="col">จัดการ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="background-color: #ffffff;">
                                                            @foreach ($cartItems as $item)
                                                                <!--loop-->
                                                                <tr class="text-center">
                                                                    <input type="hidden"  class= "{{ $item->id }}" id="getid_product_cart">
                                                                    
                                                                    <td><img src="{{ $item->product_image }}"
                                                                            class="img-thumbnail rounded mx-auto d-block "
                                                                            style="max-width:120px;max-height:120px; min-width:120px;min-height:120px;">
                                                                    </td>
                                                                    <td class="align-middle border-bottom-0 "style="color:black">{{ $item->product_name }}</td>
                                                                    <td class="align-middle border-bottom-0 "style="color:black">{{ $item->product_price }}</td>
                                                                    <td class="align-middle border-bottom-0 ">
                                                                        <div class="d-flex flex-row d-flex align-items-center justify-content-center">
                                                                            <button class="btn btn-link px-2 ">
                                                                              {{-- onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> --}}
                                                                             
                                                                                <i class="fas fa-minus  minusqty" id={{$item->id}}></i>
                                                                            </button>
                                                                            
                                                                            <input id="{{$item->id}}" class="inputqty" min="1" name="{{$item->session_id}}" value="{{ $item->quantity }}" type="number" readonly
                                                                             class="form-control form-control-sm" style="width: 65px; color:black" />
                                                                            
                                                                            <button class="btn btn-link px-2">
                                                                            {{--onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> --}}
                                                                            <i class="fas fa-plus plusqty" id="{{$item->id}}"></i>
                                                                            </button>
                                                                        </div> 
                                                                    </td>
                                                                    <td class="align-middle border-bottom-0 "style="color:black">{{ $item->product_type }}</td>
                                                                    

                                                                    
                                                                    <td class="align-middle border-bottom-0 ">
                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic mixed styles example">
                                                                            <button type="button"
                                                                                    class="btn btn-danger del_cartshop" id="{{$item->id}}"style="color:black; margin:2px"><i
                                                                                        class="fa-solid fa-trash"></i></button>
                                                                        </div>
                                                                        <h1 id="demo"></h1>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                                <br>
                                                <div class="d-flex justify-content-center">
                                                    <!-- number page -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px; ">
                        <div class="card-body p-4"  >

                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                               
                                    
                                    <!-- <form>
                                        <div class="d-flex flex-row pb-3">
                                            <div class="d-flex align-items-center pe-2">
                                                <input class="form-check-input" type="radio" name="radioNoLabel"
                                                    id="radioNoLabel1v" value="" aria-label="..." checked />
                                            </div>
                                            <div class="rounded border w-100 p-3">
                                                <p class="d-flex align-items-center mb-0"style="color:black">
                                                    <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>Credit
                                                    Card
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row pb-3">
                                            <div class="d-flex align-items-center pe-2">
                                                <input class="form-check-input" type="radio" name="radioNoLabel"
                                                    id="radioNoLabel2v" value="" aria-label="..." />
                                            </div>
                                            <div class="rounded border w-100 p-3">
                                                <p class="d-flex align-items-center mb-0"style="color:black">
                                                    <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit
                                                    Card
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <div class="d-flex align-items-center pe-2">
                                                <input class="form-check-input" type="radio" name="radioNoLabel"
                                                    id="radioNoLabel3v" value="" aria-label="..." />
                                            </div>
                                            <div class="rounded border w-100 p-3">
                                                <p class="d-flex align-items-center mb-0"style="color:black">
                                                    <i class="fab fa-cc-paypal fa-2x fa-lg text-dark pe-2"></i>PayPal
                                                </p>
                                            </div>
                                        </div>
                                    </form> -->
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-6">
                                    <table class="table mb-0  ">
                                        <thead>
                                            <tr class=" text-black">
                                                <th>สินค้า</th>
                                                <th>ราคา</th>
                                                <th>จำนวน</th>
                                                <th>รวม</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @foreach ($cartItems as $billresult)
                                            <tr>
                                                <td><p class="mb-2"style="color:black">{{$billresult->product_name}}</p></td>
                                                <td> <p class="mb-2"style="color:black">{{$billresult->product_price}}บาท</p></td>
                                                <td><p class="mb-2"style="color:black">{{$billresult->quantity}}ชิ้น</p></td>
                                                <td><p class="mb-2"style="color:black">{{$billresult->unitmulitpy}}บาท</p></td>
                                            </tr>
                                        @endforeach
                                </tbody>
                                    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                        <p class="mb-2">ยอดรวมราคาสินค้าทั้งหมด</p>
                                        <p class="mb-2">{{$result}}บาท</p>
                                    </div>
                                </table>
                                    @php
                                
                                    $id_user_datacount = auth()->user()->id;
                                    $sum_row_cart = DB::table('cart_item')
                                        ->join('shopping_session', 'cart_item.session_id', '=', 'shopping_session.id')
                                        ->where('shopping_session.status', 0)
                                        ->where('shopping_session.user_id', $id_user_datacount)
                                        ->selectRaw('SUM(cart_item.quantity) as totalcart')
                                        ->first();
                                    $total = $sum_row_cart->totalcart;

                                     
                                    @endphp
                                    <div class="d-flex justify-content-center">
                                    @if ($total <= 0)
                                    <button class="btn btn-primary btn-block btn-lg mt-5" style = "background-color:rgb(40, 2, 255) text-align:center;">
                                        <a href="/"><div class="d-flex justify-content-between">
                                            <span id="display_finalresult">เลือกซื้อสินค้า</span>
                                        </div></a>
                                    </button></a>
                                    @elseif($total >= 1)
                                        <a href="{{url('/buyer/checkout')}}">
                                            <button class=" btn btn-primary btn-block btn-lg checkoutbill mt-5" style = "background-color:rgb(40, 2, 255)">
                                            <div class="d-flex justify-content-between">
                                                <span id="display_finalresult" >ชำระเงิน {{$result}} บาท</span>
                                            </div>
                                        </button></a>
                                    
                                    @endif 
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <div class="form-outline mb-4 mb-xl-5">
                                                <input type="text" id="typeName"
                                                    class="form-control form-control-lg" siez="17"
                                                    placeholder="John Smith" />
                                                <label class="form-label" for="typeName">Name on
                                                    card</label>
                                            </div>

                                            <div class="form-outline mb-4 mb-xl-5">
                                                <input type="text" id="typeExp"
                                                    class="form-control form-control-lg" placeholder="MM/YY"
                                                    size="7" id="exp" minlength="7" maxlength="7" />
                                                <label class="form-label" for="typeExp">Expiration</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <div class="form-outline mb-4 mb-xl-5">
                                                <input type="text" id="typeText"
                                                    class="form-control form-control-lg" siez="17"
                                                    placeholder="1111 2222 3333 4444" minlength="19"
                                                    maxlength="19" />
                                                <label class="form-label" for="typeText">Card
                                                    Number</label>
                                            </div>

                                            <div class="form-outline mb-4 mb-xl-5">
                                                <input type="password" id="typeText"
                                                    class="form-control form-control-lg"
                                                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                    maxlength="3" />
                                                <label class="form-label" for="typeText">Cvv</label>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-lg-4 col-xl-3">
                                    <!-- @foreach ($cartItems as $billresult)
                                        <div class="d-flex justify-content-between" style="font-weight: 500;">
                                            <p class="mb-2"style="color:black">{{$billresult->product_name}}</p>
                                            <p class="mb-2"style="color:black">{{$billresult->product_price}}บาท</p>
                                            <p class="mb-2"style="color:black">{{$billresult->quantity}}ชิ้น</p>
                                            <p class="mb-2"style="color:black">{{$billresult->unitmulitpy}}บาท</p>
                                        </div>
                                    @endforeach
                                    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                        <p class="mb-2">ยอดรวมราคาสินค้าทั้งหมด</p>
                                        <p class="mb-2">{{$result}}บาท</p>
                                    </div>
                                    @php
                                    $id_user_datacount = auth()->user()->id;
                                    $sum_row_cart = DB::table('cart_item')
                                        ->join('shopping_session', 'cart_item.session_id', '=', 'shopping_session.id')
                                        ->where('shopping_session.status', 0)
                                        ->where('shopping_session.user_id', $id_user_datacount)
                                        ->selectRaw('SUM(cart_item.quantity) as totalcart')
                                        ->first();
                                    $total = $sum_row_cart->totalcart;

                                     
                                    @endphp
                                     -->
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</x-app-layout>

<script>
    $('.plusqty').unbind().click(function() {
        var  Value_id_cart = $(this).attr("id");
        var get_id_cart = '{{ route('cartplus', ':id') }}';
        get_id_cart = get_id_cart.replace(':id', Value_id_cart);
        console.log(Value_id_cart);
        let timerInterval
        Swal.fire({
            title: 'กำลังโหลด!',
            timer: 1000,
            timerProgressBar: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                },100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                $.ajax({
                    url: get_id_cart,
                    type: 'GET',
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    data: {
                        id: Value_id_cart
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'เพิ่มสินค้าลงในตะกร้า',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            timer: 1000,
                        })
                        location.reload();
                        
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'ผิดพลาด...',
                            text: 'มีบางอย่างผิดพลาด!',
                        })
                    }
                });
            }
        })
    });
    

    $('.minusqty').unbind().click(function() {
        var  Value_id_cart = $(this).attr("id");
        var get_id_cart = '{{ route('cartminus', ':id') }}';
        get_id_cart = get_id_cart.replace(':id', Value_id_cart);
        let timerInterval
        Swal.fire({
            title: 'กำลังโหลด!',
            timer: 1000,
            timerProgressBar: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                },100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                $.ajax({
                    url: get_id_cart,
                    type: 'GET',
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    data: {
                        id: Value_id_cart
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'ลดสินค้าในตะกร้า',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        location.reload();

                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'ผิดพลาด...',
                            text: 'มีบางอย่างผิดพลาด!',
                        })
                    }
                });
            }
        })
        
    });
    $('.inputqty').unbind().click(function() {
    var Value_id_cart = $(this).attr("id");
    var Value_session_inputname = $(this).attr("name");
    console.log(Value_id_cart);
    console.log(Value_session_inputname);
    // Display SweetAlert2 input dialog and retrieve input value
    Swal.fire({
        width: '70%',
        heigh:'20%',
        title: 'กรอกจำนวนสินค้า!',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        inputValidator: (value) => {
            if (!value || isNaN(value) || parseInt(value) < 1) {
                return 'กรุณากรอกจำนวนสินค้าเป็นตัวเลขจำนวนเต็ม และต้องมีค่ามากกว่าหรือเท่ากับ 1';
            }
        }
        }).then((result) => {
            if (result.isConfirmed) {
                var quantity = result.value;
                var get_id_cart = '{{ route('inputqty', [':id', ':quantity' ,':session_name']) }}';
                get_id_cart = get_id_cart.replace(':id',Value_id_cart ).replace(':quantity', quantity).replace(':session_name', Value_session_inputname); 
                // Retrieve input value from result object
                
                // Make AJAX request with constructed URL and input values
                Swal.fire('เพิ่มจำนวนสินค้าสำเร็จ!');
                $.ajax({
                    url: get_id_cart,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    data: {
                        id: Value_id_cart,
                        quantity: quantity,
                        session_name:Value_session_inputname,
                    },
                    
                    success: function(response) {
                        location.reload();

                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'ผิดพลาด...',
                            text: 'มีบางอย่างผิดพลาด!',
                        })
                    }
                });
            }
        });
    });
    $('.del_cartshop').unbind().click(function() {
    var Value_id_cart = $(this).attr("id");
    var get_id_cart = '{{ route('delcart', ':id') }}';
    get_id_cart = get_id_cart.replace(':id', Value_id_cart);
    Swal.fire({
        title: 'ลบสินค้าออกจากตะกร้าหรือไม่?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยัน!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'ลบเสร็จสิ้น!',
            'นำสินค้าออกจากตะกร้าแล้ว.',
            'success'
            )
            $.ajax({
                    url: get_id_cart,
                    type: 'GET',
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    data: {
                        id: Value_id_cart
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function() {
                        location.reload();
                    }
                });
        }
        })
    });

    /*$('.checkoutbill').unbind().click(function() {
        var check_out = '{{ route('checkbill') }}';
        Swal.fire({
            title: 'ยืนยันชำระเงินหรือไม่?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน!',
            allowOutsideClick: false,
            allowEscapeKey: false,
            }).then((test) => {
            if (test.isConfirmed) {
                $.ajax({
                    url: check_out,
                    type: 'get',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    success: function(response) {
                        // Handle successful response
                        Swal.fire({
                            icon: 'success',
                            title: 'ชำระเงินสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        //location.reload();
                        console.log(response.order_id);
                        console.log(response.result_getproduct);
                        console.log(response.order_items_data);
                        
                    },
                    error: function(response) {
                        console.log(response.order_id);
                        console.log(response.result_getproduct);
                        console.log(response.order_items_data);
                    }
                });
            }
        })
    });*/
        
</script>
