<?php

use App\Constant\Constant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('blog_id');
            $table->uuid();
            $table->string('title');
            $table->text('description');
            $table->text('post');
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users');
            $table->tinyInteger('status')
                ->default(Constant::STATUS_ZERO)
                ->comment('0 = In-active, 1 = Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
