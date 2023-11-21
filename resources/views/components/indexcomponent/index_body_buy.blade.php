   <!-- Section-->

<section class="py-5" id="tester">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($data as $loaddata)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ $loaddata->product_image }}" alt="..." style="max-height:250px;" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $loaddata->product_name }}</h5>
                                <!-- Product price-->
                                {{ $loaddata->product_price }}
                                <h5 class="fw-bolder">{{ $loaddata->product_type }}</h5>
                            </div>
                        </div>
                        <!-- Product actions-->
                        @auth
                            @role('User')
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto cart_button"id ="{{ $loaddata->id }}">เพิ่มลงตะกร้า</a></div>
                                </div>
                            @endrole
                            @role('admin')
        
                            @endrole
                        @else
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto " href="{{ url('/buyer/login') }}">ลงชื่อเข้าใช้</a></div>
                            </div>
                        @endauth
                    </div>
                </div>
            @endforeach
         <!--    <div class="col mb-5">
                <div class="card h-100">
                     Sale badge
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                     Product image
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                        alt="..." />
                     Product details-->
                   <!-- <div class="card-body p-4">
                        <div class="text-center">
                             Product name
                            <h5 class="fw-bolder">Special Item</h5>
                            Product reviews
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            Product price
                            <span class="text-muted text-decoration-line-through">$20.00</span>
                            $18.00
                        </div>
                    </div>-->
                    <!-- Product actions
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to
                                cart</a></div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

   <!--script here -->
   <script>
        $('.cart_button').unbind().click(function() {
            var  Value_id = $(this).attr("id");
            //console.log(Value_id);
            var url = '{{ route('getcartdata', ':id') }}';
            url = url.replace(':id', Value_id);
            $.ajax({
                url: url,
                type: 'GET',
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                enctype: 'multipart/form-data',
                data: {
                    id: Value_id
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'สินค้าถูกเพิ่มลงในตะกร้า',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        timer: 1550
                    })  
                    $('#rowcartdata').text(data.total);
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'ผิดพลาด...',
                        text: 'มีบางอย่างผิดพลาด!',
                    })
                }
           });
        });
        
       $('#sweet').unbind().click(function() {
           $.ajax({
               url: '{{ route('sweet') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                   $('#tester').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
       });
       function cooldown() {
           let timerInterval
           Swal.fire({
               title: 'กำลังโหลดจ้า!',
               timer: 200,
               timerProgressBar: true,
               allowOutsideClick: false,
               didOpen: () => {
                   Swal.showLoading()
                   const b = Swal.getHtmlContainer().querySelector('b')
                   timerInterval = setInterval(() => {
                       Swal.getTimerLeft();
                   }, 100);
               },
               willClose: () => {
                   clearInterval(timerInterval)
               }
           }).then((result) => {
               /* Read more about handling dismissals below */
               if (result.dismiss === Swal.DismissReason.timer) {
                   
               }
           })
        }
       $('#sidedish').unbind().click(function() {
           $.ajax({
               url: '{{ route('sidedish') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                   $('#tester').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
       });
       $('#sweet').unbind().click(function() {
           $.ajax({
               url: '{{ route('sweet') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                   $('#tester').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
       });
       $('#load-drink').unbind().click(function() {
           $.ajax({
               url: '{{ route('drink') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                   $('#tester').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
       });

       $('#load-snackbox').unbind().click(function() {
           $.ajax({
               url: '{{ route('snackbox') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                   $('#tester').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
       });

       $('#allmenu').unbind().click(function() {
           $.ajax({
               url: '{{ route('allmenu') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                   $('#tester').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
       });

       $('#load_fried_rice').unbind().click(function() {
           $.ajax({
               url: '{{ route('friedrice') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                   $('#tester').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
       });

       $('#load_noddle').unbind().click(function() {
           $.ajax({
               url: '{{ route('noodle') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                   $('#tester').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
       });
   </script>
