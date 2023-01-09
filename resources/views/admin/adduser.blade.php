
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
            <a href="{{ url('/users') }}" class="btn btn-primary">Back</a>
            <form action="{{ url('users') }}" method="POST">
                @csrf
                <div>
                    <label>Name</label>
                    <input type="text" style="color: black;" name="name" placeholder="give the user name" required>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" style="color: black;" name="email" placeholder="give the user email" required>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" style="color: black;"  name="password" placeholder="give the user password" required>
                </div>
                <div>
                    <label>Confirm Password</label>
                    <input type="password" style="color: black;" name="confirm password" placeholder="confirm user password" required>
                </div>
                <div>
                    <input type="checkbox" name="usertype">
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
            </form>
            
         </div>
        </div>
        @include('admin.adminscript')
       
      </body>
    </html>