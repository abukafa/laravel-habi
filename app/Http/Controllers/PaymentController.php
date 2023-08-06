<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Billing;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $invoices = Payment::select('invoice')
            ->selectRaw('MIN(date) AS date')
            ->selectRaw('MIN(name) AS name')
            ->selectRaw('COUNT(*) AS items')
            ->selectRaw('SUM(amount) AS total')
            ->groupBy('invoice')
            ->get();

        return view('payment.index', [
            'title' => 'Data Pembayaran',
            'payments' => $invoices
        ]);
    }
    
    public function detail($inv)
    {
        $billings = Billing::all();
        $students = Student::all();
        $total = 0;
        $items = Payment::where('invoice', $inv)->get();
        foreach($items as $i){ $total += $i->amount; }
        return view('payment.detail', [
            'title' => 'Data Pembayaran',
            'invoice' => $inv,
            'total' => $total,
            'items' => $items,
            'billings' => $billings,
            'students' => $students
        ]);
    }
    
    public function preview($inv)
    {
        $school = School::first();
        $total = 0;
        $items = Payment::where('invoice', $inv)->get();
        foreach($items as $i){ $total += $i->amount; }
        return view('payment.preview', [
            'title' => 'Data Pembayaran',
            'total' => $total,
            'items' => $items,
            'school' => $school
        ]);
    }
    
    public function rekap($ids)
    {
        $school = School::first();
        $student = Student::find($ids);
        $total = 0;
        $payments = Payment::where('ids', $ids)
            ->where('billing', 'LIKE', '%' . $school->period . '%')
            ->get();
        $billing = Billing::select('account', 'name', 'amount', 'is_monthly')
            ->where('year', $school->period)
            ->where('category', $student->payment_category)
            ->get();

        $items = [];

            foreach ($billing as $value) {
                if ($value->is_monthly == true) {
                    $startMonth = strtotime('JULY ' . $school->period);
                    $months = [];
                    for ($i = 0; $i < 12; $i++) {
                        $month = date('M-Y', $startMonth);
                        $months[] = $month;
                        $startMonth = strtotime('+1 month', $startMonth);
                    }
        
                        foreach ($months as $remark) {
                            $billing = $value->name . ' ' . $remark;
                            $paid = 0;
                            $date = '-';
                            foreach ($payments as $key => $val) {
                                if($val->billing == $billing){
                                    $paid += $val->amount;
                                    $date = $val->date;
                                }
                            }
                            $items[] = [
                                'ids' => $student->id,
                                'name' => $student->name,
                                'account' => $value->account, 
                                'billing' => $billing,
                                'amount' => $value->amount, 
                                'paid' => $paid,
                                'date' => $date
                            ];
                        }
                } else {
                    $billing = $value->name . ' ' . $school->period;
                    $paid = 0;
                    foreach ($payments as $key => $val) {
                        if($val->billing == $billing){
                            $paid += $val->amount;
                            $date = $val->date;
                        }
                    }
                    $items[] = [
                        'ids' => $student->id,
                        'name' => $student->name,
                        'account' => $value->account, 
                        'billing' => $billing,
                        'amount' => $value->amount, 
                        'paid' => $paid,
                        'date' => $date
                    ];
                }
            }

        return view('payment.rekap', [
            'title' => 'Data Pembayaran',
            'items' => $items,
            'school' => $school
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $saved = Payment::create($data);
        if($saved){
            return redirect('/admin/pembayaran/inv/' . $saved->invoice)->with('success', 'Data berhasil disimpan');
        }else{
            return back()->with('danger', 'Data gagal disimpan');
        }
    }
    
    public function destroy($id)
    {
        $deleted = Payment::destroy($id);
        if($deleted){
            return back()->with('success', 'Data berhasil dihapus');
        }else{
            return back()->with('danger', 'Data gagal dihapus');
        }
    }

    public function confirm()
    {
        return view('payment.confirm', ['title' => 'Konfirmasi Pembayaran']);
    }
}
