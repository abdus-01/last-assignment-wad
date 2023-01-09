    <!-- ***** Chefs Area Starts ***** -->
    <section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Chefs</h6>
                        <h2>We offer the best ingredients for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                
                @foreach ($data1 as $data1)
                <div class="col-lg-4">
                    <div class="chef-item">
                        <div class="thumb">
                            <div class="overlay"></div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                            </ul>
                            <img height="400" width="200" src="chefimage/{{ $data1->image }}" alt="Chef #3">
                        </div>
                        <div class="down-content">
                            <h4>{{ $data1->name }}</h4>
                            <span>{{ $data1->speciality }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </section>