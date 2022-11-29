<?php

use App\Constants\DosageFormConstant;
use App\Constants\GSTConstant;
use App\Constants\PackageConstant;
use App\Constants\UOMConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_for_web')->nullable();
            $table->string('ws_code')->nullable();
            $table->string('sky_view_code')->nullable();
            $table->string('is_assured')->nullable();
            $table->enum('dosage_form', [DosageFormConstant::DosageForm])->nullable()->nullable();
            $table->enum('package', [PackageConstant::Package])->nullable()->nullable();
            $table->enum('uom', [UOMConstant::UOM])->nullable()->nullable();
            $table->string('package_size')->nullable();
            $table->enum('gst', [GSTConstant::GST])->nullable()->nullable();
            $table->string('hsn_code')->nullable();
            $table->boolean('is_discontinued')->default(true);
            $table->unsignedBigInteger('manufacturer')->nullable();
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
        Schema::dropIfExists('medicines');
    }
}
