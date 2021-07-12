<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_chats', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->unsignedInteger('from_admin_id');
            $table->unsignedInteger('to_admin_id');
            $table->boolean('is_seen')->default(false);
            $table->boolean('is_delivered')->default(false);
            $table->timestamps();

            $table->foreign('from_admin_id')->references('id')->on('admins');
            $table->foreign('to_admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_chats');
    }
}
