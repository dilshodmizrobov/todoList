<div class="modal fade" id="productEditModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form id="productEditForm" data-id="{{ $product->id }}" data-url="{{ route('admin.products.update', $product->id) }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование продукта</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName">Имя:</label>
                        <input name="name" type="text" value="{{$product->name}}" class="form-control form-control-sm" id="inputName" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPrice">Цена:</label>
                        <input name="price" type="text" value="{{$product->price}}" class="form-control form-control-sm" id="inputPrice" required>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Описание:</label>
                        <textarea name="description" class="form-control form-control-sm" id="inputDescription" cols="20" rows="5">{{$product->description}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </div>
        </form>
    </div>
</div>
