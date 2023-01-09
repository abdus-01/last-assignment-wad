
    <x-app-layout>
   
    </x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <base href="/public">
        @include('admin.admincss')
      </head>
      <body>
        <div class="container-scroller">
         @include('admin.navbar')
         <form action="{{ url('/editchef',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Name</label>
                <input type="text" style="color: black;" name="name" value="{{ $data->name }}" required>
            </div>
            <div>
                <label>Speciality</label>
                <input type="text" style="color: black;" name="speciality" value="{{ $data->speciality }}" required>
            </div>
            <div>
                <label>Old Picture</label>
                <img src="/chefimage/{{ $data->image }}" alt="chef image">
            </div>
            <div>
                <label>New Picture</label>
                <input type="file"   name="image" required>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Update chef">
            </div>
        </form>
        </div>
        @include('admin.adminscript')
       
      </body>
    </html>