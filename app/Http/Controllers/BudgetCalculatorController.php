<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BudgetCalculatorController extends Controller
{
    public function index()
    {
        return view('budget_calculator.index');
    }

    public function calculate(Request $request)
    {
       
        $incomes = collect($request->incomes);
        $incomeplanned=$incomes->sum(function ($item) {
            return (float)$item['planned']; // Convert to float
        });
        $incomerecieved=$incomes->sum(function ($item) {
            return (float)$item['recieved']; // Convert to float
        });


        // foreach($incomes as $income=> $recieved){ 
         
        //    foreach($recieved->planned as $newa){
            // dd($income) ;
            //    $incomeplanned += $newa;
            // }
            // $incomerecieved += $income->$recieved;
        // };
        // foreach($incomes->planned as $income){  
        //     $incomerecieved += $income;
        // };
       $givingslist=collect($request->givings);
        $givingsplanned =$givingslist->sum(function ($item) {
            return (float)$item['planned']; // Convert to float
        });
        $givingsrecieved = $givingslist->sum(function ($item) {
            return (float)$item['recieved']; // Convert to float
        });


       $savingslist=collect($request->savings);
        $savingsplanned =$savingslist->sum(function ($item) {
            return (float)$item['planned']; // Convert to float
        });
        $savingsrecieved = $savingslist->sum(function ($item) {
            return (float)$item['recieved']; // Convert to float
        });


       $housinglist=collect($request->housings);
        $housingsplanned =$housinglist->sum(function ($item) {
            return (float)$item['planned']; // Convert to float
        });
        $housingsrecieved = $housinglist->sum(function ($item) {
            return (float)$item['recieved']; // Convert to float
        });
      
        // $sum = 0.0;
        // foreach($request->givings as $new){
        //     $sum +=$new['planned'];
        // };
        // dd($sum );
       
        $data= [ $givingsplanned, $givingsrecieved];
        // return response()->json(['data' => $data]);
        return view('budget_calculator.create')->with(['givingsrecieved' => $givingsrecieved,'givingsplanned'=>$givingsplanned,'incomeplanned' =>$incomeplanned, 'incomerecieved'=>$incomerecieved,'housingsrecieved'=>$housingsrecieved, 'housingsplanned' => $housingsplanned, 'savingsplanned'=> $savingsplanned, 'savingsrecieved'=> $savingsrecieved]);
    }
}
