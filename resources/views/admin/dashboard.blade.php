@extends('layouts.master')

@section('content')
<script>
function callDeleteUid(id) {
    if(confirm('Are you sure you want to delete this user?')){
        $('#frm'+id).submit();
        return false;
    }
}    
</script>
<style>
    table.table-condensed td.col-md-1, table.table-condensed td.col-md-2{
        word-break: break-all;
    }
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading" style="display:inline-block;width:100%">
                                    <div style="float:left">Users List</div>
                                </div>

				<div class="panel-body">
					<table class="table table-condensed">
                                            <thead>
                                              <tr>
                                                <th class="col-md-1">S.No</th>
                                                <th class="col-md-3">Name</th>
                                                <th class="col-md-4">Email</th>
                                                <th class="col-md-4">Actions</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach ($users as $key => $user)
                                              <tr>
                                                <td>{{ ++$key }}</td>
                                                <td class="col-md-1">{{ $user->name }}</td>
                                                <td class="col-md-1">{{ $user->email }}</td>
                                                <td class="col-md-4"><a href="{{ url("/admin/edituser") }}/{{ $user->id }}">edit</a>
                                                    &nbsp;&nbsp;<form id="frm{{ $user->id }}" name="deletefrm{{ $user->id }}" method="post" action="{{ url("/admin/deleteuser") }}" style="float:left">
                                                                    {{ csrf_field() }}            
                                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                                </form>
                                                                <a href="javascript:void(0)" onclick="callDeleteUid('{{ $user->id }}')">delete</a>
                                                </td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                    

                                </div>
			</div>
		</div>
	</div>
</div>
@endsection