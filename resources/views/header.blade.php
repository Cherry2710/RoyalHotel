        <!--================Header Area =================-->
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="royal-master/image/Logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="/homepage">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="/about">About us</a></li>
                            
                        <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rooms</a>
                                <ul class="dropdown-menu">
                                @foreach($loai_sp as $loai)
								<li class="nav-item"><a class="nav-link" href="{{route('loai_sanpham', $loai -> id)}}">{{$loai -> name}}</a></li>
								@endforeach
                                    
                                   
                                </ul>
                            </li> 
                            <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/blog_detail">Blog Details</a></li>
                                </ul>
                            </li> 
                              
                            @if(Session::has('user'))	
                                <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">{{Session('user')->name}}</a></li>
                            @else 
                                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                                <!-- <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>                                       -->
                            @endif

                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area =================-->
     