<?php

namespace App\Http\Controllers\accounts\receiving;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Libraries\DataTable;
use App\Models\TransactionsData;
use App\Traits\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

// use Illuminate\Support\Facades\Request;

class RevenueController extends Controller
{
    use Transactions;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            app(UserController::class)->main();
            return $next($request);
        })->except('filter');
    }

    public function index(Request $request)
    {


        if (FacadesRequest::isMethod('get')) {
            $countries = $this->getReceivingCountriesCache()->pluck('receiving_country')->toArray();
            return view('accounts.transactions.receiving.revenue.index',['countries' => $countries]);
        } elseif (FacadesRequest::isMethod('post')) {
            return $this->filter($request);
        } else {
        }
    }

    public function filter(Request $request)
    {


        $rate = "(SELECT currencies_rates.rate FROM currencies_rates INNER JOIN agents ON agents.currency=currencies_rates.currency WHERE agents.name=agent_name AND currencies_rates.status=1)";

        $columns = [
            ['db' => 'id', 'dt' => 'id'],
            ['db' => DB::raw('count(transaction_id) as count_of_tr_no'), 'dt' => 'count_of_tr_no' ,'is_raw' =>1],
            ['db' => $this->getVolInGBP($rate), 'dt' => 'vol_in_gbp','is_raw' =>1],
            ['db' => $this->getFxInGbp($rate), 'dt' => 'fx_in_gbp','is_raw' =>1],
            ['db' => $this->getChargesInGbp($rate), 'dt' => 'charges_in_gbp','is_raw' =>1],
            ['db' => $this->getAdminChargesInGbp($rate), 'dt' => 'net_admin_charges_in_gbp','is_raw' =>1],
            ['db' => $this->getFxLoss($rate), 'dt' => 'fx_loss','is_raw' =>1],
            ['db' => $this->getTotalRevenueInGbp($rate), 'dt' => 'total_revenue_in_gbp','is_raw' =>1],
            ['db' => 'receiving_country', 'dt' => 'receiving_country','is_raw' =>1],
        ];
        $from_date = \request('data.date_from','');
        $to_date = \request('data.date_to','');
        $receiving_country = \request('data.receiving_country','');
        if (empty( \request('data',''))){
            $from_date = Carbon::now()->format('Y-m-d');
        }
        DataTable::init(new TransactionsData, $columns);
        if (!empty($from_date) && empty($to_date)) {
            DataTable::where('paid_date','=', $from_date);
        }
        if (empty($from_date) && !empty($to_date)) {
            DataTable::where('paid_date', '=',$to_date);
        }
        if (!empty($from_date) && !empty($to_date)) {
            DataTable::whereBetween('paid_date', [$from_date, $to_date]);
        }
        if (!empty($receiving_country)){
            DataTable::where('receiving_country','=',$receiving_country);
        }
//        DataTable::groupBy('receiving_country');
        $transactions = DataTable::get();
        $count = 0;
        $perPage = \request('datatable.pagination.perpage', 1);
        $page = \request('datatable.pagination.page', 1);
        $perPage = ($page * $perPage) - $perPage;
        if (sizeof($transactions['data']) > 0) {
//            $dateFormat = config('settings.date-format');
            foreach ($transactions['data'] as $key => $transaction) {
                $count = $count +1;
                $transactions['data'][$key]['id'] = $count + $perPage;
            }
        }
        return response($transactions);
        $tr_no_count = DB::raw('count(transaction_id) as count_of_tr_no');
        $vol_in_gbp = $this->getVolInGBP($rate);
        $fx_in_gbp =$this->getFxInGbp($rate);
        $charges_in_gbp = $this->getChargesInGbp($rate);
        $net_admin_charges_in_gbp = $this->getAdminChargesInGbp($rate);
        $fx_loss = $this->getFxLoss($rate);
        $total_revenue_in_gbp =  $this->getTotalRevenueInGbp($rate);
        $transactions = TransactionsData::query();

        $transactions->select('sending_country', $tr_no_count, $vol_in_gbp,$fx_in_gbp,$charges_in_gbp,$net_admin_charges_in_gbp,$fx_loss,$total_revenue_in_gbp);
        if (!empty($request->date_from) && empty($request->date_to)) {
            $transactions->where('paid_date', $request->date_from);
        }
        if (empty($request->date_from) && !empty($request->date_to)) {
            $transactions->where('paid_date', $request->date_to);
        }
        if (!empty($request->date_from) && !empty($request->date_to)) {
            $transactions->whereBetween('paid_date', [$request->date_from, $request->date_to]);
        }
        $result = $transactions->groupBy('sending_country')->orderBY('sending_country')->limit(2)->get();
        return view('accounts.transactions.receiving.revenue.index', ['transactions' => $result]);
    }


}

