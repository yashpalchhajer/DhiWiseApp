<?php

use App\Constants\ChronicConstant;
use App\Constants\ScheduleTypeCodeConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoleculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('molecules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('is_refrigerated')->nullable();
            $table->enum('schedule_type_code', [ScheduleTypeCodeConstant::Schedule])->nullable()->nullable();
            $table->enum('is_chronic_acute', [ChronicConstant::Chronic])->nullable()->nullable();
            $table->boolean('can_sell_online')->default(true);
            $table->boolean('is_r_x_required')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('molecules');
    }
}
