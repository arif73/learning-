<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Loan;
use App\File;
use Illuminate\Support\Facades\Auth;
class LoanController extends Controller
{
    public function index(){
    	$userid=Auth::user()->id;
    	$loan=Loan::where('user_id',$userid)->orderBy('id','DESC')->first();
    	return view('show')->with('loan',$loan);
    }

    

    public function store(Request $request){

        
        //monthlyPayment
        $loan_amount=$request->loan_amount;
        $term=$request->term;
        $mterm=$term*12;
        $interest=($loan_amount*7.5)/100;
        $lwithi=$loan_amount+$interest;
        $monthly_payment=$lwithi/$mterm;
        //lastpayment
        $lastpayment=Carbon::createFromFormat('Y-m-d',$request->sday)->addYears($term);
        //startday
        $sday=Carbon::createFromFormat('Y-m-d',$request->sday);
        //insert
        $loan=new Loan();
        $loan->user_id=Auth::user()->id;
        $loan->amount=$loan_amount;
        $loan->purpose=$request->purpose;
        $loan->monthly_payment=$monthly_payment;
        $loan->sday=$sday;
        $loan->total_interest_paid=$interest;
        $loan->last_payment=$lastpayment;
        $loan->save();
       
        
         return redirect('show');
        
        
    }

    public function fileindex(){
         $file=File::all();
        return view('file.index')->with('file',$file);
    }


    public function fileform(){

        return view('file.form');
    }

    public function storefile(Request $request){
      
      $file=$request->file('avator');
      $file_name=time()."-".$file->getClientOriginalExtension();
      $location='images/';
      $file->move($location,$file_name);
      $date=Carbon::createFromFormat('Y-m-d',$request->bday); 
     
    
      $file=new File();
      $file->avator=$file_name;
       if ($diff=Carbon::now()->diff($date)->y>=18) {
          $file->date=$date;
      }
      else {
        return "age under 18";
      }
       $file->save();
       return redirect('file');
    }

    public function delete($id){
       
       $delete=File::find($id)->avator;

       $image_path = "/images/"."$delete";  // Value is not URL but directory file path
          unlink($image_path);
       return redirect()->back()->with('msg','delete successfully');
       
    }
}
