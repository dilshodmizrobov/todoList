@extends('admin.app')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-auto">
                <h3>Продукты</h3>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productCreateModal">
                    Добавить
                </button>
                <!-- Modal -->
                <div class="modal fade" id="productCreateModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="productCreateForm" data-url="{{ route('admin.products.store') }}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Добавить продукат</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputName">Имя:</label>
                                        <input name="name" type="text" class="form-control form-control-sm" id="inputName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPrice">Цена:</label>
                                        <input name="price" type="text" class="form-control form-control-sm" id="inputPrice" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Описание:</label>
                                        <textarea name="description" class="form-control form-control-sm" id="inputDescription" cols="20" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Цены</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody id="productItems">
                @foreach($products as $product)
                    <tr class="productItem{{ $product->id }}">
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <button class="btn btn-sm btn-primary productUpdate"
                                    data-url="{{route('admin.products.edit', $product->id)}}"
                            >Редактировать</button>
                            <button class="btn btn-sm btn-danger productDelete"
                                data-url="{{route('admin.products.destroy', $product->id)}}"
                                data-id="{{ $product->id }}"
                            >Удалить</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
