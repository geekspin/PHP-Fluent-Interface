<?php

class Mail
{
    private $from;
    private $to;
    private $subject;
    private $message;

    public function From($from)
    {
        $this->from = $from;
        return $this;
    }

    public function To($to)
    {
        $this->to = $to;
        return $this;
    }

    public function Subject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function Message($message)
    {
        $this->message = $message;
        return $this;
    }  

    public function send()
    {
        $success = mail($this->to, $this->subject, $this->message, 'From: '.$this->from);

        if ( !$success ) {
            print_r(error_get_last()['message']);
        } else {
            print "Message was sent.";
        }
    }
}

$mail = (new Mail())
        ->From('tester@example.com')
        ->addTo('contact@example.com')
        ->Subject('Fluent Interface')
        ->Message('Hello World !')
        ->send();

