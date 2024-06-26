<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;

use Illuminate\Support\Facades\Notification;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\User;
use Validator,Auth;
use App\Models\ProductSimilarity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $most_booked=Vehicle::join('brands','vehicles.Brand','=','brands.id')->join('ranks','vehicles.Vid','=','ranks.Vehicle_id')->select('vehicles.*','brands.*')->orderBy('ranks.rank','DESC')->limit(10)->get();
        $two=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',2)->select('vehicles.*','brands.*')->paginate(4);
        $four=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',4)->select('vehicles.*','brands.*')->paginate(4);
       // return $result;
      // return response()->json($most_booked);
       return view('userHome',compact('two','four','most_booked'));
    }
    public function vehicle_details($id=null){
        $result=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('Vid',$id)->first();
        //return $result;
       // return view('user.booking.vehicle_detail',compact('result'));

        //recommadation 
        $products        = Vehicle::leftJoin('brands','Brand','=','brands.id')->select('vehicles.*','brands.*')->get()->toArray();
        $selectedId      = intval($id);
        $selectedProduct = $products[0];
    
        $selectedProducts = array_filter($products, function ($product) use ($selectedId) { return $product['Vid'] === $selectedId; });
        if (count($selectedProducts)) {
            $selectedProduct = $selectedProducts[array_keys($selectedProducts)[0]];
        }
    
        $productSimilarity = new ProductSimilarity($products);
        $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();
        $products          = $productSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);
    
    //     return view('welcome', compact('selectedId', 'selectedProduct', 'products'));
    // }); 
//dd($products);
         return view('user.booking.vehicle_detail',compact('result','products'));

    }
    public function two()
    {   
        $most_booked=Vehicle::join('brands','vehicles.Brand','=','brands.id')->join('ranks','vehicles.Vid','=','ranks.Vehicle_id')->where('vehicles.Vtype',2)->select('vehicles.*','brands.*')->orderBy('ranks.rank','DESC')->limit(10)->get();
        $two=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',2)->select('vehicles.*','brands.*')->paginate(12);
       // $four=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',4)->select('vehicles.*','brands.*')->paginate(4);
       // return $result;
       return view('two_wheeler',compact('two','most_booked'));
    }
    public function four()
    {   
        $most_booked=Vehicle::join('brands','vehicles.Brand','=','brands.id')
                              ->join('ranks','vehicles.Vid','=','ranks.Vehicle_id')
                              ->where('vehicles.Vtype',4)->select('vehicles.*','brands.*')
                              ->orderBy('ranks.rank','DESC')->limit(10)->get();
        $four=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',4)
                     ->select('vehicles.*','brands.*')->paginate(12);
       // $four=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',4)->select('vehicles.*','brands.*')->paginate(4);
       // return $result;
       return view('four_wheeler',compact('four','most_booked'));
    }
    public function mostbooked()
    {   
      //  $most_booked=Vehicle::leftJoin('brands','Brand','=','brands.id')->leftJoin('ranks','ranks.Vehicle_id','=','vehicles.Vid')->select('vehicles.*','brands.*')->orderBy('ranks.rank', 'DESC')->limit(10);
       // $four=Vehicle::leftJoin('brands','Brand','=','brands.id')->where('vehicles.Vtype',4)->select('vehicles.*','brands.*')->paginate(4);
       // return $result;
      // return view('four_wheeler',compact('four'));
    }

    public function mark(){
        $user=User::find(Auth::User()->id);
        Auth::User()->unreadNotifications->markAsRead();
        return redirect(route('report'));
    }

    public function search(Request $res){
        $search=$res->search;
        if($search != ""){
            $result=Vehicle::leftJoin('brands','Brand','=','brands.id')
            ->where('vehicles.Vname','LIKE',"%$search%")
            ->orWhere('vehicles.Fuel','LIKE',"%$search%")
            ->orWhere('vehicles.Model','LIKE',"%$search%")
            ->orWhere('brands.Bname','LIKE',"%$search%")
            ->select('vehicles.*','brands.*')->get();
            return view('search_result',compact('result'));
        }else{
           return redirect(route('home'));
        }
       
      
    }
    public function autosearch(Request $res){
        $search=$res->type;
       // echo $search;
        if($search != ""){
            $result=Vehicle::leftJoin('brands','Brand','=','brands.id')
            ->where('vehicles.Vname','LIKE',"%$search%")
            ->orWhere('vehicles.Fuel','LIKE',"%$search%")
            ->orWhere('vehicles.Model','LIKE',"%$search%")
            ->orWhere('brands.Bname','LIKE',"%$search%")
            ->select('vehicles.*','brands.*')->get();
              return $result;
        //      $li='<ul>';
        //     foreach ($search as $r) {
        //         $li.='<li><img src="/vehicles/'.$r->img1.'"style="width:50px;" ><strong class="ps-2">"'.$r->Vname.'"</strong></li>';
        //       }
        //       $li.='</ul>';
        //      $data= array(
        //         'list_data'=>$li,
        //      );
        //      echo js_encode($data);
        //  }else{
        //      echo 'empty';
         }
    }

    // Route::get('/', function () {
    //     return view('welcome');
    //     $products        = json_decode(file_get_contents(storage_path('data/products-data.json')));
    //     $selectedId      = intval(app('request')->input('id') ?? '8');
    //     $selectedProduct = $products[0];
    
    //     $selectedProducts = array_filter($products, function ($product) use ($selectedId) { return $product->id === $selectedId; });
    //     if (count($selectedProducts)) {
    //         $selectedProduct = $selectedProducts[array_keys($selectedProducts)[0]];
    //     }
    
    //     $productSimilarity = new App\ProductSimilarity($products);
    //     $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();
    //     $products          = $productSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);
    
    //     return view('welcome', compact('selectedId', 'selectedProduct', 'products'));
    // }); 
}
