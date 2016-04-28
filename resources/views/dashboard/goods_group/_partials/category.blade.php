<tr>
    <td>
        {{$item->id}}
    </td>
    <td>
        <img style="width: 100px;" src="{{$item->avatar}}" alt="">
    </td>
    <td>
        {{$item->category->name or ''}}
    </td>
    <td>
        {{$item->name}}
    </td>
    <td class="pull-right">
        <a href="/dashboard/goods_group/add/{{ $item->id }}" class="btn btn-primary"><span class="fa fa-edit"></span>
        </a>

        <a href="/dashboard/goods_group/destroy/{{ $item->id }}" class="btn btn-danger"><span
                    class="fa fa-trash-o"></span></a>
    </td>
</tr>

