<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
      Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->enum('status', ['opened', 'closed']);
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
      });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
