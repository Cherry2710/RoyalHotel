<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\TypeRoom;
use App\Models\Hotel;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Jobs\SendMail;
use Illuminate\Support\Collection;

class HotelController extends Controller
{
    
    public function getIndex(){
        $new_room  = DB::table('rooms') -> paginate(8);
        $type_room = TypeRoom::all();
        $hotel = Hotel::all();
        $sp_theoloai= Room::all() ;

        return view('page.homepage', compact( 'new_room', 'type_room', 'hotel','sp_theoloai'));
    }

    public function getLoaiSp($type){
        $new = Room::where('type_id', $type) ->get();
        $type_room = TypeRoom::where('id', $type)->first();
        
        $hotel = Hotel::all();
        

        return view('page.typeroom_page',compact('new', 'type_room', 'hotel'));
    }

    public function getSp(){
        return view('page.chitiet_sanpham');
    }

    public function lienhe(){
        return view('page.lienhe');
    }

    public function about(){
        return view('page.about');
    }

    public function getChitiet(Request $req){
        $sanpham = Room::where('id', $req -> id) -> first();
        $hotelname = Hotel::all();
        $type_room = TypeRoom::all();
        $rooms= Room::all();

        return view('page.detail', compact('sanpham', 'hotelname', 'rooms', 'type_room'));
    }
    public function getCheckout(Request $request){
        $detail =[
            'hotelname' => $request->hotelname,
            'address' => $request->address,
            'typename' => $request->typename,
            'price' => $request->price,
            'arrival' => $request->input('arrival'),
            'duration' => $request->input('duration'),
            'quantity' => $request->quantity,
            'total' => $request->input('duration') * $request->price * $request->quantity
        ];
        Session::put('booking', $detail);
        return view('page.checkout',compact('detail'));
    }
    public function news(){
        $bangtin = DB::table('news') -> paginate(12);
        return view('page.news',compact('bangtin'));
    }

    public function getOverview(){
        $hotelname = Hotel::all();
        $hotel_arrs = array();
        
        foreach($hotelname as $hotel){
            $bills  = Bill::where('hotelname', $hotel->name) ->get();
            $arr = [];
            foreach ($bills as $bill) {
                $arr[] = $bill -> total;
            }
            $collection = collect($arr);
            $chunks = $collection->sum();
            $hotel_arr = array($hotel->name => $chunks);
            $hotel_arrs += $hotel_arr;
        }


        $typeroom = TypeRoom::all();
        $type_arrs = array();
        
        foreach($typeroom as $type){
            $bills  = Bill::where('typename', $type->name) ->get();
            $arr = [];
            foreach ($bills as $bill) {
                $arr[] = $bill -> total;
            }
            $collection = collect($arr);
            $chunks = $collection->sum();
            $type_arr = array($type->name => $chunks);
            $type_arrs += $type_arr;
        }
        return view('adminpage.overview',compact('hotel_arrs', 'type_arrs'));
    }
    public function getIndexAdmin(){
        $room  = DB::table('rooms') -> paginate(110);
        return view('adminpage.admin',compact('room'));
    }

   
    public function getAdminAdd()
    {
        return view('adminpage.addForm');
    }

    public function postAdminAdd(Request $request)
    {
        $room = new Room();

        $room -> image = $request -> inputImage;
        $room -> description = $request -> inputDescription;
        $room -> price = $request -> inputPrice;
        $room -> status = $request -> inputStatus;
       
        $room -> hotel_id = $request -> inputHotelId;
        $room -> type_id = $request -> inputTypeId;
        $room -> save();
        echo '<script>
                alert("Add room successfully.");
                window.location.assign("/admin");
              </script>';
    }

    public function getAdminEdit($id)
    {
        $room =  Room::find($id);
        return view('adminpage.editForm')->with('room', $room);
    }

    public function postAdminEdit(Request $request)
    {
        $id = $request -> editId;
        $room = Room::find($id);

        $room -> image = $request -> editImage;
        $room -> hotel_id = $request -> editHotelId;
        $room -> type_id = $request -> editTypeId;
        $room -> price = $request -> editPrice;
        $room -> description = $request -> editDescription;
        $room -> status = $request -> editStatus;

        $room -> save();
        echo '<script>
                alert("Edit room successfully.");
                window.location.assign("/admin");
              </script>';
    }

    public function postAdminDelete($id){
        $room = Room::find($id);
        $room->delete();
        echo '<script>
                alert("Delete room successfully.");
                window.location.assign("/admin");
              </script>';
    }



    public function postCheckout(Request $req)
    {
        $ses = Session::get('booking');
        $customer = new Bill;

        $customer->firstname = $req->firstName;
        $customer->lastname = $req->lastName;
        $customer->email = $req->email;
        $customer->phone = $req->numberphone;
        $customer->payment = $req->payment_method;
        $customer->hotelname = $ses['hotelname'];
        $customer->typename = $ses['typename'];
        $customer->price = $ses['price'];
        $customer->arrival = $ses['arrival'];
        $customer->duration = $ses['duration'];
        $customer->quantity = $ses['quantity'];
        $customer->total = $ses['total'];
        $customer->save();

        Session::forget('booking');

        $message = [
            'type' => 'Notification of successful booking',
            'thanks' => 'Thanks ' .$req->firstName . ' ' . $req->lastName . ' for booking.',
            'booking' => $ses,
            'hotelname' => ' + Hotel name: ' .$ses['hotelname'] ,
            'address' => ' + Hotel address: ' .$ses['address'] ,
            'typename' => ' + Type room: ' .$ses['typename'] ,
            'price' => ' + Price: $' .$ses['price'] ,
            'arrival' => ' + Arrival date: ' .$ses['arrival'] ,
            'duration' => ' + Duration: ' .$ses['duration'] ,
            'quantity' => ' + Number of room: ' .$ses['quantity'] ,
            'total' => ' + Total price: $' .$ses['total'] ,
            'payment_method' => ' + Payment method: ' .$req->payment_method ,
        ];
        SendMail::dispatch($message, $req->email)->delay(now()->addMinute(1));

        // ----------- PAYMENT WITH VNPAY -----------
        if ($req->payment_method == "vnpay") {
            $cost_id = date_timestamp_get(date_create());
            $vnp_TmnCode = "57U1FZ9V"; //Mã website tại VNPAY
            $vnp_HashSecret = "TQIBCZEXUERWJKGJGLWFQHCLSWWOCXVZ"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost:8000/return-vnpay";
            $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = ((int)$ses['total']) * 100 * 24000;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = request()->ip();

            $vnp_BankCode = 'NCB';

            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }
            echo '<script>location.assign("' . $vnp_Url . '");</script>';

            $this->apSer->thanhtoanonline($cost_id);
            return redirect('success')->with('data', $inputData);
        } else {
            echo "<script>alert('Đặt hàng thành công')</script>";
            return redirect('homepage');
        }
    }
}

    


