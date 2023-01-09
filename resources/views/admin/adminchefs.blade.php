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
     <div>
      <form action="{{ url('/uploadchef') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" style="color: black;" name="name" placeholder="give the chef name" required>
        </div>
        <div>
            <label>Speciality</label>
            <input type="text" style="color: black;" name="speciality" placeholder="give the chef speciality" required>
        </div>
        <div>
            <label>Picture</label>
            <input type="file"   name="image" required>
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="Add chef">
        </div>
    </form>
     </div>
     <div style="">
        <table class="table-striped table-active table-bordered" bgcolor="grey" border="3px">
            <tr>
                <th>ID</th>
                <th style="padding-right: 30px">Name</th>
                <th style="padding-right: 90px">Speciality</th>
                <th style="padding-right: 30px">Image</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $data)
            <tr>
              <td>{{ $data->id }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->speciality }}</td>
              <td><img src="/chefimage/{{ $data->image }}" height="150" width="150" alt="chef {{ $data->name }} image"></td>
              <th><a href="{{ url('/deletechef',$data->id) }}" class="btn btn-danger">delete</a><a href="{{ url('/updatechef',$data->id) }}" class="btn btn-success">edit</a></th>
           </tr>
            @endforeach
            
        </table>
     </div>
    </div>
    @include('admin.adminscript')
   
  </body>
</html>