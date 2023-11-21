<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-12">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">

                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="intro py-2">
                        <div class="mask d-flex align-items-center h-100">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="card shadow-2-strong">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-bordered ">
                                                        <thead style="background:#cccaca90; ">
                                                            <tr class="text-center">
                                                                
                                                                <th scope="col">ไอดีบิลสินค้า</th>
                                                                <th scope="col">ชื่อลูกค้า</th>
                                                                <th scope="col">ราคาทั้งหมด</th>
                                                                <th scope="col">สั้งซื้อเมื่อ</th>
                                                                <th scope="col">จัดการ</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody style="background-color: #ffffff;">
                                                            
                                                                <!--loop-->
                                                                @foreach($get_user as $resultbill)
                                                                <tr class="text-center">
                                                                    
                                                                    <td>{{$resultbill->order_id}}</td>
                                                                    <td>{{$resultbill->name}}</td>
                                                                    <td>{{$resultbill->total}}</td>
                                                                    <td>{{$resultbill->date_created}}</td>

                                                                    <td>
                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic mixed styles example">
                                                                                <a href="{{ url('/admin/adminorderhistoryinfo/'.$resultbill->order_id) }}">
                                                                                <button
                                                                                        type="button"
                                                                                        class="btn btn-success view_bill"style="color:black; margin:2px" id="{{$resultbill->order_id}}"><i
                                                                                            class="fa-solid fa-eye"></i>
                                                                                    </button>
                                                                                </a>


                                        
                                        
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


