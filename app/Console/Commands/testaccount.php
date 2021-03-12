<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\test;
use App\account;

class testaccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:test {name=asc}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $header=['User_name','Number_of_tests'];
         $account1=account::select('account_id','account_username')->get();
         $i=0;
         foreach ($account1 as $value) {
             $User[$value['account_id']]=count(test::where('test_account_id',$value['account_id'])->get());
             $User1[$i]=([$value['account_username'],$User[$value['account_id']]]);
             $i++;
         }
         
         for($i=0;$i<count($User1);$i++)
         {
            $x[$i]=$User1[$i][0];
            $y[$i]=$User1[$i][1];
         }
         array_multisort($y, $x);
         if($this->argument('name')=='desc'){
            array_multisort($y,SORT_DESC, $x , SORT_DESC);
         }
         //for console
         for($i=0;$i<count($User1);$i++)
         {
            $User2[$i]=[$y[$i],$x[$i]];
         }
         $User1=[$y,$x];

        $this->table($header,$User2);

         $myJSON = json_encode($User1);
         file_put_contents('public/jstable.json', $myJSON);
    }
}
