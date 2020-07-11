<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('profile_picture')->default('users/default.png');
            $table->string('job_title')->nullable();;
            $table->string('profession')->nullable();;
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('gender', array('Homme','Femme', 'Autres'))->nullable();;
            $table->string('phone_number',30)->nullable();;
            $table->date('date_of_birth')->nullable();;
            $table->text('notes')->nullable();
            $table->text('comments')->nullable();
            $table->string('name_companies_work', 100)->nullable();;
            $table->string('name_skills', 100)->nullable();
            $table->string('promotion')->nullable();
            $table->string('filiere')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();;
            $table->string('country')->nullable();;
            $table->integer('child_number')->default(0);
            $table->string('activities')->nullable();
            $table->enum('marital_status', array('Marié(e)','Célibataire', 'Veuf/Veuve'))->nullable();
            $table->string('sport')->nullable();
            $table->string('hobbies')->nullable();
            $table->boolean('is_sign')->default(false);
            $table->text('biographies')->nullable();
            $table->text('experiences')->nullable();
            $table->string('calling_code')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
