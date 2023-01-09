

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
         <div style="">
            <form action="{{ url('/uploadfood') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Title</label>
                    <input type="text" style="color: black; positon: center;"  name="title" placeholder="give a title" required>
                </div>
                <div>
                    <label>Price</label>
                    <input type="num" style="color: black; " name="price" placeholder="give a price" required>
                </div>
                <div>
                    <label>image</label>
                    <input type="file"  name="image" required>
                </div>
                <div>
                    <label>Description</label>
                    <input type="text" style="color: black;" name="description" placeholder="give the description" required>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
            </form>
         </div>
         <div>
            <table class="table-striped table-active table-bordered" style="padding-left: 30px">
                <tr>
                    <th style="padding-right: 40px">Food name</th>
                    <th style="padding-right: 40px">Price</th>
                    <th style="padding-right: 40px">Description</th>
                    <th style="padding-right: 40px">Image</th>
                    <th style="padding-right: 40px">Action</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <th>{{ $data->title }}</th>
                    <th>{{ $data->price }}</th>
                    <th>{{ $data->description }}</th>
                    <th><img src="/foodimage/{{ $data->image }}" alt=""></th>
                    <th><a href="{{ url('/deletefood',$data->id) }}" class="btn btn-danger">delete</a><a href="{{ url('/updateview',$data->id) }}">edit</a></th>
                </tr>
                @endforeach
              
            </table>
         </div>
        </div>
        @include('admin.adminscript')
       
      </body>
    </html>