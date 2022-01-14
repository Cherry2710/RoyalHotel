@extends('master')
@section('content')

        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Accomodation</h2>
                    <ol class="breadcrumb">
                        <li><a href="/homepage">Home</a></li>
                        <li class="active">Accomodation</li>
                    </ol>
                </div>
            </div>
        </section>

	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="{{$sanpham -> image}}" height= "400px" width= "300px"/></div>
						  
						</div>
						
						
					</div>
					<div class="details col-md-6">
						
                        <form action="{{ route('checkout') }}" method="POST" class="register-form" id="register-form">
                        @csrf
                            @foreach ($hotelname as $hotel)
                                @if($sanpham -> hotel_id == $hotel->id)
                                <h5 class="hotelname" name="hotelname">Hotel: <b>{{$hotel->name}}</b></h5>
                                <h5 class="address" name="address">Address: <b>{{$hotel->address}}</b></h5>
                                <input type='hidden' class="form-control" name="hotelname" value="{{$hotel->name}}"/>
                                <input type='hidden' class="form-control" name="address" value="{{$hotel->address}}"/>
                                
                                @endif
                            @endforeach

                            @foreach ($type_room as $type)
                                @if($sanpham -> type_id == $type->id)
                                <h5 class="typename" name="typename">Type room: <b>{{$type->name}}</b></h5>
                                <input type='hidden' class="form-control" name="typename" value="{{$type->name}}"/>
                                @endif
                            @endforeach
                            
                            
                            <h5 class="product-description" name="price">Price: <b>${{$sanpham->price}}/day</b></h5>
                            <input type='hidden' class="form-control" name="price" value="{{$sanpham->price}}"/>
                            <div class="col-md-4">
                            <div class="book_tabel_item">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker11'>
                                        <input type='text' class="form-control" name="arrival" placeholder="Arrival Date"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="departure" placeholder="Departure Date"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    
                                        <input type='number' class="form-control" name="duration" placeholder="Duration"/>                                      
                                    
                                </div>
                            </div>
                            <div class="book_tabel_item">
                                <div class="input-group">
                                    <select class="wide" name="quantity">
                                        <option data-display="Number of Rooms">Number of Rooms</option>
                                        <option value="1">1 room</option>
                                        <option value="2">2 rooms</option>
                                        <option value="3">3 rooms</option>
                                    </select>
                                </div>                
                            </div>
                            <input type="submit" name="book" id="book" class="form-submit" value="Book Now"/>
                        </div>
                    </form>						
					</div>
				</div>
			</div>
		</div>
	</div>
    <br>
    <br>
        
    <!--================Booking Tabel Area =================-->
    
        <!--================Booking Tabel Area  =================-->
        <br>
        <br>

  @endsection