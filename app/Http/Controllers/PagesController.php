<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Lands;
use App\totalChart;
use App\Charts\postsChart;
use App\Charts\spanChart;
use App\cropSalesChart;
use App\cropSalesChart2;
use Charts;
use App\CropList;
use DB;
use App\Charts\productsChart;

class PagesController extends Controller
{
    public function index()
    {
        //return view('pages.index', compact('title'));

        //
        //$posts = Post::all();
        //return Post::where('crop_name','Cabbage')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('crop_name','desc')->take(1)->get();
        $posts = Post::orderBy('crop_name', 'desc')->take(3)->get();

        $user_lands = Lands::orderBy('name_of_company', 'desc')->take(3)->get();

        // $allposts = Post::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();

        // $data = collect([]); // Could also be an array

        // for ($days_backwards = 10; $days_backwards >= 0; $days_backwards--) {
        //     // Could also be an array_push if using an array rather than a collection.
        //     $data->push(Lands::whereDate('created_at', today()->subDays($days_backwards))->count());
        // }

        // $chart = new productsChart;
        // $chart->labels(['10 days ago', 'Yesterday', 'Today']);
        // $chart->dataset('My dataset', 'line', $data);
        // $chart = new productsChart;
        // $chart->labels($allPosts->keys());
        // $chart->dataset('Crops', 'line', $allPosts->values());

        $totalQty = cropSalesChart::orderBy('crop_name')
            ->pluck('totalavailableqty', 'crop_name');

        $totalPrice = totalChart::orderBy('crop_name')
            ->pluck('avgcropprice', 'crop_name');


        $salesKg = cropSalesChart::orderBy('crop_name')
            ->pluck('totalkgsold', 'crop_name');

        $salesFixedQuantity = cropSalesChart::orderBy('crop_name')
            ->pluck('totalfixedqty', 'crop_name');


        $chart = new productsChart;
        $chart->labels($totalQty->keys())->options([
            'legend' => [
                'display' => true,
                'position' => 'top',
                'fullWidth' => true,
                'align' => 'start'
            ]
        ]);
        $chart->dataset('Crop Availability', 'bar', $totalQty->values())
            ->backgroundColor('green');
        // $chart->dataset('Crops Average Price', 'line', $totalPrice->values())
        // ->backgroundColor('grey');
        $chart->dataset('Crops Fixed Quantity', 'bubble', $salesFixedQuantity->values())
            ->backgroundColor('red');
        $chart->dataset('Crop Sales Kilogram', 'line', $salesKg->values())
            ->backgroundColor('grey');

        $data = cropSalesChart::orderBy('crop_name')
            ->pluck('totalfixedqty', 'totalkgsold');

        $salesPercentage = cropSalesChart::orderBy('crop_name')
            ->pluck('totalpercentage', 'crop_name');

        $top6 = cropSalesChart::all()->take(6);
        $top12 = cropSalesChart::skip(6)->take(6)->get();
        $top1212 = cropSalesChart::all()->take(12);
        $top10 = cropSalesChart::all()->take(12);
        $defaultImg = CropList::all();
        $top6qty = cropSalesChart2::all()->take(6);
        $top6qty12 = cropSalesChart2::all()->take(12);
        $top12qty = cropSalesChart2::skip(6)->take(6)->get();


        $salesChart = new postsChart;
        $salesChart->labels($salesKg->keys());
        $salesChart->dataset('Crop Sales Kilogram', 'bar', $salesKg->values())
            ->backgroundColor('green');
        $salesChart->dataset('Crops Sales Percentage', 'line', $salesPercentage->values())
            ->backgroundColor('grey');

        // $salesSpan = totalChart::orderBy('created_at')
        // ->pluck('crop_name','created_at');

        // $spanChart = new spanChart;
        // $spanChart->labels($salesSpan->keys());
        // $spanChart->dataset('Crops', 'line', $salesSpan->values())
        // ->backgroundColor('green');
        // $spanChart->dataset('Crops Sales Percentage', 'line', $salesPercentage->values())
        // ->backgroundColor('grey');
        // $chart = Charts::database($allposts, 'bar', 'highcharts')
        // ->title('Product Details')
        // ->elementLabel('Total Products')
        // ->dimensions(1000, 500)
        // ->colors(['red', 'green', 'blue', 'yellow', 'orange', 'cyan', 'magenta'])
        // ->groupByMonth(date('Y'), true);
        //$posts = Post::orderBy('created_at','top6qty12')->get();
        return view('pages.index')
            ->with('posts', $posts)
            ->with('user_lands', $user_lands)
            ->with('$totalQty', $totalQty)
            ->with('chart', $chart)
            ->with('salesChart', $salesChart)
            ->with('top6', $top6)
            ->with('top12', $top12)
            ->with('top1212', $top1212)
            ->with('top6qty', $top6qty)
            ->with('top12qty', $top12qty)
            ->with('top6qty12', $top6qty12)
            ->with('top10', $top10)
            ->with('defaultImg', $defaultImg)
            ->with('allPosts', $totalQty);
    }

    public function products()
    {
        $data = array(

            'title' => 'Products!',
            'products' => ['Cabbage', 'Tomatoes', 'Corn', 'Potatoes', 'Coffee', 'Carrots', 'Lettuce']
        );
        return view('pages.products')->with($data);
    }
    public function homepage()
    {
        $title = "Home Page";
        return view('pages.homepage')->with('title', $title);
    }
    public function getTermsAndAgreement()
    {

        return view('croplook-terms-and-conditions');
    }
}
