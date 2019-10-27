<?php

class User extends Model
{
    protected $table = 'user';

    protected $fillable = [
        'name', 'username', 'password_hash', 'email'
    ];
}