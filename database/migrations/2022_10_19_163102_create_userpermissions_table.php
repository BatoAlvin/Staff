<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpermissions', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');

            $table->boolean('view_session')->default(0);

            $table->boolean('session_create')->default(0);
            $table->boolean('session_delete')->default(0);
            $table->boolean('session_update')->default(0);

            $table->boolean('view_services')->default(0);
            $table->boolean('service_create')->default(0);
            $table->boolean('service_delete')->default(0);
            $table->boolean('service_update')->default(0);

            $table->boolean('view_locations')->default(0);
            $table->boolean('location_create')->default(0);
            $table->boolean('location_delete')->default(0);
            $table->boolean('location_update')->default(0);

            $table->boolean('view_staffs')->default(0);
            $table->boolean('staff_create')->default(0);
            $table->boolean('staff_delete')->default(0);
            $table->boolean('staff_update')->default(0);

            $table->boolean('view_positions')->default(0);
            $table->boolean('position_create')->default(0);
            $table->boolean('position_delete')->default(0);
            $table->boolean('position_update')->default(0);

            $table->boolean('view_programs')->default(0);
            $table->boolean('program_create')->default(0);
            $table->boolean('program_delete')->default(0);
            $table->boolean('program_update')->default(0);

            $table->boolean('view_organizations')->default(0);
            $table->boolean('organization_create')->default(0);
            $table->boolean('organization_delete')->default(0);
            $table->boolean('organization_update')->default(0);

            $table->boolean('view_users')->default(0);
            $table->boolean('user_create')->default(0);
            $table->boolean('user_delete')->default(0);
            $table->boolean('user_update')->default(0);

            $table->boolean('view_permissions')->default(0);
            $table->boolean('permission_create')->default(0);
            $table->boolean('permission_delete')->default(0);
            $table->boolean('permission_update')->default(0);
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
        Schema::dropIfExists('userpermissions');
    }
};
