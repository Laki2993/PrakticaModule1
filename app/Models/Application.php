<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // Поля которые можно массово назначать
    protected $fillable = [
        'sfer',
        'lerning', 
        'format',
        'start_date',
        'course_name',
        'duration_text',
        'format_text',
        'status',
        'notes',
        'ip_address',
        'user_agent'
    ];

    // Преобразование типов
    protected $casts = [
        'start_date' => 'date',
    ];

    // Константы статусов
    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_COMPLETED = 'completed';
    const STATUS_REJECTED = 'rejected';

    // Константы сфер (значения из select)
    const SFER_WEB = '1';
    const SFER_ALGO = '2';
    const SFER_DB = '3';

    // Константы периодов
    const LERNING_2_MONTHS = '1';
    const LERNING_6_MONTHS = '2';
    const LERNING_12_MONTHS = '3';

    // Константы форматов
    const FORMAT_ONLINE = '1';
    const FORMAT_OFFLINE = '2';

    // Методы-помощники
    public function getSferNameAttribute()
    {
        return match($this->sfer) {
            self::SFER_WEB => 'Основы Веб разработки',
            self::SFER_ALGO => 'Основы алгоритмизации и программирования',
            self::SFER_DB => 'Основы разработки баз данных',
            default => 'Неизвестно'
        };
    }

    public function getDurationNameAttribute()
    {
        return match($this->lerning) {
            self::LERNING_2_MONTHS => '2 месяца',
            self::LERNING_6_MONTHS => '6 месяцев',
            self::LERNING_12_MONTHS => '12 месяцев',
            default => 'Неизвестно'
        };
    }

    public function getFormatNameAttribute()
    {
        return match($this->format) {
            self::FORMAT_ONLINE => 'Онлайн',
            self::FORMAT_OFFLINE => 'Офлайн',
            default => 'Неизвестно'
        };
    }

    // Проверка статусов
    public function isNew()
    {
        return $this->status === self::STATUS_NEW;
    }

    public function isCompleted()
    {
        return $this->status === self::STATUS_COMPLETED;
    }

    // app/Models/Application.php
public function getStatusNameAttribute()
{
    $statuses = [
        'new' => 'Новая',
        'review' => 'На рассмотрении',
        'approved' => 'Одобрена',
        'rejected' => 'Отклонена',
        'active' => 'Активная',
        'completed' => 'Завершена',
    ];
    
    return $statuses[$this->status] ?? $this->status;
}
}