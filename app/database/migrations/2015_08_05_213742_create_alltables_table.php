<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlltablesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');  
            $table->string('username', 100)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('passcode', 100)->nullable();
            $table->string('ci')->nullable();
            $table->string('name');
            $table->string('lastname'); 
            $table->string('email')->nullable();
            $table->integer('age');
            $table->string('birthdate');
            $table->string('gender', 1); // M for Male & F for Female
            $table->string('phone')->nullable();
            $table->string('address');
            $table->string('status', 1); // A for Able & D for disable
            $table->integer('user_level'); //1 for Admin, 2 for Teachers, 3 for Parents, 4 for student & 5 for General
            $table->string('status_login', 1); // A for Able & D for disable 
            $table->string('document')->nullable();
            $table->string('type', 1)->nullable(); // C for Classroom Teachers, S for Specialized Teachers
            $table->string('degree')->nullable();
            $table->string('admission_date')->nullable();
            $table->integer('years_service')->nullable();
            $table->string('er_number')->nullable();
            $table->string('allergies')->nullable();
            $table->string('medicines')->nullable();
            $table->string('back_medical')->nullable();
            $table->string('remember_token')->nullable();
            $table->integer('permission_id')->nullable();
            $table->integer('disabled_period_id')->nullable();
            $table->integer('id_grade')->nullable();
            $table->integer('id_year')->nullable();
            $table->integer('sub_id')->nullable();
             $table->timestamps();
        });
        
        Schema::create('assigments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('activity');
            $table->string('objective');
            $table->string('date');
            $table->integer('id_grade');
            $table->integer('id_subjet');
            $table->integer('id_period');
            $table->timestamps();
        });

        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assistance');
            $table->integer('inattendances');
            $table->integer('id_year');
            $table->integer('month');
            $table->integer('id_student');
            $table->integer('id_grade');
            $table->timestamps();
        });

        Schema::create('califications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cualitative')->nullable();
            $table->integer('cuantitative')->nullable();
            $table->string('continue_eval');
            $table->integer('id_period');
            $table->integer('id_grado');
            $table->integer('id_student');
            $table->integer('id_subjet');
            $table->timestamps();
        });

        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_grade');
            $table->string('name_section');
            $table->timestamps();
        });

        Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('list_name');
            $table->integer('quantity');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month');
            $table->string('pay_mode');
            $table->string('pay_date');
            $table->integer('amount');
            $table->integer('bill_number');
            $table->integer('id_parent');
            $table->string('comments');
            $table->timestamps();
        });

        Schema::create('periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('period_name');
            $table->string('fromdate');
            $table->string('todate');
            $table->string('status', 1); // A for Able & D for disable
            $table->integer('id_year');
            $table->timestamps();
        });

        Schema::create('periodyear', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('status', 1); // A for Able & D for disable
            $table->timestamps();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc');
            $table->integer('id_user');
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_grade');
            $table->integer('id_subjet');
            $table->string('day');
            $table->integer('module');
            $table->string('status');
            $table->timestamps();
        });
        
        Schema::create('subjets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_sub');
            $table->timestamps();
        });
        
        Schema::create('pv_represents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('parent_id');
            $table->timestamps();
        });

           Schema::create('pv_payparents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_parent');
            $table->integer('id_payment');
            $table->timestamps();
        });

        Schema::create('pv_grasub', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grade_id');
            $table->integer('subjet_id');
            $table->timestamps();
        });

        Schema::create('upermissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('per_name');
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
        Schema::drop('assigments');
        Schema::drop('attendances');
        Schema::drop('califications');
        Schema::drop('grades');
        Schema::drop('lists');
        Schema::drop('payments');
        Schema::drop('periods');
        Schema::drop('pv_represents');
        Schema::drop('pv_payparents');
        Schema::drop('pv_grasub');
        Schema::drop('schedules');
        Schema::drop('subjets');
        Schema::drop('upermissions');
        Schema::drop('users');
    }

}
