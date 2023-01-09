
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
         <div class="contianer">
            <form action="{{ url('/search') }}" method="GET">
                @csrf
            <input type="text" name="search" style="color: blue;">
            <input type="submit" value="search" class="btn btn-success">
         </form>
         <div>
            <table class="table-striped table-active table-bordered" bgcolor="grey" border="3px">
                <tr>
                    <th style="padding: 30px">Food name</th>
                    <th >Quantity</th>
                    <th style="padding: 30px">Price</th>
                    <th style="padding: 30px">Name</th>
                    <th style="padding: 30px" >Address</th>
                    <th style="padding: 30px" >Phone Number</th>
                    <th >Total</th>
                    <th style="padding: 30px">Action</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <th>{{ $data->foodname }}</th>
                    <th>{{ $data->quantity }}</th>
                    <th>{{ $data->price }}</th>
                    <th>{{ $data->name }}</th>
                    <th>{{ $data->address }}</th>
                    <th>{{ $data->phone }}</th>
                    <th>{{$data->price * $data->quantity}}</th>
                    <th><a href="" class="btn btn-danger">delete</a><a href="" class="btn btn-success">edit</a></th>
                </tr> 
                @endforeach
                
               
            </table>
         </div></div>
         
        </div>
        @include('admin.adminscript')
       
      </body>
    </html>