<x-app-layout>
    <!-- Profile Photo -->
    <style>
        * {
            margin: 0;
            padding: 0
        }
        .card {
            width: 350px;
            background-color: #efefef;
            border: none;
            cursor: pointer;
            transition: all 0.5s;
        }

        .image img {
            transition: all 0.5s
        }

        .card:hover .image img {
            transform: scale(1.5)
        }

        #myimage {
            height: 140px;
            width: 140px;
            border-radius: 50%
        }

        .name {
            font-size: 22px;
            font-weight: bold
        }

        .idd {
            font-size: 14px;
            font-weight: 600
        }

        .idd1 {
            font-size: 12px
        }

        .number {
            font-size: 22px;
            font-weight: bold
        }

        .follow {
            font-size: 12px;
            font-weight: 500;
            color: #444444
        }

        .btn1 {
            height: 40px;
            width: 150px;
            border: none;
            background-color: #000;
            color: #aeaeae;
            font-size: 15px
        }

        .text span {
            font-size: 13px;
            color: #545454;
            font-weight: 500
        }

        .icons i {
            font-size: 19px
        }

        hr .new1 {
            border: 1px solid
        }

        .join {
            font-size: 14px;
            color: #a0a0a0;
            font-weight: bold
        }

        .date {
            background-color: #ccc
        }
    </style>
    <div class="p-5 text-center bg-image rounded-3"
        style="
      background-image: url('https://s359.kapook.com/pagebuilder/3d781bf5-a480-4f58-8916-4e711ea42962.jpg');
      background-repeat: no-repeat;
      background-size: cover;
          ">
        <div class="mask">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                    <div class="card p-4 justify-content-center d-flex align-items-center">
                        <div class=" image d-flex flex-column justify-content-center align-items-center"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <button class="btn btn-secondary justify-content-center d-flex align-items-center myimage"
                                id="myimage">
                                <?php
                                $image_user = auth()->user()->profile_photo_path;
                                
                                ?>
                                <img src="{{ $image_user }}" height="100" class="justify-content-center"
                                    width="100" />
                            </button>
                            <span class="name mt-3">
                                <?php
                                $id_youruser = auth()->user()->name;
                                print_r($id_youruser);
                                ?>
                            </span>
                            <div class=" d-flex mt-2"> <button class="btn1 btn-dark">แก้ไขรูปโปรไฟล์</button> </div>
                            <div class=" px-2 rounded mt-4 date "> </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- Hero -->
    <!--modal -->
    <!-- modal user image -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขสินค้า</h5>
                    <button type="button" class="btn-close btn btn-danger close_modal" data-bs-dismiss="modal"
                        aria-label="Close" style="color:#000;background-color: red;">X</button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('updateprofile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <img id="get_id_edit_image" src="" class="img-thumbnail rounded mx-auto d-block "
                                style="max-width:200px;max-height:200px; min-width:200px;min-height:200px;" />
                            <div class="mb-5 "style="margin:auto;   margin: auto; width: 50%; text-align: center;">
                                <br>
                                 <input class="form-control" type="file" name="image_user" id ="path" 
                                    accept="image/x-png,image/jpeg" onchange="preview()" >
                
                            </div>
                            <button type="submit" class="btn btn-success" id="getsubmit"style="color:black; background-color: rgb(96, 234, 96);">ยืนยัน</button>
                            <script>
                                $(document).ready(function() {
                                    $("#path").change(function(){
                                        var fileName = $(this).val()
                                        //.split("\\").pop();
                                        $("#getpath").val(fileName);
                                    });
                                });
                            </script>
                        </div>
               
                    </form> <!-- Add this closing tag -->
                
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <script>
        function preview() {
            document.getElementById('get_id_edit_image').src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
    <script>
        $(".close_modal").click(function() {
            location.reload();
        });
    </script>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
