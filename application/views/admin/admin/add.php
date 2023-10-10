<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Quản trị viên</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
			Thêm quản trị viên
			</div>
			<div class="panel-body">
				<form class="form-horizontal" name="" method="post" onsubmit="return validateAdminForm();">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Họ tên</label>
				    <div class="col-sm-5">
				      <input type="text" name='name' class="form-control" id="inputEmail3" placeholder="" value="<?php echo set_value('name'); ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('name'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-5">
				      <input type="email" name='email' class="form-control" id="inputEmail3" placeholder="" value="<?php echo set_value('email'); ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('email'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
				    <div class="col-sm-5">
				      <input type="password" name='password' class="form-control" id="inputEmail3" placeholder="" value="<?php echo set_value('password'); ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('password'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
				    <div class="col-sm-5">
				      <input type="password" name='re_password' class="form-control" id="inputEmail3" placeholder="" value="<?php echo set_value('re_password'); ?>">
				    </div>
				    <div class="col-sm-4">
				    	<?php echo form_error('re_password'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Phân quyền</label>
				    <div class="col-sm-5">
				        <select class="form-control" name="level">
				        	<option>--- CHỌN ---</option>
				        	<option value="0">ADMIN</option>
				        	<option value="1">NHÂN VIÊN</option>
						</select>
				    </div>
				     <div class="col-sm-4">
				    	<?php echo form_error('level'); ?>
					</div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-5">
				      <button type="submit" class="btn btn-primary">Thêm mới</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div><!--/.row-->
<script>
function validateAdminForm() {
    var name = document.getElementsByName("name")[0].value;
    var email = document.getElementsByName("email")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var rePassword = document.getElementsByName("re_password")[0].value;
    var level = document.getElementsByName("level")[0].value;

    // Validation for Họ tên
    if (name.trim() === "") {
        alert("Họ tên không được để trống.");
        return false;
    }

    // Allow only letters and spaces for Họ tên
    if (!/^[a-zA-Z\s]+$/.test(name)) {
        alert("Họ tên chỉ được chứa chữ cái và dấu cách.");
        return false;
    }

    // Validation for Email
    if (email.trim() === "") {
        alert("Email không được để trống.");
        return false;
    }

    // Check for a valid email format
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Email không đúng định dạng.");
        return false;
    }

    // Validation for Mật khẩu
    if (password.trim() === "") {
        alert("Mật khẩu không thể để trống.");
        return false;
    }

    // Check for password length and presence of both letters and numbers
    if (password.length < 4 || !/[a-zA-Z]/.test(password) || !/\d/.test(password)) {
        alert("Mật khẩu phải có ít nhất 4 ký tự, bao gồm chữ và số.");
        return false;
    }

    // Validation for Nhập lại mật khẩu
    if (rePassword.trim() === "") {
        alert("Nhập lại mật khẩu không thể để trống.");
        return false;
    }

    // Check if Nhập lại mật khẩu matches Mật khẩu
    if (rePassword !== password) {
        alert("Nhập lại mật khẩu không khớp với mật khẩu.");
        return false;
    }

    // Validation for Phân quyền
    if (level.trim() === "" || level === "--- CHỌN ---") {
        alert("Phân quyền không thể để trống.");
        return false;
    }

    return true;  // Form submission will proceed if all validations pass
}
</script>