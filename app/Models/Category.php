<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';
    protected $fillable = array('id', 'name', 'created_at', 'updated_at');

    public function magazines() {
        return $this->hasMany('\App\Models\Magazine');
    }

    /**
     * validation rules
     * @var array 
     */
    public static $rules = [
        'name' => 'required|unique:categories'
    ];

    /**
     * validation messages
     * @var array 
     */
    public static $messages = [
        'name.required' => 'Please enter name.',
        'name.unique' => 'Name already taken.'
    ];

}

?>
