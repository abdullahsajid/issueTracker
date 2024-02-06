<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('projissues')){
            Schema::create('projissues', function (Blueprint $table) {
                $table->id();
                $table->string('issue_title');
                $table->string('issue_desc');
                $table->string('issue_priority');
                $table->string('issue_assign');
                $table->string('issue_attachment');
                $table->unsignedBigInteger('userIssue_id');
                $table->timestamps();
            });
        }
        Schema::table('projissues',function ($table){
            $table->foreign('userIssue_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projissues');
    }
};
