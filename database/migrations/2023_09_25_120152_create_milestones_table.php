<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('end');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');;

        });

        DB::table('milestones')->insert([
                [
                    'name' => "Funding Deliverable EC",
                    'end' => "30.09.2023",
                    'project_id' => 1,
                ],
                [

                    'name' => "Startup",
                    'end' => "30.10.2023",
                    'project_id' => 1,
                ],
                [
                    'name' => "Funding Deliverable EC",
                    'end' => "30.11.2023",
                    'project_id' => 2,
                ],
                [

                    'name' => "Startup",
                    'end' => "30.12.2023",
                    'project_id' => 2,
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};
