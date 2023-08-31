<p>
    <b>Post Title : </b>{{ $post->title }}
</p>
<p>
    <b>Comment Content : </b> {{ $comment->comment }}
</p>
<p>
    <b>Written by : </b> {{ $comment->name }}
</p>
<p>
    <b>Written at : </b> {{ $comment->updatedDate }}
</p>
<p>
    <a href="{{ route('home') }}"> Go to Website</a>
</p>
