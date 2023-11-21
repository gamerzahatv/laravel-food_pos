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
                                                                <th scope="col">รูปผู้ใช้</th>
                                                                <th scope="col">ไอดีผู้ใช้</th>
                                                                <th scope="col">ชื่อ</th>
                                                                <th scope="col">เบอร์โทรศัพท์</th>
                                                                <th scope="col">ที่อยู่</th>
                                                                <th scope="col">สร้างเมื่อ</th>
                                                                <th scope="col">แก้ไขเมื่อ</th>
                                                                <th scope="col">ยศ</th>
                                                                <th scope="col">ปรับแต่ง</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody style="background-color: #ffffff;">
                                                            @foreach ($fetch as $row)
                                                                <!--loop-->
                                                                <tr class="text-center">
                                                                    <td><img src="{{ asset($row->profile_photo_path) }}"
                                                                        class="img-thumbnail rounded mx-auto d-block "
                                                                        style="max-width:120px;max-height:120px; min-width:120px;min-height:120px;">
                                                                    </td>
                                                                    <td>{{ $row->id }}</td>
                                                                    <td>{{ $row->name }}</td>
                                                                    <td>เบอร์โทรศัพท์</td>
                                                                    <td>ที่อยู่</td>
                                                                    <td>{{ $row->created_at }}</td>
                                                                    <td>{{ $row->updated_at }}</td>
                                                                    <td>{{ $row->role_name }}</td>

                                                                    <td>
                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic mixed styles example">
                                                                            <a
                                                                                href="{{ url('/admin/adminuserinfo/' . $row->id) }}">
                                                                                <button type="button"
                                                                                    class="btn btn-success"style="color:black; margin:2px"><i
                                                                                        class="fa-solid fa-eye"></i></button>
                                                                            </a>
                                                                            <button type="button"
                                                                                id="{{ $row->id }}"
                                                                                class="btn btn-danger deluser"style="color:black; margin:2px"><i
                                                                                    class="fa-solid fa-trash"></i>
                                                                            </button>

                                                                            <button type="button"
                                                                                class="btn btn-primary rolepage"
                                                                                id="{{ $row->id }}"
                                                                                style="color:black; margin:2px"><i
                                                                                    class="fa-solid fa-star"></i>
                                                                            </button>

                                                                        </div>
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
<!-- modal -->
<div class="modal fade" id="rolechange" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ปรับยศของบัญชีผู้ใช้</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="role_user_id" id="get_id_role" val="">
                <button type="button" class="btn btn-outline-warning" id="admin_bu">แอดมิน</button>
                <button type="button" class="btn btn-outline-warning" id="user_bu">ผู้ใช้ทั่วไป</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $(".rolepage").click(function() {
            var get_user_id = $(this).attr("id");
            $('#rolechange').modal('show');

            $('#admin_bu').click(function() {
                var url = '{{ route('adminrole', ':id') }}';
                url = url.replace(':id', get_user_id);
                $.ajax({
                    url: url,
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    data: {
                        id: get_user_id
                    },
                    success: function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'เปลี่ยนบัญชีเป็นแอดมินสำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#rolechange").modal('hide');
                        setTimeout(location.reload.bind(location), 1500);
                    }
                });
            });

            $('#user_bu').click(function() {
                var url = '{{ route('userrole', ':id') }}';
                url = url.replace(':id', get_user_id);

                $.ajax({
                    url: url,
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    data: {
                        id: get_user_id
                    },
                    success: function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'เปลี่ยนบัญชีเป็นผู้ใช้สำเร็จ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#rolechange").modal('hide');
                        setTimeout(location.reload.bind(location), 1500);
                    }
                });
            });
        });


    });

    //delete button
    $(".deluser").click(function() {
        Swal.fire({
            allowOutsideClick: false,
            title: 'คุณยืนยันที่จะลบผู้ใช้นี้หรือไม่?',
            text: "กดยืนยันเพื่อลบข้อมูล!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ยกเลิก',
            confirmButtonText: 'ยืนยัน!'
        }).then((result) => {
            var get_user_del_id = $(this).attr("id");
            var url_user_del = '{{ route('userdel', ':id') }}';
            url_user_del = url_user_del.replace(':id', get_user_del_id);
            if (result.isConfirmed) {
                $.ajax({
                    url: url_user_del,
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    enctype: 'multipart/form-data',
                    data: {
                        id: get_user_del_id
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

    $(".deluser").click(function() {
    });
</script>
