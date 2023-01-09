
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
         <div style="position: relative; top: 70px; right:-150">
            <table bgcolor="grey" class="table-striped table-active table-bordered">
                <tr>
                    <th >ID</th>
                    <th style="padding: 30px">Name</th>
                    <th style="padding: 30px">Email</th>
                    <th style="padding: 30px">Phone</th>
                    <th >Number of guests</th>
                    <th style="padding: 30px">Date</th>
                    <th style="padding: 30px" >Time</th>
                    <th style="padding: 30px">Message</th>
                    <th style="padding: 30px">Action</th>
                </tr>
                @foreach ($data as $data)
                <tr align="center">
                    <th>{{ $data->id }}</th>
                    <th>{{ $data->name }}</th>
                    <th>{{ $data->email }}</th>
                    <th>{{ $data->phone }}</th>
                    <th>{{ $data->guest }}</th>
                    <th>{{ $data->date }}</th>
                    <th>{{ $data->time }}</th>
                    <th>{{ $data->description }}</th>
                    <th><a href="{{ url('/deletereserve',$data->id) }}" class="btn btn-danger">delete</a><a href="{{ url('/updatereserve',$data->id) }}" class="btn btn-success">edit</a></th>
                </tr>
                @endforeach
               
            </table>

         </div>
        </div>
        @include('admin.adminscript')
       
      </body>
    </html>