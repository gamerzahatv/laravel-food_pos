<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ประวัติการสั่งซื้อ') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="card">
                    <div class="card-body">
                      <div class="container mb-5 mt-3">
                        <div class="row d-flex align-items-baseline">
                          <div class="col-xl-9">
                            <p style="color: #7e8d9f;font-size: 20px;">ไอดีออเดอร์ >> <strong>ID: {{$orderDetails[0]->order_id}}</strong></p>
                          </div>
                          <!-- <div class="col-xl-3 float-end">
                            <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                class="fas fa-print text-primary"></i> Print</a>
                            <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                class="far fa-file-pdf text-danger"></i> Export</a>
                          </div> -->
                          <hr>
                        </div>
                  
                        <div class="container">
                          <div class="col-md-12">
          
                          </div>
                  
                  
                          <div class="row">
                            <div class="col-xl-8">
                              <ul class="list-unstyled">
                                <li class="text-muted">คุณ : <span style="color:#5d9fc5 ;">{{$orderDetails[0]->name}}</span></li>
                                <!-- <li class="text-muted">Street, City (บิท)</li>
                                <li class="text-muted">State, Country (บิท)</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789 (บิท)</li> -->
                              </ul>
                            </div>
                            <div class="col-xl-4">
                              <p class="text-muted">รายละเอียด</p>
                              <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="fw-bold">ไอดีออเดอร์:</span> {{$orderDetails[0]->order_id}}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="fw-bold">สั่งซื้อวันที่: </span> {{$orderDetails[0]->date_created}}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="me-1 fw-bold">สถานะ:</span><span class="badge bg-warning text-black fw-bold">
                                    จ่ายแล้ว</span></li>
                              </ul>
                            </div>
                          </div>
                  
                          <div class="row my-2 mx-1 justify-content-center">
                            <table class="table table-striped table-borderless">
                              <thead style="background-color:#84B0CA ;" class="text-white">
                                
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">รูป</th>
                                  <th scope="col">ชื่อสินค้า</th>
                                  <th scope="col">ราคาสินค้าต่อหน่วย</th>
                                  <th scope="col">จำนวน</th>
                                  <th scope="col">ยอดสินค้า</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php $sum = 0 @endphp
                                @foreach ($orderDetails as $order)
                                  @php $sum += 1 @endphp
                                <tr>
                                  <th scope="row">{{ $sum }}</th>
                                  <td width="20%">

                                    <img src="{{ $order->product_image }}" width="90">

                                  </td>
                                  <td>{{ $order->product_name }}</td>
                                  <td>{{ $order->product_price }}</td>
                                  <td>{{ $order->quantity }}</td>
                                  <td>{{ $order->result_amount}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                             
                            </table>
                          </div>
                          <div class="row">
                            <div class="col-xl-8">
                              <p class="ms-3">ขอบคุณที่สั่งซื้อสินค้า</p>
                  
                            </div> 
                            <div class="col-xl-3">
                              <!-- <ul class="list-unstyled">
                                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1110</li>
                                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111</li>
                              </ul> -->
                              <p class="text-black float-start"><span class="text-black me-3"> รวมรายจ่ายทั้งหมด</span><span
                                  style="font-size: 25px;">{{$orderDetails[0]->total}} บาท</span></p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            
                            <div class="col-xl-10">
                                <br>
                                <a href="{{ url('/buyer/history') }}"><button type="button" class="btn btn-outline-success">ย้อนกลับ</button></a>
                            </div>
                            <!--<div class="col-xl-2">
                              <button type="button" class="btn btn-primary text-capitalize"
                                style="background-color:#60bdf3 ;">Pay Now</button>
                            </div>-->
                          </div>
                  
                        </div>
                      </div>
                    </div>
                  </div>


            </div>
        </div>
    </div>
</x-app-layout>
