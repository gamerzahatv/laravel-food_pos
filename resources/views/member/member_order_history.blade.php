<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ประวัติการสั่งซื้อ') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                </div> -->

                <!-- <div class="py-12">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <div class="input-group rounded">
                                    <input type="search" class="form-control rounded" placeholder="Search"
                                        aria-label="Search" aria-describedby="search-addon" />
                                    <button type="button" class="btn btn-outline-primary">search</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">

                                </div>
                            </div>
                        </div>
                    </div> -->
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
                                                                <th scope="col">ไอดีบิล</th>
                                                                <th scope="col">รวมยอดชำระ</th>
                                                                <th scope="col">ชำระวันที่</th>
                                                                <th scope="col">จัดการ</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody style="background-color: #ffffff;">
                                                            @foreach ($result as $item)
                                                                <!--loop-->
                                                                <tr class="text-center">
                                                            
                                                                    <td class="align-middle border-bottom-0 ">{{ $item->order_id}}</td>
                                                                    <td class="align-middle border-bottom-0 ">{{ $item->total}}</td>
                                                                    <td class="align-middle border-bottom-0 ">{{ $item->date_created}}</td>
                                                                    

                                                                    
                                                                    <td class="align-middle border-bottom-0 ">
                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic mixed styles example">
                                                                            <a href="{{ url('/buyer/historyinfo/' . $item->order_id) }}"><button type="button " 
                                                                                    class="btn btn-success getorderbill" style="color:black; margin:2px"><i
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


