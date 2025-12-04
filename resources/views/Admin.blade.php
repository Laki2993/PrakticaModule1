<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>main</title>
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
</head>
<body>
    <x-app-layout>
        <aside>
            <nav class="asideBtns">
                <button class="BtnOrder" id="BtnOrder"> 
                    <img src="{{ asset('uploads/icon_paper.png') }}" alt="paper">    
                    заявки
                </button>
            </nav>
        </aside>
    <section class="Contens" id="Contens" style="display: flex; justify-content: center;padding: 20px;font-family: Arial, sans-serif;">
    <h2 style="margin-bottom: 20px; color: #ffffff;">Заявки пользователей</h2>
    
    @if($applications->count() > 0)
        @foreach($applications as $app)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:15px; border-radius:5px; background:#f9f9f9;width: fit-content;">
            <!-- Основная информация -->
          <div style="margin-bottom:10px;">
    <strong>#{{ $app->id }}</strong>
    <span style="margin-left:10px;">
        От: 
        @if($app->user_id && $app->user)
            <strong>{{ $app->user->name }}</strong>
            @if($app->user->email)
                <small style="color:#666;">({{ $app->user->email }})</small>
            @endif
        @else
            <strong>Гость</strong>
        @endif
    </span>
    
    <!-- Статус -->
    <span style="float:right;">
        @php
            $statusColors = [
                'new' => ['bg' => '#007bff', 'text' => 'white'],
                'review' => ['bg' => '#ffc107', 'text' => 'black'],
                'approved' => ['bg' => '#28a745', 'text' => 'white'],
                'rejected' => ['bg' => '#dc3545', 'text' => 'white'],
            ];
            $color = $statusColors[$app->status] ?? ['bg' => '#6c757d', 'text' => 'white'];
        @endphp
        <span style="background:{{ $color['bg'] }}; color:{{ $color['text'] }}; padding:3px 10px; border-radius:3px; font-size:13px;">
            {{ $app->status_name }}
        </span>
    </span>
    </div>
            
            <div style="background:white; padding:10px; border-radius:3px; margin-bottom:10px;">
                <div><strong>Курс:</strong> {{ $app->course_name }}</div>
                <div><strong>Начало:</strong> {{ $app->start_date->format('d.m.Y') }}</div>
                <div><strong>Длительность:</strong> {{ $app->duration_text }}</div>
                <div><strong>Формат:</strong> {{ $app->format_text }}</div>
                <div><strong>Подана:</strong> {{ $app->created_at->format('d.m.Y H:i') }}</div>
            </div>
            
            @if($app->admin_notes)
            <div style="background:#fff3cd; padding:8px; border-radius:3px; margin-bottom:10px; border-left:3px solid #ffc107;">
                <strong>Примечание:</strong> {{ $app->admin_notes }}
            </div>
            @endif
            
            @if(in_array($app->status, ['new', 'review']))
            <div>
                <form action="{{ route('admin.application.updateStatus', $app->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="status" value="approved">
                    <button type="submit" style="background:#28a745; color:white; border:none; padding:8px 20px; border-radius:4px; cursor:pointer; margin-right:10px;">
                        ✓ Одобрить
                    </button>
                </form>
                
                <form action="{{ route('admin.application.updateStatus', $app->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="status" value="rejected">
                    <button type="submit" style="background:#dc3545; color:white; border:none; padding:8px 20px; border-radius:4px; cursor:pointer;">
                        ✗ Отклонить
                    </button>
                </form>
            </div>
            @endif
            
            <!-- Если уже обработана -->
            @if(in_array($app->status, ['approved', 'rejected', 'active', 'completed']))
            <div style="color:#666; font-size:14px;">
                <em>Заявка уже обработана</em>
            </div>
            @endif
        </div>
        @endforeach
        
        <!-- Простая пагинация -->
        <div style="margin-top:30px; text-align:center;">
            @if($applications->previousPageUrl())
                <a href="{{ $applications->previousPageUrl() }}" style="color:#007bff; text-decoration:none; margin-right:15px;">
                    ← Назад
                </a>
            @endif
            
            <span style="color:#666;">Страница {{ $applications->currentPage() }} из {{ $applications->lastPage() }}</span>
            
            @if($applications->nextPageUrl())
                <a href="{{ $applications->nextPageUrl() }}" style="color:#007bff; text-decoration:none; margin-left:15px;">
                    Вперед →
                </a>
            @endif
        </div>
        
    @else
        <div style="text-align:center; padding:40px 20px; color:#666;">
            <div style="font-size:48px; margin-bottom:20px;">📭</div>
            <h3 style="color:#777; margin-bottom:10px;">Заявок пока нет</h3>
            <p>Пользователи еще не подали заявки на курсы</p>
        </div>
    @endif
    </section>

    </x-app-layout>

    <script>
        document.getElementById("BtnOrder").addEventListener("click", function(){
            if(document.getElementById("Contens").style.display == "none"){
                document.getElementById("Contens").style.display ="flex";
            }
            else{
                document.getElementById("Contens").style.display ="none";
            }
        });
    </script>
</body>
</html>