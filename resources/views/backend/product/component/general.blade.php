<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-panel text-left">Tên sản phẩm<span class="text-danger">(*)</span></label>
            <input type="text" name="name" value="{{old('name', ($product->name) ?? '')}}" class="form-control" placeholder="" autocomplete="off">

        </div>
    </div>
</div>
<div class="row mb15 mt10">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-panel text-left">Gia sản phẩm<span class="text-danger">(*)</span></label>
            <input type="text" name="price" value="{{old('price', ($product->price) ?? '')}}" class="form-control" placeholder="" autocomplete="off">

        </div>
    </div>
</div>
<div class="row mb15 mt10">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-panel text-left">Sale_price sản phẩm<span class="text-danger">(*)</span></label>
            <input type="text" name="sale_price" value="{{old('sale_price', ($product->sale_price) ?? '')}}" class="form-control" placeholder="" autocomplete="off">

        </div>
    </div>
</div>
