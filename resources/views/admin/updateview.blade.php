
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
         <div style="">
            <form action="{{ url('/updatefood',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Title</label>
                    <input type="text" style="color: black; positon: center;"  name="title" value="{{ $data->title }}" required>
                </div>
                <div>
                    <label>Price</label>
                    <input type="num" style="color: black; " name="price" value="{{ $data->price }}" required>
                </div>
                <div>
                    <label>old image</label>
                    <img src="/foodimage/{{ $data->image }}" alt="">
                </div>
                <div>
                    <label>new image</label>
                    <input type="file"  name="image" required>
                </div>
                <div>
                    <label>Description</label>
                    <input type="text" style="color: black;" name="description" value="{{ $data->description }}" required>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
            </form>
         </div>
        </div>
        @include('admin.adminscript')
       
      </body>
    </html>