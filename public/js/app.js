$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//Создания продукта
$(function () {
    let productCreateForm = $('#productCreateForm');

    productCreateForm.submit(function (e) {
        let target = $(e.target),
            url = target.data().url,
            inputName = $('#inputName', target),
            inputPrice = $('#inputPrice', target),
            inputDescription = $('#inputDescription', target);
        $.ajax({
            method: 'POST',
            url: url,
            data: { name: inputName.val(), price: inputPrice.val(), description: inputDescription.val() },
        }).done(function (data) {
            $('#productCreateModal').modal('hide');
            productCreateForm.trigger("reset");
            let productItems = $('#productItems');
            productItems.append(data);
        }).fail(function() {
            alert("error");
        });

        e.preventDefault();
        return false;
    });
}());

//Редактирование продукта
$(function () {
    //Создание формы редактирования
    let productUpdate = $('.productUpdate');
    productUpdate.click(function (e) {
        let url = $(this).data().url;
        $.ajax({
            url: url,
            method: "get",
        }).done(function (data) {
            $('#productItems').append(data);
            $('#productEditModal').modal('show');
            sendToUpdateForm();
        }).fail(function() {
            alert("error");
        });
    });

    function sendToUpdateForm() {
        $('#productEditModal').on('hidden.bs.modal', function (e) {
            $(this).remove();
        });

        //Обработка форма
        let productEditForm = $('#productEditForm');

        productEditForm.submit(function (e) {
            let self = $(this),
                url = self.data().url,
                id = self.data().id,
                inputName = $('#inputName', self),
                inputPrice = $('#inputPrice', self),
                inputDescription = $('#inputDescription', self);
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    '_method': 'put',
                    name: inputName.val(),
                    price: inputPrice.val(),
                    description: inputDescription.val()
                },
            }).done(function (data) {
                $('#productEditModal').modal("hide");
                $('#productItems .productItem' + id).replaceWith(data);
            }).fail(function() {
                alert("error");
            });

            e.preventDefault();
            return false;
        });
    }
}());

//Удаления продукта
$(function () {
    let productDelete = $('.productDelete');

    productDelete.click(function (e) {
        let agree = confirm('Удалить продукт?');

        if (!agree) return;

        let target = $(e.target),
            url = target.data().url,
            id = target.data().id;

        $.ajax({
            method: 'POST',
            url: url,
            data: {'_method': 'delete'}
        }).done(function (data) {
            let productItem = $('.productItem' + id);
            productItem.remove();
        }).fail(function() {
            alert("error");
        });
    });
}());
