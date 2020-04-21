<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'filename', 'msg', 'read'];

    public function summary300()
    {
        $message = trim($this->msg, "\t\n\r\0\x0B\xC2\xA0");
        $message = Str::limit($message, 300);

        return $message;
    }
}
