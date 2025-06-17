<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; line-height: 1.6;">
        {!! nl2br(e($content)) !!}
        
        <p style="margin-top: 20px; color: #666;">
            Cet email vous a été envoyé depuis l'application <strong>Business Preparedness and Customer Follow Up</strong>.
        </p>
    </div>
</body>
</html>