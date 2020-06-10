<tr class="productItem{{ $product->id }}">
    <th scope="row">{{ $product->id }}</th>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->description }}</td>
    <td>
        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
        <button
            class="btn btn-sm btn-danger productDelete"
            data-url="{{route('admin.products.destroy', $product->id)}}"
            data-id="{{ $product->id }}"
        >Удалить</button>
    </td>
</tr>
