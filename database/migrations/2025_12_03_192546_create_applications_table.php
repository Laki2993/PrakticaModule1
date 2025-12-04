<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            // Добавляем только статус
            $table->string('status')->default('new')->after('format_text');
        });

        Schema::table('applications', function (Blueprint $table) {
            // Проверяем наличие полей и добавляем если нет
            
            if (!Schema::hasColumn('applications', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            }
            
            if (!Schema::hasColumn('applications', 'status')) {
                $table->string('status')->default('new')->after('format_text');
            }
            
            if (!Schema::hasColumn('applications', 'admin_notes')) {
                $table->text('admin_notes')->nullable()->after('status');
            }
            
            if (!Schema::hasColumn('applications', 'status_changed_at')) {
                $table->timestamp('status_changed_at')->nullable()->after('admin_notes');
            }
            
            if (!Schema::hasColumn('applications', 'ip_address')) {
                $table->ipAddress('ip_address')->nullable()->after('status_changed_at');
            }
            
            if (!Schema::hasColumn('applications', 'user_agent')) {
                $table->text('user_agent')->nullable()->after('ip_address');
            }
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            // Удаляем только если мы их добавляли
            $columns = ['user_id', 'status', 'admin_notes', 'status_changed_at', 'ip_address', 'user_agent'];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('applications', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
};