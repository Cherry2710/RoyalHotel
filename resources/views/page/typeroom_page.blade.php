@extends('master')
@section('content')

        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Rooms</h2>
                    <ol class="breadcrumb">
                        <li><a href="/homepage">Home</a></li>
                        <li class="active">Rooms</li>
                    </ol>
                </div>
            </div>
        </section>

        <section class="accomodation_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">{{$type_room -> name}}</h2>
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
                </div>
                <div class="row mb_30">
                    @foreach ($new as $room)
                    <div class="col-lg-3 col-sm-6">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <img src="{{$room -> image}}" alt="" height= "300px" ; object-fit: cover>
                                <a href="{{route('detail', $room->id)}}" class="btn theme_btn button_hover">Book Now</a>
                            </div>
                            
                            <h5>{{$room -> price}}<small>/night</small></h5>                           
                            
                            
                            

                            @foreach ($hotel as $ho)
                            @if($room -> hotel_id == $ho->id)
                            <h7>{{$ho->name}}</h7>
                            @endif
                            @endforeach

                            
                            
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
       

@endsection

