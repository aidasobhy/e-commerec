<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnUsersVerificationCodeToVerficationCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_verificationCodes', function (Blueprint $table) {
            Schema::rename('users_verificationCodes','VerificationCodes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_verificationCodes', function (Blueprint $table) {
            Schema::dropIfExists('users_verificationCodes');
        });
    }
}
