<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;

class ReqCall extends Model
{
    //
    protected $table='reqcalls';
   // protected $guest_name;
  //  protected $rq_phone;
    
    public function SaveModel($name,$phone){
        $this->guest_name = $name;
        $this->rq_phone = $phone;
        $this->save();
    }
}
