  @php $i =1 @endphp
  @foreach($role_infos as $data)
    <tr>
      <td>{{$i++}}</td>
      <td>{{$data->user_role_name}}</td> 
      <td><a href="{{url('set-permission')}}/{{$data->id}}" class="btn btn-sm btn-primary">Set Permission</a></td> 
        <td>
          <a href="" data-toggle="modal" data-target="#editModal" id="edit" data-id="{{$data->id}}"><i class="fa fa-edit btn btn-sm btn-success" aria-hidden="true"  ></i></a>
          <a href="{{url('user-role-delete')}}/{{$data->id}}" onclick="return confirm('Are you sure you want to Delete?')"><i class="delete fa fa-trash btn btn-sm btn-danger" aria-hidden="true"></i></a>
        </td>
    </tr>
  @endforeach