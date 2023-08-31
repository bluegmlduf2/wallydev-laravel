<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The comment instance.
     *
     * @var \App\Models\Comment
     */
    public $comment;

    /**
     * The post instance.
     *
     * @var \App\Models\Post
     */
    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, Post $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'New Comment',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        // Not in use
        return new Content(
            view: 'email.comment',
            // text: 'emails.orders.shipped-text'
            with: [
                'comment' => $this->comment,
                'post' => $this->post,
            ],
        );
    }

    public function build()
    {
        $adminUser = User::where('is_admin', true)->first();

        return $this->to($adminUser)
            ->locale(session('locale'))
            ->view('emails.comment'); // 뷰 파일을 설정해야 합니다.
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
