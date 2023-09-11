<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class StandardController extends Controller
{
    protected string $model = "";
    protected $validator_classes = [

            ];
            protected $invokable = [

            ];
    protected function match(string $expression){
        foreach ($this->validator_classes as $key => $value) {
           if(preg_match("/".$expression."/", $value)){
               return $value;
           }
        }
        return false;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decoupe = explode("\\", get_called_class());
        $model = str_replace("Controller", "", $decoupe[count($decoupe)-1]);
        $name = strtolower($model);
        return view($name."s.index", [$name.'s' => $this->model::all()]);
    }


     public static function route(){
        $decoupe = explode("\\", get_called_class());
        $model = str_replace("Controller", "", $decoupe[count($decoupe)-1]);
        $name = strtolower($model);
       // return $name;
        Route::get("/".$name, [get_called_class(), "index"])->name($name."s.index");
        Route::post("/".$name, [get_called_class(), "store"])->name($name."s.store");
        Route::get("/".$name."/{".$model."}", [get_called_class(), "show"])->name($name."s.show");
        Route::put("/".$name."/{".$model."}", [get_called_class(), "update"])->name($name."s.update");
        Route::delete("/".$name."/{".$model."}", [get_called_class(), "destroy"])->name($name."s.destroy");
        $that = new (get_called_class())();
        foreach ($that->invokable as $key => $value) {
            if(is_array($value)){
                switch ($value["method"]) {
                    case 'post':
                        Route::post("/".$key, [get_called_class(), $value["call"]])->name($value["name"]);
                        break;
                    case 'get':
                        Route::get("/".$key, [get_called_class(), $value["call"]])->name($value["name"]);
                        break;
                    case 'patch':
                        Route::patch("/".$key, [get_called_class(), $value["call"]])->name($value["name"]);
                        break;
                    case 'delete':
                        Route::delete("/".$key, [get_called_class(), $value["call"]])->name($value["name"]);
                        break;

                    default:
                        # code...
                        break;
                }

            }else{
                // dd($key);
                Route::get("/".$key, [get_called_class(), $value]);
            }
        }

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator_cls_name = $this->match("Store");
        if($validator_cls_name){
            $validator_cls_name = $this->match("Store");
        $validator = new $validator_cls_name();
            $this->model::create($request->validate($validator->rules()));
             return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show($object)
    {
        $decoupe = explode("\\", get_called_class());
        $data = $this->model::findOrFail($object);
        $model = str_replace("Controller", "", $decoupe[count($decoupe)-1]);
        $name = strtolower($model);
        return view($name."s.show", [$name=>$data]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $object)
    {
        $validator_cls_name = $this->match("Update");
        if($validator_cls_name){
            $validator_cls_name = $this->match("Update");
        $validator = new $validator_cls_name();
             $this->model::findOrFail($object)->update($request->validate($validator->rules()));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\Models\Template  $object
     * @return \Illuminate\Http\Response
     */
    // public function destroy( $object)
    // {
    //     // dd($object);
    //    $object->delete();
    //    return redirect()->back();
    // }
}
