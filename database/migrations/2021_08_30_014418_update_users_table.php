<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('phone_id')->unsigned();
            /*
            //phone_id => bigint(20) && unsigned
            //id => bigint(20) && unsigned
            Các cột nối với nhau cùng kiểu dữ liệu
            */
            $table->foreign('phone_id')->references('id')->on('phones');
            /*
            Nối cột phone_id ở bảng users tham chiếu tới cột id bảng phones
            */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
