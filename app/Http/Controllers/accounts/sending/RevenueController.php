<?php

namespace App\Http\Controllers\accounts\sending;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Libraries\DataTable;
use App\Models\TransactionsData;
use App\Traits\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            $countries = $this->getSendingCountriesCache()->pluck('sending_country')->toArray();
            return view('accounts.transactions.sending.revenue.index',['countries' => $countries]);
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
            ['db' => 'sending_country', 'dt' => 'sending_country','is_raw' =>1],
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
            DataTable::where('sending_country','=',$receiving_country);
        }
        DataTable::groupBy('sending_country');
        $transactions = DataTable::get();
        $count = 0;
        $perPage = \request('datatable.pagination.perpage', 1);
        $page = \request('datatable.pagination.page', 1);
        $perPage = ($page * $perPage) - $perPage;
        if (sizeof($transactions['data']) > 0) {
            foreach ($transactions['data'] as $key => $transaction) {
                $count = $count +1;
                $transactions['data'][$key]['id'] = $count + $perPage;
            }
        }
        return response($transactions);

        if (empty($request->search_filter) && empty($request->date_from) && !empty($request->date_to)) {
                return redirect()->back()->with('failed', "From Date Mandatory");
            } else {
                if (!empty($request->search_filter) && empty($request->date_from) && !empty($request->date_to)) {
                    return redirect()->back()->with('failed', "From Date Mandatory");
                }
            }
            $date_from = '';
            $date_to = '';
            $tr_no_count = DB::raw('count(tr_no) as count_of_tr_no');
            $vol_in_gbp = DB::raw('SUM(IF(payin_ccy="GBP",(payin_amt-admin_charges),(payin_amt/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1)-admin_charges))) AS vol_in_gbp');
            $fx_in_gbp = DB::raw('SUM(IF(payin_ccy="GBP",(((buyer_dc_rate-agent_rate)*(payin_amt-admin_charges))/ buyer_dc_rate),(((buyer_dc_rate-agent_rate)*(payin_amt-admin_charges))/buyer_dc_rate))/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1)) AS fx_in_gbp');
            $charges_in_gbp = DB::raw('SUM(IF(payin_ccy="GBP",(admin_charges),(admin_charges/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1)))) AS charges_in_gbp');
            $net_admin_charges_in_gbp = DB::raw('SUM(IF(agent_name_main="SSRL",((admin_charges/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1))-(admin_charges/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1))),(admin_charges/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1))))  AS net_admin_charges_in_gbp');
            $fx_loss = DB::raw('SUM(IF(payin_ccy="GBP",(((buyer_dc_rate-agent_rate)*(payin_amt-admin_charges))/ buyer_dc_rate),(((buyer_dc_rate-agent_rate)*(payin_amt-admin_charges))/buyer_dc_rate))/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1))+SUM(IF(payin_ccy="GBP",(admin_charges),(admin_charges/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1)) )) AS fx_loss');
            $total_revenue_in_gbp = DB::raw('SUM(IF(payin_ccy="GBP",(((buyer_dc_rate-agent_rate)*(payin_amt-admin_charges))/ buyer_dc_rate),(((buyer_dc_rate-agent_rate)*(payin_amt-admin_charges))/buyer_dc_rate))/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1)) +
            SUM(IF(agent_name_main="SSRL",((admin_charges/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1))-(admin_charges/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1))),(admin_charges/(SELECT currencies_rates.rate FROM currencies INNER JOIN currencies_rates ON currencies.id=currencies_rates.c_id WHERE currencies.currency=payin_ccy AND currencies_rates.status=1))))  AS total_revenue_in_gbp');
            $conditions = TransactionsData::select('customer_country', $tr_no_count, $vol_in_gbp, $fx_in_gbp, $charges_in_gbp, $net_admin_charges_in_gbp, $fx_loss, $total_revenue_in_gbp)->where([['customer_country', '!=', ''], ['status', '=', 'Paid']]);
            if ($request->date_from && !$request->date_to) {
                $date_from = date('d/m/Y', strtotime($request->date_from));
                $conditions->where('transaction_date', $date_from);
            }
            if ($request->date_from && $request->date_to) {
                $date_from = date('d/m/Y', strtotime($request->date_from));
                $date_to = date('d/m/Y', strtotime($request->date_to));
                $conditions->whereBetween('transaction_date', [$date_from, $date_to]);
            }
            $transactions = $conditions->groupBy('customer_country')->orderBY('customer_country')->get();
            return view('accounts.transactions.sending.revenue.index', ['transactions' => $transactions]);

    }
}

