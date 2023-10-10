<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Sản phẩm</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                Chỉnh sửa thông tin sản phẩm
            </div>
            <div class="panel-body">
                <form class="form-horizontal" name="" method="post" enctype="multipart/form-data" onsubmit="return validateProductForm();">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                        <div class="col-sm-5">
                            <input type="text" name='name' class="form-control" id="inputEmail3" placeholder="" value="<?php echo $product->name; ?>">
                        </div>
                        <div class="col-sm-4">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
                        <img src="<?php echo base_url('upload/product/' . $product->image_link); ?>" alt="" style="width: 50px;float:left;margin-left: 15px;">
                        <div class="col-sm-3">
                            <input type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh kèm theo</label>
                        <?php
                        $image_list = json_decode($product->image_list);
                        if (is_array($image_list)) {
                            foreach ($image_list as $value) {
                                ?>
                                <img src="<?php echo base_url('upload/product/' . $value); ?>" alt="" style="width: 50px;float:left;margin-left: 15px;">
                                <?php
                            }
                        }
                        ?>
                        <div class="col-sm-5">
                            <input type="file" id="list_image" name="list_image[]" multiple>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Chi tiết</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" name="content" id='content'><?php echo $product->content; ?></textarea>
                        </div>
                    </div>
                    <script>CKEDITOR.replace('content');</script>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Danh mục</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="catalog_id">
                                <option>--- Chọn danh mục sản phẩm ---</option>
                                <?php
                                foreach ($catalog as $value) {
                                    if (count($value->sub) > 1) {
                                        ?>
                                        <option value="<?php echo $value->id; ?>" <?php if ($product->catalog_id == $value->id) echo 'selected'; ?>><?php echo $value->name; ?></option>
                                        <?php foreach ($value->sub as $val) { ?>
                                            <option value="<?php echo $val->id; ?>" <?php if ($product->catalog_id == $val->id) echo 'selected'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $val->name; ?></option>
                                        <?php }
                                        ?>

                                    <?php }else { ?>
                                        <option value="<?php echo $value->id; ?>" <?php if ($product->catalog_id == $value->id) echo 'selected'; ?>><?php echo $value->name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <div class="col-sm-4">
                                <?php echo form_error('catalog_id'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Giá tiền</label>
                        <div class="col-sm-5">
                            <input type="text" name='price' class="form-control" id="inputEmail3" placeholder="" value="<?php echo number_format($product->price); ?>">
                        </div>
                        <div class="col-sm-4">
                            <?php echo form_error('price'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
                        <div class="col-sm-5">
                            <input type="text" name='discount' class="form-control" id="inputEmail3" placeholder="" value="<?php echo number_format($product->discount); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4" class="col-sm-2 control-label">Chi tiết số lượng</label>
                        <?php
                        foreach ($sizes as $size) {
                                    ?>
                                    <label for="inputEmail3" class="col-lg-1" style="margin-top: 10px;text-align: right"><?php $res = $this->size_model->get_info($size->size_id);echo $res->name ?></label>
                                    <div class="col-lg-1">
                                        <input type="hidden" name='size_<?php echo $size->size_id; ?>' class="form-control"  placeholder="" value='<?php echo $size->size_id ?>' >
                                        <input type="text" name='quantity_<?php echo $size->size_id; ?>' class="form-control"  placeholder="" value="<?php echo $size->quantity ?>">
                                    </div>
                        <?php } ?>
                        <?php for ($i=0;$i < sizeof($sizes2);$i++) { ?>
                            <label for="inputEmail3" class="col-lg-1" style="margin-top: 10px;text-align: right"><?php $res = $this->size_model->get_info($sizes2[$i]->id);echo $res->name ?></label>
                            <div class="col-lg-1">
                                <input type="hidden" name='size_<?php echo $sizes2[$i]->id; ?>' class="form-control"  placeholder="" value='<?php echo $sizes2[$i]->id ?>' >
                                <input type="text" name='quantity_<?php echo $sizes2[$i]->id; ?>' class="form-control"  placeholder="" value="0">
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                                                         <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!--/.row-->

<script>
function validateProductForm() {
    var name = document.getElementsByName("name")[0].value;
    var image = document.getElementsByName("image")[0].value;
    var content = document.getElementsByName("content")[0].value;
    var price = document.getElementsByName("price")[0].value;
    var discount = document.getElementsByName("discount")[0].value;
    var quantityFields = document.querySelectorAll('[name^="quantity_"]');

    // Validation for Tên sản phẩm
    if (name.trim() === "") {
        alert("Tên sản phẩm không được để trống.");
        return false;
    }

    // Allow only letters, numbers, and spaces for Tên sản phẩm
    if (!/^[a-zA-Z0-9\s]+$/.test(name)) {
        alert("Tên sản phẩm chỉ được chứa chữ cái, số và dấu cách.");
        return false;
    }

    // Validation for Hình ảnh
    if (image.trim() === "") {
        alert("Hình ảnh không được để trống.");
        return false;
    }

    // Check for valid image file extension
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(image)) {
        alert("Hình ảnh không đúng định dạng (chấp nhận: .jpg, .jpeg, .png, .gif).");
        return false;
    }
        // Validation for Giá tiền
    if (price.trim() === "" || isNaN(price)) {
        alert("Giá tiền phải là số.");
        return false;
    }

    // Validation for Giảm giá
    if (discount.trim() !== "" && isNaN(discount)) {
        alert("Giảm giá phải là số.");
        return false;
    }

    // Validation for Chi tiết
    if (content.trim() === "") {
        alert("Chi tiết không được để trống.");
        return false;
    }

    // Validation for Chi tiết số lượng
    for (var i = 0; i < quantityFields.length; i++) {
        var quantity = quantityFields[i].value;
        if (quantity.trim() === "") {
            alert("Chi tiết số lượng không được để trống.");
            return false;
        }
        if (isNaN(quantity) || parseInt(quantity) < 0) {
            alert("Chi tiết số lượng phải là số dương.");
            return false;
        }
    }

    return true;  // Form submission will proceed if all validations pass
}
</script>