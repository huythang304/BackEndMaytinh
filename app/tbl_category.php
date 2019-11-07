<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_category extends Model
{
	 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_categories';

    public function subcategory(){
        return $this->hasMany(tbl_category::class, 'parentId');
    }


}
