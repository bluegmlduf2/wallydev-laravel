@props(['message'])

@if ($message)
    <div id="alert-div" class="text-md font-medium text-green-600 mb-4">
        {{ $message }}
    </div>
    <script>
        // 3초 후에 메세지 숨기기
        setTimeout(function() {
            const alertDiv = document.getElementById('alert-div');
            if (alertDiv) {
                alertDiv.style.display = 'none';
            }
        }, 3000);
    </script>
@endif
