<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('project_lead');
            $table->string('start');
            $table->string('end')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');;
        });
        DB::table('projects')->insert([
            [
                'name' => "Testing Platform",
                'start' => "30.10.2023",
                'end' => "20.12.2023",
                'user_id' => 1,
            ],
           [ 'name' => "NCC",
            'start' => "22.09.2023",
            'end' => "30.09.2023",
            'user_id' => 1,]
        ],

        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
