<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
<!-- Секция с заявками -->
<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <div class="max-w-7xl">
        <h2 style="color: white">
             Мои заявки
        </h2>

        @if($applications->count() > 0)
            <!-- Таблица заявок с Bootstrap -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr style="color: white">
                            <th>Курс</th>
                            <th>Дата начала</th>
                            <th>Длительность</th>
                            <th>Формат</th>
                            <th>Статус</th>
                            <th>Дата подачи</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                        <tr>
                            <td>
                                <strong>{{ $application->course_name }}</strong>
                                <br>
                                <small class="text-muted">ID: #{{ $application->id }}</small>
                            </td>
                            <td>{{ $application->start_date->format('d.m.Y') }}</td>
                            <td>{{ $application->duration_text }}</td>
                            <td>{{ $application->format_text }}</td>
                            <td>
                                @php
                                    $statusClasses = [
                                        'new' => 'badge bg-primary',
                                        'review' => 'badge bg-warning',
                                        'approved' => 'badge bg-success',
                                        'rejected' => 'badge bg-danger',
                                        'active' => 'badge bg-info',
                                        'completed' => 'badge bg-secondary'
                                    ];
                                @endphp
                                <span class="{{ $statusClasses[$application->status] ?? 'badge bg-secondary' }}">
                                    {{ $application->status_name }}
                                </span>
                            </td>
                            <td>{{ $application->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                        
                        <!-- Примечание админа (если есть) -->
                        @if($application->admin_notes)
                        <tr class="table-info">
                            <td colspan="6">
                                <small class="text-muted"> <strong>Примечание:</strong> {{ $application->admin_notes }}</small>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Пагинация Bootstrap -->
            <nav aria-label="Навигация по заявкам">
                {{ $applications->links('pagination::bootstrap-5') }}
            </nav>

        @else
            <!-- Нет заявок -->
            <div class="alert alert-info">
                <h5 style="color:white">Заявок пока нет</h5>
                <p style="color: white">Вы еще не подавали заявки на курсы.</p>
                <hr>
                <a style="color: white" href="{{ route('order') }}" class="btn btn-primary">
                    Подать первую заявку
                </a>
            </div>
        @endif
    </div>
</div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
