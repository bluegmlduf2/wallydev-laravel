@props(['message'])

@if ($message)
    <label id="alert-label" class="text-sm text-green-600 space-y-1">
        {{ $message }}
    </label>
    <script>
        // 3초 후에 메세지 숨기기
        setTimeout(function() {
            const alertLabel = document.getElementById('alert-label');
            if (alertLabel) {
                alertLabel.style.display = 'none';
            }
        }, 3000);
    </script>
@endif
