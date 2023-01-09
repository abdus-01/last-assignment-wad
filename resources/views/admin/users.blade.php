
<x-app-layout>
   
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
     @include('admin.navbar')
     
     <div style="position: relative; top:60px; right:-160px">
        <table class="table-striped table-active table-bordered" bgcolor="grey" border="3px">
            <tr><th style="padding: 30px">id</th>
                <th style="padding: 30px">Name</th>
                <th style="padding: 30px">Email</th>
                <th style="padding: 30px">Status</th>
                <th style="padding: 30px">Action</th>
            </tr>
            @foreach ($data as $data)
              
            
            <tr>
              <td>{{ $data->name }}</td>
               <td>{{ $data->name }}</td>
               <td>{{ $data->email }}</td>
               <td>{{ $data->usertype=='0'?'is Admin':'normal user' }}</td>
               @if ($data->usertype=='0')
               <td><a href="{{ url('/deleteuser',$data->id) }}" class="btn btn-danger">delete</a><a href="{{ url('/edituser',$user->id) }}">edit</a></td>
               @else
               <td><a href="{{ url('/edituser',$data->id) }}" class="btn btn-success">edit</a></td>
               @endif
               
            </tr>@endforeach
            <a href="{{ url('/adduser') }}" class="btn btn-primary">add user</a>
        </table>
     </div>
    </div>
    @include('admin.adminscript')
   
  </body>
</html>