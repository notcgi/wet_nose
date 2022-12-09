<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const ADMIN_EMAIL = 'admin@domain.com';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = new \App\Models\User;
        $user->name = 'Admin';
        $user->email = self::ADMIN_EMAIL;
        $user->username = 'login';
        $user->password = Hash::make('password');
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Models\User::where(['email'=>self::ADMIN_EMAIL])->first()->delete();
    }
};
