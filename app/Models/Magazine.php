<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model {

    protected $table = 'magazines';
    protected $fillable = array('id', 'name', 'description', 'category_id', 'created_at', 'updated_at');
    public $timestamps = false;

    public function category() {
        return $this->belongsTo('\App\Models\Category');
    }

    /**
     * validation rules
     * @var array 
     */
    public static $rules = [
        'name' => 'required|unique:magazines',
        'description' => 'required',
        'category_id' => 'required'
    ];

    /**
     * validation messages
     * @var array 
     */
    public static $messages = [
        'name.required' => 'Please enter name.',
        'name.unique' => 'Name already taken.',
        'description.required' => 'Please enter Description.',
        'category_id.required' => 'Please select category.'
    ];

}

?>
