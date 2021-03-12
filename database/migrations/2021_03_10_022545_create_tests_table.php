<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
               $table->engine = 'InnoDB';
               $table->charset = 'utf8';
               $table->collation = 'utf8_unicode_ci';
               $table->integer('test_id')->nullable(false)->unique();
               $table->integer('test_order')->default(NULL)->nullable();
               $table->string('test_title',64)->default('')->collation('utf8_unicode_ci')->nullable(false);
               $table->string('test_abbreviation',18)->default('')->collation('utf8_unicode_ci')->nullable(false);
               $table->integer('test_lab_unit_id')->default(0)->nullable(false);
               $table->integer('test_test_unit_id')->default(0)->nullable(false);
               $table->integer('test_sample_type_id')->default(0)->nullable(false);
               $table->integer('test_test_profile_id')->default(0)->nullable(false);
               $table->float('test_volume')->default(0)->nullable(false);
               $table->string('test_collection_notes',256)->collation('utf8_unicode_ci')->nullable(false)->default('');
               $table->string('test_review_notes')->charset('utf8')->collation('utf8_unicode_ci')->nullable(false)->default('\'\'');
               $table->decimal('test_is_discount', 4, 0)->nullable(false)->default(1);
               $table->decimal('test_is_printed', 4, 0)->nullable(false)->default(0);
               $table->float('test_assay_time')->nullable(false)->default(0);
               $table->string('test_assay_time_unit',3)->collation('utf8_unicode_ci')->nullable(false)->default('min');
               $table->float('test_default_price')->nullable(false)->default(0);
               $table->integer('test_account_id')->nullable(false)->default(0);
               $table->boolean('test_send_out')->default(NULL)->nullable();
               $table->decimal('test_is_reference', 4, 0)->nullable(false)->default(0)->comment('this test can be used as a reference for other accounts');
               $table->decimal('test_status', 4, 0)->nullable(false)->default(1);
               $table->timestamp('created_at')->nullable()->default(NULL);
               $table->timestamp('updated_at')->nullable()->default(NULL);
               $table->timestamp('deleted_at')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
