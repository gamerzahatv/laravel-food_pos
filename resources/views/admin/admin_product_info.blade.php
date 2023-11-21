<x-app-layout>
    <div >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <section style="background-color: #eee;">
                    <div class="container py-5">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="card mb-4">
                            <div class="card-body text-center">
                              <img src="{{asset($fetch_product_info->product_image )}}" class="img-thumbnail rounded mx-auto d-block" style="max-width: 300px; min-width: 300px; max-height: 300px; min-height: 300px;">
                               <h5 class="my-3">ชื่อสินค้า {{$fetch_product_info->product_name}}</h5>
                               <a href="{{ url('/admin/adminproduct') }}"><button type="button" class="btn btn-success" style="color: black">ย้อนกลับ</button> </a>
                              <div class="d-flex justify-content-center mb-2">
                              </div> 
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="card mb-4">
                            <div class="card-body" style="max-height:330px; min-height:330px;">
                                <h1>คำอธิบายสินค้า</h1>
                                <br>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">ไอดีสินค้า</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$fetch_product_info->product_id}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">ชื่อสินค้า</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$fetch_product_info->product_name}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">ประเภท</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$fetch_product_info->product_type}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">ราคาสินค้า</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$fetch_product_info->product_price}}</p>
                                </div>
                              </div>
                              <hr>
                            <!--  <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                                </div>
                              </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
