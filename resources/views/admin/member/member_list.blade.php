 @extends('admin.admin_master')
@section('title','Ecommerce | Slider List')
@section('custom_css')
@endsection
@section('content')

<!-- modal -->
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
           {{--  <a>Member List  <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Member Add</button>
            </a> --}}
            <a href="{{ route('member_form') }}" class="btn btn-sm btn-success pull-right mb-2">Add Member</a>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Executive Name</th>
                     <th>Privilege Card No</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Cell Number</th>
                     <th>Present Address</th>
                     {{-- <th>Permanent Address</th> --}}
                    {{--  <th>Hospital Name</th>
                     <th>Doctors Name</th> 
                     <th>What type's of problem</th> 
                     <th>Attach Pharmacy</th> 
                     <th>What type of medicine</th>  --}}
                     <th>Action</th>
                  </tr>
               </thead>
               @php $i=1 @endphp
               @foreach($members as $member)
               <tr>
                  <td>{{$i++}}</td>
                  <td>{{$member->executive_name}}</td>
                  <td>{{$member->privilege_card_no}}</td>
                  <td>{{$member->name}}</td>
                  <td>{{$member->email}}</td>
                  <td>{{$member->cell_number}}</td>
                  <td>{{$member->present_address}}</td>
                 {{--  <td>{{$member->permanent_address}}</td>
                  <td>{{$member->hospital_name}}</td>
                  <td>{{$member->doctors_name}}</td>
                  <td>{{$member->attache_pharmacy}}</td>
                  <td>{{$member->medicine_type}}</td> --}} 
                  <td>
                       <a href="{{ route('member_edit',$member->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                      


                      <form id="delete-form-{{ $member->id }}" method="post" action="{{ route('member_delete',$member->id) }}"
                            style="display: none;">
                          @csrf
                          @method('DELETE')
                      </form>
                    <button type="button" class="btn btn-danger btn-sm" 
                        onclick="if(confirm('Are you sure? You want to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $member->id }}').submit();
                    }else {
                        event.preventDefault();
                            }"><a class=""><i class="fa fa-trash"></i></a></button>

                  </td>
               </tr>
               @endforeach
               <tbody>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom_script')
@if(Session::has('success'))
<script>
   swal({
     title: "Success!",
     text: "{{Session::get('success')}}",
     type: "success",
     timer: 1000
     });
</script>
@endif
@if(Session::has('error'))
<script>
   swal('error','{{Session::get('error')}}','error');
</script>
@endif

<script>
  $('#tire_based').hide();
  $('#design_based').hide();
   $( "#tire" ).click(function() {
      $('#tire_based').show(); 
      $('#design_based').hide();
   });
   $( "#design" ).click(function() {
      $('#tire_based').hide(); 
      $('#design_based').show();
   });
</script>
@endsection
