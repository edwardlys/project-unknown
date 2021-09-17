<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class InsertAdminuserInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!User::where('email', 'admin@unknown.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@unknown.com',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ($admin = User::where('email', 'admin@unknown.com')->first()) {
            $admin->delete();
        }
    }
}
