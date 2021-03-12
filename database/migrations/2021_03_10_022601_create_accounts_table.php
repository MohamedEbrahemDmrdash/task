<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
               $table->engine = 'InnoDB';
               $table->charset = 'utf8';
               $table->collation = 'utf8_unicode_ci';
               $table->unsignedInteger('account_id')->nullable(false)->unique();
               $table->timestamp('created_at')->nullable()->default(NULL);
               $table->timestamp('updated_at')->nullable()->default(NULL);
               $table->timestamp('deleted_at')->nullable()->default(NULL);
               $table->string('account_username',24)->nullable(false)->collation('utf8_unicode_ci');
               $table->string('account_name',24)->default(NULL)->nullable()->collation('utf8_unicode_ci');
               $table->string('account_user_full_name',24)->default('')->collation('utf8_unicode_ci');
               $table->string('account_slogan',128)->default(NULL)->nullable()->collation('utf8_unicode_ci');
               $table->string('account_logo',84)->default(NULL)->nullable()->collation('utf8_unicode_ci');
               $table->string('account_password',40)->nullable(false)->collation('utf8_unicode_ci');
               $table->string('account_allowed',120)->nullable(false)->collation('utf8_unicode_ci');
               $table->string('account_rank',8)->nullable(false)->collation('utf8_unicode_ci');
               $table->string('account_email',84)->default(NULL)->nullable()->collation('utf8_unicode_ci');
               $table->string('account_country_code',5)->default('20')->nullable(false)->collation('utf8_unicode_ci');
               $table->string('account_phones',128)->default(NULL)->nullable()->collation('utf8_unicode_ci');
               $table->string('account_address',128)->default(NULL)->nullable()->collation('utf8_unicode_ci');
               $table->string('account_activation_id',8)->default(0)->nullable(false)->collation('utf8_unicode_ci')->comment('activation key');
               $table->string('account_activation_code',6)->default(NULL)->nullable()->collation('utf8_unicode_ci');
               $table->integer('account_activation_code_sent_at')->default(0)->nullable(false);
               $table->string('account_reset_password_code',8)->default(NULL)->nullable()->collation('utf8_unicode_ci');
               $table->integer('account_reset_password_code_sent_at')->default(0)->nullable(false);
               $table->boolean('account_status')->default(1)->nullable(false);
               $table->string('account_mode',8)->default('general')->nullable(false)->collation('utf8_unicode_ci')->comment('premium | free');
               $table->integer('account_registered_by')->default(0)->nullable(false)->comment('registered by affiliation ID');
               $table->string('account_wp_message',512)->default('Please find your tests report by visiting the following link: [LINK]')->nullable(false)->collation('utf8_unicode_ci');
               $table->string('account_region',12)->default('egypt')->nullable(false)->collation('utf8_unicode_ci');
               $table->string('account_timezone',40)->default('Africa/Cairo')->nullable(false)->collation('utf8_unicode_ci');
               $table->string('account_currency',5)->default('EGP')->nullable(false)->collation('utf8_unicode_ci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
