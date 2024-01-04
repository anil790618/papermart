<div  class="content-body" style="min-height: 740px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="" class="img-fluid rounded-circle image" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0" id="user"></h4>
                                    <!-- <p>UX / UI Designer</p> -->
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">hello@email.com</h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                            </g>
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(40px, 40px, 0px);">
                                        <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update_profile"><i class="fa fa-user-circle text-primary mr-2"></i> Update profile</li>
                                        <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#change_password_modal"><i class="fa fa-users text-primary mr-2"></i> Change Password</li>
                                        <li class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update_logo_modal"><i class="fa fa-upload text-primary mr-2"></i> Update Logo</li>
                                        <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
                                        <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
                                        <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Update profile modal start -->
                        <div class="modal fade" id="update_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update profile</h5>
                                    </div>
                                    <form id="update_profile_form" enctype="multipart/form-data" method="post">
                                        <!-- <div class="text-center mb-2 mt-2">
                                            <img class="image" src="" style="width: 35%; height: 35%; border-radius:50% ;">
                                        </div> -->
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                <label>Image</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                                <span class="e_image text-danger d-none"></span>
                                            </div>
                                            <div class="mb-2">
                                                <label>User Name<span class="text-danger"> *</span></label>
                                                <input type="text" name="user_name" id="user_name" class="form-control">
                                                <span class="e_user_name text-danger d-none"></span>
                                            </div>
                                            <div class="mb-2">
                                                <label>Phone No<span class="text-danger"> *</span></label>
                                                <input type="text" name="phone_number" id="phone_number" class="form-control">
                                                <span class="e_phone_number text-danger d-none"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label>Address<span class="text-danger"> *</span></label>
                                                <input type="text" name="address" id="address" class="form-control">
                                                <span class="e_address text-danger d-none"></span>
                                            </div>
                                            <div class="d-flex justify-content-start mb-2">
                                                <label style="margin-right: 10px;">Gender : </label>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="male" name="gender" class="custom-control-input" value="male">
                                                    <label class="custom-control-label" for="male"> Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="female" name="gender" class="custom-control-input" value="female">
                                                    <label class="custom-control-label" for="female"> Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Update profile modal end -->
                        <!-- change password modal start -->
                       <div class="modal fade" id="change_password_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                    </div>
                                    <form id="change_password_form">
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                <label>Current Password<span class="text-danger"> *</span></label>
                                                <input type="password" class="form-control" id="cr_password" name="cr_password">
                                                <span class="e_cr_password text-danger d-none"></span>
                                            </div>
                                            <div class="mb-2">
                                                <label>Password<span class="text-danger"> *</span></label>
                                                <input type="password" class="form-control" id="password" name="password">
                                                <span class="e_password text-danger d-none"></span>
                                            </div>
                                            <div class="mb-2">
                                                <label>Confirm Password<span class="text-danger"> *</span></label>
                                                <input type="password" class="form-control" id="crf_password" name="crf_password">
                                                <span class="e_crf_password text-danger d-none"></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- change password modal end -->  
                        <!-- Update Logo modal start -->  
                        <div class="modal fade" id="update_logo_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Logo</h5>
                                    </div>
                                   <form method="post" enctype="multipart/form-data" id="logo_form">
                                        <div class="modal-body">
                                            <label>Logo<span class="text-danger"> *</span></label>
                                            <input type="file" name="logo" class="form-control">
                                            <span class="text-danger d-none e_logo"></span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                        <!-- Update Logo modal end -->  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php
foreach ($javascript as $value)
{
	?>
	<script type="text/javascript" src="<?=$value?>"></script>
	<?php
}
?>
<script>
    $(function() 
    {
        profileData();
        function profileData() 
        {
            $.ajax({
                url:"<?=base_url('profile');?>",
                type:"post",
                dataType:"json",
                success:function(data)
                {
                    if (data.image !=='') 
                    {
                        $('.image').attr('src','<?=base_url()?>/upload/'+data.image);
                    }
                    else
                    {
                        $('.image').attr('src','<?=base_url()?>/upload/defaultImg.png');
                    }
                    if (data.logo !=='') 
                    {
                        $('#logo').attr('src','<?=base_url()?>/logo/'+data.logo);
                    }
                    else
                    {
                        $('#logo').attr('src','<?=base_url()?>/logo/logo.png');
                    }
                    if (data.user_name !=='') 
                    {
                        $('#user').html(data.user_name);
                        $('#user_name').val(data.user_name);
                    }
                    if (data.phone_number !=='') 
                    {
                        $('#phone_number').val(data.phone_number);
                    }
                    if (data.address !=='') 
                    {
                        $('#address').val(data.address);
                    }
                    if (data.gender !=='') 
                    {
                        var male   = $('#male').val();
                        var female = $('#female').val();
                        if (data.gender == male) 
                        {
                            $('#male').attr('checked',true);
                        }
                        else if (data.gender == female)
                        {
                            $('#female').attr('checked',true);
                        }
                    }
                    else
                    {
                        $('#male').attr('checked',true);
                    }
                }
            }) 
        }

        $('#update_profile_form').on('submit',function(e) 
        {
            e.preventDefault();
            $.ajax({
                url:"<?=base_url('update-profile');?>",
                type:"post",
                data:new FormData(this),
                processData: false,
                contentType: false,
                dataType:"json",
                success:function(data)
                {
                    console.log(data);
                    if (data == 1) 
                    {
                        toastr.success("Profile Update is Successfully");
                        $('#image').val('');
                        $('#update_profile').modal('hide');
                        profileData();
                    }
                    if (data.error) 
                    {
                        if (data.user_name && data.user_name !=='') 
                        {
                            $('.e_user_name').removeClass('d-none');                    
                            $('.e_user_name').html(data.user_name);
                        }
                        else
                        {
                            $('.e_user_name').addClass('d-none');                    
                            $('.e_user_name').html('');
                        }
                        if (data.phone_number && data.phone_number !=='') 
                        {
                            $('.e_phone_number').removeClass('d-none');
                            $('.e_phone_number').html(data.phone_number);
                        }
                        else
                        {
                            $('.e_phone_number').addClass('d-none');
                            $('.e_phone_number').html('');
                        }
                        if (data.address && data.address !=='') 
                        {
                            $('.e_address').removeClass('d-none');                    
                            $('.e_address').html(data.address);
                        }
                        else
                        {
                            $('.e_address').addClass('d-none');                    
                            $('.e_address').html('');
                        }
                        if (data.image && data.image !=='') 
                        {
                            $('.e_image').removeClass('d-none');                    
                            $('.e_image').html(data.image);
                        }
                        else
                        {
                            $('.e_image').addClass('d-none');                    
                            $('.e_image').html('');
                        }
                    }
                    else
                    {
                        $('.e_user_name').addClass('d-none');                    
                        $('.e_user_name').html('');
                        $('.e_phone_number').addClass('d-none');
                        $('.e_phone_number').html('');
                        $('.e_address').addClass('d-none');                    
                        $('.e_address').html('');
                        $('.e_image').addClass('d-none');                    
                        $('.e_image').html('');
                    }
                    
                    
                }
            });
        });

        $('#change_password_form').on('submit',function(e) 
        {
            e.preventDefault();
            $.ajax({
                url:"<?=base_url('change-password');?>",
                type:"post",
                data:$('#change_password_form').serialize(),
                dataType:"json",
                success:function(data)
                {
                    if (data == "success") 
                    {
                        $('#change_password_modal').modal('hide');
                        $('#change_password_form')[0].reset();
                        toastr.success("Change Password is Successfully");
                    }
                    if (data.cr_password !='') 
                    {
                        $('.e_cr_password').removeClass('d-none');
                        $('.e_cr_password').html(data.cr_password);
                    }
                    else
                    {
                        $('.e_cr_password').addClass('d-none');
                        $('.e_cr_password').html('');
                    }
                    if (data.password !='') 
                    {
                        $('.e_password').removeClass('d-none');
                        $('.e_password').html(data.password);
                    }
                    else
                    {
                        $('.e_password').addClass('d-none');
                        $('.e_password').html('');
                    }
                    if (data.crf_password !='') 
                    {
                        $('.e_crf_password').removeClass('d-none');
                        $('.e_crf_password').html(data.crf_password);
                    }
                    else
                    {
                        $('.e_crf_password').addClass('d-none');
                        $('.e_crf_password').html('');
                    }
                    
                    
                    
                }
            });
        });

        $('#logo_form').on('submit',function(e)
        {
            e.preventDefault();
            $.ajax({
                url:"<?=base_url('update-logo');?>",
                type:"post",
                data:new FormData(this),
                processData: false,
                contentType: false,
                dataType:"json",
                success:function(data)
                {
                    if (data == 1) 
                    {
                        $('#update_logo_modal').modal('hide');
                        toastr.success("Update Logo is Successfully");
                        profileData();
                        $('#logo_form')[0].reset();
                    }
                    if (data.logo !='') 
                    {
                        $('.e_logo').removeClass('d-none');
                        $('.e_logo').html(data.logo);
                    }
                    else
                    {
                        $('.e_logo').addClass('d-none');
                        $('.e_logo').html('');
                    }
                }
            })
        });
    });
</script>
</html>