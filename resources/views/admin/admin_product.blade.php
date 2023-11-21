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
                                <div class="d-grid gap-2 py-5">
                                    <!-- Button trigger modal -->
                                    <h1 class="py-3 fs-1">จัดการข้อมูลสินค้า</h1>
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop" style="color:black;">
                                        เพิ่มสินค้า
                                    </button>
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
                                                                <th scope="col">รูปสินค้า</th>
                                                                <th scope="col">ไอดีสินค้า</th>
                                                                <th scope="col">ชื่อสินค้า</th>
                                                                <th scope="col">ราคา</th>
                                                                <th scope="col">ประเภท</th>
                                                                <th scope="col">เพิ่มเมื่อ</th>
                                                                <th scope="col">แก้ไขเมื่อ</th>
                                                                <th scope="col">จัดการ</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody style="background-color: #ffffff;">
                                                            @foreach ($fetch_product as $row)
                                                                <!--loop-->
                                                                <tr class="text-center">
                                                                    <td><img src="{{ asset($row->product_image) }}"
                                                                            class="img-thumbnail rounded mx-auto d-block "
                                                                            style="max-width:120px;max-height:120px; min-width:120px;min-height:120px;">
                                                                    </td>
                                                                    <td>{{ $row->product_id }}</td>
                                                                    <td>{{ $row->product_name }}</td>
                                                                    <td>{{ $row->product_price }}</td>
                                                                    <td>{{ $row->product_type }}</td>
                                                                    <td>{{ $row->created_at }}</td>
                                                                    <td>{{ $row->updated_at }}</td>
                                                                    <td>
                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic mixed styles example">
                                                                            <a
                                                                                href="{{ url('/admin/adminproductinfo/' . $row->id) }}"><button
                                                                                    type="button"
                                                                                    class="btn btn-success"style="color:black; margin:2px"><i
                                                                                        class="fa-solid fa-eye"></i></button></a>


                                                                            <button type="button" class="btn btn-primary edit_product" id="{{ $row->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin:2px ">
                                                                                <i class="fa-sharp fa-solid fa-pen-to-square" style="color:black"></i>
                                                                            </button>
                                                                            
                                                                            <button type="button"
                                                                                class="btn btn-danger del_product"style="color:black; margin:2px"
                                                                                id="{{ $row->id }}"><i
                                                                                    class="fa-regular fa-trash-can"></i></button>
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
                                                    {{ $fetch_product->links() }}
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">เพิ่มสินค้า</h1>
                <button type="button" onclick="clearmodal()" class="btn btn-danger" data-bs-dismiss="modal"
                    aria-label="Close" style="background:red;">ปิด</button>

            </div>
            <div class="modal-body">

                <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <img id="frame" src="" class="img-thumbnail rounded mx-auto d-block "
                            style="max-width:200px;max-height:200px; min-width:200px;min-height:200px;" />
                        <div class="mb-5 "style="margin:auto;   margin: auto; width: 50%; text-align: center;">
                            <br>
                            <input class="form-control" type="file" name="image_product" id="formFile"
                                accept="image/x-png,image/jpeg" onchange="preview()" style="">
                            <!-- <button onclick="clearImage()" class="btn btn-primary mt-3">กลับรูปภาพค่าเริ่มต้น</button>-->
                        </div>
                        <script>
                            function preview() {
                                frame.src = URL.createObjectURL(event.target.files[0]);
                            }
                            /* function clearImage() {
                                document.getElementById('formFile').value = null;
                                frame.src = "https://cdn-icons-png.flaticon.com/512/2927/2927347.png";
                            }*/
                        </script>
                    </div>
                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="id_product_field" name="id_product" class="form-control"
                            placeholder="ไอดีสินค้า" required="" />
                        @error('id_product')
                            <div class="alert alert-danger" role="alert">
                                A simple danger alert—check it out!
                            </div>
                        @enderror
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="name_product_field" name="name_product" class="form-control"
                            placeholder="ชื่อสินค้า" required="" />
                        @error('name_product')
                            <div class="alert alert-danger" role="alert">
                                A simple danger alert—check it out!
                            </div>
                        @enderror
                    </div>

                    <!-- Number input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="price_product_field" name="price_product" class="form-control"
                            placeholder="ราคาสินค้า" required="" />
                        @error('price_product')
                            <div class="alert alert-danger" role="alert">
                                A simple danger alert—check it out!
                            </div>
                        @enderror
                    </div>

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="desc_product_field" name="desc_product" rows="4" required=""></textarea>
                        <label class="form-label" for="form6Example7">คำอธิบายสินค้า</label>
                        @error('desc_product')
                            <div class="alert alert-danger" role="alert">
                                A simple danger alert—check it out!
                            </div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <div class="container text-center">
                            <label for="html">เลือกประเภทอาหาร</label><br>
                            <select name="typelist_product" required>
                                <option value="" disabled selected style=" display: none;"></option>
                                <option value="กับข้าว">กับข้าว</option>
                                <option value="เมนูเส้น">เมนูเส้น</option>
                                <option value="ข้าวผัด">ข้าวผัด</option>
                                <option value="สเน็คบ๊อก">สเน็คบ๊อก</option>
                                <option value="ของหวาน">ของหวาน</option>
                                <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                            </select>
                        </div>

                    </div>
                    <button type="reset" value="reset" class="btn btn-secondary"
                        style="color:black; background-color: rgb(200, 190, 190);">reset</button>
                    <script>
                        function clearmodal() {
                            var getValue1 = document.getElementById("id_product_field");
                            var getValue2 = document.getElementById("name_product_field");
                            var getValue3 = document.getElementById("price_product_field");
                            var getValue4 = document.getElementById("desc_product_field");
                            getValue1.value = "";
                            getValue2.value = "";
                            getValue3.value = "";
                            getValue4.value = "";
                        }
                    </script>
                    <button type="submit" class="btn btn-success"
                        style="color:black; background-color: rgb(96, 234, 96);">submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal edit product-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">แก้ไขสินค้า</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('productedit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <img id="get_id_edit_image" src="" class="img-thumbnail rounded mx-auto d-block "
                        style="max-width:200px;max-height:200px; min-width:200px;min-height:200px;" />
                    <div class="mb-5 "style="margin:auto;   margin: auto; width: 50%; text-align: center;">
                        <br>
                        <input class="form-control" type="file" name="imageedit_product" id="formFile"
                            accept="image/x-png,image/jpeg" onchange="preview()" style="">
                    </div>
                    <script>
                        function preview() {
                            frame.src = URL.createObjectURL(event.target.files[0]);
                        }
                    </script>
                </div>
                <!--true_id product-->
                <input type="text" id="get_id_product_edit" name="get_id_product" class="form-control"
                        placeholder="ไอดีสินค้า" required="" />
                <!-- Text input -->
                <div class="form-outline mb-4">
                    <label class="form-label">ไอดีสินค้า</label>
                    <input type="text" id="get_id_edit" name="id_product" class="form-control"
                        placeholder="ไอดีสินค้า" required="" />
                    @error('id_product')
                        <div class="alert alert-danger" role="alert">
                            A simple danger alert—check it out!
                        </div>
                    @enderror
                </div>

                <!-- Text input -->
                <div class="form-outline mb-4">
                    <label class="form-label">ชื่อสินค้า</label>
                    <input type="text" id="get_id_name_edit" name="name_product" class="form-control"
                        placeholder="ชื่อสินค้า" required="" />
                    @error('name_product')
                        <div class="alert alert-danger" role="alert">
                            A simple danger alert—check it out!
                        </div>
                    @enderror
                </div>

                <!-- Number input -->
                <div class="form-outline mb-4">
                    <label class="form-label">ราคาสินค้า</label>
                    <input type="number" id="get_id_price_edit" name="price_product" class="form-control"
                        placeholder="ราคาสินค้า" required="" />
                    @error('price_product')
                        <div class="alert alert-danger" role="alert">
                            A simple danger alert—check it out!
                        </div>
                    @enderror
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4">
                    <label class="form-label">คำอธิบายสินค้า</label>
                    <textarea class="form-control" id="get_id_desc_edit" name="desc_product" rows="4" required=""></textarea>
                    @error('desc_product')
                        <div class="alert alert-danger" role="alert">
                            A simple danger alert—check it out!
                        </div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <div class="container text-center">
                        <label for="html">เลือกประเภทอาหาร</label><br>
                        <select name="typelist_product" id = "get_id_select_edit" required >
                            <option value="" disabled selected style=" display: none;"></option>
                            <option value="กับข้าว">กับข้าว</option>
                            <option value="ไก่">ไก่</option>
                            <option value="สแน็คบ๊อก">สแน็คบ๊อก</option>
                            <option value="ของหวาน">ของหวาน</option>
                            <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                        </select>
                    </div>

                </div>
                <button type="reset" value="reset" class="btn btn-secondary"
                    style="color:black; background-color: rgb(200, 190, 190);">reset</button>
                <script>
                    function clearmodal() {
                        var getValue1 = document.getElementById("id_product_field");
                        var getValue2 = document.getElementById("name_product_field");
                        var getValue3 = document.getElementById("price_product_field");
                        var getValue4 = document.getElementById("desc_product_field");
                        getValue1.value = "";
                        getValue2.value = "";
                        getValue3.value = "";
                        getValue4.value = "";
                    }
                </script>
                <button type="submit" class="btn btn-success"
                    style="color:black; background-color: rgb(96, 234, 96);">submit
                </button>
            </form>
        </div>
      </div>
    </div>
  </div>
<script>

    $('.edit_product').click(function() {
        $('#exampleModal').modal('show');
            var get_product_edit_id = $(this).attr("id");
            var url_product_edit = '{{ route('getproduct', ':id') }}';
            url_product_edit = url_product_edit.replace(':id', get_product_edit_id);
            $.ajax({
                    url: url_product_edit,
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    data: {
                        id: get_product_edit_id
                    },
                    success: function(data) {
                        $('#get_id_edit_image').attr('src', data.product_image);
                        $('#get_id_product_edit').val(data.id); 
                        $('#get_id_edit').val(data.product_id); 
                        $('#get_id_name_edit').val(data.product_name); 
                        $('#get_id_price_edit').val(data.product_price); 
                        $('#get_id_desc_edit').val(data.product_desc);  
                        $('#get_id_select_edit').val(data.product_type); 
                                        
                    }
            });

    });

    //Edit form
    $(".del_product").click(function() {
        Swal.fire({
            allowOutsideClick: false,
            title: 'คุณยืนยันที่จะลบสินค้านี้หรือไม่?',
            text: "กดยืนยันเพื่อลบข้อมูล!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'ยืนยัน!'
        }).then((result) => {
            var get_product_del_id = $(this).attr("id");
            var url_product_del = '{{ route('productdel', ':id') }}';
            url_product_del = url_product_del.replace(':id', get_product_del_id);
            if (result.isConfirmed) {
                $.ajax({
                    url: url_product_del,
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    data: {
                        id: get_product_del_id
                    },
                    success: function() {
                        Swal.fire(
                            'กำลังทำการลบ!',
                            'ลบบัญชีผู้ใช้เสร็จสิ้น',
                            'success'
                        )
                        

                        setTimeout(location.reload.bind(location), 1500);
                    }
                });

            }
        })
    });
</script>

