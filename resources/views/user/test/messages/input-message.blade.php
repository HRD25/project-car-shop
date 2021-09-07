<div class="message-wrapper">
    <ul class="messages">
        @foreach ($messages as $message)
            <li class="message clearfix">
                <div class="{{ $message->idFromUser == Auth::id() ? 'sent' : 'received' }}">
                    <p>{{ $message->messages }}</p>
                    <p class="date">{{ $message->created_at }}</p>
                    <a href=""></a>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="input-text">
    <input type="text" name="message" class="message-input">
</div>
