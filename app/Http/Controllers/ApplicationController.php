<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Добавили

class ApplicationController extends Controller
{
    // Показываем форму (если нужно)
    public function create()
    {
        return view('application.form');
    }

    // Сохраняем заявку
    public function store(Request $request)
    {
        // Валидация
        $validated = $request->validate([
            'Sfer' => 'required|in:1,2,3',
            'lerning' => 'required|in:1,2,3',
            'format' => 'required|in:1,2',
            'Date' => 'required|date|after_or_equal:today',
        ]);

        try {
            $courseNames = [
                '1' => 'Основы Веб разработки',
                '2' => 'Основы алгоритмизации и программирования', 
                '3' => 'Основы разработки баз данных'
            ];

            $durationTexts = [
                '1' => '2 месяца',
                '2' => '6 месяцев',
                '3' => '12 месяцев'
            ];

            $formatTexts = [
                '1' => 'Онлайн',
                '2' => 'Офлайн'
            ];

            // Данные для заявки
            $applicationData = [
                'sfer' => $validated['Sfer'],
                'lerning' => $validated['lerning'],
                'format' => $validated['format'],
                'start_date' => $validated['Date'],
                'course_name' => $courseNames[$validated['Sfer']] ?? null,
                'duration_text' => $durationTexts[$validated['lerning']] ?? null,
                'format_text' => $formatTexts[$validated['format']] ?? null,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'status' => 'new',
            ];

            // Если пользователь авторизован, добавляем его ID
            if (Auth::check()) {
                $applicationData['user_id'] = Auth::id();
            }

            // Создаем заявку
            $application = Application::create($applicationData);

            // Логируем успех
            Log::info('Новая заявка создана', ['id' => $application->id]);

            // Редирект
            return redirect('/decoration')
                ->with('success', '✅ Заявка успешно отправлена!')
                ->with('application_id', $application->id);

        } catch (\Exception $e) {
            Log::error('Ошибка при создании заявки', [
                'error' => $e->getMessage(),
                'data' => $validated
            ]);

            return back()
                ->withInput()
                ->with('error', '❌ Произошла ошибка при отправке заявки.');
        }
    }

    // === НОВЫЕ МЕТОДЫ ДЛЯ АДМИНКИ ===
    
    /**
     * Показать все заявки на странице Admin.blade.php
     */
public function adminIndex()
{
    // Проверяем авторизацию
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    
    // Получаем все заявки БЕЗ пользователей (пока)
    $applications = Application::orderBy('created_at', 'desc')
        ->paginate(10);
    
    // Возвращаем страницу Admin.blade.php
    return view('Admin', compact('applications'));
}
    
    /**
     * Обновить статус заявки (кнопки "Одобрить/Отклонить")
     */
    public function adminUpdateStatus(Request $request, $id)
    {
        // Проверяем авторизацию
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        // Валидация
        $request->validate([
            'status' => 'required|in:approved,rejected,review'
        ]);
        
        // Находим заявку
        $application = Application::findOrFail($id);
        
        // Обновляем
        $application->update([
            'status' => $request->status,
            'status_changed_at' => now(),
            'admin_notes' => $request->notes ?? $application->admin_notes
        ]);
        
        return back()->with('success', 'Статус обновлен');
    }

    // === СТАРЫЕ МЕТОДЫ (можно оставить или удалить) ===
    
    // Список заявок (для отдельной админ-страницы)
    public function index()
    {
        $applications = Application::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.applications.index', compact('applications'));
    }

    // Показать заявку
    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    // Обновить статус (старый метод)
    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,completed,rejected',
            'notes' => 'nullable|string'
        ]);

        $application->update([
            'status' => $request->status,
            'notes' => $request->notes
        ]);

        return back()->with('success', 'Статус обновлен');
    }
}