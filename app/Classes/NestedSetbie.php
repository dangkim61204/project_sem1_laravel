<?php 
namespace App\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NestedSetbie {


    public $params;
    public $checked;
    public $data;
    public $count;
    public $count_level;
    public $_lft;
    public $_rgt;
    public $level;
    function __construct($params = NULL)
    {
        $this->params = $params;
        $this->checked = NULL;
        $this->data = NULL;
        $this->count = 0;
        $this->count_level = 0;
        $this->_lft = NULL;
        $this->_rgt = NULL;
        $this->level = NULL;
    }

    public function Get() {

      
        $foreignKey = (isset($this->params['foreignKey'])) ? $this->params['foreignKey'] : 'post_catalogue_id';
        $moduleExtract = explode('_', $this->params['table']);

        $result = DB::table($this->params['table'].' as tb1')
        ->select('tb1.id', 'tb2.name', 'tb1.parent_id', 'tb1._lft', 'tb1._rgt', 'tb1.level', 'tb1.order')
        ->join($moduleExtract[0].'_catalogue_language as tb2', 'tb1.id', 'tb2.'.$foreignKey.'')
        ->where([
            [
                'tb2.language_id' , '=' , $this->params['language_id'],
            ]
        ])->orderBy('tb1._lft' , 'asc')->get()->toArray();

        $this->data = $result;


        return $this->data;

     

    }

    public function Set() {
        if(isset($this->data) && is_array($this->data)){
            $arr = NULL;
            foreach($this->data as $key => $val) {
                $arr[$val->id][$val->parentid] = 1;
                $arr[$val->parentid][$val->id] = 1;

            }
            
            return $arr;
        }
    }


    // đệ quy
    public function Recursive($start = 0, $arr = NULL) {
        $this->lft[$start] = ++$this->count;
        $this->level[$start] = $this->count_level;

        if(isset($arr) && is_array($arr)) {
            foreach($arr as $key => $val) {

      
                if((isset($arr[$start][$key])) || isset($arr[$key][$start])
              
                ){
                    $this->count_level++;
                    $this->checked[$start][$key] = 1;
                    $this->checked[$key][$start] = 1;
                    $this->Recursive($key, $arr);
                    $this->count_level--;
                }
            }
        }

        $this->rgt[$start] = ++$this->count;



    }


    public function Action() {
        if(isset($this->level) && is_array($this->level) && isset($this->lft) && is_array($this->lft)
        && isset($this->rgt) && is_array($this->rgt)
        ){

            $data = null;
            foreach($this->level as $key => $val) {
                if($key == 0) continue;
                $data[] = array(
                    'id' => $key,
                    'level' => $val,
                    'lft' => $this->lft[$key],
                    'rgt' => $this->rgt[$key],
                    'user_id' => Auth::id()

                );

            }

           
            if(isset($data) && is_array($data) && count($data)) {
                DB::table($this->params['table'])->upsert($data, 'id', ['level', 'lft', 'rgt']);
            }



        }
    }


    public function Dropdown($params = null) {
        $this->get();
        if(isset($this->data) && is_array($this->data)) {
            $temp  = NULL;
            $temp[0] = (isset($params['text']) && !empty($params['text'])) ?$params['text'] : '[Root]';
            foreach($this->data as $key => $val) {
                $temp[$val->id] = str_repeat('|-----', (($val->level > 0) ? ($val->level -1 ) : 0)).$val->name;

            }
            return $temp;
        }

    }
}

