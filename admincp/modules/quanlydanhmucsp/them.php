<!-- Form điền sản phẩm -->
<div class="card mb-4">
    <div class="card-header bg-primary text-white">Thêm danh mục mới</div>
    <div class="card-body">
        <form action="modules/quanlydanhmucsp/xuly.php" method="post">
            <div class="mb-3">
                <label for="productName" class="form-label">Tên danh mục:</label>
                <input
                    name="tendanhmuc"
                    type="text"
                    class="form-control"
                    id="productName"
                    placeholder="Nhập tên danh mục" />
            </div>
            <div class="mb-3">
                <label for="productCode" class="form-label">Thứ tự:</label>
                <input
                    name="thutu"
                    type="number"
                    class="form-control"
                    id="productCode"
                    placeholder="Nhập số thự tự" />
            </div>
            <button type="submit" name="themdanhmuc" class="btn btn-success">
                Thêm danh mục
            </button>
        </form>
    </div>
</div>