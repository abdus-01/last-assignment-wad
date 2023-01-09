
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
         <div class="contact-form">
            <form id="contact" action="{{ url('/editreserve',$data->id) }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-lg-12">
                    <h4>Table Reservation</h4>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" style="color: black;" id="name" placeholder="Your Name*" required="">
                  </fieldset>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <fieldset>
                  <input name="email" type="text" style="color: black;" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                </fieldset>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <fieldset>
                    <input name="phone" type="text" style="color: black;" id="phone" placeholder="Phone Number*" required="">
                  </fieldset>
                </div>
                <div class="col-md-6 col-sm-12">
                  <input type="number" name="guest" style="color: black;" placeholder="number of guests">
                </div>
                <div class="col-lg-6">
                    <div id="filterDate2">    
                      <div class="input-group date" data-date-format="dd/mm/yyyy">
                        <input  name="date" id="date" style="color: black;" type="text" class="form-control" placeholder="dd/mm/yyyy">
                        <div class="input-group-addon" >
                          <span class="glyphicon glyphicon-th"></span>
                        </div>
                      </div>
                    </div>   
                </div>
                <div class="col-md-6 col-sm-12">
                  
                  <input type="time" name="time">

                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" style="color: black;" id="message" placeholder="Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="main-button-icon">Edit Reservation</button>
                  </fieldset>
                </div>
              </div>
            </form>
        </div>
        </div>
        @include('admin.adminscript')
       
      </body>
    </html>