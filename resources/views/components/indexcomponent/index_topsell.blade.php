<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio sections-bg ">
    <div class="container" >

        <div class="section-header">
            <h2 id="arhan">เมนูยอดนิยม</h2>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order" >

            <div>
                <ul class="portfolio-flters">
                    <li class="top_side_dish">กับข้าว</li>
                    <li class="top_noodle">เมนูเส้น</li>
                    <li class="top_field_rice">ข้าวผัด</li>
                    <li class="top_snackbox">สเน็คบ๊อก</li>
                    <li class="top_sweet">ของหวาน</li>
                    <li class="top_drink">เครื่องดื่ม</li>
                </ul><!-- End Portfolio Filters -->
            </div>
        </div>
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order">

            <div class="row gy-4 portfolio-container">
                @foreach ($topsell as $loadtopsell)
                    <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">


                            <img src="{{ $loadtopsell->product_image }}" class="img-fluid" id="myyopsell">



                            <div class="portfolio-info ">
                                <div class="container text-center ">
                                    <h4><a href="portfolio-details.html"
                                            title="More Details">{{ $loadtopsell->product_name }}</a></h4>
                                </div>
                                <br>
                                @auth
                                    @role('User')
                                        <div class="container text-center ">
                                            <button  class="d-flex mb-3 btn  btn-warning topsellcart_button" id="{{ $loadtopsell->id}}">
                                                <div class="me-auto p-2">{{ $loadtopsell->product_price }} ฿</div>
                                                <div class="p-2"></div>
                                                <div class="p-2">{{ $loadtopsell->product_type }}</div>
                                            </button>
                                        </div>
                                    @endrole
                                    @role('admin')
                                    @endrole
                                @else
                                    <div class="container text-center ">

                                        <a class="d-flex mb-3 btn  btn-warning text-center justify-content-center"
                                            href="{{ url('/buyer/login') }}">
                                            ลงชื่อเข้าใช้
                                        </a>
                                    </div>
                                @endauth

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>


</section>



</main><!-- End #main -->
<!--script here -->
<script>
    $('.topsellcart_button').unbind().click(function() {
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
    $(".top_side_dish").unbind().click(function(){
        $.ajax({
               url: '{{ route('topsellall') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                 
                   $('#portfolio').html(response);

               },
               error: function() {
                   alert("N");

               }
        });
    });

    $('.top_noodle').unbind().click(function() {
           $.ajax({
               url: '{{ route('topnoodle') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                   $('#portfolio').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
    });

    $(".top_field_rice").unbind().click(function(){
        $.ajax({
               url: '{{ route('topfriedrice') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                 
                   $('#portfolio').html(response);

               },
               error: function() {
                   alert("N");

               }
        });
    });

    $('.top_sweet').unbind().click(function() {
            $.ajax({
               url: '{{ route('topsweet') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                  
                   $('#portfolio').html(response);
               },
               error: function() {
                   alert("N");

               }
           });
    });
    $('.top_drink').unbind().click(function() {
        $.ajax({
               url: '{{ route('topdrink') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                  
                   $('#portfolio').html(response);
               },
               error: function() {
                   alert("N");

               }
        });
    });
    
    $('.top_snackbox').unbind().click(function() {
        $.ajax({
               url: '{{ route('topsnackbox') }}',
               type: 'GET',
               success: function(response) {
                   cooldown();
                  
                   $('#portfolio').html(response);
               },
               error: function() {
                   alert("N");

               }
        });
    });
</script>
