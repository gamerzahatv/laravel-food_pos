<x-app-layout>
    <div >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                </div>
                <section style="background-color: #eee;">
                    <div class="container py-5">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="card mb-4">
                            <div class="card-body text-center">
                              <img src="{{$fetch_user_info->profile_photo_path}}" class="img-thumbnail rounded mx-auto d-block" style="max-width: 300px; min-width: 300px; max-height: 300px; min-height: 300px;">
                              <h5 class="my-3">ชื่อบัญชี {{$fetch_user_info->name}}</h5>
                              <p class="text-muted mb-1">อีเมลล์ {{$fetch_user_info->email}}</p> 
                              <br>
                             <a href="{{ url('/admin/adminuser') }}"><button type="button" class="btn btn-success" style="color: black">ย้อนกลับ</button> </a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-8">
                          <div class="card mb-4">
                            <div class="card-body" style="max-height:330px; min-height:330px;">
                                <h1>คำอธิบายบัญชีนี้</h1>
                              <div class="row">
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0"></p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$fetch_user_info->email}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">ชื่อบัญชี</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$fetch_user_info->name}}</p>
                                </div>
                              </div>
                              <hr>
                             <!-- <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">(098) 765-4321</p>
                                </div>
                              </div>  
                              <hr>
                              <div class="row">
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
